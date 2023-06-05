<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gambar;
use App\Models\KoleksiAsset;
use App\Models\LandpagePhoto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LandpageSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function convertArray2($array)
    {
         $converted_array=array();
         foreach(json_decode($array, true) as $key=> $data )
         {
             array_push($converted_array,$data['value']);
         }
         return $converted_array;
     }
    
    public function index()
    {
         // Mengambil data didatabase
         $Data = KoleksiAsset::with('user','gambar','tagged')->get();  
         return view('petugas.landpagesetting.index', compact(['Data'
         ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post', 
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'namakoleksi' => 'required',
            'tagname' => 'required', 
        ]);

        $KoleksiAsset = new KoleksiAsset;
        $KoleksiAsset->namakoleksi = $request->namakoleksi; 
        $KoleksiAsset->thumbnailid = 1;
        $KoleksiAsset->petugasid = Auth::id();
        $KoleksiAsset->save();

        //menyimpan tag koleksi ini
        $KoleksiAsset->tag($this->convertArray2($request->tagname));

        return redirect()->route('landpagesetting.index')->with('message', 'Koleksi berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
 
}
