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
        Schema::create('produks', function (Blueprint $table) {
                $table->string('id')->primary();
            $table->string('id_kategori');
            $table->string('judul_id');
            $table->string('judul_en');
            $table->text('deskripsi_id');
            $table->text('deskripsi_en');
            $table->string('harga_id');
            $table->string('harga_en');
            $table->string('diskon_id');
            $table->string('diskon_en');
            $table->string('kode_sku');
            $table->string('link_video');
            $table->string('gambar');
            $table->string('status');
            $table->string('id_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
