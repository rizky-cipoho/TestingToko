<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Master_link extends Model
{
    use HasFactory, HasUlids;
        protected $fillable = [
        'kategori',
        'id_produk',
        'judul_link',
        'link',
        'icon',
        'text_tombol',
        'status',
        'target',
    ];
}
