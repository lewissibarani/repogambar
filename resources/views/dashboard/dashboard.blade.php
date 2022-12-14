@php 
    $test_link = 
    $html_tag_data = ["override"=>'{"attributes" : { "layout": "boxed" }}'];
    $title = 'Beranda';
    $path = public_path();
    $description = 'Beranda';
    $breadcrumbs = ["/"=>"Home","/Dashboard"=>"Beranda"];
    $file = "";

@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
<link rel="stylesheet" href="/css/vendor/glide.core.min.css"/>
<link rel="stylesheet" href="/css/vendor/baguetteBox.min.css"/>
<link rel="stylesheet" href="/css/vendor/introjs.min.css"/>
@endsection

@section('js_vendor')
<script src="/js/cs/scrollspy.js"></script>
<script src="/js/vendor/baguetteBox.min.js"></script>
<script src="/js/vendor/jquery.validate/jquery.validate.min.js"></script>
<script src="/js/vendor/jquery.validate/additional-methods.min.js"></script>
<script src="/js/vendor/intro.min.js"></script>
<script src="/js/cs/responsivetab.js"></script>
@endsection

@section('js_page')
<script src="/js/pages/blocks.gallery.js"></script>
<script src="/js/pages/auth.search.js"></script>
<script src="/js/pages/dashboard.default.js"></script>
@endsection

