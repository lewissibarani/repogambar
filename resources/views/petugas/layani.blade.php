@php
    $html_tag_data = [];
    $title = 'Halaman Petugas';
    $description= 'A table enhancing plug-in for the jQuery Javascript library, adding sorting, paging and filtering abilities to plain HTML tables with minimal effort.';
    $breadcrumbs = ["/"=>"Home","/Petugas/Index"=>"Halaman Petugas"]
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/datatables.min.css"/>
    <link rel="stylesheet" href="/css/main.css"/>
    <link rel="stylesheet" href="/css/tag.css"/>
    <link rel="stylesheet" href="/css/vendor/select2.min.css"/>
    <link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css"/>
@endsection

@section('js_vendor')
    <script src="/js/vendor/bootstrap-submenu.js"></script>
    <script src="/js/vendor/datatables.min.js"></script>
    <script src="/js/vendor/mousetrap.min.js"></script>
    <script src="/js/vendor/select2.full.min.js"></script>
    <script src="/js/cs/scrollspy.js"></script>
    <script src="/js/vendor/singleimageupload.js"></script>
@endsection

@section('js_page')
    <script src="/js/cs/datatable.extend.js"></script>
    <script src="/js/petugas/datatable.petugas.js"></script>
    <script src="/js//tags/tags.js"></script>
    <script src="/js/forms/controls.select2.js"></script>
    <script src="/js/petugas/auth.petugas.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Title and Top Buttons Start -->
                <div class="page-title-container">
                    <div class="row">
                        <!-- Title Start -->
                        <div class="col-12 col-md-7">
                            <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                            @include('_layout.breadcrumb',['breadcrumbs'=>$breadcrumbs])
                        </div>
                        <!-- Title End -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label class="font-weight-bold col-sm-2 col-form-label">Judul</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="" name="judul" /> 
                                            <input type="hidden" class="form-control" id="" name="bagitugas_id"/>             
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="font-weight-bold col-sm-2 col-form-label">Link</label>
                                        <div class="col-sm-10">
                                        <label class=" col-sm-12 col-form-label">
                                            <span class="previewLink"></span>
                                            <input type="hidden" class="form-control" name="link" />   
                                        </label>                  
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="font-weight-bold col-sm-2 col-form-label">Tanggal Permintaan</label>
                                        <div class="col-sm-10">
                                            <label class=" col-sm-12 col-form-label">
                                                <span class="previewWaktu"></span>
                                            </label>                  
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="font-weight-bold col-sm-2 col-form-label">Penggunaan</label>
                                        <div class="col-sm-10">
                                            <label class=" col-sm-12 col-form-label">
                                                <span class="previewKegunaan"></span>
                                                <input type="hidden" class="form-control" name="idKegunaan" />  
                                            </label>               
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="font-weight-bold col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <label class=" col-sm-2 col-form-label">
                                                <span class="previewStatus"></span>
                                            </label>              
                                        </div>
                                    </div>

                                    <span class="previewAlasanTolak"></span>
                                    
                                    <div class="row mb-3">
                                        <label class="font-weight-bold col-sm-2 col-form-label">Source</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="source_id" id="select2Basic">
                                                <option selected>Pilih...</option>
                                                @foreach ($Source as $source)
                                                    <option value="{{ $source->id }}">{{ $source->sumber_gambar }}</option> 
                                                @endforeach
                                            </select>            
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="colFormLabel" class="font-weight-bold col-sm-2 col-form-label">Upload Gambar</label>
                                        <div class="col-sm-10">
                                            <div class="col-sm-12 col-form-label card no-shadow mb-5">
                                                <input type="file" class="form-control" name="image" />
                                            </div>   
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="font-weight-bold col-sm-2 col-form-label">Tags</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" data-role="tagsinput" name="tags">
                                            <!-- <input class="form-control" type="text" data-role="tagsinput" name="tags"> -->
                                            <!-- <input type="text" class="form-control" id="hashtags" onkeypress="return event.keyCode != 13;" autocomplete="off" >
                                            <div class="tag-container"></div>                  -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                </div>
            </div>
        </div>
    </div>
@endsection




