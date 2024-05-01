<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransportationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return view('welcome');
})->name('welcome');

// Route::get('/dashboard', function () {
//   return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  // Dashboard
  Route::get('/dashboard', [DashboardController::class, 'getDashboard'])->name('dashboard');

  // Profile
  Route::get('/profile/my-profile', [ProfileController::class, 'getMyProfile'])->name('profile.my-profile');
  Route::get('/profile/driver-profile', [ProfileController::class, 'getDriverProfile'])->name('profile.driver-profile');
  Route::get('/profile/driver-profile/new-driver', [ProfileController::class, 'getNewDriver'])->name('profile.new-driver');
  Route::get('/profile/student-profile', [ProfileController::class, 'getStudentProfile'])->name('profile.student-profile');
  Route::get('/profile/student-profile/new-student', [ProfileController::class, 'getNewStudent'])->name('profile.new-student');
  Route::get('/profile/change-password', [ProfileController::class, 'getChangePassword'])->name('profile.change-password');
  Route::get('/profile/delete-profile', [ProfileController::class, 'getDeleteProfile'])->name('profile.delete-profile');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  // Transportation
  Route::get('/transportation', [TransportationController::class, 'getTransportation'])->name('transportation.view');
  Route::get('/transportation/request-bus', [TransportationController::class, 'getRequestBus'])->name('transportation.request-bus');
  Route::get('/transportation/request-submitted', [TransportationController::class, 'getRequestSubmitted'])->name('transportation.request-submitted');
  Route::get('/transportation/request-status', [TransportationController::class, 'getRequestStatus'])->name('transportation.request-status');

  //Payment
  Route::get('/payment', [PaymentController::class, 'getPayment'])->name('payment.view');
  Route::get('/payment/record', [PaymentController::class, 'getRecord'])->name('payment.record');
});

// Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
  // Route::get('/admin/dashboard', [AdminController::class, 'getDashboard'])->name('admin.dashboard');
});

// Driver routes
Route::middleware(['auth', 'role:driver'])->group(function () {
  // Route::get('/driver/dashboard', [DriverController::class, 'getDashboard'])->name('driver.dashboard');
});

// Customer routes
Route::middleware(['auth', 'role:customer'])->group(function () {
  // Route::get('/customer/dashboard', [CustomerController::class, 'getDashboard'])->name('customer.dashboard');
});

require __DIR__ . '/auth.php';