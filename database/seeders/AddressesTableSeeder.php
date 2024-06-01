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
        'user_id' => 2,
        'address_1' => '55A, Jalan Pandan',
        'address_2' => 'Taman Bandar',
        'postal_code' => 55100,
        'city' => 'Kuala Lumpur',
        'state' => 'W.P. Kuala Lumpur',
        'area' => null,
        'default' => false,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],

      // Address 2
      [
        'user_id' => 3,
        'address_1' => '33, Jalan AU 4/4',
        'address_2' => 'Taman Seri Keramat Tengah',
        'postal_code' => 54200,
        'city' => 'Kuala Lumpur',
        'state' => 'Selangor',
        'area' => 'Taman Keramat AU4',
        'default' => false,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],

      // Address 2
      [
        'user_id' => 3,
        'address_1' => '25, Jalan 9/8L',
        'address_2' => 'Taman Damansara',
        'postal_code' => 63198,
        'city' => 'Batu Caves',
        'state' => 'Selangor',
        'area' => 'Taman Keramat AU2',
        'default' => false,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],
    ]);
  }
}