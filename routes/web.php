<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransportationController;
use App\Http\Controllers\PaymentController;
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

Route::middleware('auth')->group(function () {
  // Dashboard
  Route::get('/dashboard', [DashboardController::class, 'getDashboard'])->name('dashboard');

  // Profile
  Route::get('/profile/my-profile', [ProfileController::class, 'getMyProfile'])->name('profile.my-profile');
  Route::patch('/profile/my-profile/about-me/{id}', [ProfileController::class, 'patchAboutMe'])->name('profile.patch-about-me');
  Route::get('/profile/my-profile/new-parent-guardian', [ProfileController::class, 'getNewParentGuardian'])->name('profile.new-parent-guardian');
  Route::post('/profile/my-profile/new-parent-guardian', [ProfileController::class, 'postNewParentGuardian'])->name('profile.post-new-parent-guardian');
  Route::get('/profile/my-profile/update-parent-guardian/{id}', [ProfileController::class, 'getUpdateParentGuardian'])->name('profile.update-parent-guardian');
  Route::patch('/profile/my-profile/update-parent-guardian/{id}', [ProfileController::class, 'patchUpdateParentGuardian'])->name('profile.patch-update-parent-guardian');
  Route::get('/profile/my-profile/new-address', [ProfileController::class, 'getNewAddress'])->name('profile.new-address');
  Route::post('/profile/my-profile/new-address', [ProfileController::class, 'postNewAddress'])->name('profile.post-new-address');
  Route::get('/profile/my-profile/update-address/{id}', [ProfileController::class, 'getUpdateAddress'])->name('profile.update-address');
  Route::patch('/profile/my-profile/update-address/{id}', [ProfileController::class, 'patchUpdateAddress'])->name('profile.patch-update-address');
  Route::get('/profile/driver-profile', [ProfileController::class, 'getDriverProfile'])->name('profile.driver-profile');
  Route::get('/profile/driver-profile/new-driver', [ProfileController::class, 'getNewDriver'])->name('profile.new-driver');
  Route::post('/profile/driver-profile/new-driver', [ProfileController::class, 'postNewDriver'])->name('profile.post-new-driver');
  Route::get('/profile/driver-profile/update-driver/{id}', [ProfileController::class, 'getUpdateDriver'])->name('profile.update-driver');
  Route::patch('/profile/driver-profile/update-driver/{id}', [ProfileController::class, 'patchUpdateDriver'])->name('profile.patch-update-driver');
  Route::get('/profile/driver-profile/change-password/{id}', [ProfileController::class, 'getChangeDriverPassword'])->name('profile.change-driver-password');
  Route::put('/profile/driver-profile/change-password/{id}', [ProfileController::class, 'putChangeDriverPassword'])->name('profile.put-change-driver-password');
  Route::get('/profile/student-profile', [ProfileController::class, 'getStudentProfile'])->name('profile.student-profile');
  Route::get('/profile/student-profile/new-student', [ProfileController::class, 'getNewStudent'])->name('profile.new-student');
  Route::post('/profile/student-profile/new-student', [ProfileController::class, 'postNewStudent'])->name('profile.post-new-student');
  Route::get('/profile/student-profile/update-student/{id}', [ProfileController::class, 'getUpdateStudent'])->name('profile.update-student');
  Route::patch('/profile/student-profile/update-student/{id}', [ProfileController::class, 'patchUpdateStudent'])->name('profile.patch-update-student');
  Route::get('/profile/change-password', [ProfileController::class, 'getChangePassword'])->name('profile.change-password');
  Route::get('/profile/delete-profile', [ProfileController::class, 'getDeleteProfile'])->name('profile.delete-profile');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  // Transportation
  Route::get('/transportation', [TransportationController::class, 'getTransportation'])->name('transportation.view');
  Route::get('/transportation/request-bus', [TransportationController::class, 'getRequestBus'])->name('transportation.get-request-bus');
  Route::post('/transportation/request-bus', [TransportationController::class, 'postRequestBus'])->name('transportation.post-request-bus');
  Route::get('/transportation/request-submitted', [TransportationController::class, 'getRequestSubmitted'])->name('transportation.request-submitted');
  Route::get('/transportation/request-status', [TransportationController::class, 'getRequestStatus'])->name('transportation.request-status');

  //Payment
  Route::get('/payment', [PaymentController::class, 'getPayment'])->name('payment.view');
  Route::get('/payment/record/{id}', [PaymentController::class, 'getRecord'])->name('payment.get-record');
});

require __DIR__ . '/auth.php';