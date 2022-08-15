<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    use \Conner\Tagging\Taggable;
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'gambar';
    protected $fillable = [
        'judul',
        'link',
        'path',
        'idKegunaan',
        'idUser',
        'metadata',
        'nama_gambar',
        'source_id',
    ];

    public function source()
    {
        
        return $this->hasOne('App\Models\Source', 'id','source_id');
    }
    public function kegunaan()
    {
        
        return $this->hasOne('App\Models\Kegunaan', 'id','idKegunaan');
    }

    public function user ()
    {
        return $this->hasOne('App\Models\User','id','idUser');
    }
}
