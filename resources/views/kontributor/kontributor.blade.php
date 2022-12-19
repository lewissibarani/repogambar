@php
    $html_tag_data  = ["override"=>'{"attributes" : { "layout": "boxed" }}'];
    $title          = 'Halaman Kontributor';
    $description    = 'Portfolio Home Page';
    $breadcrumbs    = ["/"=>"Home", "/Kontributor/Profiluser"=>"Kontributor"];
    $aboutme        = "-";
    if(!$User->aboutme->isEmpty())
    {
        $aboutme = $User->aboutme;
    }
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/baguetteBox.min.css"/>
@endsection

@section('js_vendor')
    <script src="/js/vendor/baguetteBox.min.js"></script>
    <script src="/js/cs/responsivetab.js"></script>
@endsection

@section('js_page')
    <script src="/js/pages/portfolio.home.js"></script>
@endsection

@section('content')
    <div class="container">
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
                    <!-- Contact Button Start -->
                    <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto">
                        <i data-acorn-icon="email"></i>
                        <span>Contact</span>
                    </button>
                    <!-- Contact Button End --> 
                </div>
                <!-- Top Buttons End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <div class="row gx-4 gy-5">
            <!-- Left Side Start -->
            <div class="col-12 col-xl-4 col-xxl-3">
                <!-- Biography Start -->
                <h2 class="small-title">Profil Kontributor</h2>
                <div class="card">
                    <div class="card-body mb-n5">
                        <div class="d-flex align-items-center flex-column ">
                            <div class="mb-5 d-flex align-items-center flex-column">
                                <div class="sw-13 position-relative mb-3">
                                    <img src="{{$User->profilepicture}}" class="img-fluid rounded-xl" alt="thumb" />
                                </div>
                                <div class="h5 mb-0">{{$User->name}}</div>
                                <div class="text-muted">{{$User->nipbaru}}</div>
                                <div class="text-muted"> 
                                    <span class="align-middle">{{$User->jabatan}}</span>
                                </div>
                            </div> 
                        </div>

                        <div class="mb-5">
                            <div class="row g-0 align-items-center mb-2">
                                <div class="col-auto">
                                    <div class="border border-primary sw-5 sh-5 rounded-xl d-flex justify-content-center align-items-center">
                                        <i data-acorn-icon="screen" class="text-primary"></i>
                                    </div>
                                </div>
                                <div class="col ps-3">
                                    <div class="row g-0">
                                        <div class="col">
                                            <div class="sh-5 d-flex align-items-center lh-1-25">Project Views</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="sh-5 d-flex align-items-center">23.573</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0 align-items-center mb-2">
                                <div class="col-auto">
                                    <div class="border border-primary sw-5 sh-5 rounded-xl d-flex justify-content-center align-items-center">
                                        <i data-acorn-icon="paint-roller" class="text-primary"></i>
                                    </div>
                                </div>
                                <div class="col ps-3">
                                    <div class="row g-0">
                                        <div class="col">
                                            <div class="sh-5 d-flex align-items-center lh-1-25">Project Saves</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="sh-5 d-flex align-items-center">1.124</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0 align-items-center mb-2">
                                <div class="col-auto">
                                    <div class="border border-primary sw-5 sh-5 rounded-xl d-flex justify-content-center align-items-center">
                                        <i data-acorn-icon="like" class="text-primary"></i>
                                    </div>
                                </div>
                                <div class="col ps-3">
                                    <div class="row g-0">
                                        <div class="col">
                                            <div class="sh-5 d-flex align-items-center lh-1-25">Likes</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="sh-5 d-flex align-items-center">12.573</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0 align-items-center mb-2">
                                <div class="col-auto">
                                    <div class="border border-primary sw-5 sh-5 rounded-xl d-flex justify-content-center align-items-center">
                                        <i data-acorn-icon="user" class="text-primary"></i>
                                    </div>
                                </div>
                                <div class="col ps-3">
                                    <div class="row g-0">
                                        <div class="col">
                                            <div class="sh-5 d-flex align-items-center lh-1-25">Followers</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="sh-5 d-flex align-items-center">1.245</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <p class="text-small text-muted mb-2">ABOUT ME</p>
                            <p>
                                Jujubes brownie marshmallow apple pie donut ice cream jelly-o jelly-o gummi bears. Tootsie roll chocolate bar dragée bonbon cheesecake
                                icing. Danish wafer donut cookie caramels gummies topping.
                            </p>
                        </div> 
                        <div class="mb-5">
                            <p class="text-small text-muted mb-2">CONTACT</p>
                            <a href="#" class="d-block body-link mb-1">
                                <i data-acorn-icon="screen" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">blainecottrell.com</span>
                            </a>
                            <a href="#" class="d-block body-link">
                                <i data-acorn-icon="email" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">contact@blainecottrell.com</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Biography End -->
            </div>
            <!-- Left Side End -->

            <!-- Right Side Start -->
            <div class="col-12 col-xl-8 col-xxl-9">
                <!-- Title Tabs Start -->
                <ul class="nav nav-tabs nav-tabs-title nav-tabs-line-title responsive-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#projectsTab" role="tab" aria-selected="true">Projects</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#collectionsTab" role="tab" aria-selected="false">Collections</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#friendsTab" role="tab" aria-selected="false">Friends</a>
                    </li>
                    <li class="nav-item dropdown ms-auto d-none responsive-tab-dropdown">
                        <a
                                class="btn btn-icon btn-icon-only btn-background pt-0"
                                href="#"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                                data-diplay="static"
                        >
                            <i data-acorn-icon="more-horizontal"></i>
                        </a>
                        <ul class="dropdown-menu mt-2 dropdown-menu-end"></ul>
                    </li>
                </ul>
                <!-- Title Tabs End -->

                <div class="tab-content">
                    <!-- Projects Tab Start -->
                    <div class="tab-pane fade active show" id="projectsTab" role="tabpanel">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-xxl-3 g-2 mb-5">
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="/img/product/small/product-1.webp" class="card-img h-100 scale" alt="card image" />
                                    <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">153</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="message" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">5</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">29</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="/Pages/Portfolio/Detail" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">Introduction to Bread Making</h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">Blaine Cottrell</div>
                                                </div>
                                            </div>
                                            <div class="col-auto me-auto">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mb-1" type="button">
                                                    <i data-acorn-icon="like"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="/img/product/small/product-2.webp" class="card-img h-100 scale" alt="card image" />
                                    <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">224</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="message" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">2</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">52</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="/Pages/Portfolio/Detail" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">14 Facts About Sugar Products</h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">Cherish Kerr</div>
                                                </div>
                                            </div>
                                            <div class="col-auto me-auto">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mb-1" type="button">
                                                    <i data-acorn-icon="like"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="/img/product/small/product-3.webp" class="card-img h-100 scale" alt="card image" />
                                    <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">13</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="message" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">5</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">12</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="/Pages/Portfolio/Detail" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">Apple Cake Recipe</h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">Kirby Peters</div>
                                                </div>
                                            </div>
                                            <div class="col-auto me-auto">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mb-1" type="button">
                                                    <i data-acorn-icon="like"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="/img/product/small/product-4.webp" class="card-img h-100 scale" alt="card image" />
                                    <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">155</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="message" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">6</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">46</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="/Pages/Portfolio/Detail" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">Complete Guide to Mix Dough</h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">Olli Hawkins</div>
                                                </div>
                                            </div>
                                            <div class="col-auto me-auto">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mb-1" type="button">
                                                    <i data-acorn-icon="like"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="/img/product/small/product-5.webp" class="card-img h-100 scale" alt="card image" />
                                    <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">82</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="message" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">4</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">3</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="/Pages/Portfolio/Detail" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">10 Secrets Every Southern Baker Knows</h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">Kathryn Mengel</div>
                                                </div>
                                            </div>
                                            <div class="col-auto me-auto">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mb-1" type="button">
                                                    <i data-acorn-icon="like"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="/img/product/small/product-6.webp" class="card-img h-100 scale" alt="card image" />
                                    <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">55</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="message" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">1</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">4</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="/Pages/Portfolio/Detail" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">Recipes for Sweet and Healty Treats</h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">Esperanza Lodge</div>
                                                </div>
                                            </div>
                                            <div class="col-auto me-auto">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mb-1" type="button">
                                                    <i data-acorn-icon="like"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="/img/product/small/product-7.webp" class="card-img h-100 scale" alt="card image" />
                                    <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">49</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="message" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">19</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">8</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="/Pages/Portfolio/Detail" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">Mix Dough for the Molds</h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">Zayn Hartley</div>
                                                </div>
                                            </div>
                                            <div class="col-auto me-auto">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mb-1" type="button">
                                                    <i data-acorn-icon="like"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="/img/product/small/product-8.webp" class="card-img h-100 scale" alt="card image" />
                                    <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">81</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="message" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">13</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">5</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="/Pages/Portfolio/Detail" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">Basic Introduction for Dough Molding</h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">Joisse Kaycee</div>
                                                </div>
                                            </div>
                                            <div class="col-auto me-auto">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mb-1" type="button">
                                                    <i data-acorn-icon="like"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="/img/product/small/product-9.webp" class="card-img h-100 scale" alt="card image" />
                                    <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">64</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="message" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">9</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">3</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="/Pages/Portfolio/Detail" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">Mix Dough for the Molds</h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">Kirby Peters</div>
                                                </div>
                                            </div>
                                            <div class="col-auto me-auto">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mb-1" type="button">
                                                    <i data-acorn-icon="like"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="/img/product/small/product-10.webp" class="card-img h-100 scale" alt="card image" />
                                    <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">35</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="message" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">2</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">5</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="/Pages/Portfolio/Detail" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">Introduction to Baking Donut</h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">Peter Linatti</div>
                                                </div>
                                            </div>
                                            <div class="col-auto me-auto">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mb-1" type="button">
                                                    <i data-acorn-icon="like"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="/img/product/small/product-2.webp" class="card-img h-100 scale" alt="card image" />
                                    <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">27</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="message" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">12</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">8</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="/Pages/Portfolio/Detail" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">Apple Cake Recipe for Starters</h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">Rosa Holt</div>
                                                </div>
                                            </div>
                                            <div class="col-auto me-auto">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mb-1" type="button">
                                                    <i data-acorn-icon="like"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="/img/product/small/product-6.webp" class="card-img h-100 scale" alt="card image" />
                                    <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">15</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="message" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">2</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">0</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="/Pages/Portfolio/Detail" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">6 Facts About Sugar Products</h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">Josh Henderson</div>
                                                </div>
                                            </div>
                                            <div class="col-auto me-auto">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mb-1" type="button">
                                                    <i data-acorn-icon="like"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-xl btn-outline-primary sw-30">Load More</button>
                        </div>
                    </div>
                    <!-- Projects Tab End -->

                    <!-- Collections Tab Start -->
                    <div class="tab-pane fade" id="collectionsTab" role="tabpanel">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-xxl-3 g-2">
                            <div class="col-12 col-sm-6 col-lg-6 col-xxl-6">
                                <div class="card">
                                    <div class="sh-35">
                                        <div class="row g-1 h-100 gallery">
                                            <div class="col h-100">
                                                <a
                                                        href="/img/product/large/product-1.webp"
                                                        class="w-100 h-100 rounded-xl-top-start bg-cover-center d-block"
                                                        style="background-image: url('/img/product/small/product-1.webp')"
                                                ></a>
                                            </div>
                                            <div class="col d-flex flex-column justify-content-stretch h-100">
                                                <div class="d-flex mb-1 flex-grow-1">
                                                    <a
                                                            href="/img/product/large/product-1.webp"
                                                            class="w-100 h-100 rounded-xl-top-end bg-cover-center d-block"
                                                            style="background-image: url('/img/product/small/product-1.webp')"
                                                    ></a>
                                                </div>
                                                <div class="d-flex flex-grow-1">
                                                    <a
                                                            href="/img/product/large/product-1.webp"
                                                            class="w-100 h-100 bg-cover-center d-block"
                                                            style="background-image: url('/img/product/small/product-1.webp')"
                                                    ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="heading mb-0">
                                            <a href="#" class="body-link sh-5 d-inline-block">
                                                <span class="clamp-line" data-line="2">Apple Cake Recipe for Starters</span>
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-6 col-xxl-6">
                                <div class="card">
                                    <div class="sh-35">
                                        <div class="row g-1 h-100 gallery">
                                            <div class="col d-flex flex-column justify-content-stretch h-100">
                                                <div class="d-flex mb-1 flex-grow-1">
                                                    <a
                                                            href="/img/product/large/product-2.webp"
                                                            class="w-100 h-100 rounded-xl-top bg-cover-center d-block"
                                                            style="background-image: url('/img/product/small/product-2.webp')"
                                                    ></a>
                                                </div>
                                                <div class="d-flex flex-grow-1">
                                                    <a
                                                            href="/img/product/large/product-2.webp"
                                                            class="w-100 h-100 bg-cover-center d-block"
                                                            style="background-image: url('/img/product/small/product-2.webp')"
                                                    ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="heading mb-0">
                                            <a href="#" class="body-link sh-5 d-inline-block">
                                                <span class="clamp-line" data-line="2">Basic Introduction for Dough Molding</span>
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-6 col-xxl-6">
                                <div class="card">
                                    <div class="sh-35">
                                        <div class="row g-1 h-100 gallery">
                                            <div class="col h-100">
                                                <a
                                                        href="/img/product/large/product-4.webp"
                                                        class="w-100 h-100 rounded-xl-top-start bg-cover-center d-block"
                                                        style="background-image: url('/img/product/small/product-4.webp')"
                                                ></a>
                                            </div>
                                            <div class="col h-100">
                                                <a
                                                        href="/img/product/large/product-4.webp"
                                                        class="w-100 h-100 rounded-xl-top-end bg-cover-center d-block"
                                                        style="background-image: url('/img/product/small/product-4.webp')"
                                                ></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="heading mb-0">
                                            <a href="#" class="body-link sh-5 d-inline-block">
                                                <span class="clamp-line" data-line="2">Recipes for Sweet and Healty Treats</span>
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-6 col-xxl-6">
                                <div class="card">
                                    <div class="sh-35">
                                        <div class="row g-1 h-100 gallery">
                                            <div class="col d-flex flex-column justify-content-stretch h-100">
                                                <div class="d-flex mb-1 flex-grow-1">
                                                    <a
                                                            href="/img/product/large/product-5.webp"
                                                            class="w-100 h-100 rounded-xl-top-start bg-cover-center d-block"
                                                            style="background-image: url('/img/product/small/product-5.webp')"
                                                    ></a>
                                                </div>
                                                <div class="d-flex flex-grow-1">
                                                    <a
                                                            href="/img/product/large/product-5.webp"
                                                            class="w-100 h-100 bg-cover-center d-block"
                                                            style="background-image: url('/img/product/small/product-5.webp')"
                                                    ></a>
                                                </div>
                                            </div>
                                            <div class="col d-flex flex-column justify-content-stretch h-100">
                                                <div class="d-flex mb-1 flex-grow-1">
                                                    <a
                                                            href="/img/product/large/product-5.webp"
                                                            class="w-100 h-100 rounded-xl-top-end bg-cover-center d-block"
                                                            style="background-image: url('/img/product/small/product-5.webp')"
                                                    ></a>
                                                </div>
                                                <div class="d-flex flex-grow-1">
                                                    <a
                                                            href="/img/product/large/product-5.webp"
                                                            class="w-100 h-100 bg-cover-center d-block"
                                                            style="background-image: url('/img/product/small/product-5.webp')"
                                                    ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="heading mb-0">
                                            <a href="#" class="body-link sh-5 d-inline-block">
                                                <span class="clamp-line" data-line="2">10 Secrets Every Southern Baker Knows</span>
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-6 col-xxl-6">
                                <div class="card">
                                    <div class="sh-35">
                                        <div class="row g-1 h-100 gallery">
                                            <div class="col d-flex flex-column justify-content-stretch h-100">
                                                <div class="d-flex mb-1 flex-grow-1">
                                                    <a
                                                            href="/img/product/large/product-6.webp"
                                                            class="w-100 h-100 rounded-xl-top bg-cover-center d-block"
                                                            style="background-image: url('/img/product/small/product-6.webp')"
                                                    ></a>
                                                </div>
                                                <div class="d-flex flex-grow-1">
                                                    <a
                                                            href="/img/product/large/product-6.webp"
                                                            class="w-100 h-100 bg-cover-center d-block"
                                                            style="background-image: url('/img/product/small/product-6.webp')"
                                                    ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="heading mb-0">
                                            <a href="#" class="body-link sh-5 d-inline-block">
                                                <span class="clamp-line" data-line="2">Basic Introduction to Cornbread Making</span>
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Collections Tab End -->

                    <!-- Friends Tab Start -->
                    <div class="tab-pane fade" id="friendsTab" role="tabpanel">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-xxl-3 g-2">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-0 sh-6">
                                            <div class="col-auto">
                                                <img src="/img/profile/profile-1.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                            </div>
                                            <div class="col">
                                                <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                    <div class="d-flex flex-column">
                                                        <div>Blaine Cottrell</div>
                                                        <div class="text-small text-muted">Project Manager</div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-0 sh-6">
                                            <div class="col-auto">
                                                <img src="/img/profile/profile-4.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                            </div>
                                            <div class="col">
                                                <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                    <div class="d-flex flex-column">
                                                        <div>Cherish Kerr</div>
                                                        <div class="text-small text-muted">Development Lead</div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-0 sh-6">
                                            <div class="col-auto">
                                                <img src="/img/profile/profile-8.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                            </div>
                                            <div class="col">
                                                <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                    <div class="d-flex flex-column">
                                                        <div>Kirby Peters</div>
                                                        <div class="text-small text-muted">Accounting</div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-0 sh-6">
                                            <div class="col-auto">
                                                <img src="/img/profile/profile-5.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                            </div>
                                            <div class="col">
                                                <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                    <div class="d-flex flex-column">
                                                        <div>Olli Hawkins</div>
                                                        <div class="text-small text-muted">Client Relations Lead</div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-0 sh-6">
                                            <div class="col-auto">
                                                <img src="/img/profile/profile-2.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                            </div>
                                            <div class="col">
                                                <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                    <div class="d-flex flex-column">
                                                        <div>Zayn Hartley</div>
                                                        <div class="text-small text-muted">Customer Engagement</div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-0 sh-6">
                                            <div class="col-auto">
                                                <img src="/img/profile/profile-3.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                            </div>
                                            <div class="col">
                                                <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                    <div class="d-flex flex-column">
                                                        <div>Esperanza Lodge</div>
                                                        <div class="text-small text-muted">UX Designer</div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-0 sh-6">
                                            <div class="col-auto">
                                                <img src="/img/profile/profile-4.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                            </div>
                                            <div class="col">
                                                <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                    <div class="d-flex flex-column">
                                                        <div>Kerr Jackson</div>
                                                        <div class="text-small text-muted">Frontend Developer</div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-0 sh-6">
                                            <div class="col-auto">
                                                <img src="/img/profile/profile-6.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                            </div>
                                            <div class="col">
                                                <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                    <div class="d-flex flex-column">
                                                        <div>Kathryn Mengel</div>
                                                        <div class="text-small text-muted">Team Leader</div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-0 sh-6">
                                            <div class="col-auto">
                                                <img src="/img/profile/profile-6.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                            </div>
                                            <div class="col">
                                                <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                    <div class="d-flex flex-column">
                                                        <div>Joisse Kaycee</div>
                                                        <div class="text-small text-muted">Copywriter</div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-0 sh-6">
                                            <div class="col-auto">
                                                <img src="/img/profile/profile-7.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                            </div>
                                            <div class="col">
                                                <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                                                    <div class="d-flex flex-column">
                                                        <div>Zayn Hartley</div>
                                                        <div class="text-small text-muted">Visual Effect Designer</div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Friends Tab End -->
                </div>
            </div>
            <!-- Right Side End -->
        </div>
    </div>
@endsection
