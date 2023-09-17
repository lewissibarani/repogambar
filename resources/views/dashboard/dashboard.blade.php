@php 
    $html_tag_data = ["override"=>'{"attributes" : { "placement": "horizontal"}}']; 
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
<link rel="stylesheet" href="/css/vendor/nouislider.min.css"/>
<link rel="stylesheet" href="/css/vendor/tagify.css"/>
@endsection

@section('js_vendor')    
<script src="/js/vendor/baguetteBox.min.js"></script>
<script src="/js/vendor/jquery.validate/jquery.validate.min.js"></script>
<script src="/js/vendor/jquery.validate/additional-methods.min.js"></script>
<script src="/js/vendor/intro.min.js"></script>
<script src="/js/cs/responsivetab.js"></script> 
<script src="/js/vendor/nouislider.min.js"></script>
<script src="/js/vendor/tagify.min.js"></script> 
@endsection

@section('js_page')
<script src="/js/pages/blocks.gallery.js"></script>
<script src="/js/pages/auth.search.js"></script>
<script src="/js/pages/dashboard.default.js"></script>  
<script src="/js/forms/controls.slider.js"></script>
<script src="/js/forms/controls.tag.js"></script> 
@endsection

@section('content')
    <div class="container">
        
        <div class="row"> 
                @include('_layout.nav_secondary') 
            <div class="col">
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
                <!-- <form id="searchGambarForm" action="{{route('dashboard.halamandepan')}}" method="POST"> -->
                    @csrf
                    <div class="row"> 

                        <div class="col-12 col-xl-12 col-xxl-12 mb-12">
                            <div class="input-group mb-3" 
                            data-title="Mesin Pencari Gambar" data-intro="Masukkan kata kunci gambar yang ingin dicari" data-step="2">
                                    <button id="tipepencarianButton" class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Gambar
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a id="tipepencarianList" class="dropdown-item" href="#">Koleksi</a>
                                        </li> 
                                        <!-- <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li><a class="dropdown-item" href="#">Separated link</a></li> -->
                                    </ul> 
                                <input type="text" placeholder="Kata kunci pencarian..." class="form-control" 
                                aria-label="Sizing example input" 
                                aria-describedby="inputGroup-sizing-default"
                                name="katakunci"/> 

                                <input type="hidden" value="null" id="tipeasetFilter" name="tipeasetFilter"/> 
                                <input type="hidden" value="Gambar" id="tipepencarianFilter" name="tipepencarianFilter"/>  

                                <!-- <button type="submit" class="btn btn-icon btn-icon-start btn-primary stretched-link" > -->
                                <button class="btn btn-icon btn-icon-start btn-primary stretched-link" >
                                <i data-acorn-icon="search" class="me-1"></i>  
                                </button> 
                                
                            </div>
                        </div>
                    </div>
                <!-- </form>    -->

                <!-- Tags Start -->
                <div class="col-12 col-sm-6 col-xl-12"
                data-title="Daftar Tag Gambar" data-intro="Kamu juga bisa memilih gambar berdasarkan tags disini" data-step="4"> 
                    <div class="mb-5">
                        <div class="">
                        @foreach($Tags as $tag)
                            <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1" 
                            href="#"
                            >
                                <span>{{$tag->name}} ({{$tag->count}})</span>
                            </a>
                        @endforeach
                        </div>
                    </div>
                </div>
                <!-- Tags End -->

                <div class="row">
                    <div class="col-12 col-xl-12 col-xxl-12 mb-5">  
                       
                                <!-- Grid Start -->  
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-4 mb-5" id="masonryCardsExample"> 
                                    @include('dashboard.data')  
                                    </div> 
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <a href="{{$Data->nextPageUrl()}}" class="btn btn-xl btn-outline-primary sw-30">Muat Lebih Banyak</a>
                                        </div>
                                    </div>
                                <!-- Grid End -->  
                        
                    </div> 
                </div>
            </div>
        </div>  
    </div>  
    
    


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script> 

$(document).ready(function(){
   
 
    $('ul#filterTipeAset li').click( function() {
        const value = $(this).attr('value');  
        if($(this).hasClass("btn-primary")){
            $(this).removeClass("btn-primary");
            $(this).addClass("btn-outline-primary");   
            $("#tipeasetFilter").val(""); 
        } else { 
            $('ul#filterTipeAset li').removeClass();
            $('ul#filterTipeAset li').addClass("btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1");  
            $(this).removeClass("btn-outline-primary"); 
            $(this).addClass("btn-primary"); 
            $("#tipeasetFilter").val(value); 
        }  
    });

    $("#tipepencarianList").click(function(){
        if( $("#tipepencarianList").html()=="Gambar"){

            $(".side-menu-container").animate({
                width: "show"
            }); 

            $("#tipepencarianList").html("Koleksi");
            $("#tipepencarianButton").html("Gambar"); 

             //set filter
            $("#tipepencarianFilter").val("Gambar"); 
            

        } else {

            $(".side-menu-container").animate({
                width: "hide"
            }); 

            $("#tipepencarianList").html("Gambar");
            $("#tipepencarianButton").html("Koleksi");  

            //set filter
            $("#tipepencarianFilter").val("Koleksi"); 
        }
    });
});
</script>


<!-- <script> 
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
</script> -->
@endsection
 
