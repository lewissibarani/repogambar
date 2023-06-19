<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Models\Kegunaan;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\PembagianTugas;
use Illuminate\Support\Facades\Storage;

class Image_File_Controller extends Controller
{
     public function getImageS3($path)
     {
        return Storage::get($path);
     }
     public function ImageS3($path)
     {

     }

     
}
