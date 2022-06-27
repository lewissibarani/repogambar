<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembagianTugas extends Model
{
    use HasFactory;

    protected $table = 'pembagiantugas';

    protected $fillable = [
        'permintaan_id',
        'seenboolean',
        'user_id'
    ];

    public function permintaan ()
    {
        return $this->hasOne('App\Models\Transaksi');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }

}
