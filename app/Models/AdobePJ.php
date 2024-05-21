<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdobeTransaksiBAST;
use App\Models\Namasatker;


class AdobePJ extends Model
{
    use HasFactory;
    protected $table = 'adobe_pj'; 

    public function getAdobeTransaksiBAST ()
    {
        return $this->hasOne('App\Models\AdobeTransaksiBAST' ,'kodesatkerid','kodesatkerid')->latest();
    }
    public function getnamasatker ()
    {
        return $this->hasOne('App\Models\Namasatker' ,'kodesatker','kodesatkerid');
    }
    public function getuser ()
    {
        return $this->hasOne('App\Models\User' ,'id','userid');
    } 
    public function transaksikuesioner () 
    {
        return $this->hasMany('App\Models\AdobeTransaksiKuesioner' ,'kodesatkerid','kodesatkerid');
    } 

}
