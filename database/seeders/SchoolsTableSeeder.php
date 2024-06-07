<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $datetime = Carbon::now()->toDateTimeString();

    DB::table('schools')->insert([
      // School 1
      [
        'name' => 'Sekolah Kebangsaan Setiawangsa',
        'service_period' => 12,
        'start_date' => Carbon::create('2024-01-01'),
        'end_Date' => Carbon::create('2024-12-15'),
        'details' => json_encode([
          'Taman Keramat AU1' => 50,
          'Taman Keramat AU2' => 60,
          'Taman Keramat AU3' => 70,
          'Taman Keramat AU4' => 80,
        ]),
        'standard' => json_encode([
          1,
          2,
          3,
          4,
          5,
          6,
        ]),
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],
    ]);
  }
}