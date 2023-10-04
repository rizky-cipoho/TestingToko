<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Ukuran_produk extends Model
{
    use HasFactory, HasUlids;
        protected $fillable = [
        'ukuran_id',
        'ukuran_en',
        'status',
        'id_produk',
    ];
}
