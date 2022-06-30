@php
    $html_tag_data = [];
    $title = 'Halaman Pembagian Tugas';
    $description= 'A table enhancing plug-in for the jQuery Javascript library, adding sorting, paging and filtering abilities to plain HTML tables with minimal effort.';
    $breadcrumbs = ["/"=>"Home","/PembagianTugas/Index"=>"Halaman Pembagian Tugas"]
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/datatables.min.css"/>
@endsection

@section('js_vendor')
    <script src="/js/vendor/bootstrap-submenu.js"></script>
    <script src="/js/vendor/datatables.min.js"></script>
    <script src="/js/vendor/mousetrap.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/cs/datatable.extend.js"></script>
    <script src="/js/bagitugas/datatable.bagitugas.js"></script>
    
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

                        <!-- Top Buttons Start -->
                        <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                            <!-- Default Start -->
                            <!-- Default End -->

                            <!-- Check Button Start -->
                            <!-- <div class="btn-group ms-1 check-all-container">
                                <div class="btn btn-outline-primary btn-custom-control p-0 ps-3 pe-2" id="datatableCheckAllButton">
                             
                                <span class="form-check float-end">
                                <input type="checkbox" class="form-check-input" id="datatableCheckAll" />
                                </span>
                            -->
                        </div>

                            </div>
                            <!-- Check Button End -->
                        </div>
                        <!-- Top Buttons End -->
                    </div>
                </div>
                <!-- Title and Top Buttons End -->

                <!-- Content Start -->
                <div class="data-table-rows slim">
                    <!-- Controls Start -->
                    <div class="row">
                        <!-- Search Start -->
                        <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
                            <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                                <input class="form-control datatable-search" placeholder="Search" data-datatable="#datatableRowsAjax" />
                                <span class="search-magnifier-icon">
                <i data-acorn-icon="search"></i>
              </span>
                                <span class="search-delete-icon d-none">
                <i data-acorn-icon="close"></i>
              </span>
                            </div>
                        </div>
                        <!-- Search End -->

                        <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
                            <div class="d-inline-block me-0 me-sm-3 float-start float-md-none">
                            </div>
                            <div class="d-inline-block">
                                <!-- Print Button Start -->
                                <!-- <button
                                        class="btn btn-icon btn-icon-only btn-foreground-alternate shadow datatable-print"
                                        data-bs-delay="0"
                                        data-datatable="#datatableRowsAjax"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="Print"
                                        type="button"
                                >
                                    <i data-acorn-icon="print"></i>
                                </button> -->
                                <!-- Print Button End -->

                                <!-- Export Dropdown Start -->
                                <div class="d-inline-block datatable-export" data-datatable="#datatableRowsAjax">
                                    <button class="btn p-0" data-bs-toggle="dropdown" type="button" data-bs-offset="0,3">
                                        <span
                                                class="btn btn-icon btn-icon-only btn-foreground-alternate shadow dropdown"
                                                data-bs-delay="0"
                                                data-bs-placement="top"
                                                data-bs-toggle="tooltip"
                                                title="Export"
                                        >
                                            <i data-acorn-icon="download"></i>
                                        </span>
                                    </button>
                                    <div class="dropdown-menu shadow dropdown-menu-end">
                                        <button class="dropdown-item export-copy" type="button">Copy</button>
                                        <button class="dropdown-item export-excel" type="button">Excel</button>
                                        <button class="dropdown-item export-cvs" type="button">Cvs</button>
                                    </div>
                                </div>
                                <!-- Export Dropdown End -->

                                <!-- Length Start -->
                                <div class="dropdown-as-select d-inline-block datatable-length" data-datatable="#datatableRowsAjax" data-childSelector="span">
                                    <button class="btn p-0 shadow" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,3">
                  <span
                          class="btn btn-foreground-alternate dropdown-toggle"
                          data-bs-toggle="tooltip"
                          data-bs-placement="top"
                          data-bs-delay="0"
                          title="Item Count"
                  >
                    10 Items
                  </span>
                                    </button>
                                    <div class="dropdown-menu shadow dropdown-menu-end">
                                        <a class="dropdown-item" href="#">5 Items</a>
                                        <a class="dropdown-item active" href="#">10 Items</a>
                                        <a class="dropdown-item" href="#">20 Items</a>
                                    </div>
                                </div>
                                <!-- Length End -->
                            </div>
                        </div>
                    </div>
                    <!-- Controls End -->
                    <div class="row">
                        <div class="col-12 col-xl-9 col-xxl-9 mb-5">
                            <!-- Table Start -->
                            <div class="data-table-responsive-wrapper">
                                <table id="datatableRowsAjax" class="data-table nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th class="text-muted text-small text-uppercase">ID Permintaan</th>
                                        <th class="text-muted text-small text-uppercase">Pembuat Permintaan</th>
                                        <th class="text-muted text-small text-uppercase">Satuan Kerja</th>
                                        <th class="text-muted text-small text-uppercase">Petugas</th>
                                        <!-- <th class="empty">&nbsp;</th> -->
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                            <!-- Table End -->
                        </div>
                        <div class="col-12 col-xl-3 col-xxl-3">
                            <div class="col-12">
                                <h2 class="small-title">Daftar Beban Petugas</h2>
                                <div class="card mb-5">
                                    <div class="card-body mb-n2 border-last-none h-100">
                                        <div class="mb-2 pb-2">
                                                <div class="col">
                                                    <div class="d-flex flex-row pt-0 pb-0 ps-3 pe-0 align-items-center justify-content-between">
                                                        <div class="d-flex flex-column">
                                                            <div></div>
                                                            <div class="text-small text-muted"></div>
                                                        </div>
                                                        <div class="d-flex">
                                                            Jumlah
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="border-bottom border-separator-light mb-2 pb-2">
                                            <div class="row g-0 sh-6">
                                                @foreach ($Users as $user)
                                                <div class="col-auto">
                                                    <!-- /img/profile/profile-6.webp -->
                                                    <img src="{{ $user->profilepicture }}" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                                </div>
                                                <div class="col">
                                                    <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                        <div class="d-flex flex-column">
                                                            <div><a href="#">{{ $user->name }}</a></div>
                                                        </div>
                                                        <div class="d-flex">
                                                            1.244
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content End -->
                <!-- Add Edit Modal Start -->
                <div class="modal fade" id="bagiTugasModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg rounded">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold" id="modalTitle">ID Permintaan: <span class="previewId"></span></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form id="bagiTugasForm" action="{{route('bagipetugas.store')}}" method="POST" novalidate>
                                @csrf
                                @error('user_id')
                                <div class="mb-3 text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                @include('BagiPetugas.alokasitugas')
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary" >Kirim</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Add Edit Modal End -->

            </div>
        </div>
    </div>
@endsection
