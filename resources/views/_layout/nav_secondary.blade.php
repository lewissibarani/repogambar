<!-- Menu Start -->
<div class="col-auto side-menu-container">
    <ul class="sw-25 side-menu mb-0 primary" id="menuSide">
        <section class="scroll-section" id="default">
            <div class="card mb-5">
                <div class=" ">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <div style="padding: 1rem 1.25rem;">   
                                <h2 class="display-4">Filter</h2> 
                            </div> 
                            <hr>
                            <div class="accordion-header" id="headingOne">
                                <button
                                        class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne"
                                        aria-expanded="false"
                                        aria-controls="collapseOne"
                                >
                                
                                <i data-acorn-icon="file-image" class="me-2" data-acorn-size="17"></i>
                                    Tipe Aset
                                </button>
                            </div>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="">
                                        @foreach($TagsTipeFile as $tags)
                                            <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1" href="hasilpencarian/katakunci/{{$tags->nama_kategori}}">
                                                <span>{{$tags->nama_kategori}}</span>
                                            </a>
                                        @endforeach
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                                    width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" 
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" 
                                                    class="acorn-icons acorn-icons-circle align-top"
                                                    style="color:rgb(0, 132, 255)">
                                                        <circle cx="10" cy="10" r="7"></circle>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center">
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                                    width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" 
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" 
                                                    class="acorn-icons acorn-icons-circle align-top"
                                                    style="color:orange">
                                                        <circle cx="10" cy="10" r="7"></circle>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center">
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                                    width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" 
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" 
                                                    class="acorn-icons acorn-icons-circle align-top"
                                                    style="color:rgb(92, 173, 0)">
                                                        <circle cx="10" cy="10" r="7"></circle>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center">
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                                    width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" 
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" 
                                                    class="acorn-icons acorn-icons-circle align-top"
                                                    style="color:rgb(211, 0, 0)">
                                                        <circle cx="10" cy="10" r="7"></circle>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center">
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                                    width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" 
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" 
                                                    class="acorn-icons acorn-icons-circle align-top"
                                                    style="color:rgb(228, 224, 0)">
                                                        <circle cx="10" cy="10" r="7"></circle>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-alternate mt-n1 lh-1-25">Kuning</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                        
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="headingThree">
                                <button
                                        class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree"
                                        aria-expanded="false"
                                        aria-controls="collapseThree"
                                >
                                <i data-acorn-icon="maximize" class="me-2" data-acorn-size="17"></i>
                                    Ukuran
                                </button>
                            </div>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">  
                                                    <label class="form-label">Ukuran dalam pixel</label>
                                                    <div id="sliderStep"></div> 
                                <!-- Steps End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </ul>
</div>
<!-- Menu End -->