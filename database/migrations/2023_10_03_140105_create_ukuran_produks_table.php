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
        Schema::create('ukuran_produks', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('ukuran_id');
            $table->string('ukuran_en');
            $table->string('status');
            $table->string('id_produk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ukuran_produks');
    }
};
