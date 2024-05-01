<?php

namespace App\Http\Controllers;

use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentController extends Controller
{
  /**
   * Display the payment.
   */
  public function getPayment(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    return view('payment.view', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
    ]);
  }

  /**
   * Display the payment record.
   */
  public function getRecord(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    return view('payment.record', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
    ]);
  }
}