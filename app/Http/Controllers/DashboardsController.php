<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
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

class DashboardsController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $Data = Gambar::with('user','transaksi','kegunaan','source')
        ->get();

        return view('dashboard.dashboard',
        compact(['Data'
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
        return view('dashboard.hasilpencarian');
    }

    public function viewGambar(Request $request)
    {
        return view('dashboard.detailgambar');
    }
}
