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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('produk_id');
            $table->string('user_id');
            $table->string('nama');
            $table->string('qty');
            $table->string('status');
            $table->text('alamat');
            $table->text('deskripsi');
            $table->string('sumber_id');
            $table->string('telepon');
            $table->timestamps();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
