@php  
 
    $html_tag_data = ["override"=>'{"attributes" : { "layout": "none" }}']; 
    $title = $currentalbum->judulalbum; 
    $deskripsialbum = $currentalbum->deskripsi;  
    $albumid = $currentalbum->id; 
    $resourcecount = $countresource;
    if($resourcecount>=100){
      $resourcecount = "100 + ";
    }
    // $breadcrumbs = ["/"=>"Home","/Dashboard"=>"Beranda"];
    // $file = ""; 

@endphp

@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>""])

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

@push('show.album')
  <style> 
  main { 
    padding-left: calc(var(--nav-size) + var(--main-spacing-horizontal));
    padding-right: var(--main-spacing-horizontal);
    padding-top: var(--main-spacing-vertical);
    padding-bottom: var(--main-spacing-vertical);
  }
 h1{
    font-size: 38px;
 }

 .description{
  font-size: 18px;
 }
  .showalbum { 
    padding-top: var(--main-spacing-vertical);  
  }

  </style>  

@endpush

@section('content') 
  
    <!-- ======= Judul Album Section ======= -->
    <section id="" class="showalbum scroll-section about">
      <div class="container  text-center">
 
          <h1 class="mb-4">{{$title}}</h1>
            <p class="description text-left mb-4">
            {{$deskripsialbum}}
            </p> 
             
                <p class="text-muted mb-2">Album dibuat oleh:  <a href="{{route('kontributor.profil',['user_id'=> $currentalbum->user->id])}}">{{$currentalbum->user->name}}</a> |  {{$resourcecount}} Aset</p>
                   
                    <div class="     mb-2">{{$currentalbum->user->satker}}</div>  
          

      </div>

      <div class=" d-flex justify-content-center" > 
        <div class="">
  
          <button id="modaleditAlbum" type="button" class="btn btn-icon btn-icon-start btn-primary mb-1" 
              href="">
                  <i data-acorn-icon="plus"></i>
                  <span>Edit Album</span>
          </button> 
        </div> 
          
      </div>
    </section><!-- End Judul Album Section -->

    <!-- ======= Daftar Album Section ======= -->
    @if ($childalbum->count()!=0)
    <section id="daftar album" class="showalbum scroll-section about">
      <div class="container" data-aos="fade-up">

        <h1 class="mb-4">Daftar Koleksi</h1>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-4 mb-5" > 

          @foreach($childalbum as $datas)    
           
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
    </section><!-- End Judul Album Section -->
    @endif

    <!-- ======= Daftar Image Section ======= -->
    @if ($resource->count()!=0) 
    <section id="daftar image" class="showalbum scroll-section about">
      <div class="container" data-aos="fade-up">

        <h1 class="mb-4">Daftar Foto </h1>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-4 mb-5" > 
            @foreach($resource as $datas)
                <div class="col">
                    <a href="{{route('dashboard.detailgambar',['gambar_id'=>$datas->id])}}">
                        <div class="card hover-img-scale-up hover-reveal">
                            <img class="card-img sh-35 scale"  
                            src="{{Storage::temporaryUrl($datas->thumbnail_path,now()->addMinutes(30))}}" 
                            src=""
                            alt="card image" />
                            <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                <div class="row g-0">
                                </div> 
                                    <div class="row g-0">
                                        <div class="col pe-2"> 
                                                <h5 class="heading text-white mb-1">{{$datas->judul}}</h5>  
                                            
                                        </div>
                                    </div>
                            </div>
                        </div> 
                    </a>
                </div>
            @endforeach
        </div>
          

      </div>
    </section><!-- End Daftar Image Section -->
    @endif

    @include('album.modaledit') 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script> 

    $('body').on('click', '#submit', function (event) {
        event.preventDefault() 
        var id = $("#albumid").val(); 
        var judulalbum = $("#editjudulalbum").val();
        var deskripsi = $("#editdeskripsi").val();
        // var tags = $("#tagsBasic").val();
        var url="{{route('album.index') }}" + "/"+id;  
      
        $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: url,
          type: "PUT",
          data: {
            id: id,
            judulalbum: judulalbum,
            deskripsi: deskripsi,
            // tags: tags 
          },
          dataType: 'json',
          success: function (data) {
              
              $('#formEditModalAlbum').trigger("reset");
              $('#editModalAlbum').modal('hide');
              window.location.reload(true);
          }
      });
    });

      
    $("#modaleditAlbum").click(function (e) {

    event.preventDefault();
    var id = "{{$albumid}}"; 
    $.get(id + '/edit', function (data) {
      $('#editModalAlbum').modal('show');  
      $('#albumid').val(data.data.id);
      $('#editjudulalbum').val(data.data.judulalbum);
      $('#editdeskripsi').val(data.data.deskripsi); 
      // $('#tagsBasic').val(data.tags); 
    })
    }); 
</script>
   
  @endsection