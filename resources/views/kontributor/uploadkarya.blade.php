@php
    $html_tag_data = []; 
    $title = 'Upload Karya';
    $description = 'Empty Page';
    $breadcrumbs = ["/"=>"Home", "/Kontributor/UploadKarya"=>"Upload Karya"]
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
<script src="/js/cs/wizard.js"></script>
<script src="/js/vendor/jquery.validate/jquery.validate.min.js"></script>
<script src="/js/vendor/jquery.validate/additional-methods.min.js"></script>
@endsection

@section('js_page')
<script src="/js/forms/controls.select2.js"></script>
<script src="/js/forms/controls.tag.js"></script>
<script src="/js/forms/wizards.js"></script>
@endsection

@section('content')
<div class="container" style="width: 65%;">
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

 <!-- Validation Start -->
 <section class="scroll-section" id="validation"> 
    <div class="card wizard" id="wizardValidation">
        <div class="card-header border-0 pb-0">
            <ul class="nav nav-tabs justify-content-center" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-center" href="#validationFirst" role="tab">
                        <div class="mb-1 title d-none d-sm-block">First</div>
                        <div class="text-small description d-none d-md-block">Upload Gambar Thumbnail</div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-center" href="#validationSecond" role="tab">
                        <div class="mb-1 title d-none d-sm-block">Second</div>
                        <div class="text-small description d-none d-md-block">Upload File</div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-center" href="#validationThird" role="tab">
                        <div class="mb-1 title d-none d-sm-block">Last</div>
                        <div class="text-small description d-none d-md-block">Lengkapi Tags</div>
                    </a>
                </li>
                <li class="nav-item d-none" role="presentation">
                    <a class="nav-link text-center" href="#validationLast" role="tab"></a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade" id="validationFirst" role="tabpanel">
                    <h5 class="card-title"><i data-acorn-icon="book" class="align-top" ></i> Petunjuk Teknis</h5>
                    
                    <div class="mb-n2">
                        <div class="row g-0 mb-2">
                            <div class="col-auto">
                                <div class="sw-3 me-1">
                                    <i data-acorn-icon="chevron-right" class="text-muted align-top" data-acorn-size="17"></i>
                                </div>
                            </div>
                            <div class="col lh-1-25">
                                Pada halaman ini, kamu diharuskan upload file jpg atau png yang mewakili karya kamu.
                            </div>
                        </div>
                        <div class="row g-0 mb-2">
                            <div class="col-auto">
                                <div class="sw-3 me-1">
                                    <i data-acorn-icon="chevron-right" class="text-muted align-top" data-acorn-size="17"></i>
                                </div>
                            </div>
                            <div class="col lh-1-25">
                                Gunakan gambar yang berdimensi dibawah 6000px panjang atau lebar dan ukuran file dibawah 30MB.
                            </div>
                        </div> 
                    </div>  

