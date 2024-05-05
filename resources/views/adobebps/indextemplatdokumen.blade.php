@php
    $html_tag_data = [];
    $title = 'Templat Dokumen';
    $description= 'A table enhancing plug-in for the jQuery Javascript library, adding sorting, paging and filtering abilities to plain HTML tables with minimal effort.';
    $breadcrumbs = ["/"=>"Home","{{route('adobebps.index')}}"=>"Templat Dokumen"]
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/datatables.min.css"/>
@endsection

@section('js_vendor')
    <script src="/js/cs/scrollspy.js"></script>
    <script src="/js/vendor/datatables.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/cs/datatable.extend.js"></script>
    <script src="/js/plugins/datatable.boxedvariations.js"></script>
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

                    <!-- Hover Start -->
                    <section class="scroll-section" id="hover">
                        <div class="card mb-5">
                            <div class="card-body">
                                <!-- Hover Controls Start -->
                                <div class="row">
                                    <div class="col-12 d-flex align-items-start justify-content-left">
                                        <section class="scroll-section" id="default">
                                            <button type="button" class="btn btn-primary btn-icon btn-icon-start add-datatable" 
                                                data-bs-toggle="modal"        
                                                data-bs-target="#addDokumenPenting">
                                                    <i data-acorn-icon="plus"></i>
                                                    <span>Tambah Dokumen</span>
                                            </button>
                                        </section>
                                        @include('adobebps.formtemplatdokumen')   
                                    </div>

                                    <div class="col-12 col-sm-7 col-lg-9 col-xxl-10 text-end mb-1">
                                        <div class="d-inline-block">
                                            <button class="btn btn-icon btn-icon-only btn-outline-muted btn-sm datatable-print" type="button" data-datatable="#datatableHover">
                                                <i data-acorn-icon="print"></i>
                                            </button>

                                            <div class="d-inline-block datatable-export" data-datatable="#datatableHover">
                                                <button
                                                        class="btn btn-icon btn-icon-only btn-outline-muted btn-sm dropdown"
                                                        data-bs-toggle="dropdown"
                                                        type="button"
                                                        data-bs-offset="0,3"
                                                >
                                                    <i data-acorn-icon="download"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                    <button class="dropdown-item export-copy" type="button">Copy</button>
                                                    <button class="dropdown-item export-excel" type="button">Excel</button>
                                                    <button class="dropdown-item export-cvs" type="button">Cvs</button>
                                                </div>
                                            </div>
                                            <div class="dropdown-as-select d-inline-block datatable-length" data-datatable="#datatableHover">
                                                <button
                                                        class="btn btn-outline-muted btn-sm dropdown-toggle"
                                                        type="button"
                                                        data-bs-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false"
                                                        data-bs-offset="0,3"
                                                >
                                                    10 Items
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">5 Items</a>
                                                    <a class="dropdown-item active" href="#">10 Items</a>
                                                    <a class="dropdown-item" href="#">20 Items</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-5 col-lg-3 col-xxl-2 mb-1">
                                        <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 border border-separator bg-foreground search-sm">
                                            
                                            <input class="form-control form-control-sm datatable-search" placeholder="Search" data-datatable="#datatableHover" />
                                            <span class="search-magnifier-icon">
                                            <i data-acorn-icon="search"></i>
                                            </span>
                                            <span class="search-delete-icon d-none">
                                            <i data-acorn-icon="close"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Hover Controls End -->

                                <!-- Hover Table Start -->
                                <table
                                        class="table data-table-pagination data-table-standard responsive nowrap hover"
                                        id="datatableHover"
                                        data-order='[[ 4, "desc" ]]'
                                >
                                    <thead>
                                    <tr>
                                        <th class="text-muted text-small text-uppercase">No</th> 
                                        <th class="text-muted text-small text-uppercase">Nama Dokumen</th>
                                        <th class="text-muted text-small text-uppercase">Link</th> 
                                        <th class="text-muted text-small text-uppercase">Diupload Oleh</th> 
                                        <th class="text-muted text-small text-uppercase">Diupdate Terakhir</th> 
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($Data as $datas) 
                                        <tr style="height:50px;">
                                            <td>{{$datas->id}}</td>
                                            <td class="text-alternate">{{$datas->jenisdokumen}}</td> 
                                            <td class="text-alternate"><a class="" href="{{$datas->path}}">Unduh</a></td> 
                                            <td class="text-alternate">{{$datas->getuser->name}}</td>
                                            <td class="text-alternate"> {{$datas->updated_at}} </td> 
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <!-- Hover Table End -->
                            </div>
                        </div>
                    </section>
                    <!-- Hover End -->
                    </div> 

        </div>
    </div> 
@endsection
