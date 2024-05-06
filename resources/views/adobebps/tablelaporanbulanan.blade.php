@php     
    
    
@endphp  
  <!-- Hover Start -->
  <section class="scroll-section" id="hover">
                        <div class="card mb-5">
                            <div class="card-body">
                                <!-- Hover Controls Start -->
                                <div class="row">
                                    <div class="col-12 d-flex align-items-start justify-content-left"> 
                                        <h1 class="mb-0 pb-0 display-4" id="title">{{ $title_tabel }}</h1>   
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
                                                    20 Items
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">5 Items</a>
                                                    <a class="dropdown-item " href="#">10 Items</a>
                                                    <a class="dropdown-item active" href="#">20 Items</a>
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
                                        data-order='[[ 0, "asc" ]]'
                                >
                                    <thead>
                                    <tr>
                                        <th class="text-muted text-small text-uppercase">No</th> 
                                        <th class="text-muted text-small text-uppercase">Bulan</th> 
                                        <th class="text-muted text-small text-uppercase">Diisi Oleh</th>
                                        <th class="text-muted text-small text-uppercase">Waktu Isi</th>
                                        <th class="text-muted text-small text-uppercase">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody> 
                                    @foreach ($Bulan as $bulan) 
                                        <tr style="height:50px;">
                                            <td class="text-alternate">{{$bulan->id}}</td> 
                                            <td class="fw-bold">{{$bulan->namabulan}}</td> 
                                            <td class="text-alternate"> 
                                                @foreach ($Data_Laporan as $data_laporan)
                                                    @if($data_laporan->bulanid==$bulan->id) 
                                                        {{$data_laporan->user->name}}
                                                        @break
                                                    @endif
                                                @endforeach 
                                            </td>  
                                            <td class="text-alternate"> 
                                                @foreach ($Data_Laporan as $data_laporan)
                                                    @if($data_laporan->bulanid==$bulan->id) 
                                                        {{$data_laporan->updated_at}}
                                                        @break
                                                    @endif
                                                @endforeach 
                                            </td>  
                                            <td class="text-alternate">  
                                                            <button type="button" class="btn btn-primary btn-icon btn-icon-start add-datatable" 
                                                                data-bs-toggle="modal"        
                                                                data-bs-target="#_kuesioner{{$bulan->id}}"
                                                                data-bs-placement="top"
                                                                title="Isi Kuesioner"> 
                                                                <i data-acorn-icon="pen"></i>  
                                                            </button> 
                                                            @include('adobebps.formPemanfaatan')     
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