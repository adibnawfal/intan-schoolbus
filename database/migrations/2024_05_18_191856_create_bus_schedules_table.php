<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('bus_schedules', function (Blueprint $table) {
      $table->id();
      $table->string('session');
      $table->json('standard');
      $table->time('pickup_from');
      $table->time('pickup_to');
      $table->time('dropoff_from');
      $table->time('dropoff_to');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('bus_schedules');
  }
};