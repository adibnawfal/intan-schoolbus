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
    Schema::create('students', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('user_id')->unsigned();
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      $table->string('first_name');
      $table->string('last_name');
      $table->string('school');
      $table->integer('standard');
      $table->string('gender');
      $table->date('date_of_birth');
      $table->bigInteger('parent_guardian_id')->unsigned()->nullable();
      $table->foreign('parent_guardian_id')->references('id')->on('user_details')->onDelete('set null');
      $table->bigInteger('pickup_address_id')->unsigned()->nullable();
      $table->foreign('pickup_address_id')->references('id')->on('addresses')->onDelete('set null');
      $table->bigInteger('dropoff_address_id')->unsigned()->nullable();
      $table->foreign('dropoff_address_id')->references('id')->on('addresses')->onDelete('set null');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('students');
  }
};