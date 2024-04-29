<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdobeJenisDokumen;


class AdobeDokumen extends Model
{
    use HasFactory;
    protected $table = 'adobe_dokumen';

    protected $fillable = [
        'jenisdokumenid',
        'path',
        'filename', 
    ];

    public function jenisdokumen ()
    { 
        return $this->hasMany(AdobeJenisDokumen::class,'id', 'jenisdokumenid');
    }
 

}
