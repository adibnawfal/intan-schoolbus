<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\UserUpdateRequest;
use App\Http\Requests\Profile\UserDetailsUpdateRequest;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\Address;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
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
   * Update the user's about me.
   */
  public function patchAboutMe(Request $request, string $id): RedirectResponse
  {
    $userDetails = UserDetails::findOrFail($id);

    $userDetailsData = $request->validate([
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['nullable', 'string', 'max:255'],
      'status' => ['nullable', 'string', 'max:255'],
      'gender' => ['nullable', 'string', 'max:255'],
      'phone_no' => ['nullable', 'string', 'max:255'],
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
      'status' => ['nullable', 'string', 'max:255'],
      'gender' => ['nullable', 'string', 'max:255'],
      'phone_no' => ['nullable', 'string', 'max:255'],
      'bio' => ['nullable', 'string', 'max:255'],
    ]);

    $userDetails->user_id = $userId;
    $userDetails->first_name = $request['first_name'];
    $userDetails->last_name = $request['last_name'];
    $userDetails->status = $request['status'];
    $userDetails->gender = $request['gender'];
    $userDetails->phone_no = $request['phone_no'];
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
   * Submit the new parent/guradian.
   */
  public function postNewAddress(Request $request)
  {
    $address = new Address();
    $userId = auth()->user()->id;

    $this->validate($request, [
      'address_1' => ['required', 'string', 'max:255'],
      'address_2' => ['required', 'string', 'max:255'],
      'postal_code' => ['required', 'string', 'max:255'],
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

    return view('profile.driver-profile', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
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
   * Display the student's profile.
   */
  public function getStudentProfile(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    return view('profile.student-profile', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
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