@php
    $html_tag_data = [];
    $title = 'Halaman Petugas';
    $description= 'A table enhancing plug-in for the jQuery Javascript library, adding sorting, paging and filtering abilities to plain HTML tables with minimal effort.';
    $breadcrumbs = ["/"=>"Home","/Petugas/Index"=>"Halaman Petugas"]
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/datatables.min.css"/>
@endsection

@section('js_vendor')
    <script src="/js/vendor/datatables.min.js"></script>
    <script src="/js/cs/scrollspy.js"></script>
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

                    <!-- Hover Start -->
                    <section class="scroll-section" id="hover">
                        <div class="card mb-5">
                            <div class="card-body">
                                <!-- Hover Controls Start -->
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-12 col-xxl-11 text-end mb-1">
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
                                </div>
                                <!-- Hover Controls End -->

                                <!-- Hover Table Start -->
                                <table
                                        class="table"
                                        id="datatableHover"
                                        data-order='[[ 0, "desc" ]]'
                                >
                                    <thead>
                                        <tr>
                                            <th class="text-muted text-small text-uppercase">ID Permintaan</th>
                                            <th class="text-muted text-small text-uppercase">Pembuat Permintaan</th>
                                            <th class="text-muted text-small text-uppercase">Satuan Kerja</th>
                                            <th class="text-muted text-small text-uppercase">Link</th>
                                            <th class="text-muted text-small text-uppercase">Diupdate Terakhir</th>
                                            <th class="text-muted text-small text-uppercase">Status</th>
                                            <th class="text-muted text-small text-uppercase">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($Data as $datas)
                                        @php 
                                        $link=$datas->permintaan->linkPermintaan;
                                        $link_trimmed=null;
                                        if(strlen($link)>30){
                                            $link=substr($link,0,30).'...';
                                        }

                                        $update_terakhir=date_format($datas->permintaan->updated_at,"Y/m/d");
                                        
                                        @endphp
                                        <tr style="height:50px;">
                                            <td>#{{$datas->permintaan->id_permintaan}}</td>
                                            <td class="text-alternate">{{$datas->permintaan->judulPermintaan}}</td>
                                            <td class="text-alternate">{{$datas->user->satker}}</td>
                                            <td class="text-alternate"><a href="{{$datas->permintaan->linkPermintaan}}" target="_blank" rel="noopener noreferrer">{{$link}}</a></td>
                                            <td class="text-alternate">{{$update_terakhir}}</td>
                                            <td class="text-alternate">
                                                @php echo $datas->permintaan->status->status;
                                                @endphp
                                            </td>
                                            <td class="text-alternate">
                                                @php
                                                if($datas->permintaan->idStatus==2)
                                                {
                                                @endphp
                                                                        <button
                                                                                class="btn btn-sm btn-outline-danger align-top dropdown-toggle"
                                                                                type="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false"
                                                                                aria-haspopup="true"
                                                                        > 
                                                                            Alasan Ditolak
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end ">
                                                                            <div class="p-3">
                                                                                {{$datas->permintaan->alasanDitolak}}
                                                                            </div>
                                                                        </div>
                                                @php
                                                };
                                                if($datas->permintaan->idStatus==1)
                                                { 
                                                @endphp
                                                <div class="col-12 col-md-5 d-flex align-items-center justify-content-md-left">
                                                        <button type="button" class="btn btn-sm btn-outline-primary ">      
                                                                <a data-bs-delay="0"
                                                                data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="Layani"
                                                                href="transaksi/{{$datas->permintaan->id}}/permintaan/{{$datas->permintaan->id_permintaan}}">
                                                                <i data-acorn-icon="attachment"></i> Layani
                                                                </a>
                                                        </button>
                                                </div>
                                                @php
                                                };
                                                @endphp
                                            </td>
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

