@push('pushcss')
  <style> 
    .accordion-item { 
    border: 0px solid rgba(0,0,0,0.125); 
    }

    .dot {
    height: 20px;
    width: 20px; 
    border-radius: 50%;
    display: inline-block;
    } 

    .tag {
    font-size: 14px;
    padding: .3em .4em .4em;
    margin: 0 .1em;
    }
    .tag a {
    color: #bbb;
    cursor: pointer;
    opacity: 0.6;
    }
    .tag a:hover {
    opacity: 1.0
    }
    .tag .remove {
    vertical-align: bottom;
    top: 0;
    }
    .tag a {
    margin: 0 0 0 .3em;
    }
    .tag a .glyphicon-white {
    color: #fff;
    margin-bottom: 2px;
    }

  </style>  

@endpush



<!-- Menu Start -->
<div class="col-auto side-menu-container">
    <ul class="sw-25 side-menu mb-0 primary" id="menuSide">
        <section class="scroll-section" id="default">
            <div class=" mb-5">
                <div class=" ">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item" style="border-bottom:1px solid #ced4da;">  
                            <div style="padding: 1rem 1.25rem;"> 
                                <strong> <i data-acorn-icon="settings-1" class="me-2" data-acorn-size="17"></i> 
                                Filter</strong>  
                            </div>
                        </div>     

                        <div class="accordion-item"> 
                            <div class="accordion-header" id="headingOne">
                                <button
                                        class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne"
                                        aria-expanded="false"
                                        aria-controls="collapseOne"
                                >
                                
                                <i data-acorn-icon="wizard" class="me-2" data-acorn-size="17"></i>
                                    Tipe Aset
                                </button>
                            </div>

                            

                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body"> 
                                    <div class="col-12 col-sm-6 col-xl-12">
                                        <ul id="filterTipeAset"> 
                                            @foreach($TagsTipeFile as $tags)
                                                <li  class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1" value="{{$tags->id}}">{{$tags->nama_kategori}}</li>
                                            @endforeach 
                                        <ul> 
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <!-- Filter Warna -->
                        <!-- <div class="accordion-item">
                            <div class="accordion-header" id="headingTwo">
                                <button
                                        class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo"
                                        aria-expanded="false"
                                        aria-controls="collapseTwo"
                                > 
                                <i data-acorn-icon="colors" class="me-2" data-acorn-size="17"></i>
                                    Warna
                                </button>
                            </div>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample"> 
                                <div class="accordion-body">    
                                    <div class="row g-0 mb-2"> 
                                        <div class="col-auto">
                                            <div class="sw-2 d-inline-block d-flex justify-content-start align-items-center h-100">
                                                <div class="sh-3">
                                                <span class="dot" style="background-color:rgb(0, 132, 255);"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class=" d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-alternate mt-n1 lh-1-25">Biru</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0 mb-2"> 
                                        <div class="col-auto">
                                            <div class="sw-2 d-inline-block d-flex justify-content-start align-items-center h-100">
                                                <div class="sh-3">
                                                <span class="dot" style="background-color:orange"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class=" d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-alternate mt-n1 lh-1-25">Oranye</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0 mb-2"> 
                                        <div class="col-auto">
                                            <div class="sw-2 d-inline-block d-flex justify-content-start align-items-center h-100">
                                                <div class="sh-3">
                                                <span class="dot" style="background-color:rgb(92, 173, 0)"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-alternate mt-n1 lh-1-25">Hijau</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0 mb-2"> 
                                        <div class="col-auto">
                                            <div class="sw-2 d-inline-block d-flex justify-content-start align-items-center h-100">
                                                <div class="sh-3">
                                                <span class="dot" style="background-color:rgb(211, 0, 0)"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-alternate mt-n1 lh-1-25">Merah</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0 mb-2"> 
                                        <div class="col-auto">
                                            <div class="sw-2 d-inline-block d-flex justify-content-start align-items-center h-100">
                                                <div class="sh-3">
                                                <span class="dot" style="background-color:#FCDB7E"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-alternate mt-n1 lh-1-25">Kuning</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                        
                                </div>
                            </div>
                        </div> -->
                        <!-- End Filter Warna -->
                        
                        <!-- <div class="accordion-item">
                            <div class="accordion-header" id="headingTwo">
                                <button
                                        class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo"
                                        aria-expanded="false"
                                        aria-controls="collapseTwo"
                                >
                                <i data-acorn-icon="maximize" class="me-2" data-acorn-size="17"></i>
                                    Ukuran
                                </button>
                            </div>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">  
                                                    <label class="form-label">Ukuran dalam pixel</label>
                                                    <div id="sliderStep"></div>  
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>
            </div>
        </section>
    </ul>
</div>
<!-- Menu End -->