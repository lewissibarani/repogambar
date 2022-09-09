<?php

namespace App\Http\Controllers;

use App\Models\Kegunaan;
use App\Models\Transaksi;
use App\Models\PembagianTugas;
use App\Models\User_Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class KelolaGambarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function daftar_permintaan()
    {
        $data = Transaksi::with('kegunaan','user','status','gambar')
        ->where('idUserPeminta', Auth::id())->get();

        // Membuat Json hasil query
        $json = json_encode(array(
            "data" =>$data));
            return $json;
    }

    public function index ()
    {

        $Data = Transaksi::with('kegunaan','user','status','gambar')
        ->where('idUserPeminta', Auth::id())->get();

        // Membuat Json hasil query
        // $json = json_encode(array(
        //     "data" =>$data));
        //     return $json;

        //Populate Option kegunaan untuk form permintaan
        $Kegunaan = Kegunaan::all();
        return view('kelolagambar.index', compact('Kegunaan','Data'));
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

        //---start proses pemberian id permintaan
        $kodesatker = Auth::user()->kodesatker;
        $digiterakhir_idpermintaan= $this->pemberian_id_permintaan($kodesatker);
        $id_permintaan = $kodesatker.$digiterakhir_idpermintaan;
        //---end proses pemberian id permintaan

        $this->validate($request, [
            'judulPermintaan' => 'required',
            'linkPermintaan' => 'required|max:255',
            'idkegunaan' => 'required',
        ]);

        $create_transaksi=Transaksi::create([
            'judulPermintaan' => $request->judulPermintaan,
            'linkPermintaan' => $request->linkPermintaan,
            'idKegunaan' => $request->idkegunaan,
            'idUserPeminta' => $idpeminta,
            'idStatus' => 1,
            'kegunaan_lainnya' => $request->kegunaan_lainnya,
            'id_permintaan' => $id_permintaan
        ]);
        
        //start of distribusi petugas
        $petugas = User_Petugas::where('aktif',1)->orderBy('updated_at', 'asc')->first();
        $count_task = $petugas->count_task +1;
        $petugas->update(['count_task' => $count_task]);
        $petugas_id=$petugas->users_id;

        PembagianTugas::create([
            'permintaan_id' => $create_transaksi->id,
            'seenboolean' => '0',
            'user_id' =>$petugas_id,
        ]);
        //end of distribusi tugas
        
        return redirect()->route('kelolagambar.index')->with('message','Permintaan Berhasil Dibuat.');
    }

    private function pemberian_id_permintaan($kodesatker)
    {   
        $lastnumber=0;
        $permintaan = Transaksi::where(DB::raw('substr(id_permintaan, 1, 4)'), '=' , $kodesatker)->latest("id")->first();
        if($permintaan!=null)
        {
            $lastnumber_2 = $permintaan->id_permintaan;
            $sisa_digit_terakhir = substr($lastnumber_2, 4);
            $lastnumber = $sisa_digit_terakhir +1;
        }

        return $lastnumber;
    }

    private function distribusiTugas($permintaan_baru)
    {
        // $permintaan_baru = 
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
