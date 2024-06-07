<?php

namespace App\Exports;

use App\Models\UserDetails;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AllUserExport implements FromCollection, WithHeadings, WithMapping
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    return UserDetails::where('default', 1)->get();
  }

  public function headings(): array
  {
    return [
      '#',
      'First Name',
      'Last Name',
      'Email',
      'Role',
      'Phone Number',
      'Gender',
      'Created',
    ];
  }

  /**
   * @param UserDetails $userDetails
   */
  public function map($userDetails): array
  {
    return [
      $userDetails->user_id,
      $userDetails->first_name,
      $userDetails->last_name,
      $userDetails->user->email,
      $userDetails->user->role,
      $userDetails->phone_no,
      $userDetails->gender,
      $userDetails->created_at,
    ];
  }
}