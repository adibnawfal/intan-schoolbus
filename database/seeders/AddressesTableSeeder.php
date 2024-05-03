<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $datetime = Carbon::now()->toDateTimeString();

    DB::table('addresses')->insert([
      // Address 1
      [
        'user_id' => 3,
        'address_1' => '33, Jalan AU 4/4',
        'address_2' => 'Taman Seri Keramat Tengah',
        'postal_code' => 54200,
        'city' => 'Kuala Lumpur',
        'state' => 'Selangor',
        'area' => 'Taman Keramat AU4',
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],
    ]);
  }
}