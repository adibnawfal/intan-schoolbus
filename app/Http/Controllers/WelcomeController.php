<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
use App\Notifications\ContactUsNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class WelcomeController extends Controller
{
  /**
   * Display the welcome.
   */
  public function getWelcome(Request $request): View
  {
    return view('welcome');
  }

  public function submitContactUs(Request $request)
  {
    $this->validate($request, [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
      'message' => ['required', 'string', 'max:255'],
    ]);

    // $user = User::where('role', 'admin')->first();
    $user = User::findOrFail(3);
    $userDetails = UserDetails::where('user_id', $user->id)
      ->where('default', 1)
      ->first();

    $user->notify(new ContactUsNotification($userDetails, $request['name'], $request['email'], $request['message']));

    return Redirect::route('welcome')->with('status', 'contact-us-submitted');
  }
}