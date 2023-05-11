<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPermintaan extends Model
{
    use HasFactory;

    protected $table = 'jenispermintaan';

    protected $fillable = [
        'jenispermintaan',
    ];
}
