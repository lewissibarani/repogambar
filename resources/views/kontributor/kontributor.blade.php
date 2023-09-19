@php
    $html_tag_data  = ["override"=>'{"attributes" : { "layout": "boxed" }}'];
    $title          = 'Halaman Kontributor';
    $description    = 'Portfolio Home Page';
    $breadcrumbs    = ["/"=>"Home", "/Kontributor/Profiluser"=>"Kontributor"];
    
    $phone          = "-";
    if(!$User->nohp==null)
    {
        $phone = $User->nohp;
    } 
    $aboutme        = "-";
    if(!$User->aboutme==null)
    {
        $aboutme = $User->aboutme;
    } 
    $email          = $User->email;

    $sums_upload    = $User->sums_upload;
    $sums_download  = $User->sums_donwload;
    
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
                    <a href="/Kontributor/UploadKarya" type="button" class="btn btn-primary btn-icon btn-icon-start w-100 w-md-auto" style="margin-right: 5px;">
                        <i data-acorn-icon="upload"></i>
                        <span>Upload Karya</span>
                    </a>
                    <a href="{{route('album.index')}}" type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto">
                        <i data-acorn-icon="folder"></i>
                        <span>Buat Album</span>
                    </a>
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
                                        <i data-acorn-icon="image" class="text-primary"></i>
                                    </div>
                                </div>
                                <div class="col ps-3">
                                    <div class="row g-0">
                                        <div class="col">
                                            <div class="sh-5 d-flex align-items-center lh-1-25">Total Karya</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="sh-5 d-flex align-items-center">{{$Total}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
 
                            <div class="row g-0 align-items-center mb-2">
                                <div class="col-auto">
                                    <div class="border border-primary sw-5 sh-5 rounded-xl d-flex justify-content-center align-items-center">
                                        <i data-acorn-icon="eye" class="text-primary"></i>
                                    </div>
                                </div>
                                <div class="col ps-3">
                                    <div class="row g-0">
                                        <div class="col">
                                            <div class="sh-5 d-flex align-items-center lh-1-25">Dilihat</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="sh-5 d-flex align-items-center">{{$Dilihat}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <div class="row g-0 align-items-center mb-2">
                                <div class="col-auto">
                                    <div class="border border-primary sw-5 sh-5 rounded-xl d-flex justify-content-center align-items-center">
                                        <i data-acorn-icon="download" class="text-primary"></i>
                                    </div>
                                </div>
                                <div class="col ps-3">
                                    <div class="row g-0">
                                        <div class="col">
                                            <div class="sh-5 d-flex align-items-center lh-1-25">Didownload</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="sh-5 d-flex align-items-center">{{$Didownload}}</div>
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
                                            <div class="sh-5 d-flex align-items-center lh-1-25">Disukai</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="sh-5 d-flex align-items-center">{{$Dilike}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            
                        </div>

                        <div class="mb-5">
                            <p class="text-small text-muted mb-2">ABOUT ME</p>
                            <p>
                                {{$aboutme}}
                            </p>
                        </div> 
                        <div class="mb-5">
                            <p class="text-small text-muted mb-2">CONTACT</p>
                            <a href="#" class="d-block body-link mb-1">
                                <i data-acorn-icon="phone" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">{{$phone}}</span>
                            </a>
                            <a href="#" class="d-block body-link">
                                <i data-acorn-icon="email" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">{{$email}}</span>
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
                        <a class="nav-link active" data-bs-toggle="tab" href="#projectsTab" role="tab" aria-selected="true">Karya</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#collectionsTab" role="tab" aria-selected="false">Disukai</a>
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
                            @foreach ($Gambar as $gambars)
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="{{$gambars->thumbnail_path}}" class="card-img h-100 scale" alt="card image" />
                                    <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">{{$gambars->views}}</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="download" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">{{$gambars->download}}</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">{{ $gambars->likeCount}}</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="/Dashboard/DetailGambar/{{$gambars->id}}" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">{{$gambars->judul}}</h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">{{$gambars->user->name}}</div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div> 
                    
                        <div class="col-12 text-center">
                                <a href="{{$Gambar->nextPageUrl()}}" class="btn btn-xl btn-outline-primary sw-30">Muat Lebih Banyak</a>
                            </div>
                        </div>

                    </div>
                    <!-- Projects Tab End -->  

                    <div class="tab-pane fade" id="collectionsTab" role="tabpanel">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-xxl-3 g-2 mb-5">
                            @foreach ($GambarLiked as $gambarliked)
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    
                                    <img src="{{Storage::temporaryUrl($gambarliked->thumbnail_path,now()->addMinutes(30))}}" class="card-img h-100 scale" alt="card image" />
                                    <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">{{$gambarliked->views}}</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="download" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">{{$gambarliked->download}}</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1" data-acorn-size="15"></i>
                                                <span class="align-middle text-white">{{ $gambarliked->likeCount}}</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="/Dashboard/DetailGambar/{{$gambars->id}}" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">{{$gambarliked->judul}}</h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">{{$gambarliked->user->name}}</div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div> 
                    </div>
                </div>
            </div>
            <!-- Right Side End -->
        </div>
    </div>
@endsection
