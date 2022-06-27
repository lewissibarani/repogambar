<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
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
        'catatan',
    ];

    public function transaksi()
    {
        
        return $this->belongsTo('App\Models\Transaksi', 'id','gambar_id');
    }
}
