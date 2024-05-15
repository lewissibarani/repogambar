<div class="modal fade show" id="modalrincianBAST" tabindex="-1" role="dialog" aria-labelledby="scrollingModalLabel" aria-modal="true">
    <div class="modal-dialog modal-semi-full modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollingModalLabel">Rincian Tabel BAST Adobe CC 2024</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">  
                        <!-- Hover Controls Start -->
                        <div class="row">  
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
                                data-order='[[ 0, "asc" ]]'
                        >
                            <thead>
                            <tr> 
                                <th class="text-muted text-small text-uppercase">Kode Satker</th>
                                <th class="text-muted text-small text-uppercase">Nama Satker</th>
                                <th class="text-muted text-small text-uppercase">Nama Penaggung Jawab </th> 
                                <th class="text-muted text-small text-uppercase">BAST</th> 
                                <th class="text-muted text-small text-uppercase">Diupdate Terakhir</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($Data as $datas) 
                                <tr style="height:50px;"> 
                                    <td class="">{{$datas->kodesatkerid}}</td>
                                    <td class="text-alternate">   
                                    @php 
                                        $string = $datas->getnamasatker->namasatker ?? '';
                                        $string1 = str_replace("BADAN PUSAT STATISTIK", "BPS", $string); 
                                        $string2 = str_replace("KEPULAUAN", "KEP.", $string1);  
                                    @endphp 
                                            {{$string2}} 
                                    </td>
                                    <td class="text-alternate">{{$datas->nama}}</td> 
                                    <td class="text-alternate">  
                                        @if(is_null($datas->getAdobeTransaksiBAST))
                                            <p class="fst-italic"> Belum Upload BAST </p> 
                                        @else
                                            <a href="{{$datas->getAdobeTransaksiBAST->dokumen->path}}" > Unduh </a>
                                        @endif
                                          
                                    </td>  
                                    <td class="text-alternate"> 
                                        @if(is_null($datas->getAdobeTransaksiBAST))
                                            - 
                                        @else
                                        @php
                                            $timestamp_from_array = $datas->getAdobeTransaksiBAST->dokumen->created_at;
                                            $tanggal_upload_bast =date('Y-m-d h:i:s' , strtotime( $timestamp_from_array ) + 7 * 3600 );
                                        @endphp
                                            <p class="fst-italic" > {{$tanggal_upload_bast}} </p>
                                        @endif 
                                    </td> 
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- Hover Table End --> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Ok</button> -->
            </div>
        </div>
    </div>
</div>

 

                     