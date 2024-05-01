<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserDetailsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $datetime = Carbon::now()->toDateTimeString();

    DB::table('user_details')->insert([
      // Admin
      [
        'user_id' => 1,
        'first_name' => 'Admin',
        'role' => 'admin',
        'status' => null,
        'default' => true,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],

      // Driver
      [
        'user_id' => 2,
        'first_name' => 'Driver',
        'role' => 'driver',
        'status' => null,
        'default' => true,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],

      // Customer
      [
        'user_id' => 3,
        'first_name' => 'Customer',
        'role' => 'customer',
        'status' => 'parent',
        'default' => true,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ]
    ]);
  }
}