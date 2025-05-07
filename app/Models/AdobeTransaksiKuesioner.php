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
        'lainnya', 
        'kodesatkerid', 
        'suratdokumen',
        'dashboard',
        'website',
        'video',
        'flyer_vb',
        'spanduk',
        'infografis',
        'brs',
        'publikasi',
        'xd',
        'premiererush',
        'premierepro',
        'photoshop',
        'lightroom',
        'indesign',
        'incopy',
        'illustrator',
        'fresco',
        'express',
        'dreamweaver',
        'dimension',
        'audition',
        'animate',
        'aftereffect',
        'aero',
        'acrobat',
        'memakaiadobe', 
        'jumlah_lain',
        'affinitypublisher',
        'affinitydesigner',
        'affinityphoto',
        'canva',
        'foxitpdf',
        'nitropdf',
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
    public function getsatker ()
    { 
        return $this->hasOne('App\Models\Namasatker','kodesatker', 'kodesatkerid');
    }

}
