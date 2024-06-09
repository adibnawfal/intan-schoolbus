<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
use App\Models\School;
use App\Models\Student;
use App\Models\BusService;
use App\Models\Payment;
use App\Models\GPS;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
  /**
   * Display the dashboard.
   */
  public function getDashboard(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    // Fetch GPS data from the database
    $gpsData = GPS::latest()->first();

    if ($request->user()->role === 'admin' || $request->user()->role === 'driver') {
      $student = Student::all();
    } elseif ($request->user()->role === 'customer') {
      $student = Student::where('user_id', $request->user()->id);
    }

    $driver = User::where('role', 'driver');

    $school = School::all();

    if ($request->user()->role === 'admin' || $request->user()->role === 'driver') {
      $busServiceId = BusService::where('status', 'Success')->pluck('id');
      $payment = Payment::whereIn('bus_service_id', $busServiceId)->where('status', 'Pending')->get();
    } elseif ($request->user()->role === 'customer') {
      $busServiceId = BusService::where('status', 'Success')->pluck('id');
      $payment = Payment::whereIn('bus_service_id', $busServiceId)->where('status', 'Pending')->where('user_id', $request->user()->id)->get();
    }

    return view('dashboard.view', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
      'gpsData' => $gpsData,
      'student' => $student,
      'driver' => $driver,
      'school' => $school,
      'payment' => $payment,
    ]);
  }

  public function storeGPS(Request $request)
  {
    $request->validate([
      'lat' => ['required', 'numeric'],
      'lng' => ['required', 'numeric'],
    ]);

    $gpsData = new GPS();
    $gpsData->lat = $request->lat;
    $gpsData->lng = $request->lng;
    $gpsData->save();

    return response()->json(['message' => 'GPS data saved successfully'], 200);
  }

  public function getLatestGPS()
  {
    // Fetch the latest GPS data from the database
    $latestGPS = GPS::latest()->first();

    // Return the latest GPS data as JSON response
    return response()->json($latestGPS);
  }
}