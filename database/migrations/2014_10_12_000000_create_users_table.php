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
        Schema::create('users', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('image')->nullable();
            $table->string('image_original')->nullable();
            $table->string('status')->nullable();
            $table->string('password');
            $table->string('role_id');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
