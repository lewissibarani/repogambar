<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KoleksiAsset extends Model
{
    use HasFactory;
    use \Conner\Tagging\Taggable;

    protected $table = 'koleksiaset';

    protected $fillable = [
        'namakoleksi',
        'tagname', 
        'thumbnailid', 
        'petugasid'
    ];  

    public function user ()
    {
        return $this->hasOne('App\Models\User','id','petugasid');
    }
    public function gambar ()
    {
        return $this->hasOne('App\Models\Gambar','id','thumbnailid');
    }

}
