<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Warna_produk extends Model
{
    use HasFactory, HasUlids;
            protected $fillable = [
        'id_produk',
        'warna',
        'gambar',
        'kode_warna',
        'status',
    ];
}
