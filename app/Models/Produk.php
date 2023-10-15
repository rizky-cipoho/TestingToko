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
        'modal_id',
        'modal_en',
        'kode_sku',
        'link_video',
        'gambar_original',
        'gambar',
        'status',
        'id_user',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    public function image(){
        return $this->hasMany(Gambar_produk::class, 'id_produk');
    }
    public function warna(){
        return $this->hasMany(Warna_produk::class, 'id_produk');
    }
    public function ukuran(){
        return $this->hasMany(Ukuran_produk::class, 'id_produk');
    }
    public function link(){
        return $this->hasMany(Master_link::class, 'id_produk');
    }
}
