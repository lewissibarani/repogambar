<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdobeTemplatDokumen extends Model
{
    use HasFactory;
    protected $table = 'adobe_templat_dokumens'; 
    protected $fillable = [
        'path',
        'jenisdokumen',
        'uploadedby', 
    ];
    public function getuser()
    {
        return $this->hasOne('App\Models\User','id','uploadedby');
    }
}
