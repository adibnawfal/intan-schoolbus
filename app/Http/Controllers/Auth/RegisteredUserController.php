<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetails;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
  /**
   * Display the registration view.
   */
  public function create(): View
  {
    return view('auth.register');
  }

  /**
   * Handle an incoming registration request.
   *
   * @throws \Illuminate\Validation\ValidationException
   */
  public function store(Request $request): RedirectResponse
  {
    $request->validate([
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
      'status' => ['required', 'string', 'max:255'],
      'gender' => ['required', 'string', 'max:255'],
      'password' => ['required', 'confirmed', Rules\Password::defaults()],
      'terms_and_conditions' => ['accepted'],
    ]);

    $user = User::create([
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'role' => "customer",
    ]);

    $userDetails = new UserDetails();
    $userDetails->user_id = $user->id;
    $userDetails->first_name = $request['first_name'];
    $userDetails->last_name = $request['last_name'];
    $userDetails->status = $request['status'];
    $userDetails->gender = $request['gender'];
    $userDetails->default = true;
    $userDetails->save();

    event(new Registered($user));

    Auth::login($user);

    // return redirect()->intended('customer/dashboard');

    return redirect(RouteServiceProvider::HOME);
  }
}