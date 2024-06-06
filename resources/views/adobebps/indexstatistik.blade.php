@php
    $html_tag_data  = ["override"=>'{"attributes" : { "layout": "none" }}'];
    $title          = 'Statistik Laporan';
    $description    ="";
    $title_tabel    = 'Kuesioner Pemanfaatan Adobe'; 
    $breadcrumbs    = ["/"=>"Home", "{{route('adobebps.indexstatistik')}}"=>"Statistik Laporan"];
    
    
    
@endphp

@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css') 
    <link rel="stylesheet" href="/css/vendor/datatables.min.css"/> 
    <link rel="stylesheet" href="/css/vendor/select2.min.css"/>
    <link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css"/>

@endsection

@section('js_vendor') 
    <script src="/js/vendor/list.js"></script> 
    <script src="/js/vendor/datatables.min.js"></script>
    <script src="/js/vendor/progressbar.min.js"></script>
    
    <script src="/js/vendor/select2.full.min.js"></script>  

    <script src="/js/vendor/moment-with-locales.min.js"></script> 
    <script src="/js/vendor/Chart.bundle.min.js"></script>
    <script src="/js/vendor/chartjs-plugin-rounded-bar.min.js"></script>
    <script src="/js/vendor/chartjs-plugin-crosshair.js"></script>
    <script src="/js/vendor/chartjs-plugin-datalabels.js"></script>
    <script src="/js/vendor/chartjs-plugin-streaming.min.js"></script>

@endsection

@section('js_page')
    <script src="/js/plugins/lists.js"></script> 
    <script src="/js/cs/datatable.extend.js"></script>
    <script src="/js/plugins/datatable.boxedvariations.js"></script>
    <script src="/js/plugins/progressbars.js"></script>

    <script src="/js/cs/charts.extend.js"></script>
    <script src="/js/plugins/charts.js"></script>

    <script src="/js/forms/controls.select2.js"></script>



@endsection

@push('pushcss')
  <style> 
  main { 
    padding-left: calc(var(--nav-size) + var(--main-spacing-horizontal));
    padding-right: var(--main-spacing-horizontal);
    padding-top: var(--main-spacing-vertical);
    padding-bottom: var(--main-spacing-vertical);
    background:#f2f5fa;
  } 
  </style>  

@endpush

