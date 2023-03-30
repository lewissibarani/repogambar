<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gambar;
use App\Models\TugasReview;
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
        $storagePath  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();

        $this->validate($request, [
            'image' => 'required|image',
            'file' => 'mimes:zip,rar|file|max:30000',
            'tags' => 'required',
        ]);

        $gambar_name="";
        $filezip=null;
        $fileid=null;
        $source_id=3;
        $gambar_size=null;
        $tipe_gambar=null;

        if($request->file('image')){ 
            $gambar_name=date('YmdHi').$request->file('image')->getClientOriginalName();
            $gambar= $request->file('image')->storeAs(
                'public/uploadedGambar', $gambar_name
            );    
            $gambar_size=Storage::size('public/uploadedGambar/'.$gambar_name);
            $tipe_gambar=\File::extension(Storage::url('public/uploadedGambar/'.$gambar_name)); 
            //Membuat thumbnail  
            $this->createThumbnail($storagePath.'public/uploadedGambar/'.$gambar_name, $storagePath.'public/thumbnail/'.$gambar_name, 1000);
            $gambar= $request->file('image')->storeAs(
                'public/thumbnail', $gambar_name
            );
        }

        if($request->file('file')){ 
            $file_name=date('YmdHi').$request->file('file')->getClientOriginalName();
            $file= $request->file('file')->storeAs(
                'public/file/', $file_name
            );

            //Memghilangkan spesial character di path
            $file_name = str_replace(Array("\n", "\r", "\n\r"), '', $file_name); 
            $filezip =File::create([
                'path' => 'storage/file/'.$file_name,
                'nama_file' => $file_name,
                'size' => Storage::size('public/file/'.$file_name),  
                'type' => \File::extension(Storage::url('public/file/'.$file_name)),
                'kategori_file' => $request->kategori_file,
                'download' => 0
                ]);

            $fileid=$filezip->id; 
        }

        $gambars=Gambar::create([
            'judul' => $request->judul,
            'link' => "-",
            'idKegunaan' => 0,
            'idUser' => Auth::id(),
            'path' =>'storage/uploadedGambar/'.$gambar_name,
            'thumbnail_path' =>'storage/thumbnail/'.$gambar_name,
            'ukuran' =>$gambar_size,
            'nama_gambar' =>$gambar_name,
            'source_id' => 3,
            'file_id' => $fileid,
            'tipe_gambar' => $tipe_gambar,
            'views' => 0,
            'download'=>0,
            'booleantayang'=>0,
        ]);

        $this->pembagiantugasreview($gambars->id);

    }

    public function pembagiantugasreview($gambarid)
    {
        
        //start of distribusi petugas
        $petugas = User_Petugas::where('aktif',1)->orderBy('updated_at', 'asc')->first();
        $countreview_task = $petugas->countreview_task +1;
        $petugas->update(['countreview_task' => $countreview_task]);
        $petugas_id=$petugas->users_id;

        $gambars=TugasReview::create([
            'gambarid' => $gambarid,
            'petugasid' =>$petugas_id,
            'statusreviewid' => 0,
            'komentar'=>'-',
            'created_at'=>date("Y-m-d H:i:s"),
        ]);

    }
    
    public function editgambar ()
    {
        
    }

    public function createThumbnail($src, $dest, $desired_width) 
    {
 
        $source_image = imagecreatefromjpeg($src);
        $width = imagesx($source_image);
        $height = imagesy($source_image);

        /* find the "desired height" of this thumbnail, relative to the desired width  */
        $desired_height = floor($height * ($desired_width / $width));

        /* create a new, "virtual" image */
        $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

        /* copy source image at a resized size */
        imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

        /* create the physical thumbnail image to its destination */
        imagejpeg($virtual_image, $dest);
    } 
}
