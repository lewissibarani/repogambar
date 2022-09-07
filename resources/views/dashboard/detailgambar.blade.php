@php

    $image_info_file=null;
    $file_size_MB=null;
    $file_size="-";
    $target_download=$Data->path;
    $target_download_nama=$Data->nama_gambar;
    $tipe_file_raster_atau_vector="Raster";

    if($Data->file_id!==null)
    {
        $target_download=$Data->file->path;
        $target_download_nama=$Data->file->nama_file;
        $image_info_file= "dan Vector";
        $file_size_MB=$Data->file->size/1000000;
        $file_size=number_format((float)$file_size_MB, 2, '.', '')." MB";
        $tipe_file_raster_atau_vector="Raster dan Vector";
    }

    $html_tag_data = ["override"=>'{"attributes" : { "layout": "boxed" }}'];
    $title = 'Detail Gambar';
    $heading = $Data->judul;
    $description = 'Blog Detail';
    $user=$Data->user->name;
    $userProfilPicture =  $Data->user->profilepicture;
    $userSatker=$Data->user->satker;
    $imageext="";
    
    $image_size_MB=$Data->ukuran/1000000;
   
    $image_size=number_format((float)$image_size_MB, 2, '.', '');

    $source = "Badan Pusat Statistik";
    $deskripsiGambar='Toffee croissant icing toffee. Sweet roll 
        chupa chups marshmallow muffin liquorice chupa chups soufflé bonbon. 
        Liquorice gummi bears cake donut chocolate lollipop gummi bears. 
        Jujubes lollipop cheesecake gummi bears cheesecake. Cake jujubes soufflé.';

    $breadcrumbs = ["/Dashboard/Beranda"=>"Beranda", "/Dashboard/DetailGambar"=>"Detail Gambar"];

    if($Data->source_id==1)
    {
        $user = $Data->source->sumber_gambar;
        $userSatker = "Penyedia Aset Digital";
        $userProfilPicture = "/img/illustration/freepik-logo.png";
    }

    if($Data->source_id==2)
    {
        $user = $Data->source->sumber_gambar;
        $userSatker = "Penyedia ASet Digital";
        $userProfilPicture = "/img/illustration/Shutterstock.png";
    }
 
// Calling getimagesize() function
$imageinfo = getimagesize($Data->path);
$imageinfo_tipe_file=str_replace("image/","",$imageinfo['mime']);

@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/glide.core.min.css"/>
    <link rel="stylesheet" href="/css/vendor/baguetteBox.min.css"/>
@endsection

@section('js_vendor')
    <script src="/js/vendor/glide.min.js"></script>
    <script src="/js/vendor/baguetteBox.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/cs/glide.custom.js"></script>
    <!-- <script src="/js/pages/blog.detail.js"></script> -->
@endsection

