<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class TransportationController extends Controller
{
  /**
   * Display the transportation.
   */
  public function getTransportation(Request $request): View
  {
    return view('transportation.view', [
      'user' => $request->user(),
    ]);
  }
}