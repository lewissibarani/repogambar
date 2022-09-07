<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $table = 'file';
    protected $fillable = [
        'path',
        'nama_file',
        'size',
        'type',
    ];

    public function gambar ()
    {
        return $this->hasOne('App\Models\Gambar');
    }
}