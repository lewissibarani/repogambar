@php
    $html_tag_data = [];
    $title = 'Daftar Permintaan Layanan';
    $description= 'A table enhancing plug-in for the jQuery Javascript library, adding sorting, paging and filtering abilities to plain HTML tables with minimal effort.';
    $breadcrumbs = ["/"=>"Home","/KelolaGambar/Index"=>"Daftar Permintaan Gambar"]
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
                                                data-bs-target="#addEditModal">
                                                    <i data-acorn-icon="plus"></i>
                                                    <span>Tambah Baru</span>
                                            </button>
                                        </section>
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
                                        <th class="text-muted text-small text-uppercase">ID</th> 
                                        <th class="text-muted text-small text-uppercase">Jenis Layanan</th>
                                        <th class="text-muted text-small text-uppercase">Nama Permintaan</th>
                                        <th class="text-muted text-small text-uppercase">Link</th>
                                        <th class="text-muted text-small text-uppercase">Diupdate Terakhir</th>
                                        <th class="text-muted text-small text-uppercase">Status</th>
                                        <th class="text-muted text-small text-uppercase">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($Data as $datas)
                                        @php 
                                        $link=$datas->linkPermintaan;
                                        $link_trimmed=null;
                                        if(strlen($link)>30){
                                            $link=substr($link,0,30).'...';
                                        }

                                        $judul=$datas->judulPermintaan;
                                        $judul_trimmed=null;
                                        if(strlen($judul)>30){
                                            $judul=substr($judul,0,30).'...';
                                        }


                                        $update_terakhir=date_format($datas->updated_at,"Y/m/d_H:i:s");
                                        
                                        @endphp
                                        <tr style="height:50px;">
                                            <td>#{{$datas->id_permintaan}}</td>
                                            <td class="text-alternate">{{$datas->jenispermintaan->jenispermintaan}}</td> 
                                            <td class="text-alternate">{{$judul}}</td> 
                                            <td class="text-alternate"><a href="{{$datas->linkPermintaan}}" target="_blank" rel="noopener noreferrer">{{$link}}</a></td>
                                            <td class="text-alternate">{{$update_terakhir}}</td>
                                            <td class="text-alternate">
                                            @php echo $datas->status->status;
                                            @endphp
                                            </td>
                                            <td class="text-alternate">
                                            @php
                                            if($datas->idStatus==2)
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
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end ">
                                                                        <div class="p-3">
                                                                            {{$datas->alasanDitolak}}
                                                                        </div>
                                                                    </div>
                                            @php
                                            };
                                            if($datas->idStatus==3)
                                            { 

                                            @endphp
                                            <div class="col-12 col-md-5 d-flex align-items-center justify-content-md-left">
                                                @php

                                                    if($datas->gambar->file_id !==null){
                                                @endphp
                                                        <button type="button" class="btn btn-sm btn-icon btn-outline-primary ">      
                                                                <a download="{{$datas->gambar->file->nama_file}}" 
                                                                data-bs-delay="0"
                                                                data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="Download File"
                                                                href="/{{$datas->gambar->file->path}}">
                                                                <i data-acorn-icon="attachment"></i>
                                                                </a>
                                                        </button>
                                                        &nbsp; 
                                                    @php
                                                    };
                                                    @endphp
                                                        <button type="button" class="btn btn-sm btn-icon btn-outline-primary"> 
                                                                <a download="{{$datas->gambar->nama_gambar}}"
                                                                data-bs-delay="0"
                                                                data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="Download Gambar"
                                                                href="/{{$datas->gambar->path}}">
                                                                <i data-acorn-icon="file-image"></i>
                                                                </a>
                                                        </button>    
                                                @php
                                                };
                                                @endphp
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

                <!-- Add Edit Modal Start -->
                <div class="modal modal-left large fade" id="addEditModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
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

                                <section class="scroll-section" id="labelSize">
                                    <div class="row mb-3">
                                        <label for="colFormLabel" class="col-sm-3 col-form-label">Judul</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="colFormLabel" name="judulPermintaan" />
                                            <div id="passwordHelpBlock" class="form-text">
                                                Tuliskan judul gambar yang seuai dengan gambar yang diminta.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="colFormLabel" class="col-sm-3 col-form-label">Link</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="colFormLabel" placeholder="Link Shuttertock atau Freepik..." name="linkPermintaan"/>
                                            <div id="passwordHelpBlock" class="form-text">
                                                Hanya bisa satu link gambar untuk satu permintaan.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputState" class="col-sm-3 col-form-label">Jenis Penggunaan</label>
                                        <div class="col-sm-9">
                                            <select id="inputState" class="form-select" name="idkegunaan" onchange="showDiv('hidden_div', this)">
                                                <option selected>Pilih...</option>
                                                @foreach ($Kegunaan as $kegunaan)
                                                    <option value="{{ $kegunaan->id }}">{{ $kegunaan->kegunaan }}</option> 
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div id="hidden_div" style="display:none;">
                                        <div class="row mb-3">
                                            <label for="colFormLabel" class="col-sm-3 col-form-label">Lainnya</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" rows="4" id="colFormLabel" name="kegunaan_lainnya"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                
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

        </div>
    </div>
<script>
function showDiv(divId, element)
{
    document.getElementById(divId).style.display = element.value == 4 ? 'block' : 'none';
}
</script>
@endsection
