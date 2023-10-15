<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Kategori_page extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = [
        'kategori_id',
        'kategori_en',
    ];
}
