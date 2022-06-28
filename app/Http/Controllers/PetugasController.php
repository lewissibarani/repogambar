<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegunaan;
use App\Models\Transaksi;

class PetugasController extends Controller
{
    public function index ()
    {
        // Mengambil data didatabase
        $data = Transaksi::with('kegunaan','user')
        ->where('idUserPeminta', Auth::id())->get();

        // Membuat Json hasil query
        $json = json_encode(array(
            "data" =>$data));
        if (file_put_contents(public_path()."/json/Tugas.json", $json))
        
        return view('petugas.index', 
        // compact('Kegunaan')
    );
    }
}
