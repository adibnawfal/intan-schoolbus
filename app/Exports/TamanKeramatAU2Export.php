<?php

namespace App\Exports;

use App\Models\Address;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TamanKeramatAU2Export implements FromCollection, WithHeadings, WithMapping
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    $pickupAddressId = Address::where('area', 'Taman Keramat AU2')->pluck('id');
    $dropoffAddressId = Address::where('area', 'Taman Keramat AU2')->pluck('id');

    return Student::whereIn('pickup_address_id', $pickupAddressId)->orWhereIn('dropoff_address_id', $dropoffAddressId)->get();
  }

  public function headings(): array
  {
    return [
      '#',
      'First Name',
      'Last Name',
      'School',
      'Standard',
      'Gender',
      'Date of Birth',
      'Parent/Guardian',
      'Pick-Up Address',
      'Drop-Off Address',
      'Created',
    ];
  }

  /**
   * @param Student $student
   */
  public function map($student): array
  {
    $parentGuardian = $student->parent_guardian->first_name . ' ' . $student->parent_guardian->last_name . ', ' . $student->parent_guardian->status . ', ' . $student->parent_guardian->phone_no;
    $pickupAddress = $student->pickup_address->address_1 . ', ' . $student->pickup_address->address_2 . ', ' . $student->pickup_address->postal_code . ' ' . $student->pickup_address->city . ', ' . $student->pickup_address->state . ' (' . $student->pickup_address->area . ')';
    $dropffAddress = $student->dropoff_address->address_1 . ', ' . $student->dropoff_address->address_2 . ', ' . $student->dropoff_address->postal_code . ' ' . $student->dropoff_address->city . ', ' . $student->dropoff_address->state . ' (' . $student->dropoff_address->area . ')';

    return [
      $student->id,
      $student->first_name,
      $student->last_name,
      $student->school,
      $student->standard,
      $student->gender,
      $student->date_of_birth,
      $parentGuardian,
      $pickupAddress,
      $dropffAddress,
      $student->created_at,
    ];
  }
}