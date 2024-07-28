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
    Schema::table('students', function (Blueprint $table) {
      $table->string('interested_destination')->nullable()->after('intrested_university');
      $table->string('entry_type')->nullable()->after('interested_destination');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('students', function (Blueprint $table) {
      $table->dropColumn('interested_destination');
      $table->dropColumn('entry_type');
    });
  }
};
