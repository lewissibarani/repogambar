<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User_Petugas;
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
        return view('landingpage.landpage');
    }
    public function maintenance()
    {  
        return view('pages.miscellaneous.maintenance');
    }

    public function dashboard()
    {
        
        //menampilkan penyumbang gambar
        // $Users = User_Petugas::with('users')->paginate(5); 

        //Menampilkan Tags
        $Tags= Tag::where('count', '>', 0)->paginate(10);

        //Menampilkan Aset Digital Terfavorit
        $Terfavorit = Gambar::with('user','source')->orderBy('views', 'desc')->where('booleantayang',1)->get();
        
        //Menampilkan Aset Digital Terbaru
        $Data = Gambar::with('user','kegunaan','source')
        ->orderBy('created_at', 'asc')
        ->where('booleantayang', 1)
        ->paginate(6);

        // if ($request->ajax()) {
        //     $view = view('dashboard.data', compact('Data'))->render();
  
        //     return response()->json(['html' => $view]);
        // }

        return view('dashboard.dashboard',
        compact(['Data',
                 'Tags', 
                 'Terfavorit'
        ]));
    }
    

    public function result_pencarian($katakunci)
    {
        //mencari berdasarkan judul
        $ResultbyJudul=Gambar::with('file','source')->where('judul','like',"%".$katakunci."%");

        //mencari berdasarkan Tag kemudian di gabung dengan Result berdasarkan Judul
        $Data=Gambar::withAnyTag([$katakunci])
        ->union($ResultbyJudul)
        ->orderBy('created_at', 'asc')
        ->get();
        $Katakunci=$katakunci;
        return view('dashboard.hasilpencarian',
        compact(['Data',
                 'Katakunci'
        ]));
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
        return redirect()->route('result_pencarian',['katakunci'=> $Katakunci]);
        
    }

    public function hasilPencarian_(Request $request)
    {
        $this->validate($request, [
            'katakunci_' => 'required'
        ]);
        
        $Katakunci=$request->katakunci_;
        return redirect()->route('result_pencarian',['katakunci'=> $Katakunci]);
        
    }


    public function viewGambar ($gambar_id)
    {
        // Catat View Gambar
        //Some bits from the following query ("category", "user") are made for my own application, but I felt like leaving it for inspiration. 
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
        compact(['Data',
                'Rekomendasi'
                ]));
        
    }

    public function downloadGambar ($gambar_id)
    {  
        $gambar = Gambar::find($gambar_id); 

        $gambar->increment('download');  
        $path= $gambar->path;
  
         
        return response()->download($path); 
    } 

    public function downloadFile ($file_id)
    {  
        $file = File::find($file_id); 

        $file->increment('download');  
        $path= $file->path; 
        return response()->download($path); 
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
