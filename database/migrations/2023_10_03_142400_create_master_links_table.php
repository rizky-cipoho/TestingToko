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
        Schema::create('master_links', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('judul_link');
            $table->string('kategori')->nullable();
            $table->string('id_produk');
            $table->string('link');
            $table->string('icon')->nullable();
            $table->string('text_tombol')->nullable();
            $table->string('status');
            $table->string('target');
            $table->timestamps();        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_links');
    }
};
