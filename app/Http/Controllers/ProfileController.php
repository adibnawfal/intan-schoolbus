<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
use App\Models\Address;
use App\Models\DrivingLicense;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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

    $parentGuardian = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 0)
      ->get();

    $address = Address::where('user_id', $request->user()->id)
      ->get();

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

    $userDetailsData = $request->validate([
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['nullable', 'string', 'max:255'],
      'status' => ['nullable', 'string', 'max:255'],
      'phone_no' => ['nullable', 'string', 'max:255'],
      'gender' => ['nullable', 'string', 'max:255'],
      'bio' => ['nullable', 'string', 'max:255'],
    ]);

    $userDetails->update($userDetailsData);

    $userData = $request->validate([
      'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($request->user()->id)],
    ]);

    if ($request->user()->isDirty('email')) {
      $request->user()->email_verified_at = null;
    }

    $userDetails->user()->update($userData);

    return Redirect::route('profile.my-profile')->with('status', 'profile-updated');
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
      'last_name' => ['nullable', 'string', 'max:255'],
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
   * Display the driver's profile.
   */
  public function getDriverProfile(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    $driverDetails = UserDetails::all();

    $drivingLicense = DrivingLicense::all();

    return view('profile.driver-profile', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
      'driverDetails' => $driverDetails,
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
      'last_name' => ['nullable', 'string', 'max:255'],
      'phone_no' => ['required', 'string', 'max:255'],
      'gender' => ['required', 'string', 'max:255'],
      'date_of_birth' => ['required', 'date'],
      'ec_first_name' => ['required', 'string', 'max:255'],
      'ec_last_name' => ['nullable', 'string', 'max:255'],
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

    $driverLicense = new DrivingLicense();
    $driverLicense->user_id = $user->id;
    $driverLicense->type = 'Vocational Driving License (VDL)';
    $driverLicense->class = $request['class'];
    $driverLicense->expiry_date = $request['expiry_date'];
    $driverLicense->save();

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

    return Redirect::route('profile.driver-profile')->with('status', 'driver-registered');
  }

  /**
   * Display the student's profile.
   */
  public function getStudentProfile(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    $student = Student::where('user_id', $request->user()->id)
      ->get();

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
      ->get();

    $address = Address::where('user_id', $request->user()->id)
      ->get();

    return view('profile.new-student', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
      'parentGuardian' => $parentGuardian,
      'address' => $address,
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
      'last_name' => ['nullable', 'string', 'max:255'],
      'standard' => ['required', 'integer', 'max:6', 'min:1'],
      'gender' => ['required', 'string', 'max:255'],
      'date_of_birth' => ['required', 'date'],
      'parent_guardian_id' => ['required', 'exists:user_details,id'],
      'pickup_address_id' => ['required', 'exists:addresses,id'],
      'dropoff_address_id' => ['required', 'exists:addresses,id'],
    ]);

    $student->user_id = $userId;
    $student->first_name = $request['first_name'];
    $student->last_name = $request['last_name'];
    $student->school = 'Sekolah Kebangsaan Setiawangsa';
    $student->standard = $request['standard'];
    $student->gender = $request['gender'];
    $student->date_of_birth = $request['date_of_birth'];
    $student->parent_guardian_id = $request['parent_guardian_id'];
    $student->pickup_address_id = $request['pickup_address_id'];
    $student->dropoff_address_id = $request['dropoff_address_id'];
    $student->save();

    return Redirect::route('profile.student-profile')->with('status', 'address-submitted');
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

    $user = $request->user();

    Auth::logout();

    $user->delete();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return Redirect::to('/');
  }
}