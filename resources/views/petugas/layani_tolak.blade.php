@php
    $html_tag_data = [];
    $title = 'Permintaan # '.$permintaan_id.' Ditolak';
    $description = 'Empty Page';
    $breadcrumbs = ["/"=>"Home", "Petugas/Index"=>"Daftar Tugas", "Petugas/transaksi/$transaksi_id/permintaan/$permintaan_id"=>"Permintaan Gambar # $permintaan_id","Petugas/Transaksi_tolak/$transaksi_id/Permintaan_tolak/$permintaan_id"=>"Permintaan Gambar # $permintaan_id Ditolak"]
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
        <h2 class="small-title">Form Penolakan Permintaan Gambar</h2>
        <div class="card mb-5">
            <div class="card-body h-100">

            <div class="alert alert-primary" role="alert">
                Tuliskan alasan penolakan permintaan gambar dengan jelas.
            </div>

        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <form id="petugasModalForm" action="{{route('petugas.tolak')}}" method="POST" enctype="multipart/form-data">
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

                        <div class="row mb-3">
                                
                                <div class="col-sm-10">
                                    <input type="hidden" value="{{$transaksi_id}}" class="form-control" id="" name="transaksi_id"/>    
                                    <input type="hidden" value="{{$Data->id}}" class="form-control" id="" name="bagitugas_id"/>          
                                </div>
                            </div>

                        <div class="row mb-3">
                            <label class="font-weight-bold col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <label class=" col-sm-12 col-form-label">
                                    {{$Data->permintaan->judulPermintaan}}
                                </label>      
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
                            <label class="font-weight-bold col-sm-2 col-form-label">Alasan Ditolak</label>
                            <div class="col-sm-10">
                                <textarea rows="4" class="form-control" id="" name="alasanDitolak"> </textarea>          
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" id="addEditConfirmButton">Kirim</button>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
        <!-- Content End -->
    </div>

    @endsection