@section('content')
 <!-- <div class="" style="padding:10px; background: #e8e8e8;"> -->
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-container">
                    <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                        @include('_layout.breadcrumb',['breadcrumbs'=>$breadcrumbs])  
                </div>
            </div>
        </div> 
        

        <section id="CTA" class="cta scroll-section " style="  padding-bottom: 20px;">  
            <div class="row " > 
                <div class="col-12 col-sm-8 col-lg-8 col-xxl-8" >  
                    <div class="row mb-3">  
                        <div class="card h-100 bg-gradient-light">
                            <div class="card-body row g-0">
                                <div class="col-6">
                                    <div class="cta-3 text-white fw-bold">OVERVIEW</div>
                                    <div class="mb-3 cta-3 text-white">Pengumpulan BAST & Laporan Pemanfaatan</div>
                                    <div class="row gx-2">
                                        <div class="col">
                                            <div class="text-muted mb-3 mb-sm-0 pe-3 text-white">
                                                <ul>
                                                    <li>
                                                        Upload BAST dan pengisian kuesioner pemanfaatan dapat dilakukan oleh seluruh pegawai di satker yang mendapatkan adobe cc.
                                                    </li>
                                                    <li>
                                                        Minimal ada 1 pegawai pada satker tersebut yang melakukan upload BAST dan mengisi kuesioner pemanfaatan.
                                                    </li>
                                                    <li>
                                                        Untuk informasi lebih lanjut dapat menghubungi admin: Lewis (082191492198) dan Catur (085743011307).
                                                    </li> 
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <a href="{{route('adobebps.index')}}" class="btn btn-icon btn-icon-start btn-white">
                                                <i data-acorn-icon="send"></i>
                                                <span>Mulai Isi Laporan</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="card  justify-content-center">
                                        <div class="card-body">
                                            <div class="row g-0 d-flex w-100 align-items-center">
                                                <div class="col  sh-8 d-flex flex-column custom-legend-container">
                                                    <div class="text-small text-muted text">LISENSI</div>
                                                    <div class="cta-1 text-primary value"> {{$jumlahlisensi}}</div>
                                                </div> 
                                                <div class="col sh-8 d-flex flex-column custom-legend-container">
                                                    <div class="text-small text-muted text">BAST DIUPLOAD</div>
                                                    <div class="cta-1 text-primary value"> {{$jumlahuploadbast}}</div>
                                                </div> 
                                                <div class="col sh-8 d-flex flex-column custom-legend-container">
                                                    <div class="text-small text-muted text">SATKER</div>
                                                    <div class="cta-1 text-primary value"> {{$jumlahtotalbast}}</div>
                                                </div> 
                                                <div class="col ">
                                                    <div class="sw-13 "> 
                                                        <label class="mb-3 d-flex justify-content-center fw-bold">Progress BAST</label>
                                                        <div class="sw-13 d-flex justify-content-center">
                                                            <div role="progressbar" 
                                                            data-jumlahuploadbast = {{$jumlahuploadbast}}
                                                            data-jumlahtotalbast = {{$jumlahtotalbast}}
                                                            class=" progress-bar-circle" 
                                                            id="progressCirclePercent">
                                                            </div>
                                                        </div> 
                                                        
                                                    </div>
                                                </div> 
                                            </div> 
                                        </div>
                                    </div> 
                                </div> 

                            </div>
                        </div> 
                    </div>  
                    <div class="row">  
                        <h2 class="small-title">Rincian Laporan Pemanfaatan</h2>   
                        <div class="card" >
                            <div class="card-body" > 
                                <!-- Hover Controls Start -->
                                <div class="row">  
                                    <div class="col-12 col-sm-7 col-lg-9 col-xxl-10 mb-1">
                                        <div class="d-inline-block">
                                            <button class="btn btn-icon btn-icon-only btn-outline-muted btn-sm datatable-print" type="button" data-datatable="#datatableHover_Laporan">
                                                <i data-acorn-icon="print"></i>
                                            </button>

                                            <div class="d-inline-block datatable-export" data-datatable="#datatableHover_Laporan">
                                                <button
                                                        class="btn btn-icon btn-icon-only btn-outline-muted btn-sm dropdown"
                                                        data-bs-toggle="dropdown"
                                                        type="button"
                                                        data-bs-offset="0,3"
                                                >
                                                    <i data-acorn-icon="download"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                    <button class="dropdown-item export-copy" type="button">Copy</button>
                                                    <button class="dropdown-item export-excel" type="button">Excel</button>
                                                    <button class="dropdown-item export-cvs" type="button">Cvs</button>
                                                </div>
                                            </div>  
                                            <div class="dropdown-as-select d-inline-block datatable-length" data-datatable="#datatableHover_Laporan"> 
                                                <button
                                                        class="btn btn-outline-muted btn-sm dropdown-toggle"
                                                        type="button"
                                                        data-bs-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false"
                                                        data-bs-offset="0,3"
                                                >
                                                    10 Items
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">5 Items</a>
                                                    <a class="dropdown-item active" href="#">10 Items</a>
                                                    <a class="dropdown-item" href="#">20 Items</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-5 col-lg-3 col-xxl-2 mb-1">
                                        <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 border border-separator bg-foreground search-sm">
                                            
                                            <input class="form-control form-control-sm datatable-search" placeholder="Search" data-datatable="#datatableHover_Laporan" />
                                            <span class="search-magnifier-icon">
                                            <i data-acorn-icon="search"></i>
                                            </span>
                                            <span class="search-delete-icon d-none">
                                            <i data-acorn-icon="close"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Hover Controls End -->

                                <!-- Hover Table Start -->
                                <div class="table-responsive-sm">
                                <table
                                class="table data-table-pagination data-table-standard responsive hover"
                                id="datatableHover_Laporan"
                                data-order='[[ 0, "asc" ]]'
                                >
                                    <thead>
                                    <tr> 
                                        <th scope="col" class="col-1 text-muted text-small text-uppercase">Kode Provinsi/ Satker</th>  
                                        <th scope="col" class="col-1 text-muted text-small text-uppercase">Satker </th> 
                                        @foreach($Bulan as $bulan)
                                            <th  scope="col" class="col text-muted text-small text-uppercase">{{$bulan->singkatan}}</th>
                                        @endforeach 
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($Data as $datas) 
                                        <tr style="height:50px;">  
                                            <td class=""><span class="fw-bold">{{$datas->getnamasatker->kodeeselondua ?? ''}}</span>/{{$datas->kodesatkerid}}</td> 
                                            <td class="text-alternate">
                                            @php 
                                                    $string = $datas->getnamasatker->namasatker ?? '';
                                                    $string1 = str_replace("BADAN PUSAT STATISTIK", "BPS", $string); 
                                                    $string2 = str_replace("KEPULAUAN", "KEP.", $string1);  
                                                @endphp 
                                            {{$string2}}   
                                                
                                                <div class="text-small text-muted position sale">
                                                      {{$datas->nama}}
                                                </div>
                                            </td>  
                                            @foreach($Bulan as $bulan) 
                                            <td class="text-alternate">  
                                                @if(!is_null($datas->transaksikuesioner->where('bulanid',$bulan->id)->where('periodeid',$Periode_id)->first()))  
                                                    @if($datas->transaksikuesioner->where('bulanid',$bulan->id)->where('periodeid',$Periode_id)->first()->memakaiadobe==1)
                                                    <div class="border border-success sw-2 sh-2 rounded-xl d-flex justify-content-center align-items-center">
                                                    <span class="text-success">v</span>
                                                    </div> 
                                                    @else
                                                    <div class="border border-danger sw-2 sh-2 rounded-xl d-flex justify-content-center align-items-center">
                                                    <span class="text-danger">x</span>
                                                    </div>
                                                    @endif  
                                                @else 
                                                -
                                                @endif 
                                            </td>  
                                            @endforeach 
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                </div>
                                
                                <!-- Hover Table End -->   
                            </div>  
                        </div>  
                    </div>  
                </div>  

                <div class="col-4 mb-3"> 
                    <div class="row h-100">

                        <!-- Horizontal Bar Chart Start -->
                        <div class="col-12 mb-7 h-50" >
                            <section class="scroll-section h-100" id="horizontalBarChartTitle">
                                <h2 class="small-title">Grafik Penggunaan Software Adobe Selindo</h2>
                                <div class="card mb-5 h-100">
                                    <div class="card-body">
                                        <div class="col-12 mb-2"> 
                                             <!-- Basic Single Start -->  
                                                <div class="row">
                                                    <div class="col-8">
                                                        <div class="w-100"> 
                                                            <select id="select2Basic"> 
                                                            <option value="BPS Seluruh Indonesia">BPS Seluruh Indonesia</option> 
                                                                @foreach ($unikSatker as $uniksatker)
                                                                    <option value="{{$uniksatker->Kodesatker}}">{{$uniksatker->Namasatker}}</option> 
                                                                @endforeach 
                                                            </select>
                                                        </div>
                                                    </div> 
                                                    <div class="col-4 d-flex align-items-end">
                                                        <button onclick="val()" id="submit" type="submit" class="btn btn-primary " >Lihat Grafik</button>
                                                    </div>

                                                </div>
                                                    
                                            <!-- Basic Single End -->
                                        </div>
                                        <div style="position: relative; height: 600px"> 
                                            <canvas id="barChart_datapenggunaan" 
                                            ></canvas> 
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- Horizontal Bar Chart End -->


                        <div class="col-12 mb-7 h-50">
                             <!-- Sort and Filter Start -->
                            <section class="scroll-section" id="sortAndFilterTitle"> 
                                        <h2 class="small-title">Rincian BAST Per Provinsi</h2>
                                        <div class="row g-2" id="sortAndFilter">
                                            <div class="col-12">
                                                <div class="row gx-2">
                                                    <div class="col-12 col-sm mb-1 mb-sm-0">
                                                        <div class="search-input-container shadow rounded-md bg-foreground mb-2">
                                                            <input class="form-control search" type="text" autocomplete="off" placeholder="Search" />
                                                            <span class="search-magnifier-icon">
                                                                <i data-acorn-icon="search"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-auto d-flex justify-content-end">
                                                        <div class="btn-group">
                                                            <div class="dropdown">
                                                                    <button class="btn btn-icon btn-icon-only btn-outline-muted btn-sm datatable-print" type="button" data-datatable="#datatableHover_BAST">
                                                                        <i data-acorn-icon="print"></i>
                                                                    </button>

                                                                    <div class="d-inline-block datatable-export" data-datatable="#datatableHover_BAST">
                                                                        <button
                                                                                class="btn btn-icon btn-icon-only btn-outline-muted btn-sm dropdown"
                                                                                data-bs-toggle="dropdown"
                                                                                type="button"
                                                                                data-bs-offset="0,3"
                                                                        >
                                                                            <i data-acorn-icon="download"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                                            <button class="dropdown-item export-copy" type="button">Copy</button>
                                                                            <button class="dropdown-item export-excel" type="button">Excel</button>
                                                                            <button class="dropdown-item export-cvs" type="button">Cvs</button>
                                                                        </div>
                                                                    </div>  

                                                                    <button
                                                                            class="btn btn-outline-primary dropdown-toggle mb-1"
                                                                            type="button"
                                                                            data-bs-toggle="dropdown"
                                                                            data-bs-auto-close="outside"
                                                                            aria-haspopup="true"
                                                                            aria-expanded="false"
                                                                    >
                                                                        Satker
                                                                    </button>
                                                                    <div class="dropdown-menu sw-70 dropdown-menu-end">
                                                                        <div class="px-4 py-3">
                                                                            <div class=" text-muted mb-3">
                                                                                Silahkan centang salah satu kotak untuk menyaring satker anda.
                                                                            </div>
                                                                            @php 
                                                                            $i=0; 
                                                                            $jumlahbastdiuploadsatker_pusat = 0;
                                                                            $jumlahbasttotalsatker_pusat = 0;
                                                                            foreach ( $rightjoinquery as $pusatdatadropdownbast)
                                                                                {
                                                                                    if($pusatdatadropdownbast->kodeeselondua =="0000"){
                                                                                        $jumlahbastdiuploadsatker_pusat = $pusatdatadropdownbast->jumlah_bast_upload;
                                                                                        $jumlahbasttotalsatker_pusat = $pusatdatadropdownbast->jumlah_bast_total;
                                                                                    } 
                                                                                }
                                                                                    
                                                                            $className_pusat = $jumlahbastdiuploadsatker_pusat == $jumlahbasttotalsatker_pusat ? 'form-check-label text-success' : 'form-check-label text-danger';
                                                                            
                                                                            @endphp
                                                                                    <div class="form-check mb-2">
                                                                                        <input type="checkbox" class="form-check-input filter" id="categoryPagination{{$i}}" 
                                                                                        data-filter="0000" />
                                                                                        <label class="{{$className_pusat}}" for="categoryPagination{{$i}}">Pusat  
                                                                                        <span class="{{$className_pusat}}">
                                                                                        ({{$jumlahbastdiuploadsatker_pusat}}/{{$jumlahbasttotalsatker_pusat}})
                                                                                        </span>
                                                                                        </label>
                                                                                    </div> 

                                                                                    <div class=" text-muted mb-3">
                                                                                        Provinsi:
                                                                                    </div>
                                                                                    
                                                                                    <div class="row"> 
                                                                                    @foreach($Provinsi as $data)  
                                                                                            @if(strlen($data->kodesatker)==4)    

                                                                                                @if(substr($data->kodesatker,-2)=="00")  
                                                                                                    @php  
                                                                                                    $jumlahbastdiuploadsatker=0;
                                                                                                    $jumlahbasttotalsatker=0;  
                                                                                                    foreach ( $rightjoinquery as $datadropdownbast)
                                                                                                    {
                                                                                                        if($datadropdownbast->kodeeselondua == $data->kodesatker){
                                                                                                            $jumlahbastdiuploadsatker = $datadropdownbast->jumlah_bast_upload;
                                                                                                            $jumlahbasttotalsatker = $datadropdownbast->jumlah_bast_total;
                                                                                                        }
                                                                                                    }

                                                                                                    $className = $jumlahbastdiuploadsatker == $jumlahbasttotalsatker ? 'text-success' : 'text-danger';
                                                                                                    $i++; 
                                                                                                    $kodeprovinsi = $data->kodesatker; 
                                                                                                    $kodeprovinsi_trim = substr($data->kodesatker,0,2); 
                                                                                                    $kodeprovinsi_trim = $kodeprovinsi_trim."00";  

                                                                                                    $namasatker = substr($data->namasatker,28);
                                                                                                    $namasatker = str_replace("KEPULAUAN","KEP.",substr($data->namasatker,28));
                                                                                                    @endphp
                                                                                                    @if($i==1)
                                                                                                        <div class="col">
                                                                                                    @endif
                                                                                                    @if($i==20)
                                                                                                        <div class="col">
                                                                                                    @endif
                                                                                                    <div class="form-check mb-2">
                                                                                                        <input type="checkbox" class="form-check-input filter" id="categoryPagination{{$i}}" 
                                                                                                        data-filter="{{$kodeprovinsi_trim}}" />
                                                                                                        <label  
                                                                                                        class="form-check-label" 
                                                                                                        for="categoryPagination{{$i}}">{{$namasatker}} 
                                                                                                        <span class="{{$className}}">
                                                                                                        ({{$jumlahbastdiuploadsatker}}/{{$jumlahbasttotalsatker}})
                                                                                                        </span>
                                                                                                        </label>
                                                                                                    </div> 
                                                                                                    @if($i==19)
                                                                                                        </div>
                                                                                                    @endif
                                                                                                    @if($i==38)
                                                                                                        </div>
                                                                                                    @endif
                                                                                                @endif
                                                                                            @endif
                                                                                    
                                                                                    @endforeach   
                                                                            </div>
                                                                        
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <!-- Sort for smaller screens -->
                                                        <div class="btn-group d-inline-block d-sm-none ms-1">
                                                            <div class="dropdown">
                                                                <button
                                                                        class="btn btn-foreground-alternate shadow dropdown-toggle mb-1"
                                                                        type="button"
                                                                        data-bs-toggle="dropdown"
                                                                        data-bs-auto-close="outside"
                                                                        aria-haspopup="true"
                                                                        aria-expanded="false"
                                                                >
                                                                    Sort
                                                                </button>
                                                                <div class="dropdown-menu sw-25 dropdown-menu-end custom-sort">
                                                                    <div class="dropdown-item cursor-pointer sort"  style="visibility:collapse;" data-sort="kodeprovinsi">Kode Provinsi</div> 
                                                                    <div class="dropdown-item cursor-pointer sort" data-sort="namapj">Nama PJ</div>
                                                                    <div class="dropdown-item cursor-pointer sort" data-sort="status">Status BAST</div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body"> 
                                                    
                                                    <div class="row g-0 h-100 align-content-center mb-2 custom-sort d-none d-sm-flex">
                                                        <div class=" ">
                                                            <div class="text-muted text-small cursor-pointer sort" style="visibility:collapse;"  data-sort="category">KODE PROVINSI</div>
                                                        </div> 
                                                        <div class="col-8 col-sm-8 ">
                                                            <div class="text-muted text-small cursor-pointer sort" data-sort="namapj">NAMA PJ</div>
                                                        </div>
                                                        <div class="col-4 col-sm-4 ">
                                                            <div class="text-muted text-small cursor-pointer sort" data-sort="status">STATUS BAST</div>
                                                        </div> 
                                                    </div> 
                                                        <div class="list scroll-out" >
                                                            <div class="scroll-by-count" data-count="10" data-childSelector=".scroll-child">
                                                            @foreach($Data as $datatable) 
                                                            <div class=" sh-sm-5 mb-3 mb-sm-0 scroll-child">
                                                                <div class="row g-0 align-content-center">  
                                                                        @if(strlen($datatable->kodesatkerid)==5)
                                                                            <div style="visibility:collapse;">
                                                                                <a href="#" class="body-link category">0000</a>
                                                                            </div>  
                                                                        @else 
                                                                            @php   
                                                                                $kodeprovinsi = $datatable->kodesatkerid; 
                                                                                $kodeprovinsi_trim_bast = substr($datatable->kodesatkerid,0,2);  
                                                                                $kodeprovinsi_trim_bast = $kodeprovinsi_trim_bast."00";  
                                                                            @endphp
                                                                            <div style="visibility:collapse;">
                                                                                <a href="#" class="body-link category">{{$kodeprovinsi_trim_bast }}</a>
                                                                            </div> 
                                                                        @endif 
                                                                            <div class="col-8">
                                                                                <!-- class="name" and class="position" provides the data -->
                                                                                <div class="name">
                                                                                {{$datatable->nama}}  
                                                                                </div>
                                                                                <div class="text-small text-muted position sale">
                                                                                    @php
                                                                                    $string = $datatable->getnamasatker->namasatker ?? '';
                                                                                    $string1 = str_replace("BADAN PUSAT STATISTIK", "BPS", $string); 
                                                                                    $string2 = str_replace("KEPULAUAN", "KEP.", $string1); 
                                                                                    $string3 = str_replace("DIREKTORAT ", "DIR. ", $string2); 
                                                                                    @endphp 
                                                                                    {{$string3}} 
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                @if(is_null($datatable->getAdobeTransaksiBAST))
                                                                                –  
                                                                                @else
                                                                                <div>
                                                                                    <a href="{{$datatable->getAdobeTransaksiBAST->dokumen->path}}" > Unduh </a> 
                                                                                </div>
                                                                                    @php
                                                                                    $timestamp_from_array = $datatable->getAdobeTransaksiBAST->dokumen->created_at;
                                                                                    $tanggal_upload_bast  = date('Y-m-d h:i:s' , strtotime( $timestamp_from_array ) + 7 * 3600 );
                                                                                @endphp 
                                                                                <div class="text-muted text-small"> {{$tanggal_upload_bast}} </div> 
                                                                            @endif   
                                                                            </div> 

                                                                    </div>
                                                                </div>
                                                            @endforeach 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </section>
                            <div class="d-none">
                            @include('adobebps.hidden_RincianBAST'); 
                            </div>
                        </div>   
                        <!-- Sort and Filter End -->    

                        
                    </div>  
                </div>  
            </div>    
        </section>  

