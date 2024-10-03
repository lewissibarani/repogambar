<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class AdobeTransaksiPJ extends Model
{
    use HasFactory,Notifiable;
    protected $table = 'adobe_transaksipj';
    protected $fillable = [
        'userid',
        'email_adobe_lama_id',
        'email_adobe_lama',
        'email_adobe_baru',   
        'pengganti_id',   
        'nohp',
        'alasan', 
        'status',
        'petugasid', 
    ]; 


    public function getuser_pembuatajuan ()
    {
        return $this->hasOne('App\Models\User','id','userid');
    }

    public function getpjlama ()
    {
        return $this->hasOne('App\Models\AdobePJ','id','email_adobe_lama_id');
    }

    public function getuserpjbaru ()
    {
        return $this->hasOne('App\Models\User','id','pengganti_id');
    }
    public function getuserpetugas ()
    {
        return $this->hasOne('App\Models\User','id','petugasid');
    }

}
