<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gambar;
use App\Models\TugasReview;
use App\Models\User_Petugas;
use App\Models\File; 
use App\Models\Transaksi; 
use App\Models\PembagianTugas; 
use App\Models\Kategori_File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Image;

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
        $Gambar=Gambar::with('tagged','source','kegunaan','user','file','gambarView','likeCounter')->where('idUser', $iduser)->orderBy('id', 'DESC')->paginate(15);
        
        //Data Gambar yang pernah disukai user 
        $GambarLiked=Gambar::whereLikedBy($iduser)->with('likeCounter','user')->orderBy('id', 'DESC')->get();

        //Total Karya 
        $Total = $Gambar->count();

        //Total Karya didownload
        $Didownload = $Gambar->sum('download');

        //Total Karya dilihat
        $Dilihat = $Gambar->sum('views');

        //Total Karya dilike
        $likecounter=0;
        $JumlahDilike = Gambar::with('likeCounter','user')->where('idUser', '=', $iduser)->get();  
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

    public function store (Request $request)
    {
 

        $this->validate($request, [
            'kategori_file'=>'required',
            'image' => 'required|image',
            'file' => 'mimes:zip,rar|file|max:30000',
            'tags' => 'required',
        ]);

        $nameImage="";
        $filezip=null;
        $fileid=null;
        $source_id=3;
        $gambar_size=null;
        $tipe_gambar=null;

        if($request->file('image')){ 
            $nameImage=date('YmdHi').$request->file('image')->getClientOriginalName();
            $image= $request->file('image');
 
            ini_set('memory_limit','2048M');

            //membuat thumbnail
            $width = config('imageresize.size.width'); // your max width
            $height =  config('imageresize.size.height'); // your max height 
            $thumbImage = Image::make($image->getRealPath()); 
            $thumbImage->height() > $thumbImage->width() ? $width=null : $height=null;
            $thumbImage->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            }); 
            
            Storage::disk('s3')->put('storage/thumbnail/'.$nameImage, $thumbImage->stream());
            $thumbnailPath = Storage::disk('s3')->url('storage/thumbnail/'.$nameImage);  
           
            //menyimpan gambar original   
            Storage::disk('s3')->putFileAs('storage/uploadedGambar',$image,$nameImage); 
            $Path = Storage::disk('s3')->url('storage/uploadedGambar/'.$nameImage);  

            
            $gambar_size=$image->getSize(); 
            $tipe_gambar=$image->extension();  
            
        }

        if($request->file('file')){ 
            $file_name=date('YmdHi').$request->file('file')->getClientOriginalName();
            $file= $request->file('file');

            //menyimpan file original 
            $file_path = Storage::disk('s3')->putFileAs('storage/file',$file, $file_name); 
            $url_file = Storage::disk('s3')->url('storage/file/'.$file_name);
 

            $filezip =File::create([
                'path' => $url_file,
                'nama_file' => $file_name,
                'size' => $file->getSize(),  
                'type' => $file->extension(),
                'kategori_file' => $request->kategori_file,
                'download' => 0
                ]);

            $fileid=$filezip->id; 
        }

        $gambars=Gambar::create([
            'judul' => $request->judul,
            'link' => "Upload Karya Pribadi",
            'idKegunaan' => "Upload Karya Pribadi",
            'idUser' => Auth::id(),
            'path' =>$Path,
            'thumbnail_path' =>$thumbnailPath,
            'ukuran' =>$gambar_size,
            'nama_gambar' =>$nameImage,
            'source_id' => 3,
            'file_id' => $fileid,
            'kategori_file' => $request->kategori_file,
            'tipe_gambar' => $tipe_gambar,
            'views' => 0,
            'download'=>0,
            'booleantayang'=>0,
        ]);
 
        //Menyimpan Tags  
        $gambars->tag($this->convertArray($request->tags));

        $transaksiid= $this->storetransaksi($gambars->judul, $gambars->id);
        $this->pembagiantugasreview($transaksiid);

        return redirect()->route('kontributor.profil',["user_id"=>Auth::id()])->with('message', 'Karya kamu sudah diajukan.');

    }

    public function pembagiantugasreview($transaksiid)
    {
        
        //start of distribusi petugas
        $petugas = User_Petugas::where('aktif',1)->orderBy('updated_at', 'asc')->first();
        $countreview_task = $petugas->countreview_task +1;
        $petugas->update(['countreview_task' => $countreview_task]);
        $petugas_id=$petugas->users_id;

        $gambars=TugasReview::create([
            'transaksiid' => $transaksiid,
            'petugasid' =>$petugas_id, 
            'created_at'=>date("Y-m-d H:i:s"),
        ]);

    }

    public function pemberian_id_permintaan($kodesatker){
        $lastnumber=0;
        $permintaan = Transaksi::where(DB::raw('substr(id_permintaan, 1, 12)'), '=' , $kodesatker)->latest("id")->first();
        if($permintaan!=null)
        {
            $lastnumber_2 = $permintaan->id_permintaan;
            $sisa_digit_terakhir = substr($lastnumber_2, 12);
            $lastnumber = $sisa_digit_terakhir +1;
        } 
        return $lastnumber;
    }

    public function storetransaksi($judulpermintaan,$gambar_id)
    {  

        $idpembuatkarya= Auth::id();

        //---start proses pemberian id permintaan
        $kodesatker = Auth::user()->kodesatker;
        $digiterakhir_idpermintaan= $this->pemberian_id_permintaan($kodesatker);
        $id_permintaan = $kodesatker.$digiterakhir_idpermintaan;
        //---end proses pemberian id permintaan
 
        $create_transaksi=Transaksi::create([ 
            'jenispermintaanid' => 2,
            'judulPermintaan' => $judulpermintaan,
            'idStatus' => 1,
            'idKegunaan' => 4,
            'alasanDitolak' => NULL,
            'linkPermintaan' => "NULL", 
            'idUserPeminta' => $idpembuatkarya, 
            'gambar_id' => $gambar_id, 
            'kegunaan_lainnya' => NULL,
            'id_permintaan' => $id_permintaan,
        ]);
        
        //start of distribusi petugas
        $petugas = User_Petugas::where('aktif',1)->orderBy('updated_at', 'asc')->first();
        $count_task = $petugas->count_task +1;
        $petugas->update(['count_task' => $count_task]);
        $petugas_id=$petugas->users_id;

        PembagianTugas::create([
            'permintaan_id' => $create_transaksi->id,
            'seenboolean' => '0',
            'user_id' =>$petugas_id,
        ]);
        //end of distribusi tugas

        //Start nambah statistik permintaan pada tabel user
        $peminta = User::find($idpembuatkarya);
        $peminta->increment('sums_upload'); 
        $peminta->save(); 

        return $create_transaksi->id; 
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
