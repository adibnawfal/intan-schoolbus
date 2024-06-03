<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GPSTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $datetime = Carbon::now()->toDateTimeString();

    DB::table('g_p_s')->insert([
      // GPS 1
      [
        'lat' => 1.849429,
        'lng' => 103.073490,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],

      // GPS 2
      [
        'lat' => 1.849393,
        'lng' => 103.073520,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],

      // GPS 3
      [
        'lat' => 1.849419,
        'lng' => 103.073510,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],
    ]);
  }
}