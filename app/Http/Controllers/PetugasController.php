<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegunaan;
use App\Models\Transaksi;
use App\Models\Gambar;
use App\Models\TugasReview;
use App\Models\File;
use App\Models\PembagianTugas;
use Illuminate\Support\Facades\Auth;
use App\Models\Source;
use App\Models\Kategori_File;
use App\Models\User;
use App\Models\User_Petugas;
use App\Providers\PetugasPermintaan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Image;

class PetugasController extends Controller
{
        // Link image type to correct image loader and saver
    // - makes it easier to add additional types later on
    // - makes the function easier to read
    const IMAGE_HANDLERS = [
        IMAGETYPE_JPEG => [
            'load' => 'imagecreatefromjpeg',
            'save' => 'imagejpeg',
            'quality' => 100
        ],
        IMAGETYPE_PNG => [
            'load' => 'imagecreatefrompng',
            'save' => 'imagepng',
            'quality' => 0
        ],
        IMAGETYPE_GIF => [
            'load' => 'imagecreatefromgif',
            'save' => 'imagegif',
            'quality' => 0 
        ]
    ];

    private function convertArray($array)
    {
        $converted_array=array();
        foreach(json_decode($array, true) as $key=> $data )
        {
            array_push($converted_array,$data['value']);
        }
        return $converted_array;
    }

    public function index ()
    {
        // Mengambil data didatabase
        $Data = PembagianTugas::with('user','permintaan','permintaan.user','permintaan.status','permintaan.kegunaan')
        ->where('user_id',Auth::id())->get();

        //Kalau dia taskmaster dan superadmin bisa
        if(Auth::user()->level<=2){
            $Data = PembagianTugas::with('user','permintaan','permintaan.user','permintaan.status','permintaan.kegunaan')
            ->get();
        }
        
        $Source = Source::all();
        return view('petugas.index', compact(['Data',
        'Source',
        ]));
    }

    public function store (Request $request)
    { 
        if($this->cek_sudah_di_layani_apa_belum($request->transaksi_id)){

            $storagePath  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
            $this->validate($request, [
                'image' => 'required|image',
                'file' => 'mimes:zip,rar|file|max:30000',
                'kategori_file' => 'required',
                'tags' => 'required',
            ]);

            //Given Constants
            $nameImage="";
            $filezip=null;
            $fileid=null;
            $source_id=3;
            $gambar_size=null;
            $tipe_gambar=null;

            if($request->file('image')){  
                    
                //constant
                    $image = $request->file('image');
                    $nameImage =  date('YmdHi').$request->file('image')->getClientOriginalName();
                
                    //membuat thumbnail
                    $width = config('imageresize.size.width'); // your max width
                    $height =  config('imageresize.size.height'); // your max height
                    $thumbPath = $storagePath.'public/thumbnail/'.$nameImage; 
                    $thumbImage = Image::make($image->getRealPath());
                    $thumbImage->height() > $thumbImage->width() ? $width=null : $height=null;
                    $thumbImage->resize($width, $height, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($thumbPath); 
                    
                    //menyimpan gambar original
                    $oriPath = $storagePath.'public/uploadedGambar/'.$nameImage;
                    $oriImage = Image::make($image)->save($oriPath); 
                     
                    // get ukuran dan ekstension gambar
                    $tipe_gambar=\File::extension(Storage::url('public/uploadedGambar/'.$nameImage));
                    $gambar_size=Storage::size('public/uploadedGambar/'.$nameImage);
         

                // $gambar_name=date('YmdHi').$request->file('image')->getClientOriginalName();
                // $gambar= $request->file('image')->storeAs(
                //     'public/uploadedGambar', $gambar_name
                // );    
                // $gambar_size=Storage::size('public/uploadedGambar/'.$gambar_name);
                // $tipe_gambar=\File::extension(Storage::url('public/uploadedGambar/'.$gambar_name)); 
                // //Membuat thumbnail  
                // $this->createThumbnail($storagePath.'public/uploadedGambar/'.$gambar_name, $storagePath.'public/thumbnail/'.$gambar_name, 1000);
                // $gambar= $request->file('image')->storeAs(
                //     'public/thumbnail', $gambar_name
                // );
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
                    'download'=>0
                    ]);

                $fileid=$filezip->id;
                
            }
            
            if(strpos($request->link, 'freepik')){
                $source_id=1;
            } 
            if(strpos($request->link, 'shutterstock')){
                    $source_id=2;
                }
                else{
                    $source_id=3;
                }
            
            
                $gambars=Gambar::create([
                'judul' => $request->judul,
                'link' => $request->link,
                'idKegunaan' => $request->idKegunaan,
                'idUser' => Auth::id(),
                'path' =>'storage/uploadedGambar/'.$nameImage,
                'thumbnail_path' =>'storage/thumbnail/'.$nameImage,
                'ukuran' =>$gambar_size,
                'nama_gambar' =>$nameImage,
                'source_id' => $source_id,
                'file_id' => $fileid,
                'kategori_file' =>$request->kategori_file,
                'tipe_gambar' => $tipe_gambar,
                'views' => 0,
                'download'=>0,
                'booleantayang'=>1,

            ]);
            
            //Menyimpan Tags
            $gambars->tag($this->convertArray($request->tags));
            
            //mencari id transaksi permitaan gambar di tabel pembagian tugas
            $id_permintaan = PembagianTugas::find($request->bagitugas_id)->permintaan_id;

            //merubah status permintaan gambar menjadi selesai
            $permintaan = Transaksi::where('id', $id_permintaan)
            ->update(['gambar_id' => $gambars->id,
                    'idStatus' => 3]);

            $permintaan = Transaksi::where('id', $id_permintaan)->first();
            
            //Start Read The Notification  
            $Notifikasi = DB::table('notifications')->where(
                [
                    ['type', '=', 'App\Notifications\PermintaanNotification']
                ]
            )->get();
            
            foreach ($Notifikasi as $notification) {  
                if(json_decode($notification->data)->kode_permintaan_id==$permintaan->id_permintaan)
                {
                    $Notifikasi = DB::table('notifications')->where('id', $notification->id)
                    ->update([  'read_at' => date("Y-m-d H:i:s")]);
                }
            }
            //End Read The Notification

            //kasih tau ke User via notifikasi kalau permintaannya sudah di selesaikan
            try {
                event(new PetugasPermintaan($permintaan));
            } catch (Throwable $e) {
                report($e);
                return false;
            }
            
            return redirect()->route('petugas.index')->with('message', 'Permintaan berhasil dilayani');
        }

