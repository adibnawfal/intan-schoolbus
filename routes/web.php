<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\TransportationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
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
  Route::get('/dashboard/store-gps', [DashboardController::class, 'storeGPS']);
  Route::get('/dashboard/get-latest-gps', [DashboardController::class, 'getLatestGPS']);

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
  Route::get('/transportation/information', [TransportationController::class, 'getServiceInformation'])->name('transportation.service-information');
  Route::get('/transportation/school/information', [TransportationController::class, 'getSchoolInformation'])->name('transportation.school-information');
  Route::get('/transportation/school/new', [TransportationController::class, 'getNewSchool'])->name('transportation.get-new-school');
  Route::post('/transportation/school/new', [TransportationController::class, 'postNewSchool'])->name('transportation.post-new-school');
  Route::get('/transportation/school/update/{id}', [TransportationController::class, 'getUpdateSchool'])->name('transportation.get-update-school');
  Route::patch('/transportation/school/update/{id}', [TransportationController::class, 'patchUpdateSchool'])->name('transportation.patch-update-school');
  Route::get('/transportation/schedule/information', [TransportationController::class, 'getScheduleInformation'])->name('transportation.schedule-information');
  Route::get('/transportation/schedule/new', [TransportationController::class, 'getNewSchedule'])->name('transportation.get-new-schedule');
  Route::post('/transportation/schedule/new', [TransportationController::class, 'postNewSchedule'])->name('transportation.post-new-schedule');
  Route::get('/transportation/schedule/update/{id}', [TransportationController::class, 'getUpdateSchedule'])->name('transportation.get-update-schedule');
  Route::patch('/transportation/schedule/update/{id}', [TransportationController::class, 'patchUpdateSchedule'])->name('transportation.patch-update-schedule');
  Route::get('/transportation/request-bus', [TransportationController::class, 'getRequestBus'])->name('transportation.get-request-bus');
  Route::post('/transportation/request-bus', [TransportationController::class, 'postRequestBus'])->name('transportation.post-request-bus');
  Route::get('/transportation/request-submitted', [TransportationController::class, 'getRequestSubmitted'])->name('transportation.request-submitted');
  Route::get('/transportation/request-status', [TransportationController::class, 'getRequestStatus'])->name('transportation.request-status');
  Route::patch('/transportation/update-status/{id}', [TransportationController::class, 'patchUpdateStatus'])->name('transportation.update-status');

  // Payment
  Route::get('/payment', [PaymentController::class, 'getPayment'])->name('payment.view');
  Route::get('/payment/record/{id}', [PaymentController::class, 'getRecord'])->name('payment.get-record');
  Route::patch('/payment/record/{id}', [PaymentController::class, 'patchRecord'])->name('payment.patch-record');
  Route::get('/payment/record/success/{id}/{selectedMonth}', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
  Route::get('/payment/record/failure/{id}', [PaymentController::class, 'paymentFailure'])->name('payment.failure');
  Route::patch('/payment/record/status/{paymentId}/{busServiceId}', [PaymentController::class, 'patchUpdatePaymentStatus'])->name('payment.update-payment-status');

  // Report
  Route::get('/report', [ReportController::class, 'getReport'])->name('report.view');
  Route::get('/report/all-user', [ReportController::class, 'getAllUser'])->name('report.all-user');
  Route::get('/report/all-user/export', [ReportController::class, 'exportAllUser'])->name('report.export-all-user');
  Route::get('/report/admin', [ReportController::class, 'getAdmin'])->name('report.admin');
  Route::get('/report/admin/export', [ReportController::class, 'exportAdmin'])->name('report.export-admin');
  Route::get('/report/driver', [ReportController::class, 'getDriver'])->name('report.driver');
  Route::get('/report/driver/export', [ReportController::class, 'exportDriver'])->name('report.export-driver');
  Route::get('/report/customer', [ReportController::class, 'getCustomer'])->name('report.customer');
  Route::get('/report/customer/export', [ReportController::class, 'exportCustomer'])->name('report.export-customer');
  Route::get('/report/all-student', [ReportController::class, 'getAllStudent'])->name('report.all-student');
  Route::get('/report/all-student/export', [ReportController::class, 'exportAllStudent'])->name('report.export-all-student');
  Route::get('/report/taman-keramat-au1', [ReportController::class, 'getTamanKeramatAU1'])->name('report.taman-keramat-au1');
  Route::get('/report/taman-keramat-au1/export', [ReportController::class, 'exportTamanKeramatAU1'])->name('report.export-taman-keramat-au1');
  Route::get('/report/taman-keramat-au2', [ReportController::class, 'getTamanKeramatAU2'])->name('report.taman-keramat-au2');
  Route::get('/report/taman-keramat-au2/export', [ReportController::class, 'exportTamanKeramatAU2'])->name('report.export-taman-keramat-au2');
  Route::get('/report/taman-keramat-au3', [ReportController::class, 'getTamanKeramatAU3'])->name('report.taman-keramat-au3');
  Route::get('/report/taman-keramat-au3/export', [ReportController::class, 'exportTamanKeramatAU3'])->name('report.export-taman-keramat-au3');
  Route::get('/report/taman-keramat-au4', [ReportController::class, 'getTamanKeramatAU4'])->name('report.taman-keramat-au4');
  Route::get('/report/taman-keramat-au4/export', [ReportController::class, 'exportTamanKeramatAU4'])->name('report.export-taman-keramat-au4');
  Route::get('/report/all-school', [ReportController::class, 'getAllSchool'])->name('report.all-school');
  Route::get('/report/all-school/export', [ReportController::class, 'exportAllSchool'])->name('report.export-all-school');
});

require __DIR__ . '/auth.php';