<?php

namespace App\Http\Controllers;

use App\Exports\AllUserExport;
use App\Exports\AdminExport;
use App\Exports\DriverExport;
use App\Exports\CustomerExport;
use App\Exports\AllStudentExport;
use App\Exports\TamanKeramatAU1Export;
use App\Exports\TamanKeramatAU2Export;
use App\Exports\TamanKeramatAU3Export;
use App\Exports\TamanKeramatAU4Export;
use App\Exports\AllSchoolExport;
use App\Models\UserDetails;
use App\Models\Student;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
  /**
   * Display the report.
   */
  public function getReport(Request $request): View
  {
    return view('report.view', [
      'user' => $request->user(),
    ]);
  }

  /**
   * Display all user page.
   */
  public function getAllUser(Request $request): View
  {
    $allUserDetails = UserDetails::where('default', 1)->get();

    return view('report.all-user', [
      'user' => $request->user(),
      'allUserDetails' => $allUserDetails,
    ]);
  }

  /**
   * Export all user.
   */
  public function exportAllUser()
  {
    return Excel::download(new AllUserExport, 'all-user.xlsx');
  }

  /**
   * Display admin page.
   */
  public function getAdmin(Request $request): View
  {
    $allUserDetails = UserDetails::where('default', 1)->get();

    return view('report.admin', [
      'user' => $request->user(),
      'allUserDetails' => $allUserDetails,
    ]);
  }

  /**
   * Export admin.
   */
  public function exportAdmin()
  {
    return Excel::download(new AdminExport, 'admin.xlsx');
  }

  /**
   * Display driver page.
   */
  public function getDriver(Request $request): View
  {
    $allUserDetails = UserDetails::where('default', 1)->get();

    return view('report.driver', [
      'user' => $request->user(),
      'allUserDetails' => $allUserDetails,
    ]);
  }

  /**
   * Export driver.
   */
  public function exportDriver()
  {
    return Excel::download(new DriverExport, 'driver.xlsx');
  }

  /**
   * Display customer page.
   */
  public function getCustomer(Request $request): View
  {
    $allUserDetails = UserDetails::where('default', 1)->get();

    return view('report.customer', [
      'user' => $request->user(),
      'allUserDetails' => $allUserDetails,
    ]);
  }

  /**
   * Export customer.
   */
  public function exportCustomer()
  {
    return Excel::download(new CustomerExport, 'customer.xlsx');
  }

  /**
   * Display all student page.
   */
  public function getAllStudent(Request $request): View
  {
    $allStudent = Student::all();

    return view('report.all-student', [
      'user' => $request->user(),
      'allStudent' => $allStudent,
    ]);
  }

  /**
   * Export all student.
   */
  public function exportAllStudent()
  {
    return Excel::download(new AllStudentExport, 'all-student.xlsx');
  }

  /**
   * Display taman keramat au1 page.
   */
  public function getTamanKeramatAU1(Request $request): View
  {
    $allStudent = Student::all();

    return view('report.taman-keramat-au1', [
      'user' => $request->user(),
      'allStudent' => $allStudent,
    ]);
  }

  /**
   * Export taman keramat au1.
   */
  public function exportTamanKeramatAU1()
  {
    return Excel::download(new TamanKeramatAU1Export, 'taman-keramat-au1.xlsx');
  }

  /**
   * Display taman keramat au2 page.
   */
  public function getTamanKeramatAU2(Request $request): View
  {
    $allStudent = Student::all();

    return view('report.taman-keramat-au2', [
      'user' => $request->user(),
      'allStudent' => $allStudent,
    ]);
  }

  /**
   * Export taman keramat au1.
   */
  public function exportTamanKeramatAU2()
  {
    return Excel::download(new TamanKeramatAU2Export, 'taman-keramat-au2.xlsx');
  }

  /**
   * Display taman keramat au3 page.
   */
  public function getTamanKeramatAU3(Request $request): View
  {
    $allStudent = Student::all();

    return view('report.taman-keramat-au3', [
      'user' => $request->user(),
      'allStudent' => $allStudent,
    ]);
  }

  /**
   * Export taman keramat au3.
   */
  public function exportTamanKeramatAU3()
  {
    return Excel::download(new TamanKeramatAU3Export, 'taman-keramat-au3.xlsx');
  }

  /**
   * Display taman keramat au4 page.
   */
  public function getTamanKeramatAU4(Request $request): View
  {
    $allStudent = Student::all();

    return view('report.taman-keramat-au4', [
      'user' => $request->user(),
      'allStudent' => $allStudent,
    ]);
  }

  /**
   * Export taman keramat au4.
   */
  public function exportTamanKeramatAU4()
  {
    return Excel::download(new TamanKeramatAU4Export, 'taman-keramat-au4.xlsx');
  }

  /**
   * Display all school page.
   */
  public function getAllSchool(Request $request): View
  {
    $school = School::all();

    return view('report.all-school', [
      'user' => $request->user(),
      'school' => $school,
    ]);
  }

  /**
   * Export all school.
   */
  public function exportAllSchool()
  {
    return Excel::download(new AllSchoolExport, 'all-school.xlsx');
  }
}