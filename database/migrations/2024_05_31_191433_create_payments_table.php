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
    Schema::create('payments', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('user_id')->unsigned();
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      $table->bigInteger('bus_service_id')->unsigned();
      $table->foreign('bus_service_id')->references('id')->on('bus_services')->onDelete('cascade');
      $table->year('year');
      $table->string('month');
      $table->string('status');
      $table->date('date')->nullable();
      $table->string('method')->nullable();
      $table->decimal('fee', 9, 2);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('payments');
  }
};