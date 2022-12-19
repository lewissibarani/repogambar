<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gambar;
use Illuminate\Support\Facades\Auth;

class KontributorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showprofile ()
    {
        $iduser= Auth::id(); 
        //Data User
        $User=User::find($iduser);

        //Data Gambar yang pernah diupload
        $Gambar=Gambar::with('tagged','source','kegunaan','user','file','gambarView')->where('idUser', $iduser);

        return view('kontributor.kontributor', compact('User','Gambar'));
    }

    public function uploadgambar ()
    {
        
    }

    public function editgambar ()
    {
        
    }
}
