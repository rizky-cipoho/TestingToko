<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
        use HasFactory, HasUlids;
    protected $fillable = [
        'id_kategori',
        'judul_id',
        'judul_en',
        'deskripsi_id',
        'deskripsi_en',
        'harga_id',
        'harga_en',
        'diskon_id',
        'diskon_en',
        'kode_sku',
        'link_video',
        'gambar',
        'status',
        'id_user',
    ];
}
