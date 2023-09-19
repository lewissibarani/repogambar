<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User_Petugas;
use App\Models\Album;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use SebastianBergmann\Environment\Console;
use App\Models\Transaksi;
use App\Models\Gambar;
use App\Models\GambarView;
use App\Models\PembagianTugas;
use App\Models\File;
use App\Models\KoleksiAsset;
use App\Models\Kategori_File;
use Conner\Tagging\Model\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardsController extends Controller
{
   
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */

    public function markNotification(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }

    public function landingpage()
    {  
        $koleksi = Album::with('children.gambar','user','gambar','tagged')->paginate(5);  

        return view('landingpage.landpage' ,
        compact(['koleksi', 
        ]));
    }
    public function maintenance()
    {  
        return view('pages.miscellaneous.maintenance');
    }

    // public function dashboard(Request $request)
    // {
          
    //     //Menampilkan Tags
    //     $Tags= Tag::where('count', '>', 0)->paginate(10);

    //     //Filter Tipe File
    //     $TagsTipeFile= Kategori_File::all();

    //     //Menampilkan Aset Digital Terfavorit
    //     $Terfavorit = Gambar::with('user','source')->orderBy('views', 'desc')->where('booleantayang',1)->get();
        
    //     //Menampilkan Aset Digital Terbaru
    //     $Data = Gambar::with('user','kegunaan','source')
    //     ->orderBy('created_at', 'desc')
    //     ->where('booleantayang', 1)
    //     ->paginate(12); 
       
    //     if ($request->ajax()) { 
    //         $view = view('dashboard.data', compact('Data'))->render();
  
    //         return response()->json(['html' => $view]);
    //     }

    //     return view('dashboard.dashboard',
    //     compact(['Data',
    //              'Tags', 
    //              'Terfavorit',
    //              'TagsTipeFile'
    //     ]));
    // }

    public function dashboard(Request $request)
    {
        //Menampilkan Tags
        $Tags= Tag::where('count', '>', 0)->paginate(10);

        //Filter Tipe File
        $TagsTipeFile= Kategori_File::all();

        //Menampilkan Aset Digital Terfavorit
        $Terfavorit = Gambar::with('user','source')->orderBy('views', 'desc')->where('booleantayang',1)->get();

        
        //Menampilkan Aset Digital Terbaru
        $Data = Gambar::with('user','kegunaan','source')
        ->orderBy('created_at', 'desc')
        ->where('booleantayang', 1)
        ->paginate(20);
        
        if($request->filled('katakunci')){ 

            $this->validate($request, [
                'katakunci' => 'required'
            ]);

            return redirect()->route('result_pencarian',['katakunci' => $request->katakunci,
                                                         'tipeaset'=>$request->tipeasetFilter,
                                                         'tipehasil'=>$request->tipepencarianFilter
                                                        ]);
 
        }

        return view('dashboard.dashboard',
        compact(['Data',
                 'Tags', 
                 'Terfavorit',
                 'TagsTipeFile'
        ]));
    }
    

    public function result_pencarian( $katakunci, $tipe_aset, $tipe_hasil ) 
    {   
         //Menampilkan Tags
         $Tags= Tag::where('count', '>', 0)->paginate(10);

         //Filter Tipe File
         $TagsTipeFile= Kategori_File::all();

        if($tipe_hasil=="Gambar"){
            //mencari berdasarkan judul
            $ResultbyJudul=Gambar::with('file','source')->where('judul','like',"%".$katakunci."%") 
            ->when($tipe_aset!=="null", function($query){
                return $query->where('kategori_file',$tipe_aset);
           }); 

            //mencari berdasarkan Tag kemudian di gabung dengan Result berdasarkan Judul
            $Data=Gambar::with('file','source')->withAnyTag([$katakunci])->union($ResultbyJudul)
            ->where('booleantayang', 1)
            ->orderBy('created_at', 'asc')
             
            ->when($tipe_aset!=="null", function($query){
                return $query->where('kategori_file',$tipe_aset);
           })->paginate(20); 
 
            //Filter
            $Katakunci=$katakunci; 
            
            return view('dashboard.hasilpencarian',
            compact(['Data',
                     'Katakunci',
                     'Tags',  
                     'TagsTipeFile'
            ]));

           

        }else {

            //mencari koleksi berdasarkan judul
            $ResultAlbumbyJudul=Album::with('gambar','children','user')->where('judulalbum','like',"%".$katakunci."%");
            $ResultAlbumbyDeksripsi=Album::with('gambar','children','user')->where('deskripsi','like',"%".$katakunci."%");

            //mencari berdasarkan Tag kemudian di gabung dengan Result berdasarkan Judul
            $DataAlbum=Album::with('gambar','children','user')->withAnyTag([$katakunci])
            ->union($ResultAlbumbyJudul)
            ->union($ResultAlbumbyDeksripsi)
            ->orderBy('created_at', 'asc')
            ->paginate(20);

            //Filter
            $Katakunci=$katakunci;

            return view('dashboard.hasilpencariankoleksi',
            compact(['DataAlbum',
                     'Katakunci',
                     'Tags',  
                     'TagsTipeFile'
            ]));
        }
       
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function hasilPencarian(Request $request)
    {
        $this->validate($request, [
            'katakunci' => 'required'
        ]);
        
        $Katakunci=$request->katakunci;
        $tipe_aset = $request->tipeasetFilter;
        $tipe_hasil = $request->tipepencarianFilter;

        return redirect()->route('result_pencarian',['katakunci'=> $Katakunci,
                                                     'tipeaset'=> $tipe_aset,
                                                     'tipehasil'=> $tipe_hasil,]);
        
    }


    public function viewGambar ($gambar_id)
    {

        //Daftar Koleksiku
        $Album= Album::with('user','gambar','children','parents')->where('creatorid',Auth::id())->get();

        // Catat View Gambar
        $gambar = Gambar::with('user')->find($gambar_id);
 

        if($gambar->showGambar()){// this will test if the user viwed the gambar or not
        // return $gambar;
        }

        $gambar->increment('views');//I have a separate column for views in the gambar table. This will increment the views column in the gambars table.
      

        GambarView::createViewLog($gambar); 
        // End of View gambar

        $Data = Gambar::with('user','source','kegunaan','file')->where('id',$gambar_id)->first();
        $Transaksi=Transaksi::with('gambar')->where('gambar_id',$gambar_id)->first();
        // Mencari item dengan tag yang sama untuk dijadikan rekomendasi
        $Rekomendasi= Gambar::withAnyTag($Data->tagNames())->paginate(3);

        //Start Read The Notification  
        $Notifikasi = DB::table('notifications')->where(
            [
                ['type', '=', 'App\Notifications\PetugasNotification']
            ]
        )->get();
        
        foreach ($Notifikasi as $notification) {  
            if(json_decode($notification->data)->kode_permintaan_id==$Transaksi->id_permintaan)
            {
                $Notifikasi = DB::table('notifications')->where('id', $notification->id)
                ->update([  'read_at' => date("Y-m-d H:i:s")]);
            }
        }
        //End Read The Notification
        
        return view('dashboard.detailgambar', 
        compact([   'Data',
                    'Album',
                    'Rekomendasi',
                    'Transaksi'
                ]));
        
    }

    public function downloadGambar ($gambar_id)
    {   
        
      

        $gambar = Gambar::find($gambar_id); 

        $gambar->increment('download');  
        $gambarname= $gambar->nama_gambar;
        $url = Storage::disk('s3')->url('storage/uploadedGambar/'.$gambarname); 
        
        return response()->streamDownload(function ()  use ($url){
            echo file_get_contents($url);
        },$gambarname); 

 
    } 

    public function downloadFile ($file_id)
    {  
        $file = File::find($file_id); 

        $file->increment('download'); 

        $filename= $file->nama_file; 
        $url = Storage::disk('s3')->url('storage/file/'.$filename); 

        return response()->streamDownload(function ()  use ($url){
            echo file_get_contents($url);
        },$filename); 
    } 

    public function puttoalbum (Request $request)
    {  
        $Notifikasi = Gambar::where('id', $request->gambar_id)
        ->update([  'album_id' => $request->album_id]);
        
        return redirect()->route('dashboard.detailgambar',['gambar_id' => $request->gambar_id]);

    } 

    public function statistik ()
    {   
        // Flight::chunk(200, function ($flights) {
        //     foreach ($flights as $flight) {
        //         //
        //     }
        // });
        // $Gambar = Gambar::with('user','source','kegunaan','file')->where('id',$gambar_id)->first();
        // $File = File::with('user','source','kegunaan','file')->where('id',$gambar_id)->first();

        // $file->increment('download');  
        // $path= $file->path; 
        // return view('dashboard.statistik', 
        // compact(['Data',
        //         'Rekomendasi'
        //         ]));
    } 
}
