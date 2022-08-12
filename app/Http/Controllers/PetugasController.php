<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegunaan;
use App\Models\Transaksi;
use App\Models\Gambar;
use App\Models\PembagianTugas;
use Illuminate\Support\Facades\Auth;
use App\Models\Source;
use App\Models\User;
use App\Models\User_Petugas;

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

    public function createThumbnail($src, $dest, $targetWidth, $targetHeight = null) {

        // 1. Load the image from the given $src
        // - see if the file actually exists
        // - check if it's of a valid image type
        // - load the image resource
    
        // get the type of the image
        // we need the type to determine the correct loader
        $type = exif_imagetype($src);
    
        // if no valid type or no handler found -> exit
        if (!$type || !self::IMAGE_HANDLERS[$type]) {
            return null;
        }
    
        // load the image with the correct loader
        $image = call_user_func(self::IMAGE_HANDLERS[$type]['load'], $src);
    
        // no image found at supplied location -> exit
        if (!$image) {
            return null;
        }
    
    
        // 2. Create a thumbnail and resize the loaded $image
        // - get the image dimensions
        // - define the output size appropriately
        // - create a thumbnail based on that size
        // - set alpha transparency for GIFs and PNGs
        // - draw the final thumbnail
    
        // get original image width and height
        $width = imagesx($image);
        $height = imagesy($image);
    
        // maintain aspect ratio when no height set
        if ($targetHeight == null) {
    
            // get width to height ratio
            $ratio = $width / $height;
    
            // if is portrait
            // use ratio to scale height to fit in square
            if ($width > $height) {
                $targetHeight = floor($targetWidth / $ratio);
            }
            // if is landscape
            // use ratio to scale width to fit in square
            else {
                $targetHeight = $targetWidth;
                $targetWidth = floor($targetWidth * $ratio);
            }
        }
    
        // create duplicate image based on calculated target size
        $thumbnail = imagecreatetruecolor($targetWidth, $targetHeight);
    
        // set transparency options for GIFs and PNGs
        if ($type == IMAGETYPE_GIF || $type == IMAGETYPE_PNG) {
    
            // make image transparent
            imagecolortransparent(
                $thumbnail,
                imagecolorallocate($thumbnail, 0, 0, 0)
            );
    
            // additional settings for PNGs
            if ($type == self::IMAGETYPE_PNG) {
                imagealphablending($thumbnail, false);
                imagesavealpha($thumbnail, true);
            }
        }
    
        // copy entire source image to duplicate image and resize
        imagecopyresampled(
            $thumbnail,
            $image,
            0, 0, 0, 0,
            $targetWidth, $targetHeight,
            $width, $height
        );
    
    
        // 3. Save the $thumbnail to disk
        // - call the correct save method
        // - set the correct quality level
    
        // save the duplicate version of the image to disk
        return call_user_func(
            self::IMAGE_HANDLERS[$type]['save'],
            $thumbnail,
            $dest,
            self::IMAGE_HANDLERS[$type]['quality']
        );
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

    public function index ()
    {
        // Mengambil data didatabase
        $data = PembagianTugas::with('user','permintaan','permintaan.user','permintaan.status','permintaan.kegunaan')
        ->where('user_id',Auth::id())->get();

        // Membuat Json hasil query
        $json = json_encode(array(
            "data" =>$data));
        if (file_put_contents(public_path()."/json/Tugas.json", $json))
        
        $Source = Source::all();
        return view('petugas.index');
    }

    public function store (Request $request)
    {

        $this->validate($request, [
            'source_id' => 'required',
            'image' => 'required',
            'tags' => 'required',
        ]);
        
        $filename="";

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('img/uploadedGambar/'), $filename);

            //Membuat thumbnail
            $this->createThumbnail(public_path('img/uploadedGambar/').$filename, public_path('img/thumbnail/').$filename, 300);
        }
        
        $gambars=Gambar::create([
            'judul' => $request->judul,
            'link' => $request->link,
            'idKegunaan' => $request->idKegunaan,
            'idUser' => Auth::id(),
            'path' =>'img/uploadedGambar/'.$filename,
            'thumbnail_path' =>'img/thumbnail/'.$filename,
            'metadata' =>'',
            'nama_gambar' =>$filename,
            'source_id' => $request->source_id
        ]);
        
        //Menyimpan Tags
        $gambars->tag($this->convertArray($request->tags));
        
        //mencari id transaksi permitaan gambar di tabel pembagian tugas
        $id_permintaan = PembagianTugas::find($request->bagitugas_id)->permintaan_id;

        //merubah status permintaan gambar menjadi selesai
        $permintaan = Transaksi::where('id', $id_permintaan)
        ->update(['gambar_id' => $gambars->id,
                  'idStatus' => 3]);

        return redirect()->route('petugas.index');
        
    }

    public function tolak (Request $request)
    {

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

        return redirect()->route('petugas.index');
        
    }

    public function layani_tolak ($transaksi_id, $permintaan_id)
    {

        $Data = PembagianTugas::with('user','permintaan','permintaan.user','permintaan.status','permintaan.kegunaan')
        ->where('user_id',Auth::id())
        ->where('permintaan_id', $transaksi_id)
        ->first();

        return view('petugas.layani_tolak', 
        compact(['transaksi_id',
                'permintaan_id',
                'Data'
            ]));
        
    }

    public function layani ($transaksi_id, $permintaan_id)
    {
        $Data = PembagianTugas::with('user','permintaan','permintaan.user','permintaan.status','permintaan.kegunaan')
        ->where('user_id',Auth::id())
        ->where('permintaan_id', $transaksi_id)
        ->first();

        $Source = Source::all();
        return view('petugas.layani', 
        compact(['transaksi_id',
                'permintaan_id',
                'Source',
                'Data'
            ]));
        
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
            'aktif' => 1
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
}
