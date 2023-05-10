<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class TugasReview extends Model
{
    use HasFactory;
    use HasRichText;

    protected $table = 'tugasreview';

    protected $richTextFields = [
        'komentar', 
    ];

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
