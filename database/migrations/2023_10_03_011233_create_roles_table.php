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
        Schema::create('roles', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('role');
            $table->string('userList');
            $table->string('userCreate');
            $table->string('userEdit');
            $table->string('user_aksesList');
            $table->string('user_aksesCreate');
            $table->string('user_aksesEdit');
            $table->string('user_aksesDelete');
            $table->string('produkList');
            $table->string('produkCreate');
            $table->string('produkEdit');
            $table->string('produkDelete');
            $table->string('produkKategoriList');
            $table->string('produkKategoriCreate');
            $table->string('produkKategoriEdit');
            $table->string('produkKategoriDelete');
            $table->string('sliderList');
            $table->string('sliderCreate');
            $table->string('sliderEdit');
            $table->string('sliderDelete');
            $table->string('bannerList');
            $table->string('bannerCreate');
            $table->string('bannerEdit');
            $table->string('bannerDelete');
            $table->string('pageList');
            $table->string('pageCreate');
            $table->string('pageEdit');
            $table->string('pageDelete');
            $table->string('pageKategoriList');
            $table->string('pageKategoriCreate');
            $table->string('pageKategoriEdit');
            $table->string('pageKategoriDelete');
            $table->string('pesananList');
            $table->string('pesananCreate');
            $table->string('pesananEdit');
            $table->string('pesananDelete');
            $table->string('pesananSumberList');
            $table->string('pesananSumberCreate');
            $table->string('pesananSumberEdit');
            $table->string('pesananSumberDelete');
            $table->string('profile');
            $table->string('subscribe');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
