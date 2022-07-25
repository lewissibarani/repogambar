@php
    $html_tag_data = ["override"=>'{"attributes" : { "layout": "boxed" }}'];
    $title = 'Pengaturan';
    $description = 'Beranda';
    $breadcrumbs = ["/"=>"Home","/Petugas/Pengaturan"=>"Pengaturan Petugas"]
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
<link rel="stylesheet" href="/css/vendor/select2.min.css"/>
<link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css"/>
@endsection

@section('js_vendor')
<script src="/js/cs/scrollspy.js"></script>
<script src="/js/cs/scrollspy.js"></script>
<script src="/js/vendor/select2.full.min.js"></script>
@endsection

@section('js_page')
<script src="/js/forms/controls.select2.js"></script>
@endsection

@section('content')
<div class="container">
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
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-12 col-xxl-12 mb-5">  
            
            <section class="scroll-section" id="basicMultiple">
                <h2 class="small-title">Tambah Petugas</h2>
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                        <select class="form-control" id="select2Basic">
                                        <option label="Cari nama petugas..."></option>
                                        @foreach ($User as $users)
                                            <option value="{{$users->id}}">{{$users->name}}</option>
                                        @endforeach
                                        </select>
                                        <small class="text-muted"> Pilih nama petugas baru yang akan ditambahkan.</small>
                            </div>
                            <div class="col-2">
                                    <a href="/Dashboard/HasilPencarian" class="btn btn-icon btn-primary">
                                        <i data-acorn-icon="plus"></i>
                                        <span>Tambah Petugas</span>
                                    </a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="row">
                <div class="col-12 col-xl-8 col-xxl-9 mb-5">    
                    <!-- Grid Start -->
                    <h2 class="small-title">Daftar Petugas</h2>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 gallery g-2 mb-5">
                        @foreach ($User_Petugas as $users_petugas)
                            <div class="col">
                                <div class="card h-100">
                                    <img src="{{$users_petugas->users->profilepicture}}" class="card-img-top sh-30" alt="card image" />
                                    <div class="card-body">
                                        <a href="/Dashboard/DetailGambar" class="">
                                            {{$users_petugas->users->name}}
                                        </a>
                                        <div class="text-muted mb-1">{{$users->satker}}</div>

                                        <div class="row g-0 align-items-center mb-2">
                                            <div class="col-auto">
                                                <div class="sw-3 d-flex justify-content-center align-items-center">
                                                <i data-acorn-icon="laptop" class="text-primary" data-acorn-size="17"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Jumlah Tugas Selesai"></i>
                                                </div>
                                            </div>
                                            <div class="col ps-3">
                                                <div class="d-flex align-items-center lh-1-25">{{$users_petugas->count_task}}</div>
                                            </div>
                                        </div>

                                        <div class="row g-0 align-items-center mb-2">
                                            <div class="col-auto">
                                                <div class="sw-3 d-flex justify-content-center align-items-center">
                                                    <i data-acorn-icon="phone" class="text-primary"></i>
                                                </div>
                                            </div>
                                            <div class="col ps-3">
                                                <div class="d-flex align-items-center lh-1-25">{{$users_petugas->users->nohp}}</div>
                                            </div>
                                        </div>

                                        <div class="row g-0 align-items-center mb-2">
                                            <div class="col-auto">
                                                <div class="sw-3 d-flex justify-content-center align-items-center">
                                                    <i data-acorn-icon="email" class="text-primary"></i>
                                                </div>
                                            </div>
                                            <div class="col ps-3">
                                                <div class="d-flex align-items-center lh-1-25">{{$users_petugas->users->email}}</div>
                                            </div>
                                        </div>

                                        <div class="row g-0 align-items-center mb-2">
                                            <div class="col-auto">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked />
                                                    </div>
                                            </div>  
                                            <div class="col ps-1">
                                                <div class="d-flex align-items-center lh-1-25">Aktif</div>
                                            </div>  
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Grid End -->
                </div>
            </div>
        </div>
</div>
@endsection