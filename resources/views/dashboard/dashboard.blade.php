@php
    $html_tag_data = ["override"=>'{"attributes" : { "layout": "boxed" }}'];
    $title = 'Beranda';
    $path = public_path();
    $description = 'Beranda';
    $breadcrumbs = ["/"=>"Home","/Dashboard"=>"Beranda"]
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
<link rel="stylesheet" href="/css/vendor/glide.core.min.css"/>
<link rel="stylesheet" href="/css/vendor/baguetteBox.min.css"/>
@endsection

@section('js_vendor')
<script src="/js/cs/scrollspy.js"></script>
<script src="/js/vendor/baguetteBox.min.js"></script>
<script src="/js/vendor/jquery.validate/jquery.validate.min.js"></script>
<script src="/js/vendor/jquery.validate/additional-methods.min.js"></script>
@endsection

@section('js_page')
<script src="/js/pages/blocks.gallery.js"></script>
<script src="/js/pages/auth.search.js"></script>
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
                            <a href="/KelolaGambar/Index" class="btn btn-outline-primary btn-icon btn-icon-start ms-1 w-100 w-md-auto">
                                <i data-acorn-icon="plus"></i>
                                <span>Buat Permintaan Gambar</span>
                            </a>
                        </div>
                    </div>  
                    
                </div>
            </div>
        </div>
        <!-- Title End -->
        <form id="searchGambarForm" action="{{route('dashboard.hasilpencarian')}}" method="POST">
            @csrf
            @if(session()->has('message'))
                <div class="alert alert-danger">
                    {{ session()->get('message') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-12 col-xl-12 col-xxl-12 mb-12">
                    <div class="input-group mb-3">
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
                <!-- Grid Start -->
                <h2 class="small-title">Karya Favorit</h2>
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 gallery g-2 mb-5">
                    @foreach ($Data as $datas)
                        <div class="col">
                            <a href="Dashboard/DetailGambar/{{$datas->id}}" class="card hover-img-scale-up">
                                <img class="card-img sh-25 scale" 
                                data-original="{{$datas->thumbnail_path}}"
                                alt="card image" />
                            </a>
                        </div>
                        <!-- src="{{$datas->thumbnail_path}}"  -->
                    @endforeach
                </div>
                <!-- Grid End -->

                <div class="row">
                    <div class="col-12 text-center">
                        
                    </div>
                </div>
            </div>

            <!-- Right Side Start -->
            <div class="col-12 col-xl-4 col-xxl-3">
                <div class="row">

                    <!-- Penyumbang Unggulan Start -->
                    <div class="col-12">
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
                                                        Jumlah Karya
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="border-bottom border-separator-light mb-2 pb-2">
                                        <div class="row g-0 sh-6">
                                            <div class="col-auto">
                                                <img src="/img/profile/profile-6.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                            </div>
                                            <div class="col">
                                                <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                    <div class="d-flex flex-column">
                                                        <div><a href="#">James Kindangen</a></div>
                                                        <div class="text-small text-muted">BPS Provinsi Sulawesi Utara</div>
                                                    </div>
                                                    <div class="d-flex">
                                                        1.244
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-bottom border-separator-light mb-2 pb-2">
                                        <div class="row g-0 sh-6">
                                            <div class="col-auto">
                                                <img src="/img/profile/profile-7.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                            </div>
                                            <div class="col">
                                                <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                    <div class="d-flex flex-column">
                                                        <div><a href="#">Ayu Kartika</a></div>
                                                        <div class="text-small text-muted">Direktorat Diseminasi Statistik</div>
                                                    </div>
                                                    <div class="d-flex">
                                                        1.123
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-bottom border-separator-light mb-2 pb-2">
                                        <div class="row g-0 sh-6">
                                            <div class="col-auto">
                                                <img src="/img/profile/profile-8.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                            </div>
                                            <div class="col">
                                                <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                    <div class="d-flex flex-column">
                                                        <div><a href="#">Nashir</a></div>
                                                        <div class="text-small text-muted">BPS Provinsi Sumatera Utara</div>
                                                    </div>
                                                    <div class="d-flex">
                                                        1.120
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 pb-2 border-bottom border-separator-light">
                                        <div class="row g-0 sh-6">
                                            <div class="col-auto">
                                                <img src="/img/profile/profile-2.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                            </div>
                                            <div class="col">
                                                <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                    <div class="d-flex flex-column">
                                                        <div><a href="#">Allen Iverson</a></div>
                                                        <div class="text-small text-muted">BPS Provinsi Maluku</div>
                                                    </div>
                                                    <div class="d-flex">
                                                        1.099
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- Penyumbang Unggulan End -->

                    <!-- Tags Start -->
                    <div class="col-12 col-sm-6 col-xl-12">
                        <h2 class="small-title">Tags</h2>
                        <div class="card mb-5">
                            
                            <div class="card-body">
                            @foreach($Tags as $tag)
                                <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1" href="/Pages/Blog/List">
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
