@php
    $html_tag_data = [];
    $title = 'Halaman Review Karya';
    $description= 'A table enhancing plug-in for the jQuery Javascript library, adding sorting, paging and filtering abilities to plain HTML tables with minimal effort.';
    $breadcrumbs = ["/"=>"Home","/Petugas/Review"=>"Halaman Review Karya"]
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
                                        class=" table data-table-pagination data-table-standard responsive nowrap hover"
                                        id="datatableHover"
                                        data-order='[[ 0, "asc" ]]'
                                >
                                    <thead>
                                        <tr>
                                            <th class="text-muted text-small text-uppercase">No</th>
                                            <th class="text-muted text-small text-uppercase">Judul</th>
                                            <th class="text-muted text-small text-uppercase">Jenis Karya</th>  
                                            <th class="text-muted text-small text-uppercase">Status</th>
                                            <th class="text-muted text-small text-uppercase">Waktu</th>
                                            <th class="text-muted text-small text-uppercase">Thumbnail</th>
                                            <th class="text-muted text-small text-uppercase">Aksi</th>
                                        </tr>
                                    </thead>
                                    @php
                                    $nomorurut = 1;
                                    @endphp
                                    <tbody>
                                    @foreach ($Data as $datas) 
                                        <tr style="height:50px;">
                                            <td style="vertical-align: middle;">{{$nomorurut++}}</td>
                                            <td style="vertical-align: middle;" class="text-alternate">{{$datas->gambar->judul}}</td> 

                                            {{-- Jenis Karya --}}
                                            @if($datas->gambar->fileid===null)
                                            <td style="vertical-align: middle;" class="text-alternate">Fotografi</td> 
                                            @elseif($datas->gambar->file->kategori_file===1) 
                                                <td style="vertical-align: middle;" class="text-alternate">Indesign</td> 
                                            @elseif($datas->gambar->file->kategori_file===2) 
                                                <td style="vertical-align: middle;" class="text-alternate">Illustrator</td> 
                                            @elseif($datas->gambar->file->kategori_file===3) 
                                                <td style="vertical-align: middle;" class="text-alternate">Photoshop</td> 
                                            @elseif($datas->gambar->file->kategori_file===4) 
                                                <td style="vertical-align: middle;" class="text-alternate">Font</td> 
                                            @else
                                                <td style="vertical-align: middle;" class="text-alternate">Tidak Diketahui</td> 
                                            @endif  

                                            {{-- Status Review --}} 
                                            @if ($datas->statusreviewid===1)
                                            <td style="vertical-align: middle;" class="text-alternate"> <span class="badge rounded-pill bg-primary"> Tayang </span></td>
                                            @endif 
                                            @if ($datas->statusreviewid===2)
                                            <td style="vertical-align: middle;" class="text-alternate"> <span class="badge rounded-pill bg-warning"> Tidak Tayang </span></td>
                                            @endif 
                                            @if ($datas->statusreviewid===3)
                                            <td style="vertical-align: middle;" class="text-alternate"> <span class="badge rounded-pill bg-outline-primary"> Sedang Diriviu</span></td>
                                            @endif 
                                             
                                            <td style="vertical-align: middle;" class="text-alternate">{{$datas->updated_at}}</td>
                                            <td class="text-alternate"> 
                                                <img class="card-img sh-50 scale" 
                                                style="max-height:80px;"
                                                src="/{{$datas->gambar->thumbnail_path}}"
                                                alt="card image" />
                                            </td>
                                            <td style="vertical-align: middle;" class="text-alternate"> <div class="btn-group btn-group-sm mr-2" role="group" aria-label="First group">
                                                <a href="{{route()}}"  class="btn btn-secondary">Detail</a> 
                                              </div>
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

