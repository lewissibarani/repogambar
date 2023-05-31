<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KoleksiAsset extends Model
{
    use HasFactory;

    protected $table = 'koleksiaset';

    protected $fillable = [
        'namakoleksi',
        'tagname', 
        'petugasid'
    ];  

    public function user ()
    {
        return $this->hasOne('App\Models\User','id','petugasid');
    }

}
