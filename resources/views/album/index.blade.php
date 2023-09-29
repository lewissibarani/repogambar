@php
    $html_tag_data = [];
    $title = 'Daftar Album Saya';
    $description= 'A table enhancing plug-in for the jQuery Javascript library, adding sorting, paging and filtering abilities to plain HTML tables with minimal effort.';
    $breadcrumbs = ["/"=>"Home","/landpagesetting"=>"Daftar Album"]
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/datatables.min.css"/>
    <link rel="stylesheet" href="/css/vendor/tagify.css"/>
 
@endsection

@section('js_vendor')
    <script src="/js/cs/scrollspy.js"></script>
    <script src="/js/vendor/datatables.min.js"></script>
    <script src="/js/vendor/tagify.min.js"></script> 
@endsection

@section('js_page')
    <script src="/js/cs/datatable.extend.js"></script>
    <script src="/js/plugins/datatable.boxedvariations.js"></script>
    <script src="/js/forms/controls.tag.js"></script> 
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Title Start -->
                <section class="scroll-section" id="title">
                    <div class="page-title-container">
                        <h1 class="mb-0 pb-0 display-4">{{ $title }}</h1>
                        @include('_layout.breadcrumb',['breadcrumbs'=>$breadcrumbs])
                    </div>
                </section>
                <!-- Title End -->
                
                            @if(session()->has('message'))
                                <div class="alert alert-info">
                                {!! session()->get('message') !!}
                                </div>
                            @endif

                     <!-- ======= Daftar Album Section ======= --> 
 
                <section class="scroll-section mb-5" id="default"> 
                    <button id="modalstoreAlbum" type="button" class="btn btn-primary btn-icon btn-icon-start add-datatable"
                        href="">
                            <i data-acorn-icon="plus"></i>
                            <span>Tambah Baru</span>
                    </button>
                </section> 

                <section id="daftar album" class="showalbum scroll-section about">
                <div class="container" data-aos="fade-up"> 
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-4 mb-5" > 

                    @foreach($Data as $datas)
                    
                    <div class="col"> 
                        <div class="sh-35 mb-4">
                            <div class="row g-1 h-100 gallery"> 
                                @if(isset($datas['gambar']))
                                    @include ('album._thumbnail', ['gambar' => $datas['gambar']])
                                @endif 
                            </div>
                        </div>
                        <a href="{{route('album.show',['album' => $datas->id])}}">
                        <div class=" ">
                            <h5 class="heading mb-0 d-flex"> 
                                <p class="font-weight-bold">{{$datas->judulalbum}}</p>
                            </h5>
                        </div> 
                        </a>
                        <div class="pb-3"> 
                                <span class="text-muted">{{$datas['gambar']->count()}} Aset | Dibuat oleh: </span> <a href="{{route('kontributor.profil',['user_id'=> $datas->user->id])}}">{{$datas->user->name}}</a>  
                        </div>
                    </div>
                    @endforeach

                    </div>   
                    

                </div>
                </section> 


                    </div>
                @include('album.modalstore') 
        </div>
    </div> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    
    var ENDPOINT = "{{route('album.create')}}";
    if ('{{ env('APP_ENV') }}' == 'production')
    {
        ENDPOINT = '{{ env('APP_URL') }}'+'/album/create';
    }
      
   
  
    $("#modalstoreAlbum").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        }); 

        $.ajax({ 
            url: ENDPOINT,  
            type: "GET",
            cache: false,
            success:function(response){ 
                //open modal
                $('#storeModalAlbum').modal('show');
                },
            error: function (data) {
                console.log(data);
            }
        });

    }); 
</script>

@endsection
