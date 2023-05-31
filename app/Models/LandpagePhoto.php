<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandpagePhoto extends Model
{
    use HasFactory;

    protected $table = 'landpagephoto';

    protected $fillable = [
        'gambarid',
        'koleksiasetid', 
        'petugasid', 
    ];  
    
    public function user ()
    {
        return $this->hasOne('App\Models\User','id','petugasid');
    }
}
