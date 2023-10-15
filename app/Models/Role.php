<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Role extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = [
        'role',
        'userList',
        'userCreate',
        'userEdit',
        'user_aksesList',
        'user_aksesCreate',
        'user_aksesEdit',
        'user_aksesDelete',
        'produkList',
        'produkCreate',
        'produkEdit',
        'produkDelete',
        'produkKategoriList',
        'produkKategoriCreate',
        'produkKategoriEdit',
        'produkKategoriDelete',
        'sliderList',
        'sliderCreate',
        'sliderEdit',
        'sliderDelete',
        'bannerList',
        'bannerCreate',
        'bannerEdit',
        'bannerDelete',
        'pageList',
        'pageCreate',
        'pageEdit',
        'pageDelete',
        'pageKategoriList',
        'pageKategoriCreate',
        'pageKategoriEdit',
        'pageKategoriDelete',
        'pesananList',
        'pesananCreate',
        'pesananEdit',
        'pesananDelete',
        'pesananSumberList',
        'pesananSumberCreate',
        'pesananSumberEdit',
        'pesananSumberDelete',
        'subscribe'
    ];

}
