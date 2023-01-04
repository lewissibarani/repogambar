<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gambar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KontributorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showprofile ($id_user)
    {
        $iduser= $id_user;
        //Data User
        $User=User::find($iduser);

        //Data Gambar yang pernah diupload
        $Gambar=Gambar::with('tagged','source','kegunaan','user','file','gambarView')->where('idUser', $iduser)->orderBy('id', 'DESC')->get();

        //Total Karya 
        $Total = $Gambar->count();

        //Total Karya didownload
        $Didownload = $Gambar->sum('download');

        //Total Karya dilihat
        $Dilihat = $Gambar->sum('views');

        //Total Karya dilike
        $Dilike = rand(10,100);

        return view('kontributor.kontributor', compact('User','Gambar','Total', 'Didownload','Dilihat','Dilike'));
    }

    public function uploadkarya ()
    {
        return view('kontributor.uploadkarya');
    }

    public function editgambar ()
    {
        
    }
}
