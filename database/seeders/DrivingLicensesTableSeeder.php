<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DrivingLicensesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $datetime = Carbon::now()->toDateTimeString();

    DB::table('driving_licenses')->insert([
      // Driving License 1
      [
        'user_id' => 2,
        'type' => 'Vocational Driving License (VDL)',
        'class' => 'E',
        'expiry_date' => Carbon::create('2030', '02', '29'),
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],
    ]);
  }
}