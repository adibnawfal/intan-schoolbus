<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $datetime = Carbon::now()->toDateTimeString();

    DB::table('students')->insert([
      // Student 1
      [
        'user_id' => 3,
        'first_name' => 'Abd',
        'last_name' => 'Rahman',
        'school' => 'Sekolah Kebangsaan Setiawangsa',
        'standard' => '1',
        'gender' => 'Male',
        'date_of_birth' => Carbon::create('2017-02-13'),
        'parent_guardian_id' => 5,
        'pickup_address_id' => 2,
        'dropoff_address_id' => 2,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],

      // Student 2
      [
        'user_id' => 3,
        'first_name' => 'Nur',
        'last_name' => 'Nadia',
        'school' => 'Sekolah Kebangsaan Setiawangsa',
        'standard' => '3',
        'gender' => 'Female',
        'date_of_birth' => Carbon::create('2015-08-02'),
        'parent_guardian_id' => null,
        'pickup_address_id' => 2,
        'dropoff_address_id' => 2,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],

      // Student 3
      [
        'user_id' => 3,
        'first_name' => 'Mariam',
        'last_name' => 'Hidayah',
        'school' => 'Sekolah Kebangsaan Setiawangsa',
        'standard' => '6',
        'gender' => 'Female',
        'date_of_birth' => Carbon::create('2012-11-21'),
        'parent_guardian_id' => 6,
        'pickup_address_id' => 2,
        'dropoff_address_id' => 3,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],

      // Student 4
      [
        'user_id' => 3,
        'first_name' => 'Wan',
        'last_name' => 'Anuar',
        'school' => 'Sekolah Kebangsaan Setiawangsa',
        'standard' => '5',
        'gender' => 'Male',
        'date_of_birth' => Carbon::create('2013-06-11'),
        'parent_guardian_id' => null,
        'pickup_address_id' => 2,
        'dropoff_address_id' => 3,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],

      // Student 5
      [
        'user_id' => 3,
        'first_name' => 'Khairul',
        'last_name' => 'Amir',
        'school' => 'Sekolah Kebangsaan Setiawangsa',
        'standard' => '3',
        'gender' => 'Male',
        'date_of_birth' => Carbon::create('2015-03-18'),
        'parent_guardian_id' => 6,
        'pickup_address_id' => 3,
        'dropoff_address_id' => 3,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],
    ]);
  }
}