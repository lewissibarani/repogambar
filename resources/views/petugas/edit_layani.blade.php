@php
    $fileid=0;
    if (!$Data->gambar->file_id==null) { 
        $fileid=$Data->gambar->file_id;
    }; 
    $html_tag_data  = [];
    $title          = 'Edit Permintaan #'.$Data->id_permintaan;
    $description    = 'Empty Page';
    $breadcrumbs    = ["/"=>"Home", "Petugas/Index"=>"Daftar Tugas", "Petugas/transaksi/$Data->id/permintaan/$Data->id_permintaan"=>"Edit Permintaan #$Data->id_permintaan"]
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
        <div class="card mb-5"> 
            <div class="row">
                <form id="petugasModalForm" action="{{route('petugas.edit_store')}}" method="POST" enctype="multipart/form-data">
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
            </div>

            <div class="row">
                <div class="col-4"> 
                    <div class="card-body">
    
                        <div class="col-sm-12 col-form-label card no-shadow"> 
                                    <input type="file" class="form-control" 
                                    name="edit_image" 
                                    id="image_input"   /> 
                            </div>   
                            <div class="col-md-12 mb-2"> 
                                <img class ="card-img scale" id="preview-image-before-upload" src="/{{$Data->gambar->thumbnail_path}}"
                                alt="preview image"  > 
                                <input type="hidden" value="{{$Data->gambar->id}}" class="form-control" name="id_gambar" />
                                        @error('image')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                <div> 
                                    Catatan: Gunakan gambar yang berdimensi dibawah 6000px panjang atau lebar dan ukuran file dibawah 30MB
                                </div> 
                             
                                              
                                
                            </div> 
                    </div>  

                </div>
                <div class="col-8">
                    <div class="card-body">  
                                    <input type="hidden" value="{{$Data->id}}" class="form-control" id="" name="transaksi_id"/>   

                            <div class="row mb-3"> 

                                <div class="mb-3 filled">
                                    <i data-acorn-icon="edit"></i>
                                    <input type="text" value="{{$Data->gambar->judul}}" class="input-judul" id="" name="edit_judul" />
                                    <small class="form-text text-muted">Sesuaikan judul dengan gambar</small>    
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="font-weight-bold col-sm-2 col-form-label">Link</label>
                                <div class="col-sm-10">
                                <label class=" col-sm-12 col-form-label">
                                    <a href ="{{$Data->linkPermintaan}}" target="_blank" rel="noopener noreferrer" > {{$Data->linkPermintaan}}</a>
                                    <input type="hidden" value="{{$Data->linkPermintaan}}" class="form-control" name="link" />
                                </label>                  
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="font-weight-bold col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <label class=" col-sm-12 col-form-label">
                                    {{date_format($Data->created_at,"d M Y")}}
                                    </label>                  
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="font-weight-bold col-sm-2 col-form-label">Penggunaan</label>
                                <div class="col-sm-10">
                                    <label class=" col-sm-12 col-form-label">
                                    {{$Data->kegunaan->kegunaan }}
                                        <input type="hidden" value="{{ $Data->kegunaan->kegunaan }}" class="form-control" name="idKegunaan" />  
                                    </label>               
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="font-weight-bold col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <label class=" col-sm-2 col-form-label">
                                        <?php echo $Data->status->status ?>
                                    </label>              
                                </div>
                            </div>  

                            <div class="row mb-3">
                                <label for="colFormLabel" class="font-weight-bold col-sm-2 col-form-label">File <span class="font-italic">(Optional) </span> </label>
                                <div class="col-sm-10">
                                    <div class="col-sm-12 col-form-label card no-shadow">
                                        <input type="file" class="form-control" name="edit_file" style="max-width: 450px;"/> 
                                        <input type="hidden" value="{{$fileid}}" class="form-control" name="id_file"  />
                                    </div>   
                                    <div class="col-md-12 mb-2">
                                    @php
                                    if (!is_null($Data->gambar->file_id)) { 
                                    @endphp
                                        <span class="font-weight-bold">Link File: </span> <a href ="{{$Data->gambar->file->path}}" target="_blank" rel="noopener noreferrer" > {{$Data->gambar->file->nama_file}}</a>
                                    @php
                                    }
                                    @endphp    
                                </div>
                                </div>
                               
                            </div>

                            <div class="row mb-3">
                                <label class="font-weight-bold col-sm-2 col-form-label">Tags</label>
                                <div class="col-sm-10">
                                    <input 
                                            id="tagsBasic"
                                            name="tags"
                                            value="{{$Tags}}"
                                    />
                                    <small class="form-text text-muted">Tuliskan minimal 3 tags. Setiap tag dipisahkan dengan tanda koma</small>
                                    <!-- <input class="form-control" type="text" data-role="tagsinput" name="tags"> -->
                                </div>
                            </div>
                            <div class="modal-footer"> 
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
