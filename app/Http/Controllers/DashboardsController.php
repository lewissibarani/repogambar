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
use App\Models\PembagianTugas;
use Conner\Tagging\Model\Tag;

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

    public function dashboard()
    {

        //menampilkan penyumbang gambar
        $Users = User_Petugas::with('users')->paginate(4);

        //Menampilkan Tags
        $Tags= Tag::where('count', '>', 0)->paginate(12);
        $Data = Gambar::with('user','kegunaan','source')
        ->orderBy('created_at', 'desc')
        ->get();

        return view('dashboard.dashboard',
        compact(['Data',
                 'Tags',
                 'Users'
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
        
        $Data = Gambar::with('user','source','kegunaan','file')->where('id',$gambar_id)->first();

        // Mencari item dengan tag yang sama untuk dijadikan rekomendasi
        $Rekomendasi= Gambar::withAnyTag($Data->tagNames())->paginate(3);

        return view('dashboard.detailgambar', 
        compact(['Data',
                'Rekomendasi'
                ]));
        
    }
}
