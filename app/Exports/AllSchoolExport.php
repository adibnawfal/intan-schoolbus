<?php

namespace App\Exports;

use App\Models\School;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AllSchoolExport implements FromCollection, WithHeadings, WithMapping
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    return School::all();
  }

  public function headings(): array
  {
    return [
      '#',
      'School Name',
      'Service Period',
      'Start Date',
      'End Date',
      'Details',
      'Standard',
      'Created',
    ];
  }

  /**
   * @param School $school
   */
  public function map($school): array
  {
    return [
      $school->id,
      $school->name,
      $school->service_period,
      $school->start_date,
      $school->end_date,
      $school->details,
      $school->standard,
      $school->created_at,
    ];
  }
}