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
    Schema::table('applied_colleges', function (Blueprint $table) {
      $table->unsignedBigInteger('application_status_id')->nullable()->after('student_id');
      $table->foreign('application_status_id')->references('id')->on('application_statuses')->nullOnDelete();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('applied_colleges', function (Blueprint $table) {
      //
    });
  }
};
