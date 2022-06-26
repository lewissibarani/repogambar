<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegunaan;
use App\Models\Transaksi;

class AdminController extends Controller
{
    public function index ()
    {
        // Mengambil data didatabase
        $data = Transaksi::with('kegunaan','user')->get();

        // Membuat Json hasil query
        $json = json_encode(array(
            "data" =>$data));
        if (file_put_contents(public_path()."/json/Permintaan.json", $json))
        
        return view('admin.index', compact('Kegunaan'));
    }
}
