<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdobeTransaksiKuesioner extends Model
{
    use HasFactory;
    protected $table = 'adobe_transaksi_kuesioner';
    protected $fillable = [
        'userid',
        'bulanid',
        'periodeid',   
        'apakahmemakaiadobe', 
        'memakaiadobeuntukapa', 
        'deskripsi', 
    ];

    public function user ()
    {
        return $this->hasOne('App\Models\User','id','userid');
    }

    public function bulan ()
    { 
        return $this->hasOne('App\Models\Bulan','id', 'bulanid');
    }
    public function periode ()
    { 
        return $this->hasOne('App\Models\AdobePeriode','id', 'periodeid');
    }

}
