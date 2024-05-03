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
        'last_name' => null,
        'status' => null,
        'gender' => null,
        'phone_no' => null,
        'default' => true,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],

      // Driver
      [
        'user_id' => 2,
        'first_name' => 'Driver',
        'last_name' => null,
        'status' => null,
        'gender' => null,
        'phone_no' => null,
        'default' => true,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],

      // Customer
      [
        'user_id' => 3,
        'first_name' => 'Customer',
        'last_name' => null,
        'status' => 'Parent',
        'gender' => 'Male',
        'phone_no' => null,
        'default' => true,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],

      // Customer 3 - Parent 1
      [
        'user_id' => 3,
        'first_name' => 'Fatin',
        'last_name' => 'Syafiqah',
        'status' => 'Parent',
        'gender' => 'Female',
        'phone_no' => '1128565920',
        'default' => false,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],

      // Customer 3 - Guardian 1
      [
        'user_id' => 3,
        'first_name' => 'Kim',
        'last_name' => 'Taehyung',
        'status' => 'Guardian',
        'gender' => 'Male',
        'phone_no' => '123456789',
        'default' => false,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ]
    ]);
  }
}