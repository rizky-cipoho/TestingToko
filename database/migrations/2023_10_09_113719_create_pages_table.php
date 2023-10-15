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
        Schema::create('pages', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('judul_id');
            $table->string('judul_en');
            $table->text('artikel_id');
            $table->text('artikel_en');
            $table->string('id_user');
            $table->string('kategori_id');
            $table->string('status');
            $table->timestamps();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
