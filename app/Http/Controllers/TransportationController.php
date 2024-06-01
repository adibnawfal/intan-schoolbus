<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\UserDetails;
use App\Models\Student;
use App\Models\BusService;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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
   * Submit the request bus service.
   */
  public function postRequestBus(Request $request)
  {
    $month = [];

    $this->validate($request, [
      'student' => ['required', 'exists:students,id'],
    ]);

    for ($m = 1; $m <= 12; $m++) {
      $month[] = date('F', mktime(0, 0, 0, $m, 1, date('Y')));
    }

    foreach ($request['student'] as $selectedStudentId) {
      $studentData = Student::findOrFail($selectedStudentId);
      $fee = 0;
      $feePickUp = 0;
      $feeDropOff = 0;

      switch ($studentData->pickup_address->area) {
        case 'Taman Keramat AU1':
          $feePickUp = 50;
          break;
        case 'Taman Keramat AU2':
          $feePickUp = 60;
          break;
        case 'Taman Keramat AU3':
          $feePickUp = 70;
          break;
        case 'Taman Keramat AU4':
          $feePickUp = 80;
          break;
      }

      switch ($studentData->dropoff_address->area) {
        case 'Taman Keramat AU1':
          $feeDropOff = 50;
          break;
        case 'Taman Keramat AU2':
          $feeDropOff = 60;
          break;
        case 'Taman Keramat AU3':
          $feeDropOff = 70;
          break;
        case 'Taman Keramat AU4':
          $feeDropOff = 80;
          break;
      }

      if ($feePickUp > $feeDropOff) {
        $fee = $feePickUp;
      } else {
        $fee = $feeDropOff;
      }

      $busService = new BusService();
      $busService->user_id = $request->user()->id;
      $busService->student_id = $selectedStudentId;
      $busService->start_date = Carbon::now();
      $busService->end_date = Carbon::create('2024-12-15');
      $busService->status = 'Pending';
      $busService->save();

      foreach ($month as $eachMonth) {
        $payment = new Payment();
        $payment->user_id = $request->user()->id;
        $payment->bus_service_id = $busService->id;
        $payment->year = 2024;
        $payment->month = $eachMonth;
        $payment->status = 'Pending';
        $payment->fee = $fee;
        $payment->save();
      }
    }

    return Redirect::route('transportation.request-submitted')->with('status', 'request-submitted');
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

    $busService = BusService::all();

    return view('transportation.request-status', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
      'busService' => $busService,
    ]);
  }
}