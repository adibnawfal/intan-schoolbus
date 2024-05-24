<?php

namespace App\Http\Controllers;

use App\Models\UserDetails;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TransportationController extends Controller
{
  /**
   * Display the transportation.
   */
  public function getTransportation(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    return view('transportation.view', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
    ]);
  }

  /**
   * Display the request bus service.
   */
  public function getRequestBus(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    $student = Student::where('user_id', $request->user()->id)
      ->get();

    return view('transportation.request-bus', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
      'student' => $student
    ]);
  }

  /**
   * Display the request submitted.
   */
  public function getRequestSubmitted(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    return view('transportation.request-submitted', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
    ]);
  }

  /**
   * Display the request status.
   */
  public function getRequestStatus(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    return view('transportation.request-status', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
    ]);
  }
}