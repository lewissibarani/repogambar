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

@endsection

@section('js_vendor') 
    <script src="/js/vendor/list.js"></script> 
    <script src="/js/vendor/datatables.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/plugins/lists.js"></script> 
    <script src="/js/cs/datatable.extend.js"></script>
    <script src="/js/plugins/datatable.boxedvariations.js"></script>

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
            

            <div class="row" >

                <div class="col-12 col-sm-8 col-lg-8 col-xxl-8" >
                    <!-- <div class="row"> 
                        <div class="card text-white bg-quaternary mb-3"> 
                            <div class="card-body">
                                <h5 class="card-title text-white">Quaternary card title</h5>
                                <p class="card-text">Brownie ice cream marshmallow topping.</p>
                            </div>
                        </div>
                    </div> -->

                    <div class="row">
                        <h2 class="small-title">Rincian Laporan Pemanfaatan</h2>   
                        <div class="card" >
                            <div class="card-body" >
                                <div class="row"> 
                                    <div class="card text-white bg-info mb-3"> 
                                        <div class="card-body"> 
                                            <h5 class="card-title text-white">Penting!</h5>
                                            <ul>
                                                <li>
                                                    Kuesioner pemanfaatan dapat diisi oleh seluruh pegawai di satker yang mendapatkan adobe cc.
                                                </li>
                                                <li>
                                                    Minimal ada 1 pegawai pada satker tersebut yang mengisi kuesioner pemanfaatan.
                                                </li>
                                                <li>
                                                    Untuk informasi lebih lanjut dapat menghubungi admin: Lewis (082191492198) dan Catur (085743011307).
                                                </li> 
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Hover Controls Start -->
                                <div class="row">  
                                    <div class="col-12 col-sm-7 col-lg-9 col-xxl-10 mb-1">
                                        <div class="d-inline-block">
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
                                            <div class="dropdown-as-select d-inline-block datatable-length" data-datatable="#datatableHover_BAST"> 
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
                                            
                                            <input class="form-control form-control-sm datatable-search" placeholder="Search" data-datatable="#datatableHover_BAST" />
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
                                id="datatableHover_BAST"
                                data-order='[[ 0, "asc" ]]'
                                >
                                    <thead>
                                    <tr> 
                                        <th scope="col" class="col-1 text-muted text-small text-uppercase">Kode Satker</th>
                                        <th scope="col" class="col-1 text-muted text-small text-uppercase">Nama Satker</th>
                                        <th scope="col" class="col-1 text-muted text-small text-uppercase">Nama Penanggung Jawab </th> 
                                        @foreach($Bulan as $bulan)
                                            <th  scope="col" class="col text-muted text-small text-uppercase">{{$bulan->singkatan}}</th>
                                        @endforeach 
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($Data as $datas) 
                                        <tr style="height:50px;"> 
                                            <td class="">{{$datas->kodesatkerid}}</td>
                                            <td class="text-alternate">   
                                            @php 
                                                $string = $datas->getnamasatker->namasatker ?? '';
                                                $string1 = str_replace("BADAN PUSAT STATISTIK", "BPS", $string); 
                                                $string2 = str_replace("KEPULAUAN", "KEP.", $string1);  
                                            @endphp 
                                                    {{$string2}} 
                                            </td>
                                            <td class="text-alternate">{{$datas->nama}}</td>  
                                            @foreach($Bulan as $bulan) 
                                                <td class="text-alternate">  
                                                    @if(!is_null($datas->transaksikuesioner->where('bulanid',$bulan->id)->where('periodeid',$Periode_id)->first())) 
                                                        <i data-acorn-icon="check-circle" class="text-success"></i> 
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

                <!-- Sort and Filter Start -->
                <div class="col-4 mb-5"> 
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
                                                                @endphp
                                                                        <div class="form-check mb-2">
                                                                            <input type="checkbox" class="form-check-input filter" id="categoryPagination{{$i}}" 
                                                                            data-filter="0000" />
                                                                            <label class="form-check-label" for="categoryPagination{{$i}}">Pusat</label>
                                                                        </div> 

                                                                        <div class=" text-muted mb-3">
                                                                            Provinsi:
                                                                        </div>
                                                                        
                                                                        <div class="row"> 
                                                                        @foreach($Provinsi as $data)  
                                                                                @if(strlen($data->kodesatker)==4)   
                                                                                    @if(substr($data->kodesatker,-2)=="00")  
                                                                                        @php 
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
                                                                                            <label class="form-check-label" for="categoryPagination{{$i}}">{{$namasatker}}</label>
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
                                        
                                        <div class="row"> 
                                            <div class="card text-white bg-info"> 
                                                <div class="card-body"> 
                                                    <p class="card-text">Scroll kebawah untuk melihat seluruh penanggung jawab.</p>
                                                </div>
                                            </div>
                                        </div>
                                        
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
                                                <div class="scroll-by-count" data-count="8" data-childSelector=".scroll-child">
                                                @foreach($Data as $datatable) 
                                                <div class="h-auto sh-sm-5 mb-3 mb-sm-0 scroll-child">
                                                    <div class="row g-0 h-100 align-content-center">  
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
                    </div>
                    <!-- Sort and Filter End -->  
                </div>    
        </section> 

       
 
@endsection
