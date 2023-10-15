<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = [
        'produk_id',
        'qty',
        'user_id',
        'alamat',
        'status',
        'deskripsi',
        'nama',
        'sumber_id',
        'telepon',
    ];
    public function produk(){
        return $this->belongsTo(Produk::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function sumber(){
        return $this->belongsTo(Sumber_pesanan::class);
    }
}
