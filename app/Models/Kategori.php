<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory, HasUlids;
        protected $fillable = [
        'kategori_id',
        'kategori_en',
        'status',
    ];
    public function produk(){
        return $this->hasMany(Produk::class, 'id_kategori');
    }
}
