@php
    $html_tag_data = [];
    $title = 'Permintaan # '.$permintaan_id;
    $description = 'Empty Page';
    $breadcrumbs = ["/"=>"Home", "Petugas/Index"=>"Daftar Tugas", "Petugas/transaksi/$transaksi_id/permintaan/$permintaan_id"=>"Permintaan Gambar # $permintaan_id"]
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
<link rel="stylesheet" href="/css/vendor/datatables.min.css"/>
<link rel="stylesheet" href="/css/main.css"/>
<link rel="stylesheet" href="/css/tag.css"/>
<link rel="stylesheet" href="/css/vendor/select2.min.css"/>
<link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css"/>
<link rel="stylesheet" href="/css/vendor/tagify.css"/>
@endsection

@section('js_vendor')
<script src="/js/vendor/bootstrap-submenu.js"></script>
<script src="/js/vendor/mousetrap.min.js"></script>
<script src="/js/vendor/select2.full.min.js"></script>
<script src="/js/vendor/tagify.min.js"></script>
<script src="/js/cs/scrollspy.js"></script>
@endsection

@section('js_page')
<script src="/js/forms/controls.select2.js"></script>
<script src="/js/forms/controls.tag.js"></script>
@endsection

@section('content')
<div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <!-- Title Start -->
                <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                    @include('_layout.breadcrumb',['breadcrumbs'=>$breadcrumbs])
                </div>
                <!-- Title End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <!-- Content Start -->
        <h2 class="small-title">Form Pelayanan Permintaan Gambar</h2>
        <div class="card mb-5">

            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <form id="petugasModalForm" action="{{route('petugas.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="alert alert-primary" role="alert">
                                    Tolak permintaan gambar ini ? klik <a class="alert-link" href ="{{route('petugas.layani_tolak', ['transaksi_id' => $transaksi_id,'permintaan_id' => $permintaan_id])}}" > disini</a>
                                </div>
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

                            <div class="row mb-3">
                                
                                <div class="col-sm-10">
                                    <input type="hidden" value="{{$transaksi_id}}" class="form-control" id="" name="transaksi_id"/>             
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="font-weight-bold col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$Data->permintaan->judulPermintaan}}" class="form-control" id="" name="judul" /> 
                                    <input type="hidden" value="{{$Data->id}}" class="form-control" id="" name="bagitugas_id"/>             
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="font-weight-bold col-sm-2 col-form-label">Link</label>
                                <div class="col-sm-10">
                                <label class=" col-sm-12 col-form-label">
                                    <a href ="{{$Data->permintaan->linkPermintaan}}" target="_blank" rel="noopener noreferrer" > {{$Data->permintaan->linkPermintaan}}</a>
                                    <input type="hidden" value="{{$Data->permintaan->linkPermintaan}}" class="form-control" name="link" />   
                                </label>                  
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="font-weight-bold col-sm-2 col-form-label">Tanggal Permintaan</label>
                                <div class="col-sm-10">
                                    <label class=" col-sm-12 col-form-label">
                                    {{date_format($Data->permintaan->created_at,"d M Y")}}
                                    </label>                  
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="font-weight-bold col-sm-2 col-form-label">Penggunaan</label>
                                <div class="col-sm-10">
                                    <label class=" col-sm-12 col-form-label">
                                    {{ $Data->permintaan->kegunaan->kegunaan }}
                                        <input type="hidden" value="{{ $Data->permintaan->kegunaan->kegunaan }}" class="form-control" name="idKegunaan" />  
                                    </label>               
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="font-weight-bold col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <label class=" col-sm-2 col-form-label">
                                        <?php echo $Data->permintaan->status->status ?>
                                    </label>              
                                </div>
                            </div> 

                            <div class="row mb-3">
                                <label for="colFormLabel" class="font-weight-bold col-sm-2 col-form-label">Upload Gambar</label>
                                <div class="col-sm-10">
                                    <div class="col-sm-12 col-form-label card no-shadow">
                                        <input type="file" class="form-control" 
                                        name="image"
                                        id="image_input" 
                                        style="max-width: 450px;"/> 
                                    </div>   

                                    <div class="col-md-12 mb-2">
                                        <img class ="card-img sw-50 scale" id="preview-image-before-upload"  
                                            alt="preview image"> 
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="colFormLabel" class="font-weight-bold col-sm-2 col-form-label">Upload File  <span class="font-italic"> (Optional) </span> </label>
                                <div class="col-sm-10">
                                    <div class="col-sm-12 col-form-label card no-shadow">
                                        <input type="file" class="form-control" name="file" style="max-width: 450px;" />
                                    </div>   
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="font-weight-bold col-sm-2 col-form-label">Tags</label>
                                <div class="col-sm-10">
                                    <input 
                                            id="tagsBasic"
                                            name="tags"
                                    />
                                    <small class="form-text text-muted">Tuliskan minimal 3 tags. Setiap tag dipisahkan dengan tanda koma</small>
                                    <!-- <input class="form-control" type="text" data-role="tagsinput" name="tags"> -->
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" id="addEditConfirmButton">Kirim</button>
                            </div>

                        </form>
                        
                        </div>
                    </div>
                    <!-- Content End -->
                </div>
            </div>  
        </div> 
</div> 
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
      
$(document).ready(function (e) {
 
   
   $('#image_input').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
 
</script>
@endsection
