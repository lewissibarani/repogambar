<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Petugas extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'users_petugas';
    protected $fillable = [
        'users_id',
        'count_task',
        'aktif',
    ];

    public function users ()
    {
        return $this->hasOne('App\Models\User','id','users_id');
    }
}
