<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\User;
use App\Models\Gambar;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AlbumController extends Controller
{
    public function index ()
    {
        $Data = Album::with('tagged','user','gambar')->where('creatorid',Auth::id())->get()->slice(1)->sortByDesc('updated_at');
        
        $Data = $Data->all();
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

    public function edit ($albumid)
    {      

            $Data = Album::with('tagged','user','gambar')->find($albumid); 
            $Tags = "";
           
            if(isset($Data->tagged)){
                foreach($Data->tagged as $tagged) {
                    $Tags= $Tags.$tagged->tag_slug.',';
                }   
            }
            
            return response()->json([
                'datas' => $Data,
                'tags' =>$Tags
              ]); 
              
    }

    public function update (Request $request, Album $album)
    {

        $validator = Validator::make($request->all(), [
            'judulalbum'     => 'required',
            'deskripsi'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
 
        $album->update( [
                    'judulalbum' => $request->judulalbum,
                    'deskripsi' => $request->deskripsi
                  ] 
                );  
        $album->retag($this->convertArray($request->tags));

           return response()->json([ 'success' => true,
                                     'message' => 'Data Berhasil Diudapte!',
                                     'data'    => $album                                
        ]);
    }

    public function show ($albumid)
    {  
        $resource=null;
        $album=null;

        if($albumid !== null){
            $resource = Gambar::with('tagged','user')->where('album_id', '=', $albumid)->get();
        }  
        $childalbum = Album::with('gambar','children','user')->where('albumparentid', '=', $albumid)->get();  
        $currentalbum = Album::with('tagged','user')->find($albumid); 
        $countresource = $this->getresourcecount($currentalbum);
        $Tags = "";
            foreach($currentalbum->tagged as $tagged) {
                $Tags= $Tags.$tagged->tag_slug.',';
            } 

            return view('album.show',compact('Tags','resource','childalbum','currentalbum','countresource'));  
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

    private function getchildalbum($albumid)
    {
        $childalbum = Album::with('gambar','children','user')->where('albumparentid', '=', $albumid)->get();  
        return $childalbum;
    }

    private function getresourcecount($collection)
    {  
        $count=0;
         
            if (isset($collection['gambar'])) {
                $count = $count + $collection['gambar']->count();
            }   
            $childalbum=$this->getchildalbum($collection->id);

            if ($childalbum!==null) {
                foreach ($childalbum as $childalbums)
                {
                    if (isset($childalbums['gambar'])) {
                        $count = $count + $childalbums['gambar']->count();
                    }  
                }
            }  
         
        return $count; 
    } 
}
