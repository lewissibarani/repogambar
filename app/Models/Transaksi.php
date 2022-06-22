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

    public function kegunaan (){
        return $this->belongsTo('App\Models\Kegunaan');
    }

}
