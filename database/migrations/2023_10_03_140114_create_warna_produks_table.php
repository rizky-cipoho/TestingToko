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
        Schema::create('warna_produks', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('id_produk');
            $table->string('warna');
            $table->string('gambar');
            $table->string('kode_warna');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warna_produks');
    }
};
