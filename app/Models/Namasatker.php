<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Namasatker extends Model
{
    use HasFactory; 
    protected $table = 'namasatker'; 

    public function getAdobeTransaksiBAST ()
    {
        return $this->hasOne('App\Models\AdobeTransaksiBAST' ,'kodesatkerid','kodesatker')->latest();
    }

    public function getAdobeTransaksiBAST_Many ()
    {
        return $this->hasMany('App\Models\AdobeTransaksiBAST' ,'kodesatkerid','kodesatker'); 
    }

    public function getAdobeTransaksiKuesioner ()
    { 
        return $this->hasOne('App\Models\AdobeTransaksiKuesioner' ,'kodesatkerid','kodesatker')->latest();
    }
}
