<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
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

    return view('profile.my-profile', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
    ]);
  }

  /**
   * Update the user's about me.
   */
  public function patchAboutMe(Request $request): RedirectResponse
  {
    $userData = $request->validate([
      'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($request->user()->id)],
    ]);

    $userDetailsData = $request->validate([
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['nullable', 'string', 'max:255'],
      'status' => ['nullable', 'string', 'max:255'],
      'gender' => ['nullable', 'string', 'max:255'],
      'phone_no' => ['nullable', 'string', 'max:255'],
      'bio' => ['nullable', 'string', 'max:255'],
    ]);

    // $request->user()->fill($request->validated());

    if ($request->user()->isDirty('email')) {
      $request->user()->email_verified_at = null;
    }

    // $request->user()->save();

    $user = User::findOrFail($request->user()->id);
    //$userDetails = User::findOrFail(4);

    $user->update($userData);
    //$userDetails->update($userDetailsData);

    return Redirect::route('profile.my-profile')->with('status', 'about-me-updated');
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

    return view('profile.new-student', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
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