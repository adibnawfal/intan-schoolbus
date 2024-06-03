<?php

namespace App\Http\Controllers;

use App\Models\UserDetails;
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

    return view('dashboard.view', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
      'gpsData' => $gpsData,
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