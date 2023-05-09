@php
    $html_tag_data = ["override"=>'{"attributes" : { "layout": "boxed" }}',"scrollspy"=>"true"];
    $title = 'Details';
    $description = 'Detail content that made out of images, text, carousel and so on. They might be combined with other blocks to create pages for different layouts.';
    $breadcrumbs = ["/"=>"Home","/Blocks"=>"Blocks"]
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/glide.core.min.css"/>
    <link rel="stylesheet" href="/css/vendor/baguetteBox.min.css"/>
    <link rel="stylesheet" href="/css/vendor/plyr.css"/>
    <link rel="stylesheet" href="/css/vendor/select2.min.css"/>
    <link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css"/>
@endsection

@section('js_vendor')
    <script src="/js/cs/scrollspy.js"></script>
    <script src="/js/vendor/baguetteBox.min.js"></script>
    <script src="/js/vendor/glide.min.js"></script>
    <script src="/js/vendor/jquery.barrating.min.js"></script>
    <script src="/js/vendor/plyr.min.js"></script>
    <script src="/js/vendor/select2.full.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/cs/glide.custom.js"></script>
    <script src="/js/pages/blocks.details.js"></script>
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

                <!-- Content Start -->
                <div>
                    <div class="card mb-5">
                        <div class="card-body">
                            <p class="mb-0">{{ $description }}</p>
                        </div>
                    </div>       

                    <!-- Product Start -->
                    <section class="scroll-section" id="product">
                        <h2 class="small-title">Product</h2>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-xl-6">
                                        <div class="glide glide-gallery" id="glideProductGallery">
                                            <!-- Large Images Start -->
                                            <div class="glide glide-large">
                                                <div class="glide__track" data-glide-el="track">
                                                    <ul class="glide__slides gallery-glide-custom">
                                                        <li class="glide__slide p-0">
                                                            <a href="/img/product/large/product-1.webp">
                                                                <img
                                                                        alt="detail"
                                                                        src="/img/product/large/product-1.webp"
                                                                        class="responsive border-0 rounded-md img-fluid mb-3 sh-24 sh-md-35 sh-xl-50 w-100"
                                                                />
                                                            </a>
                                                        </li>
                                                        <li class="glide__slide p-0">
                                                            <a href="/img/product/large/product-2.webp">
                                                                <img
                                                                        alt="detail"
                                                                        src="/img/product/large/product-2.webp"
                                                                        class="responsive border-0 rounded-md img-fluid mb-3 sh-24 sh-md-35 sh-xl-50 w-100"
                                                                />
                                                            </a>
                                                        </li>
                                                        <li class="glide__slide p-0">
                                                            <a href="/img/product/large/product-3.webp">
                                                                <img
                                                                        alt="detail"
                                                                        src="/img/product/large/product-3.webp"
                                                                        class="responsive border-0 rounded-md img-fluid mb-3 sh-24 sh-md-35 sh-xl-50 w-100"
                                                                />
                                                            </a>
                                                        </li>
                                                        <li class="glide__slide p-0">
                                                            <a href="/img/product/large/product-4.webp">
                                                                <img
                                                                        alt="detail"
                                                                        src="/img/product/large/product-4.webp"
                                                                        class="responsive border-0 rounded-md img-fluid mb-3 sh-24 sh-md-35 sh-xl-50 w-100"
                                                                />
                                                            </a>
                                                        </li>
                                                        <li class="glide__slide p-0">
                                                            <a href="/img/product/large/product-5.webp">
                                                                <img
                                                                        alt="detail"
                                                                        src="/img/product/large/product-5.webp"
                                                                        class="responsive border-0 rounded-md img-fluid mb-3 sh-24 sh-md-35 sh-xl-50 w-100"
                                                                />
                                                            </a>
                                                        </li>
                                                        <li class="glide__slide p-0">
                                                            <a href="/img/product/large/product-6.webp">
                                                                <img
                                                                        alt="detail"
                                                                        src="/img/product/large/product-6.webp"
                                                                        class="responsive border-0 rounded-md img-fluid mb-3 sh-24 sh-md-35 sh-xl-50 w-100"
                                                                />
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Large Images End -->

                                            <!-- Thumbs Start -->
                                            <div class="glide glide-thumb">
                                                <div class="glide__track" data-glide-el="track">
                                                    <ul class="glide__slides">
                                                        <li class="glide__slide p-0">
                                                            <img alt="thumb" src="/img/product/small/product-1.webp" class="responsive rounded-md img-fluid" />
                                                        </li>
                                                        <li class="glide__slide p-0">
                                                            <img alt="thumb" src="/img/product/small/product-2.webp" class="responsive rounded-md img-fluid" />
                                                        </li>
                                                        <li class="glide__slide p-0">
                                                            <img alt="thumb" src="/img/product/small/product-3.webp" class="responsive rounded-md img-fluid" />
                                                        </li>
                                                        <li class="glide__slide p-0">
                                                            <img alt="thumb" src="/img/product/small/product-4.webp" class="responsive rounded-md img-fluid" />
                                                        </li>
                                                        <li class="glide__slide p-0">
                                                            <img alt="thumb" src="/img/product/small/product-5.webp" class="responsive rounded-md img-fluid" />
                                                        </li>
                                                        <li class="glide__slide p-0">
                                                            <img alt="thumb" src="/img/product/small/product-6.webp" class="responsive rounded-md img-fluid" />
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="glide__arrows" data-glide-el="controls">
                                                    <button class="btn btn-icon btn-icon-only btn-foreground hover-outline left-arrow" data-glide-dir="<">
                                                        <i data-acorn-icon="chevron-left"></i>
                                                    </button>
                                                    <button class="btn btn-icon btn-icon-only btn-foreground hover-outline right-arrow" data-glide-dir=">">
                                                        <i data-acorn-icon="chevron-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- Thumbs End -->
                                        </div>
                                    </div>

                                    <div class="col-12 col-xl-6">
                                        <a class="mb-1 d-inline-block text-small" href="#">Whole Wheat</a>
                                        <h4 class="mb-4">Carrot Cake Gingerbread</h4>
                                        <div class="h3">$ 25.20</div>
                                        <div>
                                            <div class="br-wrapper br-theme-cs-icon d-inline-block">
                                                <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="5">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <div class="text-muted d-inline-block text-small align-text-top">(25 Reviews)</div>
                                        </div>
                                        <p class="mt-2 mb-4">
                                            Toffee croissant icing toffee. Sweet roll chupa chups marshmallow muffin liquorice chupa chups soufflé bonbon. Liquorice gummi bears
                                            cake donut chocolate lollipop gummi bears. Cotton candy cupcake ice cream gummies dessert muffin chocolate jelly.
                                        </p>
                                        <div class="row g-3 mb-4">
                                            <div class="mb-3 col-12 col-sm-auto me-1">
                                                <label class="fw-bold form-label">Color</label>
                                                <div class="pt-1">
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" class="form-check-input" name="inlineRadio" id="inlineRadio1" />
                                                        <label class="form-check-label" for="inlineRadio1">Red</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" class="form-check-input" name="inlineRadio" id="inlineRadio2" />
                                                        <label class="form-check-label" for="inlineRadio2">Blue</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-auto me-1">
                                                <label class="fw-bold form-label">Size</label>
                                                <select class="sw-10 select-single-no-search">
                                                    <option selected>Pick</option>
                                                    <option>S</option>
                                                    <option>M</option>
                                                    <option>L</option>
                                                    <option>XL</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-auto">
                                                <label class="fw-bold form-label">Quantity</label>
                                                <select class="sw-10 select-single-no-search">
                                                    <option selected>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn btn-icon btn-icon-start btn-primary mb-1" type="button">
                                                <i data-acorn-icon="check"></i>
                                                <span>Purchase</span>
                                            </button>
                                            <button class="btn btn-icon btn-icon-start btn-primary mb-1" type="button">
                                                <i data-acorn-icon="plus"></i>
                                                <span>Add to Cart</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Product End -->
                </div>
                <!-- Content End -->
            </div> 
        </div>
    </div>
@endsection
