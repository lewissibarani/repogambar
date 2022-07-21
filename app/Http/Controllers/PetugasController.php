<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegunaan;
use App\Models\Transaksi;
use App\Models\Gambar;
use App\Models\PembagianTugas;
use Illuminate\Support\Facades\Auth;
use App\Models\Source;

class PetugasController extends Controller
{
    private function image_resize($file_name, $width, $height, $crop=FALSE) {
        list($wid, $ht) = getimagesize($file_name);
        $r = $wid / $ht;
        if ($crop) {
           if ($wid > $ht) {
              $wid = ceil($wid-($width*abs($r-$width/$height)));
           } else {
              $ht = ceil($ht-($ht*abs($r-$w/$h)));
           }
           $new_width = $width;
           $new_height = $height;
        } else {
           if ($width/$height > $r) {
              $new_width = $height*$r;
              $new_height = $height;
           } else {
              $new_height = $width/$r;
              $new_width = $width;
           }
        }
        $source = imagecreatefromjpeg($file_name);
        $dst = imagecreatetruecolor($new_width, $new_height);
        image_copy_resampled($dst, $source, 0, 0, 0, 0, $new_width, $new_height, $wid, $ht);
        return $dst;
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
            $img_to_resize = image_resize(public_path('img/uploadedGambar/'.$filename), 250, 250);
            $img_to_resize-> move(public_path('img/thumbnail/'), $filename);
        }
        
        $gambars=Gambar::create([
            'judul' => $request->judul,
            'link' => $request->link,
            'idKegunaan' => $request->idKegunaan,
            'idUser' => Auth::id(),
            'path' =>'img/uploadedGambar/'.$filename,
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
        ->update(['gambar_id' => $request->id,
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

    
}
