<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
use App\Models\Address;
use App\Models\DrivingLicense;
use App\Models\School;
use App\Models\Student;
use App\Models\BusService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File; // To handle file and directories
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
  /**
   * Display the user's profile.
   */
  public function getMyProfile(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    if ($request->user()->role === 'admin') {
      $userId = User::where('role', 'customer')->pluck('id');
      $parentGuardian = UserDetails::whereIn('user_id', $userId)
        ->where('default', 0)
        ->get();
    } elseif ($request->user()->role === 'customer') {
      $parentGuardian = UserDetails::where('user_id', $request->user()->id)
        ->where('default', 0)
        ->get();
    } else {
      $parentGuardian = null;
    }

    if ($request->user()->role === 'admin') {
      $userId = User::where('role', 'customer')->pluck('id');
      $address = Address::whereIn('user_id', $userId)->get();
    } elseif ($request->user()->role === 'customer') {
      $address = Address::where('user_id', $request->user()->id)->get();
    } else {
      $address = null;
    }

    return view('profile.my-profile', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
      'parentGuardian' => $parentGuardian,
      'address' => $address,
    ]);
  }

  /**
   * Update the user's profile.
   */
  public function patchAboutMe(Request $request, string $id): RedirectResponse
  {
    $userDetails = UserDetails::findOrFail($id);

    $this->validate($request, [
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($request->user()->id)],
      'status' => ['nullable', 'string', 'max:255'],
      'phone_no' => ['nullable', 'string', 'max:255'],
      'gender' => ['nullable', 'string', 'max:255'],
      'profile_img' => ['nullable', 'mimes:jpeg,jpg,png', 'max:10000'],
      'bio' => ['nullable', 'string', 'max:255'],
    ]);

    // Save profile picture
    if ($request->hasFile('profile_img')) {
      $image = $request->file('profile_img');
      $filename = 'user_' . $request->user()->id . '_' . time() . '.' . $image->getClientOriginalExtension();

      // Ensure the directory exists
      $path = public_path('images/users');
      if (!File::isDirectory($path)) {
        File::makeDirectory($path, 0777, true, true);
      }

      Image::make($image)->resize(300, 300)->save($path . '/' . $filename);
      $userDetails->update(['profile_img' => $filename]);
    }

    $userDetails->update([
      'first_name' => $request['first_name'],
      'last_name' => $request['last_name'],
      'status' => $request['status'],
      'phone_no' => $request['phone_no'],
      'gender' => $request['gender'],
      'bio' => $request['bio'],
    ]);

    if ($request->user()->isDirty('email')) {
      $request->user()->email_verified_at = null;
    }

    $userDetails->user()->update([
      'email' => $request['email'],
    ]);

    return Redirect::route('profile.my-profile')->with('status', 'profile-updated');
  }

  /**
   * Delete profile image.
   */
  public function deleteProfileImage(string $id)
  {
    $userDetails = UserDetails::findOrFail($id);
    $userDetails->update(['profile_img' => null]);
    return Redirect::route('profile.my-profile')->with('status', 'profile-image-deleted');
  }

  /**
   * Display the new parent/guardian.
   */
  public function getNewParentGuardian(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    return view('profile.new-parent-guardian', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
    ]);
  }

  /**
   * Submit the new parent/guradian.
   */
  public function postNewParentGuardian(Request $request)
  {
    $userDetails = new UserDetails();
    $userId = auth()->user()->id;

    $this->validate($request, [
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'status' => ['required', 'string', 'max:255'],
      'phone_no' => ['required', 'string', 'max:255'],
      'gender' => ['required', 'string', 'max:255'],
      'bio' => ['nullable', 'string', 'max:255'],
    ]);

    $userDetails->user_id = $userId;
    $userDetails->first_name = $request['first_name'];
    $userDetails->last_name = $request['last_name'];
    $userDetails->status = $request['status'];
    $userDetails->phone_no = $request['phone_no'];
    $userDetails->gender = $request['gender'];
    $userDetails->bio = $request['bio'];
    $userDetails->default = false;
    $userDetails->save();

    return Redirect::route('profile.my-profile')->with('status', 'parent-guardian-submitted');
  }

  /**
   * Display the update parent/guardian.
   */
  public function getUpdateParentGuardian(Request $request, string $id): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    $parentGuardianData = UserDetails::findOrFail($id);

    return view('profile.update-parent-guardian', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
      'parentGuardianData' => $parentGuardianData,
    ]);
  }

  /**
   * Submit the update parent/guradian.
   */
  public function patchUpdateParentGuardian(Request $request, string $id)
  {
    $userDetailsData = UserDetails::findOrFail($id);

    $this->validate($request, [
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'status' => ['required', 'string', 'max:255'],
      'phone_no' => ['required', 'string', 'max:255'],
      'gender' => ['required', 'string', 'max:255'],
      'bio' => ['nullable', 'string', 'max:255'],
    ]);

    $userDetailsData->update([
      'first_name' => $request['first_name'],
      'last_name' => $request['last_name'],
      'status' => $request['status'],
      'phone_no' => $request['phone_no'],
      'gender' => $request['gender'],
      'bio' => $request['bio'],
    ]);

    return Redirect::route('profile.my-profile')->with('status', 'parent-guardian-updated');
  }

  /**
   * Delete parent/guradian.
   */
  public function deleteParentGuardian(string $id)
  {
    $studentID = Student::where('parent_guardian_id', $id)->pluck('id');
    $isRequested = BusService::whereIn('student_id', $studentID)->get();

    if ($isRequested->isEmpty()) {
      $userDetailsData = UserDetails::findOrFail($id);
      $userDetailsData->delete();

      return Redirect::route('profile.my-profile')->with('status', 'parent-guardian-deleted');
    } else {
      return Redirect::route('profile.my-profile')->with('status', 'parent-guardian-deleted-failure');
    }
  }

  /**
   * Display the new address.
   */
  public function getNewAddress(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    return view('profile.new-address', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
    ]);
  }

  /**
   * Submit the new address.
   */
  public function postNewAddress(Request $request)
  {
    $address = new Address();
    $userId = auth()->user()->id;

    $this->validate($request, [
      'address_1' => ['required', 'string', 'max:255'],
      'address_2' => ['nullable', 'string', 'max:255'],
      'postal_code' => ['required', 'integer', 'digits:5'],
      'city' => ['required', 'string', 'max:255'],
      'state' => ['required', 'string', 'max:255'],
      'area' => ['required', 'string', 'max:255'],
    ]);

    $address->user_id = $userId;
    $address->address_1 = $request['address_1'];
    $address->address_2 = $request['address_2'];
    $address->postal_code = $request['postal_code'];
    $address->city = $request['city'];
    $address->state = $request['state'];
    $address->area = $request['area'];
    $address->default = 0;
    $address->save();

    return Redirect::route('profile.my-profile')->with('status', 'address-submitted');
  }

  /**
   * Display the update address.
   */
  public function getUpdateAddress(Request $request, string $id): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    $addressData = Address::findOrFail($id);

    return view('profile.update-address', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
      'addressData' => $addressData,
    ]);
  }

  /**
   * Submit the update address.
   */
  public function patchUpdateAddress(Request $request, string $id)
  {
    $addressData = Address::findOrFail($id);

    $this->validate($request, [
      'address_1' => ['required', 'string', 'max:255'],
      'address_2' => ['nullable', 'string', 'max:255'],
      'postal_code' => ['required', 'integer', 'digits:5'],
      'city' => ['required', 'string', 'max:255'],
      'state' => ['required', 'string', 'max:255'],
      'area' => ['required', 'string', 'max:255'],
    ]);

    $addressData->update([
      'address_1' => $request['address_1'],
      'address_2' => $request['address_2'],
      'postal_code' => $request['postal_code'],
      'city' => $request['city'],
      'state' => $request['state'],
      'area' => $request['area'],
    ]);

    return Redirect::route('profile.my-profile')->with('status', 'address-updated');
  }

  /**
   * Delete address.
   */
  public function deleteAddress(string $id)
  {
    $studentPickupID = Student::where('pickup_address_id', $id)->pluck('id');
    $studentDropoffID = Student::where('dropoff_address_id', $id)->pluck('id');
    $isRequested = BusService::whereIn('student_id', $studentPickupID)->orWhereIn('student_id', $studentDropoffID)->get();

    if ($isRequested->isEmpty()) {
      $addressData = Address::findOrFail($id);
      $addressData->delete();

      return Redirect::route('profile.my-profile')->with('status', 'address-deleted');
    } else {
      return Redirect::route('profile.my-profile')->with('status', 'address-deleted-failure');
    }
  }

  /**
   * Display the driver's profile.
   */
  public function getDriverProfile(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    $driver = User::all();

    $driverDetails = UserDetails::all();

    $ecDetails = UserDetails::all();

    $ecAddress = Address::all();

    $drivingLicense = DrivingLicense::all();

    return view('profile.driver-profile', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
      'driver' => $driver,
      'driverDetails' => $driverDetails,
      'ecDetails' => $ecDetails,
      'ecAddress' => $ecAddress,
      'drivingLicense' => $drivingLicense,
    ]);
  }

  /**
   * Display the new driver's profile.
   */
  public function getNewDriver(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    return view('profile.new-driver', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
    ]);
  }

  /**
   * Submit the new driver's profile.
   */
  public function postNewDriver(Request $request)
  {
    $this->validate($request, [
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'phone_no' => ['required', 'string', 'max:255'],
      'gender' => ['required', 'string', 'max:255'],
      'date_of_birth' => ['required', 'date'],
      'ec_first_name' => ['required', 'string', 'max:255'],
      'ec_last_name' => ['required', 'string', 'max:255'],
      'ec_address_1' => ['required', 'string', 'max:255'],
      'ec_address_2' => ['nullable', 'string', 'max:255'],
      'ec_postal_code' => ['required', 'integer', 'digits:5'],
      'ec_city' => ['required', 'string', 'max:255'],
      'ec_state' => ['required', 'string', 'max:255'],
      'ec_phone_no' => ['required', 'string', 'max:255'],
      'class' => ['required', 'string', 'max:255'],
      'expiry_date' => ['required', 'date'],
      'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
      'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    $user = User::create([
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'role' => "driver",
    ]);

    $userDetails1 = new UserDetails();
    $userDetails1->user_id = $user->id;
    $userDetails1->first_name = $request['first_name'];
    $userDetails1->last_name = $request['last_name'];
    $userDetails1->phone_no = $request['phone_no'];
    $userDetails1->gender = $request['gender'];
    $userDetails1->date_of_birth = $request['date_of_birth'];
    $userDetails1->default = true;
    $userDetails1->save();

    $userDetails2 = new UserDetails();
    $userDetails2->user_id = $user->id;
    $userDetails2->first_name = $request['ec_first_name'];
    $userDetails2->last_name = $request['ec_last_name'];
    $userDetails2->phone_no = $request['ec_phone_no'];
    $userDetails2->default = false;
    $userDetails2->save();

    $address = new Address();
    $address->user_id = $user->id;
    $address->address_1 = $request['ec_address_1'];
    $address->address_2 = $request['ec_address_2'];
    $address->postal_code = $request['ec_postal_code'];
    $address->city = $request['ec_city'];
    $address->state = $request['ec_state'];
    $address->default = false;
    $address->save();

    $driverLicense = new DrivingLicense();
    $driverLicense->user_id = $user->id;
    $driverLicense->type = 'Vocational Driving License (VDL)';
    $driverLicense->class = $request['class'];
    $driverLicense->expiry_date = $request['expiry_date'];
    $driverLicense->save();

    return Redirect::route('profile.driver-profile')->with('status', 'driver-registered');
  }

  /**
   * Display the update driver's.
   */
  public function getUpdateDriver(Request $request, string $id): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    $driverData = User::findOrFail($id);

    $driverDetailsData = UserDetails::where('user_id', $id)
      ->where('default', 1)
      ->first();

    $ecDetailsData = UserDetails::where('user_id', $id)
      ->where('default', 0)
      ->first();

    $ecAddressData = Address::where('user_id', $id)
      ->where('default', 0)
      ->first();

    $drivingLicenseData = DrivingLicense::where('user_id', $id)->first();

    return view('profile.update-driver', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
      'driverData' => $driverData,
      'driverDetailsData' => $driverDetailsData,
      'ecDetailsData' => $ecDetailsData,
      'ecAddressData' => $ecAddressData,
      'drivingLicenseData' => $drivingLicenseData,
    ]);
  }

  /**
   * Submit the update driver's.
   */
  public function patchUpdateDriver(Request $request, string $id)
  {
    $driverDetailsData = UserDetails::where('user_id', $id)
      ->where('default', 1)
      ->first();

    $ecDetailsData = UserDetails::where('user_id', $id)
      ->where('default', 0)
      ->first();

    $ecAddressData = Address::where('user_id', $id)
      ->where('default', 0)
      ->first();

    $drivingLicenseData = DrivingLicense::where('user_id', $id)->first();

    $this->validate($request, [
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'phone_no' => ['required', 'string', 'max:255'],
      'gender' => ['required', 'string', 'max:255'],
      'date_of_birth' => ['required', 'date'],
      'ec_first_name' => ['required', 'string', 'max:255'],
      'ec_last_name' => ['required', 'string', 'max:255'],
      'ec_address_1' => ['required', 'string', 'max:255'],
      'ec_address_2' => ['nullable', 'string', 'max:255'],
      'ec_postal_code' => ['required', 'integer', 'digits:5'],
      'ec_city' => ['required', 'string', 'max:255'],
      'ec_state' => ['required', 'string', 'max:255'],
      'ec_phone_no' => ['required', 'string', 'max:255'],
      'class' => ['required', 'string', 'max:255'],
      'expiry_date' => ['required', 'date'],
      'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($driverDetailsData->user->id)],
    ]);

    if ($driverDetailsData->user->isDirty('email')) {
      $driverDetailsData->user->email_verified_at = null;
    }

    $driverDetailsData->user()->update([
      'email' => $request['email'],
    ]);

    $driverDetailsData->update([
      'first_name' => $request['first_name'],
      'last_name' => $request['last_name'],
      'phone_no' => $request['phone_no'],
      'gender' => $request['gender'],
      'date_of_birth' => $request['date_of_birth'],
    ]);

    $ecDetailsData->update([
      'first_name' => $request['ec_first_name'],
      'last_name' => $request['ec_last_name'],
      'phone_no' => $request['ec_phone_no'],
    ]);

    $ecAddressData->update([
      'address_1' => $request['ec_address_1'],
      'address_2' => $request['ec_address_2'],
      'postal_code' => $request['ec_postal_code'],
      'city' => $request['ec_city'],
      'state' => $request['ec_state'],
    ]);

    $drivingLicenseData->update([
      'class' => $request['class'],
      'expiry_date' => $request['expiry_date'],
    ]);

    return Redirect::route('profile.driver-profile')->with('status', 'driver-updated');
  }

  /**
   * Display the change driver's password.
   */
  public function getChangeDriverPassword(Request $request, string $id): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    $driverDetailsData = UserDetails::where('user_id', $id)
      ->where('default', 1)
      ->first();

    return view('profile.change-driver-password', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
      'driverDetailsData' => $driverDetailsData,
    ]);
  }

  /**
   * Update the driver's password.
   */
  public function putChangeDriverPassword(Request $request, string $id): RedirectResponse
  {
    $driverData = User::findOrFail($id);

    $validated = $request->validateWithBag('updatePassword', [
      'current_password' => ['required', 'current_password'],
      'password' => ['required', Password::defaults(), 'confirmed'],
    ]);

    $driverData->update([
      'password' => Hash::make($validated['password']),
    ]);

    return Redirect::route('profile.driver-profile')->with('status', 'driver-password-updated');
  }

  /**
   * Delete driver.
   */
  public function deleteDriver(string $id)
  {
    $driverData = User::findOrFail($id);
    $driverData->delete();

    return Redirect::route('profile.driver-profile')->with('status', 'driver-deleted');
  }

  /**
   * Display the driver's emergency contact.
   */
  public function getEmergencyContact(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    $driverDetailsData = UserDetails::where('user_id', $request->user()->id)->where('default', 1)->first();

    $ecDetailsData = UserDetails::where('user_id', $request->user()->id)->where('default', 0)->first();

    $ecAddressData = Address::where('user_id', $request->user()->id)->where('default', 0)->first();

    return view('profile.emergency-contact', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
      'driverDetailsData' => $driverDetailsData,
      'ecDetailsData' => $ecDetailsData,
      'ecAddressData' => $ecAddressData,
    ]);
  }

  /**
   * Submit the driver's emergency contact.
   */
  public function patchEmergencyContact(Request $request, string $id)
  {
    $ecDetailsData = UserDetails::where('user_id', $id)
      ->where('default', 0)
      ->first();

    $ecAddressData = Address::where('user_id', $id)
      ->where('default', 0)
      ->first();

    $this->validate($request, [
      'ec_first_name' => ['required', 'string', 'max:255'],
      'ec_last_name' => ['required', 'string', 'max:255'],
      'ec_address_1' => ['required', 'string', 'max:255'],
      'ec_address_2' => ['nullable', 'string', 'max:255'],
      'ec_postal_code' => ['required', 'integer', 'digits:5'],
      'ec_city' => ['required', 'string', 'max:255'],
      'ec_state' => ['required', 'string', 'max:255'],
      'ec_phone_no' => ['required', 'string', 'max:255'],
    ]);

    $ecDetailsData->update([
      'first_name' => $request['ec_first_name'],
      'last_name' => $request['ec_last_name'],
      'phone_no' => $request['ec_phone_no'],
    ]);

    $ecAddressData->update([
      'address_1' => $request['ec_address_1'],
      'address_2' => $request['ec_address_2'],
      'postal_code' => $request['ec_postal_code'],
      'city' => $request['ec_city'],
      'state' => $request['ec_state'],
    ]);

    return Redirect::route('profile.emergency-contact')->with('status', 'emergency-contact-updated');
  }

  /**
   * Display the driver's driving licence.
   */
  public function getDrivingLicense(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    $driverDetailsData = UserDetails::where('user_id', $request->user()->id)->where('default', 1)->first();

    $drivingLicenseData = DrivingLicense::where('user_id', $request->user()->id)->first();

    return view('profile.driving-license', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
      'driverDetailsData' => $driverDetailsData,
      'drivingLicenseData' => $drivingLicenseData,
    ]);
  }

  /**
   * Submit the driver's driving licence.
   */
  public function patchDrivingLicense(Request $request, string $id)
  {
    $drivingLicenseData = DrivingLicense::where('user_id', $id)->first();

    $this->validate($request, [
      'class' => ['required', 'string', 'max:255'],
      'expiry_date' => ['required', 'date'],
    ]);

    $drivingLicenseData->update([
      'class' => $request['class'],
      'expiry_date' => $request['expiry_date'],
    ]);

    return Redirect::route('profile.driving-license')->with('status', 'driving-license-updated');
  }

  /**
   * Display the student's profile.
   */
  public function getStudentProfile(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    if ($request->user()->role === 'admin') {
      $student = Student::all();
    } elseif ($request->user()->role === 'customer') {
      $student = Student::where('user_id', $request->user()->id)
        ->get();
    }

    return view('profile.student-profile', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
      'student' => $student
    ]);
  }

  /**
   * Display the new student's profile.
   */
  public function getNewStudent(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    $parentGuardian = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 0)
      ->get();

    $address = Address::where('user_id', $request->user()->id)
      ->get();

    $school = School::all();

    return view('profile.new-student', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
      'parentGuardian' => $parentGuardian,
      'address' => $address,
      'school' => $school,
    ]);
  }

  /**
   * Submit the new student's profile.
   */
  public function postNewStudent(Request $request)
  {
    $student = new Student();
    $userId = auth()->user()->id;

    $this->validate($request, [
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'school' => ['required', 'string', 'max:255'],
      'standard' => ['required', 'integer', 'max:6', 'min:1'],
      'gender' => ['required', 'string', 'max:255'],
      'date_of_birth' => ['required', 'date'],
      'parent_guardian_id' => ['nullable', 'exists:user_details,id'],
      'pickup_address_id' => ['required', 'exists:addresses,id'],
      'dropoff_address_id' => ['required', 'exists:addresses,id'],
    ]);

    $student->user_id = $userId;
    $student->first_name = $request['first_name'];
    $student->last_name = $request['last_name'];
    $student->school = $request['school'];
    $student->standard = $request['standard'];
    $student->gender = $request['gender'];
    $student->date_of_birth = $request['date_of_birth'];
    $student->parent_guardian_id = $request['parent_guardian_id'];
    $student->pickup_address_id = $request['pickup_address_id'];
    $student->dropoff_address_id = $request['dropoff_address_id'];
    $student->save();

    return Redirect::route('profile.student-profile')->with('status', 'student-submitted');
  }

  /**
   * Display the update student's.
   */
  public function getUpdateStudent(Request $request, string $id): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    $parentGuardian = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 0)
      ->get();

    $address = Address::where('user_id', $request->user()->id)
      ->get();

    $school = School::all();

    $studentData = Student::findOrFail($id);

    return view('profile.update-student', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
      'parentGuardian' => $parentGuardian,
      'address' => $address,
      'school' => $school,
      'studentData' => $studentData,
    ]);
  }

  /**
   * Submit the update student's.
   */
  public function patchUpdateStudent(Request $request, string $id)
  {
    $studentData = Student::findOrFail($id);

    $this->validate($request, [
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'school' => ['required', 'string', 'max:255'],
      'standard' => ['required', 'integer', 'max:6', 'min:1'],
      'gender' => ['required', 'string', 'max:255'],
      'date_of_birth' => ['required', 'date'],
      'parent_guardian_id' => ['nullable', 'exists:user_details,id'],
      'pickup_address_id' => ['required', 'exists:addresses,id'],
      'dropoff_address_id' => ['required', 'exists:addresses,id'],
    ]);

    $isRequested = null;
    $isRequested = BusService::where('student_id', $id)->first();

    if (!$isRequested) {
      $studentData->update([
        'first_name' => $request['first_name'],
        'last_name' => $request['last_name'],
        'school' => $request['school'],
        'standard' => $request['standard'],
        'gender' => $request['gender'],
        'date_of_birth' => $request['date_of_birth'],
        'parent_guardian_id' => $request['parent_guardian_id'],
        'pickup_address_id' => $request['pickup_address_id'],
        'dropoff_address_id' => $request['dropoff_address_id'],
      ]);

      return Redirect::route('profile.student-profile')->with('status', 'student-updated');
    } else {
      return Redirect::route('profile.student-profile')->with('status', 'student-update-failure');
    }
  }

  /**
   * Delete student's.
   */
  public function deleteStudent(string $id)
  {
    $isRequested = null;
    $isRequested = BusService::where('student_id', $id)->first();

    if (!$isRequested) {
      $studentData = Student::findOrFail($id);
      $studentData->delete();

      return Redirect::route('profile.student-profile')->with('status', 'student-deleted');
    } else {
      return Redirect::route('profile.student-profile')->with('status', 'student-delete-failure');
    }
  }

  /**
   * Display the change password.
   */
  public function getChangePassword(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    return view('profile.change-password', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
    ]);
  }

  /**
   * Display the delete profile.
   */
  public function getDeleteProfile(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    return view('profile.delete-profile', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
    ]);
  }

  /**
   * Update the user's profile information.
   */
  // public function update(ProfileUpdateRequest $request): RedirectResponse
  // {
  //   $request->user()->fill($request->validated());

  //   if ($request->user()->isDirty('email')) {
  //     $request->user()->email_verified_at = null;
  //   }

  //   $request->user()->save();

  //   return Redirect::route('profile.my-profile')->with('status', 'profile-updated');
  // }

  /**
   * Delete the user's account.
   */
  public function destroy(Request $request): RedirectResponse
  {
    $request->validateWithBag('userDeletion', [
      'password' => ['required', 'current_password'],
    ]);

    $isRequested = null;
    $isRequested = BusService::where('user_id', $request->user()->id)->first();

    if (!$isRequested) {
      $user = $request->user();

      Auth::logout();

      $user->delete();

      $request->session()->invalidate();
      $request->session()->regenerateToken();

      return Redirect::to('/');
    } else {
      return Redirect::route('profile.delete-profile')->with('status', 'delete-profile-failure');
    }
  }
}