<form action="/Kontributor/Store" method="POST" enctype="multipart/form-data">

                    <div class="formwizard">
                        <div class="row"> 
                            <div class="col-sm-6 mt-5"> 
                                <div class="row">
                                    <div class="col-sm-12 col-form-label card no-shadow"> 
                                        <input type="file" class="form-control" 
                                        required
                                        name="image"
                                        id="image_input"  /> 
                                    </div>   
                                    <div class="col-md-12 mb-2"> 
                                        <img class="card-img scale" id="preview-image-before-upload" hidden>
                                        <div class="container-image-preview">
                                                <div class ="drop-container"
                                                    alt="preview image">  
                                                    <div class="drop-title">Pratinjau Gambar</div>
                                                </div> 
                                        </div> 
                                    </div>
                                </div>  
                            </div>  
                            <div class="col-sm-6 mt-5"> 
                                <div class="mb-3 filled">
                                    <i data-acorn-icon="edit"></i>
                                    <input type="text"  required class="input-judul"  placeholder="Judul Karya..." name="judul" />
                                    <small class="form-text text-muted">Sesuaikan judul dengan gambar</small>  
                                </div> 
                            </div>
                        </div> 

                    </div>

                </div>
                <div class="tab-pane fade" id="validationSecond" role="tabpanel">
                    <h5 class="card-title"><i data-acorn-icon="book" class="align-top" ></i> Petunjuk Teknis</h5>
                    
                    <div class="mb-n2">
                        <div class="row g-0 mb-2">
                            <div class="col-auto">
                                <div class="sw-3 me-1">
                                    <i data-acorn-icon="chevron-right" class="text-muted align-top" data-acorn-size="17"></i>
                                </div>
                            </div>
                            <div class="col lh-1-25">
                                Pada halaman ini, kamu bisa upload file pendukung dari karya kamu.
                            </div>
                        </div>
                        <div class="row g-0 mb-2">
                            <div class="col-auto">
                                <div class="sw-3 me-1">
                                    <i data-acorn-icon="chevron-right" class="text-muted align-top" data-acorn-size="17"></i>
                                </div>
                            </div>
                            <div class="col lh-1-25">
                                File yang diterima adalah file zip dan rar yang berisi file Illustrator, PSD, Indesign, atau Font.
                            </div>
                        </div> 
                        <div class="row g-0 mb-2">
                            <div class="col-auto">
                                <div class="sw-3 me-1">
                                    <i data-acorn-icon="chevron-right" class="text-muted align-top" data-acorn-size="17"></i>
                                </div>
                            </div>
                            <div class="col lh-1-25">
                                Ukuran file dibawah 30MB.
                            </div>
                        </div> 
                        <div class="row g-0 mb-2">
                            <div class="col-auto">
                                <div class="sw-3 me-1">
                                    <i data-acorn-icon="chevron-right" class="text-muted align-top" data-acorn-size="17"></i>
                                </div>
                            </div>
                            <div class="col lh-1-25">
                                <span class="font-weight-bold">Catatan: </span> Halaman ini bersifat opsional, apabila karyamu adalah foto. Kamu bisa melewati halaman ini dan melanjutkan ke halaman terakhir.
                            </div>
                        </div> 
                    </div>

                    <div class="formwizard">
                        <div class="row mb-3 mt-5">
                            <label for="inputState" class="font-weight-bold col-sm-3 col-form-label">Kategori File</label>
                            <div class="col-sm-9">
                                <select id="select2Multiple" class="form-select filekategori" name="kategori_file">
                                    <option selected>Pilih...</option>
                                    @foreach ($Kategoris as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori}}</option> 
                                    @endforeach
                                </select>
                            </div>
                        </div> 
                        
                        <div class="row mb-3">
                            <label for="colFormLabel" class="font-weight-bold col-sm-3 col-form-label">File  </label>
                            <div class="col-sm-9">
                                <div class="col-sm-12 col-form-label card no-shadow">
                                    <input type="file" class="form-control fileisi" name="file"   />
                                </div>   
                            </div>
                        </div> 
                    </div>  
                </div>
                <div class="tab-pane fade" id="validationThird" role="tabpanel">
                    <h5 class="card-title"><i data-acorn-icon="book" class="align-top" ></i> Petunjuk Teknis</h5>
                    
                    <div class="mb-n2">
                        <div class="row g-0 mb-2">
                            <div class="col-auto">
                                <div class="sw-3 me-1">
                                    <i data-acorn-icon="chevron-right" class="text-muted align-top" data-acorn-size="17"></i>
                                </div>
                            </div>
                            <div class="col lh-1-25">
                                Pada halaman ini, kamu harus menambahkan tags yang berhubungan dengan karya kamu.
                            </div>
                        </div>
                        <div class="row g-0 mb-2">
                            <div class="col-auto">
                                <div class="sw-3 me-1">
                                    <i data-acorn-icon="chevron-right" class="text-muted align-top" data-acorn-size="17"></i>
                                </div>
                            </div>
                            <div class="col lh-1-25">
                                Kamu harus isi minimal 3 tags dengan menggunakan koma sebagai tanda pisah.
                            </div>
                        </div>   
                    </div>  
                    <div class="formwizard">
                        <div class="row mb-3 mt-5">
                            <label class="font-weight-bold col-sm-3 col-form-label">Tags</label> 
                                <div class="col-sm-10">
                                    <input  required
                                            id="tagsBasic"
                                            name="tags"
                                    />
                                    <small class="form-text text-muted">Tuliskan minimal 3 tags. Setiap tag dipisahkan dengan tanda koma</small> 
                                </div>
                        </div>
                    </div> 
                </div>
                <div class="tab-pane fade" id="validationLast" role="tabpanel">
                    <div class="text-center mt-5">
                        <h5 class="card-title">Selamat, isian form kamu sudah lengkap!</h5>
                        <p class="card-text text-alternate mb-4">Silahkan submit hasil karya kamu!</p>
                        <button class="btn btn-icon btn-icon-start btn-primary" type="button">
                            <i data-acorn-icon="send"></i>
                            <span>Submit</span>
                        </button>

