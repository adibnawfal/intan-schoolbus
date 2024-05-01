<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
  /**
   * Display the user's profile.
   */
  public function getMyProfile(Request $request): View
  {
    return view('profile.my-profile', [
      'user' => $request->user(),
    ]);
  }

  /**
   * Display the driver's profile.
   */
  public function getDriverProfile(Request $request): View
  {
    return view('profile.driver-profile', [
      'user' => $request->user(),
    ]);
  }

  /**
   * Display the new driver's profile.
   */
  public function getNewDriver(Request $request): View
  {
    return view('profile.new-driver', [
      'user' => $request->user(),
    ]);
  }

  /**
   * Display the student's profile.
   */
  public function getStudentProfile(Request $request): View
  {
    return view('profile.student-profile', [
      'user' => $request->user(),
    ]);
  }

  /**
   * Display the new student's profile.
   */
  public function getNewStudent(Request $request): View
  {
    return view('profile.new-student', [
      'user' => $request->user(),
    ]);
  }

  /**
   * Display the change password.
   */
  public function getChangePassword(Request $request): View
  {
    return view('profile.change-password', [
      'user' => $request->user(),
    ]);
  }

  /**
   * Display the delete profile.
   */
  public function getDeleteProfile(Request $request): View
  {
    return view('profile.delete-profile', [
      'user' => $request->user(),
    ]);
  }

  /**
   * Update the user's profile information.
   */
  public function update(ProfileUpdateRequest $request): RedirectResponse
  {
    $request->user()->fill($request->validated());

    if ($request->user()->isDirty('email')) {
      $request->user()->email_verified_at = null;
    }

    $request->user()->save();

    return Redirect::route('profile.my-profile')->with('status', 'profile-updated');
  }

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