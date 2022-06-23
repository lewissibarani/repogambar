<?php

namespace App\Http\Controllers;

use App\Models\Kegunaan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class KelolaGambarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        // Mengambil data didatabase
        $data = Transaksi::with('kegunaan','user')
        ->where('idUserPeminta', Auth::id())->get();

        // Membuat Json hasil query
        $json = json_encode(array(
            "data" =>$data));
        if (file_put_contents(public_path()."/json/kelolagambar.json", $json))

        //Populate Option kegunaan untuk form permintaan
        $Kegunaan = Kegunaan::all();

        return view('kelolagambar.index', compact('Kegunaan','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idpeminta= Auth::id();
        $request->validate([
            'judulPermintaan' => ['required'],
            'linkPermintaan' => ['required'],
            'idkegunaan' => ['required'],
        ]);
        DB::table('permintaan')->insert([
            'judulPermintaan' => $request->judulPermintaan,
            'linkPermintaan' => $request->linkPermintaan,
            'idkegunaan' => $request->idkegunaan,
            'idUserPeminta' => $idpeminta,
            'idStatus' => 1,
            'created_at' => date('d-m-y h:i:s')
        ]);

        return redirect()->route('kelolagambar.index')->withStatus(__('Permintaan Berhasil Dibuat.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kegunaan  $kegunaan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegunaan $kegunaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegunaan  $kegunaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegunaan $kegunaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kegunaan  $kegunaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kegunaan $kegunaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegunaan  $kegunaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegunaan $kegunaan)
    {
        //
    }
}
