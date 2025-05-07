@php
    $html_tag_data  = ["override"=>'{"attributes" : { "layout": "boxed" }}'];
    $title          = 'Satker anda tidak mendapat lisensi adobe untuk periode ini, jika ini merupakan kesalahan silahkan menghubungi admin. (082191492198)';
    $cek_apakah_bisa_isi_kuesioner_dan_isi_BAST = 1;
    //Inforasi PJ dan Lisensi 

    $namasatker = "";
    if(!is_null($adobepj)){
        foreach($adobepj as $satkername){
            $namasatker = $satkername->getnamasatker->namasatker; 
            $title          = 'Aktivitas Pemanfaatan Adobe CC Satker: '.$namasatker;
        } 
    }

    if($title=="Satker anda tidak mendapat lisensi adobe untuk periode ini, jika ini merupakan kesalahan silahkan menghubungi admin. (082191492198)"){
        $cek_apakah_bisa_isi_kuesioner_dan_isi_BAST = 0;
    }

    $title_tabel    = 'Kuesioner Pemanfaatan Adobe';
    $description    = 'Portfolio Home Page';
    $breadcrumbs    = ["/"=>"Home", 
                       route('adobebps.index')=>"Adobe-BPS",
                       route('adobebps.index')=>"Kirim Laporan", 
                       ];
    
    //BAST
    $linkdownloadbast = "Belum Upload";
    $sudahuploadbast = false;
    if(!$Data_BAST==null)
        {
            $sudahuploadbast= true;
            $linkdownloadbast = $Data_BAST->dokumen->path; 
        } 
  
    //data pj adobe_pj
        $namauser = "";
        $nipuser  = "";
        $jabatanuser = "";
        $profilepicture = "";
  
    
@endphp

@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/baguetteBox.min.css"/>
    <link rel="stylesheet" href="/css/vendor/datatables.min.css"/> 
    <link rel="stylesheet" href="/css/vendor/select2.min.css"/>
    <link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css"/>

@endsection

@section('js_vendor')
    <script src="/js/vendor/jquery.validate/jquery.validate.min.js"></script>
    <script src="/js/vendor/jquery.validate/additional-methods.min.js"></script>
    <script src="/js/vendor/baguetteBox.min.js"></script> 
    <script src="/js/cs/scrollspy.js"></script>
    <script src="/js/cs/responsivetab.js"></script>
    <script src="/js/vendor/datatables.min.js"></script>
    <script src="/js/vendor/select2.full.min.js"></script>

@endsection

@section('js_page') 
    <script src="/js/cs/datatable.extend.js"></script>
    <script src="/js/plugins/datatable.boxedvariations.js"></script> 
    <script src="/js/forms/controls.select2.js"></script> 
    <script src="/js/forms/validation.js"></script>
    <script src="/js/components/navs.js"></script>

@endsection

