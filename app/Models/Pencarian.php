<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencarian extends Model
{
    use HasFactory;

    protected $table = 'datapencarian';

    protected $fillable = [
        'userid',
        'query', 
    ]; 

    public function user()
    {
        return $this->hasOne('App\Models\User','id','userid');
    }

}
