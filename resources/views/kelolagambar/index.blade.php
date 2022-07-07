@php
    $html_tag_data = [];
    $title = 'Daftar Permintaan Gambar';
    $description= 'A table enhancing plug-in for the jQuery Javascript library, adding sorting, paging and filtering abilities to plain HTML tables with minimal effort.';
    $breadcrumbs = ["/"=>"Home","/KelolaGambar/Index"=>"Daftar Permintaan Gambar"]
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/datatables.min.css"/>
@endsection

@section('js_vendor')
    <script src="/js/vendor/bootstrap-submenu.js"></script>
    <script src="/js/vendor/datatables.min.js"></script>
    <script src="/js/vendor/mousetrap.min.js"></script>
    <script src="/js/vendor/jquery.validate/jquery.validate.min.js"></script>
    <script src="/js/vendor/jquery.validate/additional-methods.min.js"></script>
@endsection


@section('js_page')
    <script src="/js/cs/datatable.extend.js"></script>
    <script src="/js/permintaan/datatable.permintaangambar.js"></script>
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
                            <section class="scroll-section" id="default">
                                <!-- Button Trigger -->
                                <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable" 
                                data-bs-toggle="modal"        
                                data-bs-target="#addEditModal">
                                    <i data-acorn-icon="plus"></i>
                                    <span>Tambah Baru</span>
                                </button>
                            </section>
                            <!-- Default End -->

                            <!-- Check Button Start -->
                            <!-- <div class="btn-group ms-1 check-all-container">
                                <div class="btn btn-outline-primary btn-custom-control p-0 ps-3 pe-2" id="datatableCheckAllButton">
                             
                                <span class="form-check float-end">
                                <input type="checkbox" class="form-check-input" id="datatableCheckAll" />
                                </span>
                            -->
                        </div>
                                <!-- <button
                                        type="button"
                                        class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split"
                                        data-bs-offset="0,3"
                                        data-bs-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                        data-submenu
                                ></button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="dropdown dropstart dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle tag-datatable caret-absolute disabled" type="button">Tag</button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item tag-done" type="button">Done</button>
                                            <button class="dropdown-item tag-new" type="button">New</button>
                                            <button class="dropdown-item tag-sale" type="button">Sale</button>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <button class="dropdown-item disabled delete-datatable" type="button">Delete</button>
                                </div> -->
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

                                <!-- Edit Button Start -->
                                <!-- <button
                                        class="btn btn-icon btn-icon-only btn-foreground-alternate shadow edit-datatable disabled"
                                        data-bs-delay="0"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="Edit"
                                        type="button"
                                >
                                    <i data-acorn-icon="edit"></i>
                                </button> -->
                                <!-- Edit Button End -->

                                <!-- Delete Button Start -->
                                <!-- <button
                                        class="btn btn-icon btn-icon-only btn-foreground-alternate shadow disabled delete-datatable"
                                        data-bs-delay="0"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="Delete"
                                        type="button"
                                >
                                    <i data-acorn-icon="bin"></i>
                                </button> -->
                                <!-- Delete Button End -->
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

                    <!-- Table Start -->
                    <div class="data-table-responsive-wrapper">
                        <table id="datatableRowsAjax" class="data-table nowrap w-100">
                            <thead>
                            <tr>
                                <th class="text-muted text-small text-uppercase">ID Permintaan</th>
                                <th class="text-muted text-small text-uppercase">Kegunaan</th>
                                <th class="text-muted text-small text-uppercase">Link</th>
                                <th class="text-muted text-small text-uppercase">Waktu</th>
                                <th class="text-muted text-small text-uppercase">Status</th>
                                <!-- <th class="empty">&nbsp;</th> -->
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- Table End -->
                </div>
                <!-- Content End -->

                <!-- Add Edit Modal Start -->
                <div class="modal modal-right large fade" id="addEditModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold" id="modalTitle">Form Permintaan Gambar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="createGambarForm" action="{{route('kelolagambar.store')}}" method="POST" novalidate>
                                @csrf
                                @error('judulPermintaan')
                                <div class="mb-3 text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                @error('idkegunaan')
                                <div class="mb-3 text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                @error('linkPermintaan')
                                <div class="mb-3 text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                    @include('KelolaGambar.form')
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" >Kirim</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Add Edit Modal End -->

                <!-- Add Edit Modal Start -->
                <div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg rounded">
                        <div class="modal-content">
                            <div class="">
                                @include('KelolaGambar.preview')
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Edit Modal End -->

            </div>
        </div>
    </div>
@endsection