</form>

                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-center border-0 pt-1">
            <button class="btn btn-icon btn-icon-start btn-outline-primary btn-prev" type="button">
                <i data-acorn-icon="chevron-left"></i>
                <span>Back</span>
            </button>
            <button class="btn btn-icon btn-icon-end btn-outline-primary btn-next" type="button">
                <span>Next</span>
                <i data-acorn-icon="chevron-right"></i>
            </button>
        </div>
    </div>
</section>
<!-- Validation End -->

        {{-- <div class="card mb-5">

            <div class="row card-body" style="margin-bottom:-50px;">
                <form id="petugasModalForm" action="/Kontributor/Store" method="POST" enctype="multipart/form-data">
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
                                name="image"
                                id="image_input"  /> 
                        </div>   
                        <div class="col-md-12 mb-2"> 
                            <img class="card-img scale" id="preview-image-before-upload" hidden>
                            <div class="container-image-preview">
                                    <div class ="drop-container"
                                        alt="preview image">  
                                        <div class="drop-title">Pratinjau Gambar</div>
                                    </div>
                                        
                            </div>
                            <div> 
                                Catatan: Gunakan gambar yang berdimensi dibawah 6000px panjang atau lebar dan ukuran file dibawah 30MB
                            </div> 
                                          
                            
                        </div> 
                    </div> 

                </div>
                <div class="col-8">
                    <div class="card-body">  
                            <div class="row mb-3">   
                                <div class="col-sm-12"> 
                                    <div class="mb-3 filled">
                                        <i data-acorn-icon="edit"></i>
                                        <input type="text" class="input-judul"  placeholder="Judul Karya..." name="judul" />
                                        <small class="form-text text-muted">Sesuaikan judul dengan gambar</small>  
                                    </div> 
                                </div> 
                            </div>      

                            <div class="row mb-3">
                                <label class="font-weight-bold col-sm-3 col-form-label">Tags</label>
                                <div class="col-sm-9">
                                    <input 
                                            id="tagsBasic"
                                            name="tags"
                                    />
                                    <small class="form-text text-muted">Tuliskan minimal 3 tags. Setiap tag dipisahkan dengan tanda koma</small>
                                    <!-- <input class="form-control" type="text" data-role="tagsinput" name="tags"> -->
                                </div>
                            </div>

                            <div class="row mb-3"> 
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input col-sm-3" id="checkfile" onchange="valueChanged()">
                                    <label for="inputState" class="font-weight-bold form-check-label">Upload file zip <span class="font-italic"> (Optional) </span> </label>
                                </div>
                            </div>

                            <div id="hidden_div" style="display:none;">
                            <div class="row mb-3">
                                <label for="inputState" class="font-weight-bold col-sm-3 col-form-label">Kategori File</label>
                                <div class="col-sm-9">
                                    <select id="select2Multiple" class="form-select filekategori" name="idkegunaan">
                                        <option selected>Pilih...</option>
                                        @foreach ($Kategoris as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori}}</option> 
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            
                                <div class="row mb-3">
                                    <label for="colFormLabel" class="font-weight-bold col-sm-3 col-form-label">File  </label>
                                    <div class="col-sm-9">
                                        <div class="col-sm-12 col-form-label card no-shadow">
                                            <input type="file" class="form-control fileisi" name="file"   />
                                        </div>   
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer" style="border-top:none;"> 
                                <button type="submit" class="btn btn-primary" id="addEditConfirmButton">Kirim</button>
                            </div>

                        </form>
                        
                        </div>
                    </div>
                    <!-- Content End -->
                </div>
            </div>  
        </div>  --}}
</div> 
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
      
$(document).ready(function (e) {
 
   
   $('#image_input').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
        $('.container-image-preview').attr("hidden",true);
        $('#preview-image-before-upload').attr('src', e.target.result).removeAttr('hidden'); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
 
</script>
 

@endsection
