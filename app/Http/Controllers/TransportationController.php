<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\UserDetails;
use App\Models\School;
use App\Models\BusSchedule;
use App\Models\Student;
use App\Models\BusService;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TransportationController extends Controller
{
  /**
   * Display the transportation.
   */
  public function getTransportation(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    $school = School::all();

    $busSchedule = BusSchedule::all();

    return view('transportation.view', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
      'school' => $school,
      'busSchedule' => $busSchedule,
    ]);
  }

  /**
   * Display the service information.
   */
  public function getServiceInformation(Request $request): View
  {
    $school = School::all();

    $busSchedule = BusSchedule::all();

    return view('transportation.service-information', [
      'user' => $request->user(),
      'school' => $school,
      'busSchedule' => $busSchedule,
    ]);
  }

  /**
   * Display the school information.
   */
  public function getSchoolInformation(Request $request): View
  {
    $school = School::all();

    return view('transportation.school-information', [
      'user' => $request->user(),
      'school' => $school,
    ]);
  }

  /**
   * Display the new school.
   */
  public function getNewSchool(Request $request): View
  {
    return view('transportation.new-school', [
      'user' => $request->user(),
    ]);
  }

  /**
   * Submit the new school.
   */
  public function postNewSchool(Request $request)
  {
    $this->validate($request, [
      'school_name' => ['required', 'string', 'max:255'],
      'service_period' => ['required', 'integer', 'min:1'],
      'start_date' => ['required', 'date'],
      'end_date' => ['required', 'date'],
      'standard' => ['required', 'integer', 'min:1'],
      'price1' => ['required', 'numeric', 'min:1'],
      'price2' => ['required', 'numeric', 'min:1'],
      'price3' => ['required', 'numeric', 'min:1'],
      'price4' => ['required', 'numeric', 'min:1'],
    ]);

    switch ($request['standard']) {
      case 1:
        $standardArr = json_encode([
          1,
        ]);
        break;

      case 2:
        $standardArr = json_encode([
          1,
          2,
        ]);
        break;

      case 3:
        $standardArr = json_encode([
          1,
          2,
          3,
        ]);
        break;

      case 4:
        $standardArr = json_encode([
          1,
          2,
          3,
          4,
        ]);
        break;

      case 5:
        $standardArr = json_encode([
          1,
          2,
          3,
          4,
          5,
        ]);
        break;

      default:
        $standardArr = json_encode([
          1,
          2,
          3,
          4,
          5,
          6,
        ]);
        break;
    }

    $school = new School();
    $school->name = $request['school_name'];
    $school->service_period = $request['service_period'];
    $school->start_date = Carbon::create($request['start_date']);
    $school->end_date = Carbon::create($request['end_date']);
    $school->details = json_encode([
      'Taman Keramat AU1' => (double) $request['price1'],
      'Taman Keramat AU2' => (double) $request['price2'],
      'Taman Keramat AU3' => (double) $request['price3'],
      'Taman Keramat AU4' => (double) $request['price4'],
    ]);
    $school->standard = $standardArr;
    $school->save();

    return Redirect::route('transportation.school-information')->with('status', 'school-submitted');
  }

  /**
   * Display the update school.
   */
  public function getUpdateSchool(Request $request, string $id): View
  {
    $schoolData = School::findOrFail($id);

    return view('transportation.update-school', [
      'user' => $request->user(),
      'schoolData' => $schoolData,
    ]);
  }

  /**
   * Submit the update school.
   */
  public function patchUpdateSchool(Request $request, string $id)
  {
    $schoolData = School::findOrFail($id);

    $this->validate($request, [
      'school_name' => ['required', 'string', 'max:255'],
      'service_period' => ['required', 'integer', 'min:1'],
      'start_date' => ['required', 'date'],
      'end_date' => ['required', 'date'],
      'standard' => ['required', 'integer', 'min:1'],
      'price1' => ['required', 'numeric', 'min:1'],
      'price2' => ['required', 'numeric', 'min:1'],
      'price3' => ['required', 'numeric', 'min:1'],
      'price4' => ['required', 'numeric', 'min:1'],
    ]);

    switch ($request['standard']) {
      case 1:
        $standardArr = json_encode([
          1,
        ]);
        break;

      case 2:
        $standardArr = json_encode([
          1,
          2,
        ]);
        break;

      case 3:
        $standardArr = json_encode([
          1,
          2,
          3,
        ]);
        break;

      case 4:
        $standardArr = json_encode([
          1,
          2,
          3,
          4,
        ]);
        break;

      case 5:
        $standardArr = json_encode([
          1,
          2,
          3,
          4,
          5,
        ]);
        break;

      default:
        $standardArr = json_encode([
          1,
          2,
          3,
          4,
          5,
          6,
        ]);
        break;
    }

    $schoolData->update([
      'name' => $request['school_name'],
      'service_period' => $request['service_period'],
      'start_date' => Carbon::create($request['start_date']),
      'end_date' => Carbon::create($request['end_date']),
      'details' => json_encode([
        'Taman Keramat AU1' => (double) $request['price1'],
        'Taman Keramat AU2' => (double) $request['price2'],
        'Taman Keramat AU3' => (double) $request['price3'],
        'Taman Keramat AU4' => (double) $request['price4'],
      ]),
      'standard' => $standardArr,
    ]);

    return Redirect::route('transportation.school-information')->with('status', 'school-updated');
  }

  /**
   * Display the schedule information.
   */
  public function getScheduleInformation(Request $request): View
  {
    $busSchedule = BusSchedule::all();

    return view('transportation.schedule-information', [
      'user' => $request->user(),
      'busSchedule' => $busSchedule,
    ]);
  }

  /**
   * Display the new schedule.
   */
  public function getNewSchedule(Request $request): View
  {
    return view('transportation.new-schedule', [
      'user' => $request->user(),
    ]);
  }

  /**
   * Submit the new schedule.
   */
  public function postNewSchedule(Request $request)
  {
    $this->validate($request, [
      'session' => ['required', 'string', 'max:255'],
      'standard' => ['required', 'array'],
      'pickup_from' => ['date_format:H:i'],
      'pickup_to' => ['date_format:H:i', 'after:pickup_from'],
      'dropoff_from' => ['date_format:H:i'],
      'dropoff_to' => ['date_format:H:i', 'after:dropoff_from'],
    ]);

    $busSchedule = new BusSchedule();
    $busSchedule->session = $request['session'];
    $busSchedule->standard = json_encode($request['standard']);
    $busSchedule->pickup_from = Carbon::create($request['pickup_from']);
    $busSchedule->pickup_to = Carbon::create($request['pickup_to']);
    $busSchedule->dropoff_from = Carbon::create($request['dropoff_from']);
    $busSchedule->dropoff_to = Carbon::create($request['dropoff_to']);
    $busSchedule->save();

    return Redirect::route('transportation.schedule-information')->with('status', 'schedule-submitted');
  }

  /**
   * Display the update schedule.
   */
  public function getUpdateSchedule(Request $request, string $id): View
  {
    $busScheduleData = BusSchedule::findOrFail($id);

    return view('transportation.update-schedule', [
      'user' => $request->user(),
      'busScheduleData' => $busScheduleData,
    ]);
  }

  /**
   * Submit the update schedule.
   */
  public function patchUpdateSchedule(Request $request, string $id)
  {
    $busScheduleData = BusSchedule::findOrFail($id);

    $this->validate($request, [
      'session' => ['required', 'string', 'max:255'],
      'standard' => ['required', 'array'],
      'pickup_from' => ['date_format:H:i'],
      'pickup_to' => ['date_format:H:i', 'after:pickup_from'],
      'dropoff_from' => ['date_format:H:i'],
      'dropoff_to' => ['date_format:H:i', 'after:dropoff_from'],
    ]);

    $busScheduleData->update([
      'session' => $request['session'],
      'standard' => json_encode($request['standard']),
      'pickup_from' => Carbon::create($request['pickup_from']),
      'pickup_to' => Carbon::create($request['pickup_to']),
      'dropoff_from' => Carbon::create($request['dropoff_from']),
      'dropoff_to' => Carbon::create($request['dropoff_to']),
    ]);

    return Redirect::route('transportation.schedule-information')->with('status', 'schedule-updated');
  }

  /**
   * Display the request bus service.
   */
  public function getRequestBus(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    $student = Student::where('user_id', $request->user()->id)
      ->get();

    return view('transportation.request-bus', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
      'student' => $student
    ]);
  }

  /**
   * Submit the request bus service.
   */
  public function postRequestBus(Request $request)
  {
    $month = [];

    $this->validate($request, [
      'student' => ['required', 'exists:students,id'],
    ]);

    for ($m = 1; $m <= 12; $m++) {
      $month[] = date('F', mktime(0, 0, 0, $m, 1, date('Y')));
    }

    foreach ($request['student'] as $selectedStudentId) {
      $studentData = Student::findOrFail($selectedStudentId);
      $fee = 0;
      $feePickUp = 0;
      $feeDropOff = 0;

      switch ($studentData->pickup_address->area) {
        case 'Taman Keramat AU1':
          $feePickUp = 50;
          break;
        case 'Taman Keramat AU2':
          $feePickUp = 60;
          break;
        case 'Taman Keramat AU3':
          $feePickUp = 70;
          break;
        case 'Taman Keramat AU4':
          $feePickUp = 80;
          break;
      }

      switch ($studentData->dropoff_address->area) {
        case 'Taman Keramat AU1':
          $feeDropOff = 50;
          break;
        case 'Taman Keramat AU2':
          $feeDropOff = 60;
          break;
        case 'Taman Keramat AU3':
          $feeDropOff = 70;
          break;
        case 'Taman Keramat AU4':
          $feeDropOff = 80;
          break;
      }

      if ($feePickUp > $feeDropOff) {
        $fee = $feePickUp;
      } else {
        $fee = $feeDropOff;
      }

      $busService = new BusService();
      $busService->user_id = $request->user()->id;
      $busService->student_id = $selectedStudentId;
      $busService->start_date = Carbon::now();
      $busService->end_date = Carbon::create('2024-12-15');
      $busService->status = 'Pending';
      $busService->save();

      foreach ($month as $eachMonth) {
        $payment = new Payment();
        $payment->user_id = $request->user()->id;
        $payment->bus_service_id = $busService->id;
        $payment->year = 2024;
        $payment->month = $eachMonth;
        $payment->status = 'Pending';
        $payment->fee = $fee;
        $payment->save();
      }
    }

    return Redirect::route('transportation.request-submitted')->with('status', 'request-submitted');
  }

  /**
   * Display the request submitted.
   */
  public function getRequestSubmitted(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    return view('transportation.request-submitted', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
    ]);
  }

  /**
   * Display the request status.
   */
  public function getRequestStatus(Request $request): View
  {
    $userDetails = UserDetails::where('user_id', $request->user()->id)
      ->where('default', 1)
      ->first();

    $busService = BusService::all();

    return view('transportation.request-status', [
      'user' => $request->user(),
      'userDetails' => $userDetails,
      'busService' => $busService,
    ]);
  }

  /**
   * Submit the update status.
   */
  public function patchUpdateStatus(Request $request, string $id)
  {
    $busServiceData = BusService::findOrFail($id);

    $this->validate($request, [
      'status' => ['required', 'string', 'max:255'],
    ]);

    $busServiceData->update([
      'status' => $request['status'],
    ]);

    return Redirect::route('transportation.request-status')->with('status', 'status-updated');
  }
}