<script>   


    const config = {
            scaleSteps: 20, // number of ticks
            type: 'bar',
            data: {
                labels: @json($data_chart_horizontal_bar['datapenggunaan_label']),
                datasets: [{
                    label: 'Jumlah Pengguna',
                    data: @json($data_chart_horizontal_bar['datapenggunaan_data']),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                    
                }]
            },
            options: {
                responsive: true,
                // plugins: {
                //     title: {
                //         display: true,
                //         text: ''
                //     }
                // },
                maintainAspectRatio:false, 
                indexAxis: 'y', 
                scales: {
                        x: {
                            grid: {
                            display: false
                            }
                        },
                        y: {
                            grid: {
                            display: false
                            }
                        }
                        }
            }
        };
    var barChart = document.getElementById('barChart_datapenggunaan').getContext('2d');
    var myChart = new Chart(barChart, config);

    function val() {  
        
        const KODESATKER    = document.getElementById("select2Basic").value;
        const DATASET       = JSON.parse(@json($datapenggunaan_data_selindo_json)); 
        let Acrobat = 0; let Aero = 0; let Aftereffect = 0; let Animate = 0;
        let Audition = 0; let Dimension = 0; let Dreamweaver = 0;
        let Express = 0; let Fresco = 0;  let Illustrator = 0;
        let Incopy = 0; let Indesign = 0;  let Lightroom = 0;
        let Photoshop = 0; let Premierepro = 0; let Premiererush = 0;  let Xd = 0; 
        if(KODESATKER=='BPS Seluruh Indonesia'){

            myChart.data.datasets[0] =  {
                    label: 'Jumlah Pengguna',
                    data: @json($data_chart_horizontal_bar['datapenggunaan_data']),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1 
                } 

        }else{

            // GET DATA PER SATKER 
        for (const key in DATASET) {
            if(KODESATKER==DATASET[key].kodesatkerid){
                Acrobat = DATASET[key].Acrobat ; 
                Aero = DATASET[key].Aero ;
                Aftereffect = DATASET[key].Aftereffect; 
                Animate = DATASET[key].Animate;
                Audition = DATASET[key].Audition; 
                Dimension = DATASET[key].Dimension;
                Dreamweaver = DATASET[key].Dreamweaver; 
                Express = DATASET[key].Express;
                Fresco = DATASET[key].Fresco;
                Illustrator = DATASET[key].Illustrator;
                Incopy = DATASET[key].Incopy;
                Indesign = DATASET[key].Indesign;
                Lightroom = DATASET[key].Lightroom; 
                Photoshop = DATASET[key].Photoshop;
                Premierepro = DATASET[key].Premierepro ;
                Premiererush = DATASET[key].Premiererush;
                Xd = DATASET[key].Xd;
            } 
        } 

        const datapenggunaan_data=[Acrobat,Aero,Aftereffect,Animate,Audition,Dimension,Dreamweaver,
              Express,Fresco,Illustrator,Incopy,Indesign,Lightroom,Photoshop,
              Premierepro,Premiererush,Xd]; 

        myChart.data.datasets[0] =  {
                    label: 'Jumlah Pengguna',
                    data: datapenggunaan_data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1 
                } 
        }
        
        // myChart.config.data.datasets.data = datapenggunaan_data; 
        // myChart.options.plugins.title.text = KODESATKER; 
        myChart.update();
    }
</script> 
@endsection



