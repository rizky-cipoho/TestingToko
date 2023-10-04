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
        Schema::create('gambar_produks', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('id_produk');
            $table->string('gambar');
            $table->string('title_id')->nullable();
            $table->string('title_en')->nullable();
            $table->string('status');
            $table->timestamps();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gambar_produks');
    }
};
