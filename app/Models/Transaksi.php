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
        'gambar_id'
    ];

    public function kegunaan ()
    {
        return $this->hasOne('App\Models\Kegunaan','id','idKegunaan');
    }

    public function user()
    {
        
        return $this->belongsTo('App\Models\User','idUserPeminta','id');
    }

    public function pembagiantugas()
    {
        
        return $this->belongsTo('App\Models\PembagianTugas' ,'id','permintaan_id');
    }

    public function status ()
    {
        return $this->hasOne('App\Models\Status','id','idStatus');
    }

    public function gambar ()
    {
        return $this->hasOne('App\Models\Gambar','id','gambar_id');
    }

}
