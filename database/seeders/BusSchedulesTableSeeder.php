<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusSchedulesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $datetime = Carbon::now()->toDateTimeString();

    DB::table('bus_schedules')->insert([
      // Bus Schedule 1
      [
        'session' => 'Morning',
        'standard' => json_encode([
          '1',
          '4',
          '5',
          '6',
        ]),
        'pickup_from' => Carbon::create('06:10'),
        'pickup_to' => Carbon::create('06:45'),
        'dropoff_from' => Carbon::create('13:30'),
        'dropoff_to' => Carbon::create('14:30'),
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],

      // Bus Schedule 1
      [
        'session' => 'Evening',
        'standard' => json_encode([
          '2',
          '3',
        ]),
        'pickup_from' => Carbon::create('11:30'),
        'pickup_to' => Carbon::create('13:00'),
        'dropoff_from' => Carbon::create('18:00'),
        'dropoff_to' => Carbon::create('19:00'),
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],
    ]);
  }
}