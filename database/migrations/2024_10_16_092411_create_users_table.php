<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();

      $table->string('login')->unique();
      $table->string('email')->unique();
      $table->string('surname');
      $table->string('name');
      $table->string('patronymic')->nullable();
      $table->boolean('sex');
      $table->date('birthday');
      $table->string('password');
      $table->string('api_token')->nullable()->unique();
      $table->foreignId('role_id')->constrained();
      $table->rememberToken()->unique();

      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('users');
  }
};
