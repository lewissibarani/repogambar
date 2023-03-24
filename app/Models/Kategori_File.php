<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_File extends Model
{
    use HasFactory;

    protected $table = 'kategori_file';

    protected $fillable = [
        'nama_kategori',
    ];
}
