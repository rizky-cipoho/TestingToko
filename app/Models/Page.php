<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = [
        'judul_id',
        'judul_en',
        'artikel_id',
        'artikel_en',
        'status',
        'id_user',
        'kategori_id',
    ];

    public function kategori(){
        return $this->belongsTo(Kategori_page::class);
    }
}
