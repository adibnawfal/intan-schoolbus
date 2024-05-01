<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  // Profile
  Route::get('/profile/my-profile', [ProfileController::class, 'getMyProfile'])->name('profile.my-profile');
  Route::get('/profile/driver-profile', [ProfileController::class, 'getDriverProfile'])->name('profile.driver-profile');
  Route::get('/profile/driver-profile/new-driver', [ProfileController::class, 'getNewDriver'])->name('profile.new-driver');
  Route::get('/profile/student-profile', [ProfileController::class, 'getStudentProfile'])->name('profile.student-profile');
  Route::get('/profile/change-password', [ProfileController::class, 'getChangePassword'])->name('profile.change-password');
  Route::get('/profile/delete-profile', [ProfileController::class, 'getDeleteProfile'])->name('profile.delete-profile');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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