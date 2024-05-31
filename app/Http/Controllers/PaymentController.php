<?php

namespace App\Http\Controllers;

use App\Models\UserDetails;
use App\Models\BusService;
use App\Models\Payment;
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

    $busService = BusService::all();

    return view('payment.view', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
      'busService' => $busService,
    ]);
  }

  /**
   * Display the payment record.
   */
  public function getRecord(Request $request, string $id): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    $busService = BusService::all();

    $payment = Payment::where('bus_service_id', $id)->get();

    return view('payment.record', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
      'busService' => $busService,
      'payment' => $payment,
    ]);
  }
}