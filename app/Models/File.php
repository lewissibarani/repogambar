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
        'kategori_file',
        'download',
    ];

    public function gambar ()
    {
        return $this->hasOne('App\Models\Gambar');
    }

    public function kategori_file()
    {
        
        return $this->hasOne('App\Models\Kategori_File', 'id','kategori_file');
    }
}