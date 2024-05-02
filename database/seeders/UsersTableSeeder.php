<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $datetime = Carbon::now()->toDateTimeString();

    DB::table('users')->insert([
      // Admin
      [
        'email' => 'admin@gmail.com',
        'password' => Hash::make('admin12345'),
        'role' => 'admin',
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],

      // Driver
      [
        'email' => 'driver@gmail.com',
        'password' => Hash::make('driver12345'),
        'role' => 'driver',
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ],

      // Customer
      [
        'email' => 'customer@gmail.com',
        'password' => Hash::make('customer12345'),
        'role' => 'customer',
        'created_at' => $datetime,
        'updated_at' => $datetime,
      ]
    ]);
  }
}