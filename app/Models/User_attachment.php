<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class User_attachment extends Model
{
    use HasFactory, HasUlids;
        protected $fillable = [
        'image',
        'height',
        'width',
        'size',
        'path',
        'user_id',
    ];
}
