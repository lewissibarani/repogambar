@php
    $html_tag_data = ["override"=>'{"attributes" : { "layout": "boxed" }}'];
    $title = 'Detail Gambar';
    $heading = 'Fresh fruit and veg stall';
    $description = 'Blog Detail';
    $user='Ayu Kartika';
    $userSatker='BPS Provinsi Sulawesi Utara';
    $deskripsiGambar='Toffee croissant icing toffee. Sweet roll 
        chupa chups marshmallow muffin liquorice chupa chups soufflé bonbon. 
        Liquorice gummi bears cake donut chocolate lollipop gummi bears. 
        Jujubes lollipop cheesecake gummi bears cheesecake. Cake jujubes soufflé.';

    $breadcrumbs = ["/Dashboard/Beranda"=>"Beranda", "/Dashboard/DetailGambar"=>"Detail Gambar"]
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/glide.core.min.css"/>
    <link rel="stylesheet" href="/css/vendor/baguetteBox.min.css"/>
@endsection

@section('js_vendor')
    <script src="/js/vendor/glide.min.js"></script>
    <script src="/js/vendor/baguetteBox.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/cs/glide.custom.js"></script>
    <!-- <script src="/js/pages/blog.detail.js"></script> -->
@endsection

@section('content')
    <div class="container">
        <!-- Title Start -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-container">
                    <h1 class="mb-0 pb-0 display-4" id="title">{{ $heading }}</h1>
                    @include('_layout.breadcrumb',['breadcrumbs'=>$breadcrumbs])
                </div>
            </div>
        </div>
        <!-- Title End -->

        <div class="row">
            <div class="col-12 col-xl-8 col-xxl-9 mb-5">
                <div class="card mb-5">
                    <!-- Content Start -->
                    <div class="card-body p-0">
                        
                        <div class=" mt-2 d-flex justify-content-center">
                            
                            <div class="row">
                                <div class="col 4">
                                    <!-- Suka Button Start -->
                                    <button
                                            class="btn btn-icon btn-foreground-alternate shadow add-datatable"
                                            data-bs-delay="0"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            title="Suka"
                                            type="button"
                                    >
                                        <i data-acorn-icon="heart"></i> Suka
                                    </button>
                                    <!-- Suka Button End -->
                                </div>
                                <div class="col 4">
                                    <!-- Edit Button Start -->
                                    <button
                                            class="btn btn-icon btn-foreground-alternate shadow edit-datatable disabled"
                                            data-bs-delay="0"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            title="Edit Gambar"
                                            type="button"
                                    >
                                        <i data-acorn-icon="edit"></i> Edit
                                    </button>
                                    <!-- Edit Button End -->
                                </div>
                                <div class="col 4">
                                    <!-- Download Button Start -->
                                    <button
                                            class="btn btn-sm btn-icon btn-primary"
                                            data-bs-delay="0"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            title="Download Gambar"
                                            type="button"
                                    >
                                        <i data-acorn-icon="download"></i> Download
                                    </button>
                                    <!-- Downloaf Button End -->
                                </div>
                            </div>
                        </div>

                        <div class="glide glide-gallery" id="glideBlogDetail">
                            <div class="glide glide-large">
                                <div class="glide__track" data-glide-el="track">
                                    <ul class="glide__slides gallery-glide-custom">
                                        <li class="glide__slide p-0">
                                            <a href="/img/product/large/product-1.webp">
                                                <img
                                                    alt="detail"
                                                    src="/img/product/large/product-1.webp"
                                                    class="responsive border-0 img-fluid mb-3 sh-50 w-100"
                                                />
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <h4 class="mb-3 font-weight-bold">Tags </h4>
                                <div class="mb-2">
                                    <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1" href="/Pages/Blog/List">
                                        <span>Food (12)</span>
                                    </a>
                                    <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1" href="/Pages/Blog/List">
                                        <span>Baking (3)</span>
                                    </a>
                                    <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1" href="/Pages/Blog/List">
                                        <span>Sweet (1)</span>
                                    </a>
                                    <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1" href="/Pages/Blog/List">
                                        <span>Molding (3)</span>
                                    </a>
                                    <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1" href="/Pages/Blog/List">
                                        <span>Pastry (5)</span>
                                    </a>
                                    <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1" href="/Pages/Blog/List">
                                        <span>Healthy (7)</span>
                                    </a>
                                    <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1" href="/Pages/Blog/List">
                                        <span>Rye (3)</span>
                                    </a>
                                    <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1" href="/Pages/Blog/List">
                                        <span>Simple (3)</span>
                                    </a>
                                </div>                            
                            </div>
                            <div>
                                <h4 class="mb-3 font-weight-bold">Deskripsi Gambar </h4>
                                <div class="mb-4">
                                    {{$deskripsiGambar}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col 6">
                                    <h4 class="mb-3 font-weight-bold">Penyumbang Gambar </h4>
                                    
                                        
                                            <div class="row g-0">
                                                <div class="col-auto">
                                                    <div class="sw-5 me-3">
                                                        <img src="/img/profile/profile-1.webp" class="img-fluid rounded-xl" alt="thumb" />
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <a href="#">{{$user}}</a>
                                                    <div class="text-muted text-small mb-2">{{$userSatker}}</div>
                                                </div>
                                            </div>
                                       
                                    
                                </div>
                                <div class="col 6">
                                    <h4 class="mb-3 font-weight-bold">Format Gambar </h4>
                                    <div>
                                        <p>
                                            Vektor
                                        </p>
                                        <p>
                                            4001 x 4000 pixels | 13.3 x 13.3 in | DPI 300 | jpg
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content End -->
                </div>

                <!-- You May Also Like Start -->
                <h2 class="small-title">Gambar Terkait Lainnya</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100">
                            <img src="/img/product/small/product-10.webp" class="card-img-top sh-25" alt="card image" />
                            <div class="card-body pb-0">
                                <a href="/Pages/Blog/Detail" class="h5 heading body-link stretched-link sh-8 sh-md-6 d-block">
                                    <div class="mb-0 lh-1-5 clamp-line" data-line="2">Basic Introduction to Bread Making</div>
                                </a>
                            </div>
                            <div class="card-footer border-0 pt-0">
                                <div class="row g-0">
                                    <div class="col-auto pe-3">
                                        <i data-acorn-icon="like" class="text-primary me-1" data-acorn-size="15"></i>
                                        <span class="align-middle">241</span>
                                    </div>
                                    <div class="col">
                                        <i data-acorn-icon="clock" class="text-primary me-1" data-acorn-size="15"></i>
                                        <span class="align-middle">25 Min</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 sh-45">
                        <div class="card h-100">
                            <img src="/img/product/small/product-2.webp" class="card-img-top sh-25" alt="card image" />
                            <div class="card-body pb-0">
                                <a href="/Pages/Blog/Detail" class="h5 heading body-link stretched-link sh-8 sh-md-6 d-block">
                                    <div class="mb-0 lh-1-5 clamp-line" data-line="2">14 Facts About Sugar Products</div>
                                </a>
                            </div>
                            <div class="card-footer border-0 pt-0">
                                <div class="row g-0">
                                    <div class="col-auto pe-3">
                                        <i data-acorn-icon="like" class="text-primary me-1" data-acorn-size="15"></i>
                                        <span class="align-middle">115</span>
                                    </div>
                                    <div class="col">
                                        <i data-acorn-icon="clock" class="text-primary me-1" data-acorn-size="15"></i>
                                        <span class="align-middle">15 Min</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 sh-45">
                        <div class="card h-100">
                            <img src="/img/product/small/product-5.webp" class="card-img-top sh-25" alt="card image" />
                            <div class="card-body pb-0">
                                <a href="/Pages/Blog/Detail" class="h5 heading body-link stretched-link sh-8 sh-md-6 d-block">
                                    <div class="mb-0 lh-1-5 clamp-line" data-line="2">10 Secrets Every Southern Baker Knows</div>
                                </a>
                            </div>
                            <div class="card-footer border-0 pt-0">
                                <div class="row g-0">
                                    <div class="col-auto pe-3">
                                        <i data-acorn-icon="like" class="text-primary me-1" data-acorn-size="15"></i>
                                        <span class="align-middle">54</span>
                                    </div>
                                    <div class="col">
                                        <i data-acorn-icon="clock" class="text-primary me-1" data-acorn-size="15"></i>
                                        <span class="align-middle">30 Min</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- You May Also Like End -->
            </div>

            <!-- Right Side Start -->
            <div class="col-12 col-xl-4 col-xxl-3">
                <div class="mb-5">
                    <h2 class="small-title">Gambar lain dari kontributor ini</h2>
                        <div class="row mb-n2">
                            <div class="col-12 col-md-6 col-xl-12">
                                <div class="card sh-11 sh-sm-14 mb-2">
                                    <div class="row g-0 h-100">
                                        <div class="col-auto">
                                            <img src="/img/product/small/product-1.webp" alt="alternate text" class="card-img card-img-horizontal sw-10 sw-sm-14" />
                                        </div>
                                        <div class="col position-static">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <a href="/Pages/Blog/Detail" class="stretched-link body-link">
                                                        <div class="clamp-line" data-line="2">A Complete Guide to Mix Dough for the Molds</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-xl-12">
                                <div class="card sh-11 sh-sm-14 mb-2">
                                    <div class="row g-0 h-100">
                                        <div class="col-auto">
                                            <img src="/img/product/small/product-2.webp" alt="alternate text" class="card-img card-img-horizontal sw-10 sw-sm-14" />
                                        </div>
                                        <div class="col position-static">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <a href="/Pages/Blog/Detail" class="stretched-link body-link">
                                                        <div class="clamp-line" data-line="2">Apple Cake Recipe for Starters</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-xl-12">
                                <div class="card sh-11 sh-sm-14 mb-2">
                                    <div class="row g-0 h-100">
                                        <div class="col-auto">
                                            <img src="/img/product/small/product-3.webp" alt="alternate text" class="card-img card-img-horizontal sw-10 sw-sm-14" />
                                        </div>
                                        <div class="col position-static">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <a href="/Pages/Blog/Detail" class="stretched-link body-link">
                                                        <div class="clamp-line" data-line="2">Basic Introduction to Bread Making</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-xl-12">
                                <div class="card sh-11 sh-sm-14 mb-2">
                                    <div class="row g-0 h-100">
                                        <div class="col-auto">
                                            <img src="/img/product/small/product-4.webp" alt="alternate text" class="card-img card-img-horizontal sw-10 sw-sm-14" />
                                        </div>
                                        <div class="col position-static">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <a href="/Pages/Blog/Detail" class="stretched-link body-link">
                                                        <div class="clamp-line" data-line="2">Easy and Efficient Tricks for Baking Crispy Breads</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

            </div>
            <!-- Right Side End -->
        </div>
    </div>
@endsection