@section('content')
    <div class="container">
        <!-- Title Start -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-container">
                    <div class="row g-0">
                        <div class="col-auto mb-2 mb-md-0 me-auto">
                            <div class="w-auto sw-md-30">
                                <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                                @include('_layout.breadcrumb',['breadcrumbs'=>$breadcrumbs])
                            </div>
                        </div>
                        <div class="w-100 d-md-none"></div>
                        <div class="col col-md-auto d-flex align-items-start justify-content-end">
                            <a href="/KelolaGambar/Index" class="btn btn-outline-primary btn-icon btn-icon-start ms-1 w-100 w-md-auto" 
                            data-title="Tombol Permintaan" data-intro="Klik tombol ini untuk melakukan permintaan gambar" data-step="1" >
                                <i data-acorn-icon="plus"></i>
                                <span>Buat Permintaan Gambar</span>
                            </a> &nbsp &nbsp
                            <!-- Tour Button Start -->
                            <button type="button" class="btn btn-outline-primary btn-icon btn-icon-end w-100 w-sm-auto" id="dashboardTourButton">
                                <i data-acorn-icon="flag"></i>    
                                <span>Perkenalan Website</span> 
                            </button>
                            <!-- Tour Button End --> 
                        </div> 
                            
                    </div>  
                    
                </div>
            </div>
        </div>
       
        <!-- Title End -->
        <form id="searchGambarForm" action="{{route('dashboard.hasilpencarian')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 col-xl-12 col-xxl-12 mb-12">
                    <div class="input-group mb-3" 
                    data-title="Mesin Pencari Gambar" data-intro="Masukkan kata kunci gambar yang ingin dicari" data-step="2">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                        <i data-acorn-icon="search" class="text-primary me-1"></i>    
                        </span>
                        <input type="text" placeholder="Kata kunci pencarian..." class="form-control" 
                        aria-label="Sizing example input" 
                        aria-describedby="inputGroup-sizing-default"
                        name="katakunci"/>
                        
                        <button type="submit" class="btn btn-icon btn-icon-start btn-primary stretched-link" >
                            <i data-acorn-icon="chevron-right"></i>
                            <span>Cari Gambar</span>
                        </button> 
                        
                    </div>
                </div>
            </div>
        </form>   
        <div class="row">
            <div class="col-12 col-xl-8 col-xxl-9 mb-5">
                <!-- Title Tabs Start -->
                <ul class="nav nav-tabs nav-tabs-title nav-tabs-line-title responsive-tabs" role="tablist">
                    <li class="nav-item" role="presentation"
                    data-title="Daftar gambar terbaru " data-intro="Disini kamu bisa memilih gambar terbar yang sudah pernah diupload oleh petugas kami" data-step="3"
                    >
                        <a class="nav-link active" data-bs-toggle="tab" href="#projectsTab" role="tab" aria-selected="true">Terbaru</a>
                    </li>
                    <li class="nav-item" role="presentation"
                    data-title="Daftar gambar terfavorit" data-intro="Disini kamu bisa memilih gambar terfavorit yang sudah pernah diupload oleh petugas kami" data-step="4"
                    >
                        <a class="nav-link" data-bs-toggle="tab" href="#collectionsTab" role="tab" aria-selected="false">Paling Banyak Dilihat</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#friendsTab" role="tab" aria-selected="false"></a>
                    </li>
                    <li class="nav-item dropdown ms-auto d-none responsive-tab-dropdown">
                        <a
                                class="btn btn-icon btn-icon-only btn-background pt-0"
                                href="#"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                                data-diplay="static"
                        >
                            <i data-acorn-icon="more-horizontal"></i>
                        </a>
                        <ul class="dropdown-menu mt-2 dropdown-menu-end"></ul>
                    </li>
                </ul>
                <!-- Title Tabs End -->
                <div class="tab-content">
                    <!-- Terbaru Tab Start -->
                    <div class="tab-pane fade active show" id="projectsTab" role="tabpanel">
                        <!-- Grid Start --> 
                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 gallery g-2 mb-5">
                            @foreach ($Data as $datas)
                                <div class="col">
                                    <div class="card hover-img-scale-up hover-reveal">
                                            <img class="card-img sh-50 scale" 
                                            data-original="{{$datas->thumbnail_path}}"
                                            alt="card image" />
                                            <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                                    <div class="row g-0">
                                                    </div>
                                                    <div class="row g-0">
                                                        <div class="col pe-2">
                                                            <a href="Dashboard/DetailGambar/{{$datas->id}}" class="stretched-link">
                                                                <h5 class="heading text-white mb-1">{{$datas->judul}}</h5>
                                                            </a>
                                                            <div class="d-inline-block">
                                                                <div class="text-uppercase"><span class='badge rounded-pill bg-light'>{{$datas->tipe_gambar}}</span></div>
                                                            </div>
                                                            @php
                                                            if($datas->file_id!==null)
                                                                {
                                                                @endphp
                                                                <div class="d-inline-block">
                                                                    <div class="text-uppercase"><span class='badge rounded-pill bg-light'>ZIP</span></div>
                                                                </div>
                                                                @php
                                                                    $file = "zip";
                                                                }
                                                            @endphp
                                                            <div class="d-inline-block">
                                                                <div class="text-uppercase"><span class='badge rounded-pill bg-light'>{{$datas->source->sumber_gambar}}</span></div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                            </div>
                                    </div>
                                </div>
                                
                            @endforeach
                        </div>
                        <!-- Grid End -->
                    </div>
                    <!-- Terbaru Tab End -->

                    <!-- Paling Banyak Dilihat Tab Start -->
                    <div class="tab-pane fade" id="collectionsTab" role="tabpanel">
                        <!-- Grid Start --> 
                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 gallery g-2 mb-5">
                            @foreach ($Terfavorit as $favorit)
                                <div class="col">
                                    <div class="card hover-img-scale-up hover-reveal">
                                            <img class="card-img sh-50 scale" 
                                            data-original="{{$favorit->thumbnail_path}}"
                                            alt="card image" />
                                            <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                                    <div class="row g-0">
                                                    </div>
                                                    <div class="row g-0">
                                                        <div class="col pe-2">
                                                            <a href="Dashboard/DetailGambar/{{$favorit->id}}" class="stretched-link">
                                                                <h5 class="heading text-white mb-1">{{$favorit->judul}}</h5>
                                                            </a>
                                                            <div class="d-inline-block">
                                                                <div class="text-uppercase"><span class='badge rounded-pill bg-light'>{{$favorit->tipe_gambar}}</span></div>
                                                            </div>
                                                            @php
                                                            if($favorit->file_id!==null)
                                                                {
                                                                @endphp
                                                                <div class="d-inline-block">
                                                                    <div class="text-uppercase"><span class='badge rounded-pill bg-light'>ZIP</span></div>
                                                                </div>
                                                                @php
                                                                    $file = "zip";
                                                                }
                                                            @endphp
                                                            <div class="d-inline-block">
                                                                <div class="text-uppercase"><span class='badge rounded-pill bg-light'>{{$favorit->source->sumber_gambar}}</span></div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                                
                            @endforeach
                        </div>
                        <!-- Grid End -->
                    </div>
                    <!-- Paling Banyak Dilihat Tab End -->
                </div>      

                <div class="row">
                    <div class="col-12 text-center">
                        
                    </div>
                </div>
            </div>

            <!-- Right Side Start -->
            <div class="col-12 col-xl-4 col-xxl-3">
                <div class="row">

                    <!-- Penyumbang Unggulan Start -->
                    <div class="col-12" >
                            <h2 class="small-title">Penyumbang Unggulan</h2>
                            <div class="card mb-5">
                                <div class="card-body mb-n2 border-last-none h-100">
                                    <div class="mb-2 pb-2">
                                            <div class="col">
                                                <div class="d-flex flex-row pt-0 pb-0 ps-3 pe-0 align-items-center justify-content-between">
                                                    <div class="d-flex flex-column">
                                                        <div></div>
                                                        <div class="text-small text-muted"></div>
                                                    </div>
                                                    <div class="d-flex">
                                                        Jumlah Upload
                                                </div>
                                            </div>
                                    </div>
                                    @foreach($Users as $users)
                                    <div class="border-bottom border-separator-light mb-2 pb-2">
                                        <div class="row g-0 sh-6">
                                            <div class="col-auto">
                                                <img src="{{$users->users->profilepicture}}" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                            </div>
                                            <div class="col">
                                                <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                    <div class="d-flex flex-column">
                                                        <div><a href="#">{{$users->users->name}}</a></div>
                                                        <div class="text-small text-muted">{{$users->users->satker}}</div>
                                                    </div>
                                                    <div class="d-flex">
                                                    {{$users->count_task}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                    </div>
                    <!-- Penyumbang Unggulan End -->

                    <!-- Tags Start -->
                    <div class="col-12 col-sm-6 col-xl-12"
                    data-title="Daftar Tag Gambar" data-intro="Kamu juga bisa memilih gambar berdasarkan tags disini" data-step="5">
                        <h2 class="small-title">Tags</h2>
                        <div class="card mb-5">
                            <div class="card-body">
                            @foreach($Tags as $tag)
                                <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1" href="hasilpencarian/katakunci/{{$tag->name}}">
                                    <span>{{$tag->name}} ({{$tag->count}})</span>
                                </a>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Tags End -->

                    <!-- Mailing List Start -->
                    <div class="col-12">
                        <div class="card mb-5">
                            <div class="card-body row g-0">
                                <div class="col-12">
                                    <div class="cta-3">Siap untuk berkarya?</div>
                                    <div class="mb-3 cta-3 text-primary">Ayo berlangganan dengan e-mail anda !</div>
                                    <div class="text-muted mb-3">Kami akan mengirimkan berita terbaru seputar digital aset BPS.</div>
                                    <div class="d-flex flex-column justify-content-start">
                                        <div class="text-muted mb-2">
                                            <input type="email" class="form-control" placeholder="E-mail" />
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-icon btn-icon-start btn-primary">
                                        <i data-acorn-icon="chevron-right"></i>
                                        <span>Join</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Mailing List End -->

                </div>
            </div>
            <!-- Right Side End -->
        </div>
    </div>
@endsection
