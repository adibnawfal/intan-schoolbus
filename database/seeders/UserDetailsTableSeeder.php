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
        'first_name' => 'Ahmad',
        'last_name' => 'Khaharuddin',
        'status' => null,
        'phone_no' => null,
        'gender' => null,
        'date_of_birth' => null,
        'default' => true,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],

      // Driver
      [
        'user_id' => 2,
        'first_name' => 'Syahir',
        'last_name' => 'Nizam',
        'status' => null,
        'phone_no' => '159085156',
        'gender' => 'Male',
        'date_of_birth' => Carbon::create('1980-02-14'),
        'default' => true,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],

      // Driver - Emergency Contact
      [
        'user_id' => 2,
        'first_name' => 'Taufiq',
        'last_name' => 'Azmi',
        'status' => null,
        'phone_no' => '162112470',
        'gender' => null,
        'date_of_birth' => null,
        'default' => false,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],

      // Customer
      [
        'user_id' => 3,
        'first_name' => 'Fatin',
        'last_name' => 'Syafiqah',
        'status' => 'Parent',
        'phone_no' => null,
        'gender' => 'Female',
        'date_of_birth' => null,
        'default' => true,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],

      // Customer - Parent
      [
        'user_id' => 3,
        'first_name' => 'Amirul',
        'last_name' => 'Sulaiman',
        'status' => 'Parent',
        'phone_no' => '1128565920',
        'gender' => 'Male',
        'date_of_birth' => null,
        'default' => false,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],

      // Customer - Guardian
      [
        'user_id' => 3,
        'first_name' => 'Nur',
        'last_name' => 'Hidayah',
        'status' => 'Guardian',
        'phone_no' => '177749708',
        'gender' => 'Female',
        'date_of_birth' => null,
        'default' => false,
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ]
    ]);
  }
}