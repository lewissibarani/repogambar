<div class="modal fade show" id="modalrincianBAST" tabindex="-1" role="dialog" aria-labelledby="scrollingModalLabel" aria-modal="true">
    <div class="modal-dialog modal-semi-full modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollingModalLabel">Rincian Tabel BAST Adobe CC 2024</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">  
                    <!-- Pagination Start -->
                    <div class="col-12">
                        <section class="scroll-section" id="paginationTitle">
                            <h2 class="small-title">Laporan BAST per Provinsi</h2>
                            <div id="pagination">
                                <div class="card mb-3">
                                    <div class="card-body mb-3">
                                        <div class="row gx-2 mb-3">
                                            <div class="col-12 col-sm mb-1 mb-sm-0">
                                                <div class="search-input-container rounded-md border border-separator mb-2">
                                                    <input class="form-control search" type="text" autocomplete="off" placeholder="Search" />
                                                    <span class="search-magnifier-icon">
                        <i data-acorn-icon="search"></i>
                        </span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-auto d-flex justify-content-end">
                                                <div class="btn-group">
                                                    <div class="dropdown">
                                                        <button
                                                                class="btn btn-outline-primary dropdown-toggle mb-1"
                                                                type="button"
                                                                data-bs-toggle="dropdown"
                                                                data-bs-auto-close="outside"
                                                                aria-haspopup="true"
                                                                aria-expanded="false"
                                                        >
                                                            Provinsi
                                                        </button>
                                                        <div class="dropdown-menu sw-25 dropdown-menu-end">
                                                            <div class="px-4 py-3">
                                                                <div class="form-check mb-2">
                                                                    <input type="checkbox" class="form-check-input filter" id="categoryPagination1" data-filter="Provinsi Aceh" checked />
                                                                    <label class="form-check-label" for="categoryPagination1">Provinsi Aceh</label>
                                                                </div>
                                                                <div class="form-check mb-2">
                                                                    <input type="checkbox" class="form-check-input filter" id="categoryPagination2" data-filter="Provinsi Sumut" checked />
                                                                    <label class="form-check-label" for="categoryPagination2">Provinsi Sumut</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input filter" id="categoryPagination3" data-filter="Whole Wheat" checked />
                                                                    <label class="form-check-label" for="categoryPagination3">Whole Wheat</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Sort for smaller screens -->
                                                <div class="btn-group d-inline-block d-sm-none ms-1">
                                                    <div class="dropdown">
                                                        <button
                                                                class="btn btn-outline-primary dropdown-toggle mb-1"
                                                                type="button"
                                                                data-bs-toggle="dropdown"
                                                                data-bs-auto-close="outside"
                                                                aria-haspopup="true"
                                                                aria-expanded="false"
                                                        >
                                                            Sort
                                                        </button>
                                                        <div class="dropdown-menu sw-25 dropdown-menu-end custom-sort">
                                                            <div class="dropdown-item cursor-pointer sort" data-sort="name">Name</div>
                                                            <div class="dropdown-item cursor-pointer sort" data-sort="category">Category</div>
                                                            <div class="dropdown-item cursor-pointer sort" data-sort="sale">Sale</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-0 h-100 align-content-center mb-2 custom-sort d-none d-sm-flex">
                                            <div class="col-4 col-sm-2 d-flex align-items-center">
                                                <div class="text-muted text-small cursor-pointer sort" data-sort="category">KODE SATKER</div>
                                            </div>
                                            <div class="col-4 col-sm-3 d-flex align-items-center">
                                                <div class="text-muted text-small cursor-pointer sort" data-sort="name">NAMA SATKER</div>
                                            </div>
                                            <div class="col-4 col-sm-3 d-flex align-items-center">
                                                <div class="text-muted text-small cursor-pointer sort" data-sort="namapj">NAMA PJ</div>
                                            </div>
                                            <div class="col-4 col-sm-2 d-flex align-items-center justify-content-end">
                                                <div class="text-muted text-small cursor-pointer sort" data-sort="status">STATUS BAST</div>
                                            </div>
                                            <div class="col-4 col-sm-2 d-flex align-items-center justify-content-end">
                                                <div class="text-muted text-small cursor-pointer sort" data-sort="waktu">WAKTU</div>
                                            </div>
                                        </div>

                                        <div class="list">
                                            <div class="h-auto sh-sm-5 mb-3 mb-sm-0 scroll-child">
                                                <div class="row g-0 h-100 align-content-center">
                                                    <div class="col-12 col-sm-2 d-flex align-items-center">
                                                        <a href="#" class="body-link category">Provinsi Sumbar</a>
                                                    </div> 
                                                    <div class="col-12 col-sm-3 d-flex align-items-center text-muted name">543</div>
                                                    <div class="col-12 col-sm-3 d-flex align-items-center text-muted namapj">Sourdough</div>
                                                    <div class="col-12 col-sm-2 d-flex align-items-center justify-content-sm-end text-muted status">543</div>
                                                    <div class="col-12 col-sm-2 d-flex align-items-center justify-content-sm-end text-muted waktu">543</div> 
                                                </div>
                                            </div> 
                                            <div class="h-auto sh-sm-5 mb-3 mb-sm-0 scroll-child">
                                                <div class="row g-0 h-100 align-content-center">
                                                    <div class="col-12 col-sm-2 d-flex align-items-center">
                                                        <a href="#" class="body-link category">Provinsi Aceh</a>
                                                    </div> 
                                                    <div class="col-12 col-sm-3 d-flex align-items-center text-muted name">543</div>
                                                    <div class="col-12 col-sm-3 d-flex align-items-center text-muted namapj">Sourdough</div>
                                                    <div class="col-12 col-sm-2 d-flex align-items-center justify-content-sm-end text-muted status">543</div>
                                                    <div class="col-12 col-sm-2 d-flex align-items-center justify-content-sm-end text-muted waktu">543</div> 
                                                </div>
                                            </div> 
                                            <div class="h-auto sh-sm-5 mb-3 mb-sm-0 scroll-child">
                                                <div class="row g-0 h-100 align-content-center">
                                                    <div class="col-12 col-sm-2 d-flex align-items-center">
                                                        <a href="#" class="body-link category">Provinsi Sumut</a>
                                                    </div> 
                                                    <div class="col-12 col-sm-3 d-flex align-items-center text-muted name">543</div>
                                                    <div class="col-12 col-sm-3 d-flex align-items-center text-muted namapj">Sourdough</div>
                                                    <div class="col-12 col-sm-2 d-flex align-items-center justify-content-sm-end text-muted status">543</div>
                                                    <div class="col-12 col-sm-2 d-flex align-items-center justify-content-sm-end text-muted waktu">543</div> 
                                                </div>
                                            </div> 
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 d-flex justify-content-center">
                                    <div class="pagination"></div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- Pagination End -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Ok</button> -->
            </div>
        </div>
    </div>
</div>

 

                     