@section('content')
    <div class="container">
        <!-- Title Start -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-container">
                    <h1 class="mb-0 pb-0 display-4" id="title">{{ $heading }}</h1>
                    @include('_layout.breadcrumb',['breadcrumbs'=>$breadcrumbs])
                </div>
            </div>
        </div>
        <!-- Title End -->

        <div class="row">
            <div class="col-12 col-xl-8 col-xxl-9 mb-5">
                <div class="card mb-5">
                    <!-- Content Start -->
                    <div class="card-body p-0">
                        
                        <div class=" d-flex justify-content-center">
                            
                        </div>

                        <div class="glide glide-gallery" id="glideBlogDetail">
                            <div class="glide glide-large">
                                <div class="glide__track" data-glide-el="track">
                                    <ul class="glide__slides gallery-glide-custom">
                                        <li class="glide__slide p-0">
                                            <a href="/{{$Data->path}}">
                                                <img
                                                    alt="detail"
                                                    src="/{{$Data->path}}"
                                                    class="responsive border-0 img-fluid mb-3 sh-80 w-100"
                                                />
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <h4 class="mb-3 font-weight-bold">Tags </h4>
                                <div class="mb-2">
                                    @foreach($Data->tags as $tag)
                                        <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1" href="/Pages/Blog/List">
                                            <span>{{ $tag->name }}({{ $tag->count }})</span>
                                        </a>
                                    @endforeach
                                </div>                            
                            </div>
                            <!-- <div>
                                <h4 class="mb-3 font-weight-bold">Deskripsi Gambar </h4>
                                <div class="mb-4">
                                    {{$deskripsiGambar}}
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col 6">
                                    <h4 class="mb-3 font-weight-bold">Penyumbang Gambar </h4>
                                    
                                        
                                            <div class="row g-0">
                                                <div class="col-auto">
                                                    <div class="sw-5 me-3">
                                                        <img src="{{$userProfilPicture}}" class="img-fluid rounded-xl" alt="thumb" />
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <a href="#">{{$user}}</a>
                                                    <div class="text-muted text-small mb-2">{{$userSatker}}</div>
                                                </div>
                                            </div>
                                       
                                    
                                </div>
                                <div class="col 6">
                                    <h4 class="mb-3 font-weight-bold">Format Gambar </h4>
                                    <div>
                                        <p>
                                            {{$tipe_file_raster_atau_vector}}
                                        </p>
                                        <p>
                                            {{$imageinfo[0]}} x {{$imageinfo[1]}} pixels | {{$imageinfo_tipe_file}} {{$image_info_file}}| {{$image_size}} MB
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content End -->
                </div>

                <!-- You May Also Like Start -->
                
                <!-- You May Also Like End -->
            </div>

            <!-- Right Side Start -->
            <div class="col-12 col-xl-4 col-xxl-3">
                <div class="mb-5">
                        <div class="row mb-n2">
                            <div class="col-12 col-md-6 col-xl-12">
                                <div class="card mb-2" style="height: 50px;">
                                    <div class="row g-0 h-100">
                                    
                                         <!-- Download Button Start -->

                                    <div class=" btn-group" role="group" aria-label="Button group with nested dropdown">
                                    <a
                                            class="btn btn-quaternary"
                                            data-bs-delay="0"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            title="Download Gambar"
                                            download="{{$target_download_nama}}"
                                            href="/{{$target_download}}"
                                    >
                                    <h3 class="text-white"><i data-acorn-icon="download"></i> Download</h3>
                                    </a>

                                    <div class="btn-group" role="group">
                                        <button
                                                id="btnGroupDrop1"
                                                type="button"
                                                class="btn btn-quaternary dropdown-toggle active"
                                                data-bs-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                        >
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-lg-end mw-100"  aria-labelledby="btnGroupDrop1">
                                            <div class="row" style="width: 500px;">
                                                <h5 class="font-weight-bold dropdown-item disabled">TIPE FILE</h5>
                                                <a class="dropdown-item"  download="{{$Data->nama_gambar}}" href="/{{$Data->path}}">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            Gambar
                                                        </div>
                                                        <div class="col-10">
                                                            <p class="font-weight-bold">{{$image_size}} MB </p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item" href="/{{$target_download}}">

                                                    <div class="row">
                                                        <div class="col-2">
                                                            File
                                                        </div>
                                                        <div class="col-10">
                                                            <p class="font-weight-bold">{{$file_size}}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    
                                    <!-- Downloaf Button End -->
                                   
                                    </div>
                                </div>


                                <div class="mt-5 col-12">
                                    <h2 class="small-title">Gambar Terkait Lainnya</h2>
                                    <div class="mb-5">
                                        <div class="row mb-n2">
                                        @foreach($Rekomendasi as $rekomendasi)
                                            <div class="col-12 col-md-6 col-xl-12 mb-2">
                                                <div class="card sh-11 sh-sm-14">
                                                    <div class="row g-0 h-100">
                                                        <div class="col-4 card-img card-img-horizontal sw-10 sw-sm-14"
                                                            
                                                             style="background-position: center; background-image: url('/{{$rekomendasi->thumbnail_path}}')">
                                                            
                                                        </div>
                                                        <div class="col position-static">
                                                            <div class="card-body d-flex flex-column pt-0 pb-0 h-100 justify-content-center">
                                                                <div class="d-flex flex-column">
                                                                    <a href="/Dashboard/DetailGambar/{{$rekomendasi->id}}" class="stretched-link body-link">
                                                                        <div class="clamp-line" data-line="2">{{$rekomendasi->judul}}</div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
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

            </div>
            <!-- Right Side End -->
        </div>
    </div>
@endsection
