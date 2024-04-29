<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bulan;
use App\Models\User;
use App\Models\AdobeDokumen;
use App\Models\AdobePeriode;


class AdobeTransaksiBAST extends Model
{
    use HasFactory;
    protected $table = 'adobe_transaksi_bast';
    protected $fillable = [
        'userid',
        'dokumenid',
        'periodeid',   
    ];
 

    public function user ()
    {
        return $this->hasOne('App\Models\User','id','userid');
    }

    public function dokumen ()
    { 
        return $this->hasOne('App\Models\AdobeDokumen','id', 'dokumenid');
    }
    public function periode ()
    { 
        return $this->hasOne('App\Models\AdobePeriode','id', 'periodeid');
    }

}
