<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'permintaan';

    protected $fillable = [
        'judulPermintaan',
        'idStatus',
        'idKegunaan',
        'alasanDitolak',
        'linkPermintaan',
        'idUserPeminta',
        'idUserPetugas'
    ];

    protected $dateFormat = 'U';

    public function kegunaan ()
    {
        return $this->hasOne('App\Models\Kegunaan','id','idKegunaan');
    }

    public function user()
    {
        
        return $this->belongsTo('App\Models\User','idUserPeminta','id');
    }

}