@section('content')
    <div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row"> 
                 <!-- Search Start-->
                 <section class="scroll-section mb-3" id="search"> 
                        <div class="card w-100 sh-25 sh-sm-19">
                            <img src="/img/banner/cta-wide-3.webp" class="card-img h-100" alt="card image" />
                            <div class="card-img-overlay d-flex flex-column justify-content-between bg-transparent">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="cta-3 text-black">Jika satker anda terpilih sebagai sample pemeriksaan BPK,</div>
                                        <div class="mb-3 cta-3 text-primary">Silahkan download tata cara pembuktian Adobe Lisensi pada link dibawah ini:</div>
                                        <div class="row gx-2"> 
                                            <div class="col-12 col-sm-auto">
                                                <a href="https://bucket.bps.go.id/0320-dds-pikart/storage/file/2024_06_06_08_19_05Pembuktian%20Sederhana%20Adobe%20License.pdf" 
                                                class="btn btn-icon btn-icon-start btn-dark stretched-link">
                                                    <i data-acorn-icon="download"></i>
                                                    <span>Download</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Search End--> 

                    
                <!-- Title Start -->
                <div class="row">
                    <div class="col-9 col-md-9">
                        <h4 class="mb-0 pb-0 display-6" id="title">{{ $title }}</h4>
                        <!-- @include('_layout.breadcrumb',['breadcrumbs'=>$breadcrumbs]) -->
                    </div> 
                    <div class="col-3 ">
                        <ul class="nav nav-pills">
                            <li class="nav-item"> <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">TAHUN PENGADAAN:</a> </li>
                            <li class="nav-item"> 
                            <form action="{{ route('adobebps.index') }}" method="GET">
                                @csrf
                                <select id="select2Multiple" class="form-select" name="periode_dropdown_option" onchange="this.form.submit()">
                                    @foreach ($Periode as $periode)
                                    <option value="{{ $periode->id }}" 
                                        {{ (isset($selectedPeriode) 
                                            && $selectedPeriode 
                                            ==  $periode->id) ? 'selected' : '' }}>
                                    {{ $periode->tahun_pengadaan }}
                                    </option>
                                    @endforeach
                                </select>
                            </form>     
                            </li>  
                        </ul> 
                    </div> 
                </div>
               

                   
                <!-- Title End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->
        @if(!$cek_apakah_bisa_isi_kuesioner_dan_isi_BAST==0) 
        <div class="row gx-4 gy-5">
            <!-- Left Side Start -->
            <div class="col-12 col-xl-4 col-xxl-3">
                <!-- Biography Start -->
                <!-- <h2 class="small-title">Profil Kontributor</h2> -->
                <div class="card">
                    <div class="card-body mb-n5"> 
                        <div class="mb-3">
                             <!-- Upload Dokumen Button Start --> 
                             <div class="row">
                                <div class="col-6">
                                    <button type="button" class="btn col-12 btn-primary btn-icon btn-icon-start add-datatable" 
                                        data-bs-toggle="modal"        
                                        data-bs-target="#tambahlaporanadobe">
                                        <i data-acorn-icon="upload"></i> 
                                            <span>Upload BAST</span>
                                    </button>
                                    @include('adobebps.formBAST')   
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn col-12 btn-info btn-icon btn-icon-start add-datatable" 
                                        data-bs-toggle="modal"        
                                        data-bs-target="#formpenggantianpj">
                                        <i data-acorn-icon="edit"></i> 
                                            <span>Update PJ</span>
                                    </button>   
                                    @include('adobebps.formpenggantianpj')    
                                </div>
                             </div>
                           

                            
                        </div>

                        <div class="mb-5">
                            <div class="row g-0 align-items-center mb-2">
                                <div class="col-auto"> 
                                        @if($sudahuploadbast) 
                                            <div class="border border-success sw-5 sh-5 rounded-xl d-flex justify-content-center align-items-center">
                                            <i data-acorn-icon="check-circle" class="text-success"></i>
                                            </div> 
                                        @else
                                            <div class="border border-danger sw-5 sh-5 rounded-xl d-flex justify-content-center align-items-center">
                                            <i data-acorn-icon="multiply" class="text-danger"></i>
                                            </div> 
                                        @endif 
                                </div>
                                <div class="col ps-3">
                                    <div class="row g-0">
                                        <div class="col">
                                            <div class="sh-5 d-flex align-items-center lh-1-25">BAST</div>
                                        </div>
                                        <div class="col-auto">
                                            @if($sudahuploadbast) 
                                                <div class="sh-5 d-flex align-items-center">
                                                    <a href='{{$linkdownloadbast}}'> Download </a>
                                                </div>
                                            @else
                                                <div class="sh-5 d-flex align-items-center">{{$linkdownloadbast}}</div>
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div>
                            </div> 
 
                            <div class="row g-0 align-items-center mb-2">
                                <div class="col-auto">
                                    <div class="border border-primary sw-5 sh-5 rounded-xl d-flex justify-content-center align-items-center">
                                        <i data-acorn-icon="file-text" class="text-primary"></i>
                                    </div>
                                </div>
                                <div class="col ps-3">
                                    <div class="row g-0">
                                        <div class="col">
                                            <div class="sh-5 d-flex align-items-center lh-1-25">% Pemanfaatan</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="sh-5 d-flex align-items-center">{{$persentase_pemanfaatan}}%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            
                        </div> 
                        <div class="mb-5">
                            
                            <a href="#" class="d-block body-link"> 
                                <span class="align-middle">  
                                    <div class=" d-flex justify-content-between align-items-center"> 
                                        <SPAN class=" text-muted">DAFTAR LISENSI : </SPAN> 
                                        <span class="badge bg-primary rounded-pill">{{$adobepj->count()}} lisensi</span>
                                    </div>  
                                    <div class="scroll-track-visible sh-35">
                                        <ul class="list-group ">
                                        @php  
                                        foreach ($adobepj as $pj)
                                        {
                                        $pp = "no-link";
                                        if(!is_null($pj->getuser))  {
                                            $pp = $pj->getuser->profilepicture;
                                        }else{  
                                            $pp = URL::to('/').'/img/illustration/user-profile-picture-'.rand(1,6).'.jpg';
                                        }
                                      echo '<div class="row align-items-start ">'.
                                               ' <div class="col-2 align-self-center " style="margin-b:350px;"> '.
                                                   ' <img src="'.$pp.'" class="card-img rounded-xl sh-6 sw-6" alt="thumb">'.
                                                '</div>'.
                                                '<div class="col-10 align-self-center " style="margin-b:350px;"> '.
                                                   ' <div class="list-group-item" style="border:0px">'.
                                                        '<div class="d-flex w-100 justify-content-between">'.
                                                        '<h5 class="mb-1">'.$pj->nama.'</h5>'.
                                                        '</div>'.
                                                        '<p class="mb-1">'.$pj->email.'</p>'.
                                                        '<small>'.$pj->nohp.'</small>'.
                                                    '</div>'.
                                                '</div> '.
                                            '</div>';
                                        }
                                        @endphp  
                                        </ul> 
                                    </div>
                                </span>
                            </a> 
                            <br/> 
                        </div>

                        
                    </div>
                </div>
                <!-- Biography End -->
            </div>
            <!-- Left Side End -->

            <!-- Right Side Start -->
            <div class="col-12 col-xl-8 col-xxl-9">
                @if(session()->has('message'))
                    <div class="alert alert-info">
                    {!! session()->get('message') !!}
                    </div>
                @endif

            @include('adobebps.tablelaporanbulanan')   
            </div>
            <!-- Right Side End -->
        </div> 
        @endif
    </div>
@endsection
