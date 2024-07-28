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
    Schema::create('application_notes', function (Blueprint $table) {
      $table->id();
      $table->string('subject')->nullable();
      $table->longText('message_note');
      $table->unsignedBigInteger('application_id');
      $table->foreign('application_id')->references('id')->on('applied_colleges');
      $table->enum('sender', ['user', 'admin'])->nullable();
      $table->string('file_name')->nullable();
      $table->text('file_path')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('application_notes');
  }
};
