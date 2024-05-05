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
    public function getAdobeTransaksiKuesioner ()
    {
        return $this->hasOne('App\Models\AdobeTransaksiKuesioner' ,'kodesatkerid','kodesatkerid')->latest();
    }

}
