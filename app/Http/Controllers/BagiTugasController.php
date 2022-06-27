<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegunaan;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\PembagianTugas;

class BagiTugasController extends Controller
{
    public function index ()
    {
        $Users = User::where('level',3)->get();

        // Mengambil data didatabase
        $data = Transaksi::with('user','pembagiantugas','pembagiantugas.user','kegunaan')->get();

        // Membuat Json hasil query
        $json = json_encode(array(
            "data" =>$data));
        if (file_put_contents(public_path()."/json/PembagianTugas.json", $json))

        return view('bagipetugas.index',compact('Users'));
    }

    public function store (Request $request)
    {
        $request->validate([
            'user_id' => ['required','numeric'],
        ]);

        PembagianTugas::create([
            'permintaan_id' => $request->idalokasipetugas,
            'seenboolean' => '0',
            'user_id'=> $request->user_id
        ]);

        return redirect()->route('bagipetugas.index')->withStatus(__('Permintaan Berhasil Dibuat.'));
    }
    
}
