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
use App\Models\AdobeTransaksiPJ;
use App\Models\AdobeJenisDokumen;
use App\Models\AdobeTemplatDokumen;
use App\Models\AdobeTransaksiKuesioner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PengajuanGantiPJ;
use App\Notifications\ResponPengajuanGantiPJ;



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
        $UserPJSatker   = User::where('kodesatker',Auth::user()->kodesatker)->get();
        $adobepj        = AdobePJ::with('getnamasatker','getuser')->where('kodesatkerid',Auth::user()->kodesatker)->get();  
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
             ->where(['kodesatkerid' => Auth::user()->kodesatker,
                     'memakaiadobe' => '1']) 
             ->groupBy('bulanid')
             ->get()
             ->count();
            $pembagi = 12; 
            $persentase_pemanfaatan =  round($pembilang_pemanfaatan/$pembagi*100);

            $Data_BAST = AdobeTransaksiBAST::with('user','periode','dokumen')
            ->where('kodesatkerid', '=', Auth::user()->kodesatker) 
            ->where('periodeid', '=', 1)  
            ->orderBy('updated_at','DESC')->first(); 
        }

        //Dokumen Bulan
        $Bulan = Bulan::all(); 

        return view('adobebps.index',compact('UserPJSatker','adobepj','Data_Laporan','Bulan','Data_BAST','persentase_pemanfaatan'));   
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
        $Periode = AdobePeriode::latest()->take(1)->first();
        $Periode_id = $Periode->id; 

         //Data BAST  dan Laporan Pemanfaatan
        $Data = AdobePJ::with('getnamasatker','getAdobeTransaksiBAST','getAdobeTransaksiBAST.dokumen','transaksikuesioner')->get();
        $Data_Laporan_Pemanfaatan = AdobePJ::with('getnamasatker','getAdobeTransaksiBAST','getAdobeTransaksiBAST.dokumen','transaksikuesioner')->distinct()->get(['kodesatkerid']);
        $jumlahlisensi = AdobePJ::with('getnamasatker','getAdobeTransaksiBAST','getAdobeTransaksiBAST.dokumen','transaksikuesioner')->get()->count();
        $jumlahtotalbast =  DB::table('adobe_pj')
        ->selectRaw('kodesatkerid as Satker_id')
        ->groupBy('kodesatkerid') 
        ->get()
        ->count(); 
        
        $jumlahuploadbast = DB::table('adobe_transaksi_bast')
        ->selectRaw('kodesatkerid as Satker_id')
        ->groupBy('kodesatkerid') 
        ->get()
        ->count();

        //Query Buat Drowdown BAST
        $rightjoinquery = DB::table('adobe_transaksi_bast')
            ->selectRaw('count( DISTINCT adobe_transaksi_bast.kodesatkerid) as jumlah_bast_upload, count( DISTINCT namasatker) as jumlah_bast_total, max(kodeeselondua) as kodeeselondua , max(namaeselondua) as namaeselondua')
            ->rightJoin('namasatker', 'namasatker.kodesatker', '=', 'adobe_transaksi_bast.kodesatkerid')
            ->rightjoin ('adobe_pj' , 'adobe_pj.kodesatkerid', '=', 'namasatker.kodesatker')
            ->groupBy('kodeeselondua') 
            ->get();
         
        

        $Bulan = Bulan::all();
        $Provinsi = Namasatker::with('getAdobeTransaksiBAST_Many')->orderBy('kodesatker')->get();
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
   
        $bulan_array = [];
        $Bulan = Bulan::all();
        foreach($Bulan as $bulan){
            array_push($bulan_array,$bulan->namabulan);
        }

        //Setting Chart Bar supaya menampilkan data pemanfaatan selindo
        $unikSatker  = DB::table('adobe_pj')
        ->selectRaw('min( adobe_pj.kodesatkerid) as Kodesatker, max(namasatker) as Namasatker')
        ->Join('namasatker', 'namasatker.kodesatker', '=', 'adobe_pj.kodesatkerid') 
        ->groupBy('kodesatkerid') 
        ->get();  
        
        $RAWQUERY_datapenggunaan_data_selindo = DB::table('adobe_transaksi_kuesioner')
        ->selectRaw('   MAX(userid) as userid,
                        MAX(kodesatkerid) as kodesatkerid,
                        sum(acrobat) as Acrobat,
                        sum(aero) as Aero,
                        sum(aftereffect) as Aftereffect,
                        sum(animate) as Animate,
                        sum(audition) as Audition,
                        sum(dimension) as Dimension,
                        sum(dreamweaver) as Dreamweaver,
                        sum(express) as Express,
                        sum(fresco) as Fresco,
                        sum(illustrator) as Illustrator,
                        sum(incopy) as Incopy,
                        sum(indesign) as Indesign,
                        sum(lightroom) as Lightroom,
                        sum(photoshop) as Photoshop,
                        sum(premierepro) as Premierepro,
                        sum(premiererush) as Premiererush,
                        sum(xd) as Xd
                    ') 
            ->where('periodeid', '=', $Periode_id)  
            ->groupBy('userid') ;

            //buat data selindo
            $datapenggunaan_data_selindo = DB::table($RAWQUERY_datapenggunaan_data_selindo)
            ->selectRaw('   MAX(userid) as userid, 
                            MAX(kodesatkerid) as kodesatkerid, 
                            count(acrobat) as Acrobat,
                            count(aero) as Aero,
                            count(aftereffect) as Aftereffect,
                            count(animate) as Animate,
                            count(audition) as Audition,
                            count(dimension) as Dimension,
                            count(dreamweaver) as Dreamweaver,
                            count(express) as Express,
                            count(fresco) as Fresco,
                            count(illustrator) as Illustrator,
                            count(incopy) as Incopy,
                            count(indesign) as Indesign,
                            count(lightroom) as Lightroom,
                            count(photoshop) as Photoshop,
                            count(premierepro) as Premierepro,
                            count(premiererush) as Premiererush,
                            count(xd) as Xd
                        ')->get();

            //buat diolah lagi untuk dapat per satker
            $datapenggunaan_data_selindo_per_satker = DB::table($RAWQUERY_datapenggunaan_data_selindo)
            ->selectRaw('   MAX(userid) as userid, 
                            MAX(kodesatkerid) as kodesatkerid, 
                            count(acrobat) as Acrobat,
                            count(aero) as Aero,
                            count(aftereffect) as Aftereffect,
                            count(animate) as Animate,
                            count(audition) as Audition,
                            count(dimension) as Dimension,
                            count(dreamweaver) as Dreamweaver,
                            count(express) as Express,
                            count(fresco) as Fresco,
                            count(illustrator) as Illustrator,
                            count(incopy) as Incopy,
                            count(indesign) as Indesign,
                            count(lightroom) as Lightroom,
                            count(photoshop) as Photoshop,
                            count(premierepro) as Premierepro,
                            count(premiererush) as Premiererush,
                            count(xd) as Xd
                        ')->groupBy('kodesatkerid')->get();

        $datapenggunaan_data=[$datapenggunaan_data_selindo[0]->Acrobat,
                              $datapenggunaan_data_selindo[0]->Aero,
                              $datapenggunaan_data_selindo[0]->Aftereffect,
                              $datapenggunaan_data_selindo[0]->Animate,
                              $datapenggunaan_data_selindo[0]->Audition,
                              $datapenggunaan_data_selindo[0]->Dimension,
                              $datapenggunaan_data_selindo[0]->Dreamweaver,
                              $datapenggunaan_data_selindo[0]->Express,
                              $datapenggunaan_data_selindo[0]->Fresco,
                              $datapenggunaan_data_selindo[0]->Illustrator,
                              $datapenggunaan_data_selindo[0]->Incopy,
                              $datapenggunaan_data_selindo[0]->Indesign, 
                              $datapenggunaan_data_selindo[0]->Lightroom,
                              $datapenggunaan_data_selindo[0]->Photoshop,
                              $datapenggunaan_data_selindo[0]->Premierepro,
                              $datapenggunaan_data_selindo[0]->Premiererush, 
                              $datapenggunaan_data_selindo[0]->Xd, 
                            ];
                            
        $datapenggunaan_data_selindo_json = $datapenggunaan_data_selindo_per_satker->toJson();    
        $data_chart_horizontal_bar = [
            'datapenggunaan_label' => ['Acrobat', 'Aero', 'After Effect', 'Animate', 'Audition','Dimension',
                                       'Dreamweaver','Express','Fresco','Illustrator',  'Incopy','Indesign',
                                       'Lightroom','Photoshop','Premiere Pro','Premiere Rush','XD'
                                      ], 
            'datapenggunaan_data' => $datapenggunaan_data
        ];
        //Finish Setting Chart Bar supaya menampilkan data pemanfaatan selindo

         return view('adobebps.indexstatistik',
                compact('Data',
                        'Data_Laporan_Pemanfaatan',
                        'CountLisensi','Provinsi',
                        'Bulan','Periode_id','jumlahtotalbast','jumlahuploadbast','jumlahlisensi', 
                        'rightjoinquery',
                        'data_chart_horizontal_bar',
                        'unikSatker',
                        'datapenggunaan_data_selindo_json'
                    ));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deletedokumen($dokumenid)
    {   
        $res = []; 
        
        DB::beginTransaction();
            try { 
                $file=AdobeTemplatDokumen::find($dokumenid); 

                //url file yang mau dihapus   
                $url_file = Storage::disk('s3')->url('storage/file/'.$file->jenisdokumen);  
                Storage::disk('s3')->delete($url_file); 

                //delete database  
                $file->forceDelete();

                DB::commit();
                // all good
                $res = ['message' => 'Data Deleted!'];

            } catch (\Exception $e) {
                DB::rollback();
                $res = ['message' => $e->getMessage()];
                // something went wrong
            } 
        
        return redirect()->route('adobebps.templatelaporan')->with($res);
    }
    public function uploaddokumenstore(Request $request)
    { 
        $this->validate($request, [
            'namadokumen' => 'required', 
            'filedokumen' => 'mimes:docx,pdf,jpg,png|file|max:30000',  
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
                    'jenisdokumen' => $file_name,
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

                   //record dokumen  
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
    public function ajukanpengganti(Request $request)
    { 

        $res = [];  

            DB::beginTransaction();
                try { 

                    $email_adobe_lama =  AdobePJ::find($request->pjsaatini);
                    $email_adobe_lama = $email_adobe_lama->email;
                   //record  
                    $TransaksiPJ = AdobeTransaksiPJ::create([
                    'userid' => Auth::id(),
                    'email_adobe_lama_id' => $request->pjsaatini,
                    'email_adobe_lama' => $email_adobe_lama,
                    'email_adobe_baru' => $request->emailpengganti, 
                    'pengganti_id' => $request->pjpengganti, 
                    'nohp' => $request->nohppengganti, 
                    'alasan' => $request->alasan, 
                    'status' => "diproses", 
                    'petugasid' => null, 
                    ]); 

                    $user = User::find(5);
                    $TransaksiPJ_Notification = $TransaksiPJ::with('getuser_pembuatajuan','getpjlama','getuserpjbaru','getuserpetugas')->find($TransaksiPJ->id);
                    Notification::send($user, new PengajuanGantiPJ($TransaksiPJ_Notification));

                    DB::commit();
                    // all good
                    $res = ['message' => 'Pengajuan berhasil, silahkan menunggu notifikasi dari petugas kami!'];

                } catch (\Exception $e) { 
                    DB::rollback();  
                    $res = ['message' => $e->getMessage()];
                    // something went wrong
                } 
        
        return redirect()->route('adobebps.index')->with($res);
    }

    public function indexpengajuanPJ()
    { 
        
        $user = User::find(5); //all notification di attach ke lewis.anggi@bps.go.id
        $Daftarnotifikasi = $user->notifications;  

        //Mark As Read All Notifikasi
        foreach ($user->unreadNotifications as $notification) {
            if($notification->type =='App\Notifications\PengajuanGantiPJ'){ 
                $notification->markAsRead();
            }
        }
        $KoleksiAdobeTransaksiPJ = AdobeTransaksiPJ::with('getuser_pembuatajuan','getpjlama','getuserpjbaru','getuserpetugas')->get(); 
        
        return view('adobebps.indexpengajuanPJ', compact('Daftarnotifikasi','KoleksiAdobeTransaksiPJ'));

    }
    public function pengajuandisetujui($id_adobe_pj)
    {  
        $res = [];  
        DB::beginTransaction();
        try {  
        //Get Latest Periode
        $periode = AdobePeriode::latest('created_at')->first();

        $AdobeTransaksiPJ = AdobeTransaksiPJ::with('getuser_pembuatajuan','getpjlama','getuserpjbaru','getuserpetugas')->find($id_adobe_pj); //all notification di attach ke lewis.anggi@bps.go.id 
        $AdobeTransaksiPJ->status = "disetujui";
        $AdobeTransaksiPJ->petugasid = Auth::id();
        $AdobeTransaksiPJ->save(); 

        $AdobePJ = AdobePJ::find($AdobeTransaksiPJ->email_adobe_lama_id);  

        $AdobePJ->email =  $AdobeTransaksiPJ->email_adobe_baru ;
        $AdobePJ->nama =  $AdobeTransaksiPJ->getuserpjbaru->name ;
        $AdobePJ->nohp =  $AdobeTransaksiPJ->nohp ;
        $AdobePJ->adobe_periode_id =  $periode->id ;
        $AdobePJ->userid =  $AdobeTransaksiPJ->pengganti_id ;

        $timestamp_from_array = date('Y-m-d h:i:s');
        $AdobePJ->updated_at=date('Y-m-d h:i:s' , strtotime( $timestamp_from_array ) + 7 * 3600 ); 
        $AdobePJ->save();
  
        $user = User::find($AdobeTransaksiPJ->userid);
        Notification::send($user, new ResponPengajuanGantiPJ($AdobeTransaksiPJ));

        DB::commit();
        // all good

        } catch (\Exception $e) { 
            DB::rollback();  
            // something went wrong
            $res = ['message' => $e->getMessage()];
        } 
 
        return redirect()->route('adobebps.indexpengajuanPJ')->with($res);

    }
    public function pengajuanditolak($id_adobe_pj)
    { 
        
        $res = [];  
        DB::beginTransaction();
        try { 
        
        $AdobePJ = AdobeTransaksiPJ::with('getuser_pembuatajuan','getpjlama','getuserpjbaru','getuserpetugas')->find($id_adobe_pj); //all notification di attach ke lewis.anggi@bps.go.id 
        $AdobePJ->status = "ditolak";
        $AdobePJ->petugasid = Auth::id();
        $AdobePJ->save();

        $user = User::find($AdobePJ->userid);
        Notification::send($user, new ResponPengajuanGantiPJ($AdobePJ));

        DB::commit();
        // all good

        } catch (\Exception $e) { 
            DB::rollback();  
            // something went wrong
            $res = ['message' => $e->getMessage()];
        } 
 
        return redirect()->route('adobebps.indexpengajuanPJ')->with($res);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sudahdibaca($id,$userid)
    {
        $res = [];  
        $user = User::find($userid);  
        DB::beginTransaction();
        try { 

        //Mark As Read All Notifikasi
        foreach ($user->unreadNotifications as $notification) {
            if($notification->id == $id  ){ 
                $notification->markAsRead();
            }
        } 

        DB::commit();
        // all good

        } catch (\Exception $e) { 
            DB::rollback();  
            // something went wrong
            $res = ['message' => $e->getMessage()];
        } 

        return redirect()->route('adobebps.index')->with($res);

    } 
    public function syncuserkodesatker()
    { 
 
            $User=User::all();
            foreach($User as $user){ 
                    $kodesatker = $user->kodesatker;
                    if(strlen($kodesatker)==12){
                        //proses trimming
                        $kodesatker_trim = substr($kodesatker, 0,4);
                        if($kodesatker_trim=="0000"){
                            $kodesatker_trim=substr($kodesatker,-5);
                        }
                        
                        //get model and save ;
                        $user->kodesatker = $kodesatker_trim;
                        $user->save();

                        if(!$user->save()){
                            echo 'Tidak tersave <br/>';
                        }else{
                            echo $user->name.'-'.$user->kodesatker.'<br/>';
                        }

                    }
                    

               
            } 
        

    } 

    // Ajax

    public function show($kodesatker , $bulanid)
    {
        

            $KoleksiKuesioner = AdobeTransaksiKuesioner::with('user','periode','bulan','getsatker')
            ->where('kodesatkerid', '=', $kodesatker)   
            ->where('bulanid', '=', $bulanid)
            ->get();
             
            $pengisikuesioner = [];
    
            foreach($KoleksiKuesioner as $koleksiKuesioner){  
                array_push($pengisikuesioner,$koleksiKuesioner->user->name);   
            } 
    
            $namasatkerpemanfaatan = Namasatker::where('kodesatker', '=', $kodesatker)->first()->namasatker;
            $namabulan = Bulan::where('id', '=', $bulanid)->first()->namabulan;
            //return response
            return response()->json([
                'success' => true, 
                'namasatkerpemanfaatan' => $namasatkerpemanfaatan,
                'bulanpemanfaatan' => $namabulan, 
                'Acrobat' => $KoleksiKuesioner->sum(['acrobat']),
                'Aero' => $KoleksiKuesioner->sum(['aero']),
                'Aftereffect' =>  $KoleksiKuesioner->sum(['aftereffect']),
                'Animate' =>  $KoleksiKuesioner->sum(['animate']),
                'Audition' =>  $KoleksiKuesioner->sum(['audition']),
                'Dimension' =>  $KoleksiKuesioner->sum(['dimension']),
                'Dreamweaver' =>  $KoleksiKuesioner->sum(['dreamweaver']),
                'Express' =>  $KoleksiKuesioner->sum(['express']),
                'Fresco' =>  $KoleksiKuesioner->sum(['fresco']),
                'Illustrator' =>  $KoleksiKuesioner->sum(['illustrator']),
                'Incopy' =>  $KoleksiKuesioner->sum(['incopy']),
                'Indesign' =>   $KoleksiKuesioner->sum(['indesign']),
                'Lightroom' =>   $KoleksiKuesioner->sum(['lightroom']),
                'Photoshop' =>  $KoleksiKuesioner->sum(['photoshop']) ,
                'Premierepro' =>  $KoleksiKuesioner->sum(['premierepro']),
                'Premiererush' =>  $KoleksiKuesioner->sum(['premiererush']),
                'Publikasi' => $KoleksiKuesioner->sum(['publikasi']),
                'BRS' => $KoleksiKuesioner->sum(['brs']),
                'Infografis' => $KoleksiKuesioner->sum(['infografis']),
                'Flyer_vb' => $KoleksiKuesioner->sum(['flyer_vb']),
                'Spanduk' => $KoleksiKuesioner->sum(['spanduk']),
                'Suratdokumen' => $KoleksiKuesioner->sum(['suratdokumen']),
                'Video' => $KoleksiKuesioner->sum(['video']),
                'Website' => $KoleksiKuesioner->sum(['website']),
                'Dashboard' => $KoleksiKuesioner->sum(['dashboard']),
                'Lainnya' => $KoleksiKuesioner->sum(['jumlah_lain']),
                'Pengisi' => $pengisikuesioner,
            ]);  

         
       
    }
}