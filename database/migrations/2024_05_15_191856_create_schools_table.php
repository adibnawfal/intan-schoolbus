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
    Schema::create('schools', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->integer('service_period');
      $table->date('start_date');
      $table->date('end_date');
      $table->json('details');
      $table->json('standard');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('schools');
  }
};