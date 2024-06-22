<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\BusService;
use App\Models\Payment;
use App\Notifications\PaymentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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

    if ($request->user()->role === 'admin') {
      $busService = BusService::where('status', 'Success')->get();
    } elseif ($request->user()->role === 'customer') {
      $busService = BusService::where('user_id', $request->user()->id)->where('status', 'Success')->get();
    }

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

    $busServiceData = BusService::findOrFail($id);

    $payment = Payment::where('bus_service_id', $id)->get();

    return view('payment.record', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
      'busServiceData' => $busServiceData,
      'payment' => $payment,
    ]);
  }

  /**
   * Submit the payment record.
   */
  public function patchRecord(Request $request, string $id)
  {
    $payment = Payment::where('bus_service_id', $id)->get();

    $this->validate($request, [
      'method' => ['required', 'string', 'max:255'],
      'selected_month' => ['required', 'exists:payments,id'],
    ]);

    switch ($request['method']) {
      case 'Cash':
        foreach ($payment as $paymentData) {
          foreach ($request['selected_month'] as $selectedMonthKey) {
            if ($paymentData->id == $selectedMonthKey) {
              $paymentData->update([
                'status' => 'Pending',
                'method' => $request['method'],
              ]);
            }
          }
        }
        return Redirect::route('payment.get-record', $id)->with('status', 'payment-cash');

      case 'Debit/Credit Card':
        $totalFee = 0;
        $selectedMonth = json_encode($request['selected_month']);
        foreach ($payment as $paymentData) {
          foreach ($request['selected_month'] as $selectedMonthKey) {
            if ($paymentData->id == $selectedMonthKey) {
              $totalFee += $paymentData->fee;
            }
          }
        }
        $busServiceData = BusService::findOrFail($id);
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = Session::create([
          'line_items' => [
            [
              'price_data' => [
                'currency' => 'myr',
                'product_data' => [
                  'name' => $busServiceData->student->first_name . ' ' . $busServiceData->student->last_name . ' Payment',
                ],
                'unit_amount' => $totalFee * 100,
              ],
              'quantity' => 1,
            ],
          ],
          'mode' => 'payment',
          'success_url' => route('payment.success', ['id' => $id, 'selectedMonth' => $selectedMonth]),
          'cancel_url' => route('payment.failure', $id),
        ]);
        return redirect()->away($session->url);

      default:
        return Redirect::route('payment.get-record', $id)->with('status', 'payment-failure');
    }
  }

  /**
   * Handle stripe payment success.
   */
  public function paymentSuccess(string $id, $selectedMonth)
  {
    $payment = Payment::where('bus_service_id', $id)->get();
    $arrSelectedMonth = json_decode($selectedMonth);

    foreach ($payment as $paymentData) {
      foreach ($arrSelectedMonth as $selectedMonthKey) {
        if ($paymentData->id == $selectedMonthKey) {
          $paymentData->update([
            'status' => 'Paid',
            'date' => Carbon::now()->toDateTimeString(),
            'method' => 'Debit/Credit Card',
          ]);

          $user = User::findOrFail($paymentData->user_id);
          $userDetails = UserDetails::where('user_id', $user->id)
            ->where('default', 1)
            ->first();

          $user->notify(new PaymentNotification($userDetails, $paymentData));
        }
      }
    }

    return Redirect::route('payment.get-record', $id)->with('status', 'payment-success');
  }

  /**
   * Handle stripe payment failure.
   */
  public function paymentFailure(string $id)
  {
    return Redirect::route('payment.get-record', $id)->with('status', 'payment-failure');
  }

  /**
   * Submit the update payment status.
   */
  public function patchUpdatePaymentStatus(Request $request, string $paymentId, string $busServiceId)
  {
    $paymentData = Payment::findOrFail($paymentId);

    $this->validate($request, [
      'payment_status' => ['required', 'string', 'max:255'],
      'method' => ['nullable', 'string', 'max:255'],
    ]);

    if ($request['method'] == 'Cash' || $request['method'] == 'Debit/Credit Card') {
      $methodVal = $request['method'];
    } else {
      $methodVal = null;
    }

    if ($request['payment_status'] === 'Paid') {
      $paymentData->update([
        'status' => $request['payment_status'],
        'date' => Carbon::now()->toDateTimeString(),
        'method' => $methodVal,
      ]);

      $user = User::findOrFail($paymentData->user_id);
      $userDetails = UserDetails::where('user_id', $user->id)
        ->where('default', 1)
        ->first();

      $user->notify(new PaymentNotification($userDetails, $paymentData));
    } else {
      $paymentData->update([
        'status' => $request['payment_status'],
        'date' => null,
        'method' => $methodVal,
      ]);
    }

    return Redirect::route('payment.get-record', $busServiceId)->with('status', 'status-updated');
  }
}