<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\User;
use App\Models\Gambar;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    public function index ()
    {
        $Data = Album::with('tagged','user','gambar')->get();

        return view('album.index',compact('Data'));
    }

    public function store (Request $request)
    { 
        $request->validate([
            'judulalbum' => 'required',
            'tags' => 'required',
            'deskripsi' =>'required', 
        ]);

        $Album = Album::create([
            'judulalbum' => $request->judulalbum,
            'deskripsi' => $request->deskripsi, 
            'creatorid'=> Auth::id(),
            'albumparentid'=> null,
        ]);

        //Menambah tags untuk album
        $Album->tag($this->convertArray($request->tags));

        return redirect()->route('album.index')->withStatus(__('Permintaan Berhasil Dibuat.'));
    }
    public function show ($albumid)
    {  
        if($albumid !== null){
            $Gambar = Gambar::with('tagged','user')->where('album_id', '=', $albumid)->get();
            return view('album.show',compact('Gambar')); 
        } 
        return redirect()->route('album.index');
    }

    public function create()
    {
        return response()->json([
            'success' => true,
            'message' => '', 
        ]); 
    }

    private function convertArray($array)
    {
        $converted_array=array();
        foreach(json_decode($array, true) as $key=> $data )
        {
            array_push($converted_array,$data['value']);
        }
        return $converted_array;
    }
    
}
