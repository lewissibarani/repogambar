<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Bulan; 
use App\Models\AdobeDokumen; 
use App\Models\AdobePeriode; 
use App\Models\AdobeTransaksiBAST;
use App\Models\AdobeJenisDokumen;
use App\Models\AdobeTemplatDokumen;
use App\Models\AdobeTransaksiKuesioner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class AdobeBPSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 

        $User=User::find(Auth::id()); 

        //Dokumen Bulan
        $Bulan = Bulan::all();

        //Daftar Adobe Dokumen Laporan
        $Data_Laporan = AdobeTransaksiKuesioner::with('user','periode','bulan')
                        ->where('userid', '=', Auth::id())
                        ->where('periodeid', '=', 1)  
                        ->orderBy('updated_at','DESC')
                        ->get();

        //Daftar Adobe Dokumen BAST
        $Data_BAST = AdobeTransaksiBAST::with('user','periode','dokumen')
                                ->where('userid', '=', Auth::id())
                                ->where('periodeid', '=', 1)  
                                ->orderBy('updated_at','DESC')->first();

        return view('adobebps.index',compact('Data_Laporan','User','Bulan','Data_BAST'));   
    } 
    
    public function storelaporan(Request $request)
    {  
        $this->validate($request, [
            'pertanyaan1' => 'required', 
            'pertanyaan2' => 'required', 
        ]);

        $res = [];  

            DB::beginTransaction();
                try {  
                   //record database  
                    $fileDokumen = AdobeTransaksiKuesioner::create([
                    'userid' => Auth::id(),
                    'periodeid' => 1,
                    'bulanid' => $request->idbulan,
                    'apakahmemakaiadobe'=>$request->pertanyaan1,
                    'memakaiadobeuntukapa'=>$request->pertanyaan2
                    ]);

                    DB::commit();
                    // all good
                    $res = ['message' => 'Data inserted!'];

                } catch (\Exception $e) { 
                    DB::rollback();
                    $res = ['message' => $e->getMessage()];
                    // something went wrong
                } 
        
        return redirect()->route('adobebps.index')->with($res); 
    }

    public function templatelaporan()
    {  
        //Data User
        $Data=AdobeTemplatDokumen::with('getuser')->get();


        return view('adobebps.indextemplatdokumen',compact('Data'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //Data User
         $User=User::find(Auth::id());


         return view('adobebps.index',compact('User'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploaddokumenstore(Request $request)
    { 
        $this->validate($request, [
            'namadokumen' => 'required', 
            'filedokumen' => 'mimes:docx,pdf|file|max:30000',  
        ]);

        $res = []; 
       
        if($request->file('filedokumen')){ 

            DB::beginTransaction();
                try {
                    $file_name=date('Y_m_d_H_i_s').$request->file('filedokumen')->getClientOriginalName();
                    $file = $request->file('filedokumen'); 

                    //menyimpan file original 
                    $file_path = Storage::disk('s3')->putFileAs('storage/file/',$file,$file_name); 
                    $url_file = Storage::disk('s3')->url('storage/file/'.$file_name); 

                   //record database  
                    $fileDokumen = AdobeTemplatDokumen::create([
                    'jenisdokumen' => $request->namadokumen,
                    'path' => $url_file,
                    'uploadedby'=>Auth::id()
                    ]);

                    DB::commit();
                    // all good
                    $res = ['message' => 'Data inserted!'];

                } catch (\Exception $e) {
                    Storage::disk('s3')->delete($url_file);
                    DB::rollback();
                    $res = ['message' => $e->getMessage()];
                    // something went wrong
                }
 
           
        }
        
        return redirect()->route('adobebps.templatelaporan')->with($res);
    }

    public function storeBAST(Request $request)
    {
        $this->validate($request, [ 
            'bast_input' => 'mimes:pdf|file|max:30000',  
        ]);

        $res = []; 
       
        if($request->file('bast_input')){ 

            DB::beginTransaction();
                try {
                    $file_name=date('Y_m_d_H_i_s').'BAST_'.Auth::user()->kodesatker."_".Auth::user()->name."_2024";
                    $file = $request->file('bast_input'); 

                    //menyimpan file original 
                    $file_path = Storage::disk('s3')->putFileAs('storage/file/',$file,$file_name); 
                    $url_file = Storage::disk('s3')->url('storage/file/'.$file_name); 

                   //record database  
                    $fileDokumen = AdobeDokumen::create([
                    'jenisdokumenid' => 1,
                    'path' => $url_file,
                    'filename'=>'BAST_'.Auth::user()->kodesatker."_".Auth::user()->name."_2024",
                    ]);

                   //record transaksi  
                    $transaksi = AdobeTransaksiBAST::create([
                    'dokumenid' => $fileDokumen->id,
                    'userid' => Auth::id(),
                    'periodeid' => 1, 
                    ]);

                    DB::commit();
                    // all good
                    $res = ['message' => 'Data inserted!'];

                } catch (\Exception $e) {
                    Storage::disk('s3')->delete($url_file);
                    DB::rollback();
                    $res = ['message' => $e->getMessage()];
                    // something went wrong
                }
 
           
        }
        
        return redirect()->route('adobebps.index')->with($res);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
