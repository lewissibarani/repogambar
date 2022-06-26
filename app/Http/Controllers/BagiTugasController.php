<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegunaan;
use App\Models\Transaksi;

class BagiTugasController extends Controller
{
    public function index ()
    {
        // Mengambil data didatabase
        $data = Transaksi::with('user','pembagiantugas')->get();

        // Membuat Json hasil query
        $json = json_encode(array(
            "data" =>$data));
        if (file_put_contents(public_path()."/json/PembagianTugas.json", $json))
        
        return view('bagipetugas.index');
    }
}
