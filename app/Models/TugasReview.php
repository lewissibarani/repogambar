<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class TugasReview extends Model
{
    use HasFactory; 

    protected $table = 'tugasreview';
 
    protected $fillable = [ 
        'petugasid', 
        'transaksiid', 
    ];

    public function userpetugas()
    { 
        return $this->hasOne('App\Models\User','id','petugasid');
    }
     
    public function transaksi()
    { 
        return $this->hasOne('App\Models\Transaksi','id','transaksiid');
    } 

}
