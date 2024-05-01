<?php

namespace App\Http\Controllers;

use App\Models\UserDetails;
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

    return view('dashboard.view', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
    ]);
  }
}