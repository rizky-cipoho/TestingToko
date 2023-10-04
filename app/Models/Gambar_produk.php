<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Gambar_produk extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = [
        'id_produk',
        'gambar',
        'title_id'
        'title_en'
        'status'
    ];
}
