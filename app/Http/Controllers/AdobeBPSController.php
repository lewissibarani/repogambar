<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Namasatker; 
use App\Models\Bulan; 
use App\Models\AdobeDokumen; 
use App\Models\AdobePJ; 
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
        $Data_Laporan   = null;
        $Data_BAST      = null;
        $persentase_pemanfaatan = null;
        $userkodesatker = Auth::user()->kodesatker; 
        $adobepj        = AdobePJ::with('getnamasatker')->where('kodesatkerid',Auth::user()->kodesatker)->get();  
        //cek apakah satker yang login dapat adobe atau tidak
        if(!is_null($adobepj))
        {
            $Data_Laporan = AdobeTransaksiKuesioner::with('user','periode','bulan')
            ->where('kodesatkerid', '=', Auth::user()->kodesatker)
            ->where('periodeid', '=', 1)  
            ->orderBy('updated_at','DESC')
            ->get();

            $pembilang_pemanfaatan = DB::table('adobe_transaksi_kuesioner')
             ->select(DB::raw('count(*) as bulan'))
             ->where('kodesatkerid', '=', Auth::user()->kodesatker)
             ->groupBy('bulanid')
             ->get()
             ->count();
            $pembagi = 12;
            $persentase_pemanfaatan =  round($pembilang_pemanfaatan/$pembagi);

            $Data_BAST = AdobeTransaksiBAST::with('user','periode','dokumen')
            ->where('kodesatkerid', '=', Auth::user()->kodesatker) 
            ->where('periodeid', '=', 1)  
            ->orderBy('updated_at','DESC')->first();
        }

        //Dokumen Bulan
        $Bulan = Bulan::all(); 

        return view('adobebps.index',compact('adobepj','Data_Laporan','Bulan','Data_BAST','persentase_pemanfaatan'));   
    } 
    
    public function storelaporan(Request $request)
    {  
        $this->validate($request, [
            'memakaiadobe' => 'required',  
        ]);

        $res = [];  

            DB::beginTransaction();
                try {   
                   //record database  
                    $fileDokumen = AdobeTransaksiKuesioner::create([
                    'userid' => Auth::id(),
                    'periodeid' => 1,
                    'bulanid' => $request->idbulan,
                    'kodesatkerid' => Auth::user()->kodesatker,
                    'memakaiadobe'=>$request->memakaiadobe,
                    'acrobat'=>$request->acrobat,
                    'aero'=>$request->aero, 
                    'aftereffect'=>$request->aftereffect,
                    'animate'=>$request->animate,
                    'audition'=>$request->audition,
                    'dimension'=>$request->dimension,
                    'dreamweaver'=>$request->dreamweaver,
                    'express'=>$request->express,
                    'fresco'=>$request->fresco,
                    'illustrator'=>$request->illustrator,
                    'incopy'=>$request->incopy,
                    'indesign'=>$request->indesign,
                    'lightroom'=>$request->lightroom,
                    'photoshop'=>$request->photoshop,
                    'premierepro'=>$request->premierepro,
                    'premiererush'=>$request->premiererush,
                    'xd'=>$request->xd,
                    'publikasi'=>$request->publikasi,
                    'brs'=>$request->brs,
                    'infografis'=>$request->infografis,
                    'flyer_vb'=>$request->flyer_vb,
                    'spanduk'=>$request->spanduk,
                    'video'=>$request->video,
                    'website'=>$request->website,
                    'dashboard'=>$request->dashboard,
                    'suratdokumen'=>$request->suratdokumen,
                    'lainnya'=>$request->lainnya,
                    'jumlah_lain'=>$request->jumlah_lain,
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

    public function storeeditlaporan(Request $request)
    {  
        $this->validate($request, [
            'memakaiadobe' => 'required',  
        ]);
        $res = [];  

            DB::beginTransaction();
                try {   
                    $fileDokumen = AdobeTransaksiKuesioner::find($request->idkuesioner); 

                   //record database      
                    $fileDokumen->memakaiadobe = $request->memakaiadobe;
                    $fileDokumen->acrobat = $request->acrobat;
                    $fileDokumen->aero = $request->aero;
                    $fileDokumen->aftereffect = $request->aftereffect;
                    $fileDokumen->animate=$request->animate;
                    $fileDokumen->audition=$request->audition;
                    $fileDokumen->dimension=$request->dimension;
                    $fileDokumen->dreamweaver=$request->dreamweaver;
                    $fileDokumen->express=$request->express;
                    $fileDokumen->fresco=$request->fresco;
                    $fileDokumen->illustrator=$request->illustrator;
                    $fileDokumen->incopy=$request->incopy;
                    $fileDokumen->indesign=$request->indesign;
                    $fileDokumen->lightroom=$request->lightroom;
                    $fileDokumen->photoshop=$request->photoshop;
                    $fileDokumen->premierepro=$request->premierepro;
                    $fileDokumen->premiererush=$request->premiererush;
                    $fileDokumen->xd=$request->xd;
                    $fileDokumen->publikasi=$request->publikasi;
                    $fileDokumen->brs=$request->brs;
                    $fileDokumen->infografis=$request->infografis;
                    $fileDokumen->flyer_vb=$request->flyer_vb;
                    $fileDokumen->spanduk=$request->spanduk;
                    $fileDokumen->video=$request->video;
                    $fileDokumen->website=$request->website;
                    $fileDokumen->dashboard=$request->dashboard;
                    $fileDokumen->suratdokumen=$request->suratdokumen;
                    $fileDokumen->lainnya=$request->lainnya;
                    $fileDokumen->jumlah_lain=$request->jumlah_lain; 

                    $timestamp_from_array = date('Y-m-d h:i:s');
                    $fileDokumen->updated_at=date('Y-m-d h:i:s' , strtotime( $timestamp_from_array ) + 7 * 3600 ); 
                    $fileDokumen->save();
                    DB::commit();
                    // all good
                    $res = ['message' => 'Data updated!'];

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
    public function indexstatistik()
    {
         //Data BAST
        //  $Data = AdobePJ::select('*')->groupBy('kodesatkerid')->select('kodesatkerid', DB::raw('count(*) as total'))->get();  
        $Data = AdobePJ::with('getnamasatker','getAdobeTransaksiBAST','getAdobeTransaksiBAST.dokumen')->get();  
        $Provinsi = Namasatker::orderBy('kodesatker')->get();
        $DataBAST = AdobeTransaksiBAST::with('user','dokumen','periode')->get();
        $CountLisensi = $Data->count();

        //data nama provinsi 
        $provinsi_array = []; 
        foreach($Provinsi as $provinsi){
            if(substr($provinsi->kodesatker, -2)=="00"){
                $string = $provinsi->namasatker;
                $string1 = str_replace("BADAN PUSAT STATISTIK", "", $string);
                $string2 = str_replace("PROP. ", "", $string1); 
                $string3 = str_replace("KEPULAUAN", "KEP.", $string2); 
                array_push($provinsi_array,$string3);
            }
            
        }

        //datachartbast
        // $array_data_bast = [];
        // foreach($Provinsi as $databast_provinsi)
        // {   
        //     $kodesatker = $databast_provinsi->kodesatker;
        //     if(substr($databast_provinsi->kodesatker, -2)=="00"){
        //         $check = AdobeTransaksiBAST::where('kodesatker','=',$kodesatker)->first();
        //         if(!$check){
        //             array_push($array_data_bast,0);
        //         } else {
        //             $getallprovinsi = AdobeTransaksiBAST::where('kodesatker','=',$kodesatker)->get();

        //             $pembilang = ; 

        //             $pembagi = ;
        //             $hasil = ;
        //             array_push($array_data_bast,$string3);
        //         }
        //     }
           
        // }

        // $array_data_bast = [];
        // foreach( $DataBAST as $databast){
        //     array_push($array_data_bast,$databast->getAdobeTransaksiBAST-> ?? '0');
        // }
        // $string = $datas->getnamasatker->namasatker ?? '';  
        // 

        // Replace this with your actual data retrieval logic
        $piechart1 = [ 
            'labels' => ['Belum Kirim', 'Sudah Kirim'],
            'data' => [70, 30,],
        ];

        $piechart2 = [ 
            'labels' => ['Belum Kirim', 'Sudah Kirim'],
            'data' => [70, 30,],
        ];

        //data chart
        $bulan_array = [];
        $Bulan = Bulan::all();
        foreach($Bulan as $bulan){
            array_push($bulan_array,$bulan->namabulan);
        }
 
        //backgroundColor
        $warna1="#1ddba9";
        $warna2="#4a3dff"; 
        $backgroundColor=[];
        $warna="";  

        foreach($bulan_array as $warnabulan){  
            if($warna=="#1ddba9" ){
                array_push($backgroundColor,$warna2);
                $warna=$warna2;
            } else { 
            array_push($backgroundColor,$warna1);
            $warna=$warna1;  
            }
        } 
        
        $dataradar = [
            'labels' => ['Category A', 'Category B', 'Category C', 'Category D', 'Category E','Category A', 'Category B', 'Category C', 'Category D', 'Category E'],
            'data' => [25, 30, 15, 10, 20,25, 30, 15, 10, 20],
        ];

        $data = [
            'labels' => $bulan_array,
            'data' => [65, 59, 80, 81, 56,65, 59, 80, 81, 56, 81, 56],
            'backgroundColor' => $backgroundColor,
        ];

        $dataprovinsi = [
            'labels' => $provinsi_array,
            'data' => [65, 59, 80, 81, 56,65, 59, 80, 81, 56, 81, 56],
        ];

         return view('adobebps.indexstatistik',
                compact('Data','data','CountLisensi','dataprovinsi','piechart1','piechart2','dataradar'));   
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
                    $file_name=date('Y_m_d_H_i_s').'BAST_'.Auth::user()->kodesatker."_".Auth::user()->name."_2024.pdf";
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
                    'kodesatkerid' => Auth::user()->kodesatker, 
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
 
    public function sync(){ 
       
        $adobepj = AdobeTransaksiBAST::with('user')->get();
        foreach ($adobepj as $pj){

            $kodesatker = $pj->user->kodesatker;
            $kodesatker_trim =  $kodesatker;
            if( strlen($kodesatker)==12){
                $kodesatker_trim = substr($kodesatker, 0,4);
                if($kodesatker_trim=="0000"){
                    $kodesatker_trim=substr($kodesatker,-5);
                }
            }  
            $pj->update(['kodesatkerid' => $kodesatker_trim]);
        }

       
    }
}
