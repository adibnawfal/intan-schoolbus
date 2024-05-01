<?php

namespace App\Http\Middleware;

use Closure;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next, $role): Response
  {
    if ($request->user()->role !== $role) {
      // $url = '';

      // if ($request->user()->role === 'admin') {
      //   $url = 'admin/dashboard';
      // } elseif ($request->user()->role === 'driver') {
      //   $url = 'driver/dashboard';
      // } else {
      //   $url = 'customer/dashboard';
      // }

      // return redirect($url);

      // return redirect('/dashboard');

      return redirect(RouteServiceProvider::HOME);
    }

    return $next($request);
  }
}