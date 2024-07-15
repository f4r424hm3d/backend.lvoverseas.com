<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('applied_colleges', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('university_id');
      $table->foreign('university_id')->references('id')->on('universities')->cascadeOnDelete();
      $table->unsignedBigInteger('student_id');
      $table->foreign('student_id')->references('id')->on('students')->cascadeOnDelete();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('applied_colleges');
  }
};
