<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasReview extends Model
{
    use HasFactory;

    protected $table = 'tugasreview';

    protected $fillable = [
        'gambarid',
        'petugasid',
        'statusreviewid',
        'komentar',
    ];

    public function userpetugas()
    { 
        return $this->hasOne('App\Models\User','id','petugasid');
    }
    
    public function gambar()
    { 
        return $this->hasOne('App\Models\Gambar','id','gambarid');
    }
}
