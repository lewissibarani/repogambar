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

        <!-- Tags Start -->
        <div class="col-12 col-sm-6 col-xl-12"
        data-title="Daftar Tag Gambar" data-intro="Kamu juga bisa memilih gambar berdasarkan tags disini" data-step="5"> 
            <div class="mb-5">
                <div class="">
                @foreach($Tags as $tag)
                    <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1" href="hasilpencarian/katakunci/{{$tag->name}}">
                        <span>{{$tag->name}} ({{$tag->count}})</span>
                    </a>
                @endforeach
                </div>
            </div>
        </div>
        <!-- Tags End -->

        <div class="row">
            <div class="col-12 col-xl-12 col-xxl-12 mb-5">
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
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-4 mb-5" id="masonryCardsExample"> 
                               @include('dashboard.data')  
                            </div>
                        <!-- Grid End -->  
                    </div>
                    <!-- Terbaru Tab End -->  
                </div>  
                
                <!-- Data Loader -->
                <div class="auto-load text-center" style="display: none;">
                    <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                        <path fill="#000"
                            d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                            <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                                from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                        </path>
                    </svg>
                </div>
                
            </div> 
        </div>  
    </div>  
    
    


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    
    var ENDPOINT = "{{route('dashboard.halamandepan')}}";
    if ('{{ env('APP_ENV') }}' == 'production')
    {
        ENDPOINT = "https://webapps.bps.go.id/pikart/Dashboard";
    }
     
    var page = 1;
  
    /*------------------------------------------ 
    Call on Scroll 
    --------------------------------------------*/
    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= ($(document).height() - 20)) {
            page++;
            infinteLoadMore(page);
        }
    });
  
    /*------------------------------------------ 
    call infinteLoadMore() 
    --------------------------------------------*/
    function infinteLoadMore(page) {

  

        $.ajax({
                url: ENDPOINT + "?page=" + page,
                datatype: "html",
                type: "get",
                beforeSend: function () {

                    $('.auto-load').show();
                }
            })
            .done(function (response) {
                if (response.html == '') {
                    $('.auto-load').html("We don't have more data to display :(");
                    return;
                }
  
                $('.auto-load').hide();
                
                $("#masonryCardsExample").append(response.html);
                
                // var $msnry = $('#masonryCardsExample').masonry({
                // itemSelector: '.col',
                // percentPosition: true, 
                // }); 

                // $msnry.imagesLoaded().progress( function() {  
                // $msnry.masonry('layout'); 
                // });
                

            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
    }
</script>
@endsection
 
