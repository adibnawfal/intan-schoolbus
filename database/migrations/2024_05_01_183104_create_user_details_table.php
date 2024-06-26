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
    Schema::create('user_details', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('user_id')->unsigned();
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      $table->string('first_name');
      $table->string('last_name');
      $table->string('status')->nullable();
      $table->string('phone_no')->nullable();
      $table->string('gender')->nullable();
      $table->date('date_of_birth')->nullable();
      $table->string('bio')->nullable();
      $table->string('profile_img')->nullable();
      $table->boolean('default');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('user_details');
  }
};