        return redirect()->route('petugas.index')->with('message', 'Permintaan ini sudah pernah di Layani');
        
    }

    public function edit_store (Request $request)
    {  
            
            $storagePath  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
            $this->validate($request, [
                'edit_image' => 'image',
                'edit_file' => 'mimes:zip,rar|file|max:30000',
                'tags' => 'required',
                'edit_judul' => 'required',
            ]);

            //Given Constants  
            $gambars =  Gambar::find($request->id_gambar); 
            $fileid=$gambars->file_id;
            $Path= $gambars->path;
            $thumbnailPath= $gambars->thumbnail_path; 

            if($request->file('edit_image')){  
                 //constant
                 $image = $request->file('edit_image');
                 $nameImage =  date('YmdHi').$request->file('edit_image')->getClientOriginalName();
             
                 ini_set('memory_limit','2048M');

                 //membuat thumbnail
                 $width = 600; // your max width
                 $height = 600; // your max height
                 $thumbPath = $storagePath.'public/thumbnail/'.$nameImage; 
                 $thumbImage = Image::make($image->getRealPath()); 
                 $thumbImage->height() > $thumbImage->width() ? $width=null : $height=null;
                 $thumbImage->resize($width, $height, function ($constraint) {
                     $constraint->aspectRatio();
                 })->save($thumbPath); 
                 $thumbnailPath='storage/thumbnail/'.$nameImage;
                 
                 //menyimpan gambar original
                 $oriPath = $storagePath.'public/uploadedGambar/'.$nameImage;
                 $oriImage = Image::make($image)->save($oriPath); 
                 $Path='storage/uploadedGambar/'.$nameImage; 
                  
                 // get ukuran dan ekstension gambar
                 $tipe_gambar=\File::extension(Storage::url('public/uploadedGambar/'.$nameImage));
                 $gambar_size=Storage::size('public/uploadedGambar/'.$nameImage); 
            }

            if($request->file('edit_file')){ 
                $file_name=date('YmdHi').$request->file('edit_file')->getClientOriginalName();
                $file= $request->file('edit_file')->storeAs(
                    'public/file/', $file_name
                );   

                //Memghilangkan spesial character di path
                $file_name = str_replace(Array("\n", "\r", "\n\r"), '', $file_name);  
                
                //check apabila sebuah gambar sudah punya fle zip maka hanya update jika belum punya maka di create baru
                if(!$request->id_file==0){
                    $file_update=File::where('id',$request->id_file)
                    ->update(['path' => 'storage/file/'.$file_name,
                            'nama_file' => $file_name,
                    ]); 
                }
                else{    
                    $filezip =File::create([
                        'path' => 'storage/file/'.$file_name,
                        'nama_file' => $file_name,
                        'size' => Storage::size('public/file/'.$file_name),  
                        'type' => \File::extension(Storage::url('public/file/'.$file_name)),
                        'download'=>0
                        ]);
                        
                    $fileid=$filezip->id;
                    $gambars->update(['file_id' => $fileid
                    ]); 

                };
                
                
            } 
             //Menyimpan Judul, Oriptah image, thumbail dan file
            $gambars->judul = $request->edit_judul;  
            $gambars->path = $Path;
            $gambars->thumbnail_path = $thumbnailPath;  
            $gambars->file_id = $fileid;

            //Menyimpan Tags 
            $gambars->untag();
            $gambars->tag($this->convertArray($request->tags));

            $gambars->save();
            
            return redirect()->route('petugas.index')->with('message', 'Permintaan berhasil Diupdate');
        
    }

    public function tolak (Request $request)
    {
        if($this->cek_sudah_di_layani_apa_belum($request->transaksi_id)){

        $this->validate($request, [
            'alasanDitolak' => 'required',
        ]);
        
        //mencari id transaksi permitaan gambar di tabel pembagian tugas
        $id_permintaan = PembagianTugas::find($request->bagitugas_id)->permintaan_id;

        //merubah status permintaan gambar menjadi selesai
        $permintaan = Transaksi::where('id', $id_permintaan)
        ->update([  'gambar_id' => $request->id,
                    'idStatus' => 2,
                    'alasanDitolak' => $request->alasanDitolak]);
        
        $permintaan = Transaksi::where('id', $id_permintaan)->first();

        //Start Read The Notification  
        $Notifikasi = DB::table('notifications')->where(
            [
                ['type', '=', 'App\Notifications\PermintaanNotification']
            ]
        )->get();
        
        foreach ($Notifikasi as $notification) {  
            if(json_decode($notification->data)->kode_permintaan_id==$permintaan->id_permintaan)
            {
                $Notifikasi = DB::table('notifications')->where('id', $notification->id)
                ->update([  'read_at' => date("Y-m-d H:i:s")]);
            }
        }
        //End Read The Notification

        return redirect()->route('petugas.index');
    }
    return redirect()->route('petugas.index')->with('message', 'Permintaan ini sudah pernah di Layani');
        
    }

    public function layani_tolak ($transaksi_id, $permintaan_id)
    {
        if($this->cek_sudah_di_layani_apa_belum($transaksi_id)){
        $Data = PembagianTugas::with('user','permintaan','permintaan.user','permintaan.status','permintaan.kegunaan')
        ->where('user_id',Auth::id())
        ->where('permintaan_id', $transaksi_id)
        ->first();

        if(Auth::user()->level<=2){
                $Data = PembagianTugas::with('user','permintaan','permintaan.user','permintaan.status','permintaan.kegunaan') 
                ->where('permintaan_id', $transaksi_id)
                ->first();
                }

        return view('petugas.layani_tolak', 
        compact(['transaksi_id',
                'permintaan_id',
                'Data'
            ]));
        }
        return redirect()->route('petugas.index')->with('message', 'Permintaan ini sudah pernah di Layani');

        
    }

    public function layani ($transaksi_id, $permintaan_id)
    {
        if($this->cek_sudah_di_layani_apa_belum($transaksi_id)){ 
            $Data = PembagianTugas::with('user','permintaan','permintaan.user','permintaan.status','permintaan.kegunaan')
            ->where('user_id',Auth::id())
            ->where('permintaan_id', $transaksi_id)
            ->first(); 
            
            if(Auth::user()->level<=2){
                $Data = PembagianTugas::with('user','permintaan','permintaan.user','permintaan.status','permintaan.kegunaan') 
                ->where('permintaan_id', $transaksi_id)
                ->first();
                }
            

            $Source = Source::all();
            $Kategori_File = Kategori_File::all();
            return view('petugas.layani', 
            compact(['transaksi_id',
                    'permintaan_id',
                    'Source',
                    'Data',
                    'Kategori_File'
                ]));
        }
        return redirect()->route('petugas.index')->with('message', 'Permintaan ini sudah pernah di Layani');

    }

    public function edit_layani ($id_transaksi)
    {
            $Data = Transaksi::with('user','gambar') 
            ->where('id', $id_transaksi)
            ->first(); 
            
            $Gambar =  Gambar::with('tagged')->where('id',$Data->gambar->id)->first(); 
            $Tags = "";
            foreach($Gambar->tagged as $tagged) {
                $Tags= $Tags.$tagged->tag_slug.',';
            } 
            
            $Source = Source::all();
            return view('petugas.edit_layani', 
            compact([ 'Source','Data','Tags'
                ])); 

        return redirect()->route('petugas.index')->with('message', 'Permintaan ini sudah pernah di Layani');

    }
 
    public function pengaturan ()
    {
        $User = User::all();
        $User_Petugas = User_Petugas::with('users')->get();
        return view('petugas.pengaturan', 
        compact(['User','User_Petugas'
            ]));
    }

    public function tambah (Request $request)
    {
        $this->validate($request, [
            'users_id' => 'required|unique:users_petugas,users_id',
        ]);

        $gambars=User_Petugas::create([
            'users_id' =>$request->users_id,
            'aktif' => 1,
            'count_task' => 0,
            'countreviewtask' => 0, 
        ]);

        return redirect()->route('petugas.pengaturan');
    }

    private function cek_link($link)
    {   
        $result=3;
        $parse = parse_url($link);
        if (str_contains($parse['host'], 'shutterstock')) { 
            $result=2;
        }

        if (str_contains($parse['host'], 'freepik')) { 
            $result=1;
        }

        return $result;
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

    public function cek_sudah_di_layani_apa_belum($permintaan_id){
        if(Transaksi::find($permintaan_id)->idStatus!==3)
        {
            return true;
        }
        else {
            return false;
        }
        
    }

    public function statistik()
    {

        return view('petugas.statistik', 
        compact(['User','User_Petugas'
            ]));
    }

    public function reviewdaftar(){
        $Data = TugasReview::with('transaksi','transaksi.status','transaksi.gambar','userpetugas')->get();  
        return view('petugas.reviewdaftar', compact(['Data', 
        ]));
    }
    public function reviewlayani($reviewid){
        $Data = TugasReview::with('transaksi','transaksi.status','transaksi.gambar','userpetugas')->where('id',$reviewid)->first(); 
        return view('petugas.reviewkarya', compact(['Data', 
        ]));
    }
    public function reviewpublish($reviewid){
        $Data = TugasReview::with('transaksi','transaksi.status','transaksi.gambar','transaksi.gambar.file','userpetugas')->where('id',$reviewid)->first();  
        // if($Data->petugasid===null)
        // {  
            

            $Data->petugasid=Auth::id();
            $Data->save();

            $Transaksi = Transaksi::find($Data->transaksiid);  
            $Transaksi->idStatus=3; 
            $Transaksi->save();

            $Gambar = Gambar::where('id',$Data->transaksi->gambar_id)->first();
            $Gambar->booleantayang=1;
            $Gambar->save();

            $User_Petugas = User_Petugas::where('users_id',Auth::id())->first();
            $User_Petugas->increment('countreviewtask');
            $User_Petugas->save();
            return redirect()->route('review.daftar')->with('message', 'Permintaan berhasil dilayani');

        // } else {
        //     return redirect()->route('review.daftar')->with('message', 'Permintaan sudah pernah dilayani');
        // }
        
    }
    public function reviewunpublish(Request $request){
        $Data = TugasReview::with('transaksi','transaksi.status','transaksi.gambar','transaksi.gambar.file','userpetugas')->where('id',$request->tugasreviewid)->first(); 
        // if($Data->petugasid===null)
        // {   
            $Data->petugasid=Auth::id(); 
            $Data->save();
 
            $Transaksi = Transaksi::find($Data->transaksiid);  
            $Transaksi->idStatus=3;
            $Transaksi->alasanDitolak=$request->komentar; 
            $Transaksi->save();

            $Gambar = Gambar::where('id',$Data->transaksi->gambar_id)->first();
            $Gambar->booleantayang=0;
            $Gambar->save();

            $User_Petugas = User_Petugas::where('users_id',Auth::id())->first();
            $User_Petugas->increment('countreviewtask');
            $User_Petugas->save();
            return redirect()->route('review.daftar')->with('message', 'Permintaan berhasil dilayani');
        // }else{  
        //     return redirect()->route('review.daftar')->with('message', 'Permintaan sudah pernah dilayani');
        // } 
    }
}
