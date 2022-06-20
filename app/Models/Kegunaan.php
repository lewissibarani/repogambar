<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegunaan extends Model
{
    use HasFactory;

    protected $table = 'kegunaan';

    protected $fillable = [
        'kegunaan',
    ];
}
