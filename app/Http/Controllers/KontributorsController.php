<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gambar;
use App\Models\Kategori_File;
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
        
        //Data Gambar yang pernah disukai user 
        $GambarLiked=Gambar::whereLikedBy($iduser)->with('likeCounter')->orderBy('id', 'DESC')->get();

        //Total Karya 
        $Total = $Gambar->count();

        //Total Karya didownload
        $Didownload = $Gambar->sum('download');

        //Total Karya dilihat
        $Dilihat = $Gambar->sum('views');

        //Total Karya dilike
        $likecounter=0;
        $JumlahDilike = Gambar::where('idUser', '=', $iduser)->get();  
        foreach($JumlahDilike as $gambar) {
           $likecounter = $likecounter + $gambar->likeCount;
        } 
        $Dilike =$likecounter; 

        return view('kontributor.kontributor', compact('User','Gambar','Total', 'Didownload','Dilihat','Dilike' , 'GambarLiked'));
    }

    public function uploadkarya ()
    {
        $Kategoris = Kategori_File::all();
        return view('kontributor.uploadkarya',compact('Kategoris'));
    }

    public function store ()
    {
         
    }

    public function editgambar ()
    {
        
    }
}
