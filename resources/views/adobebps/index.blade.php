@php
    $html_tag_data  = ["override"=>'{"attributes" : { "layout": "boxed" }}'];
    $title          = 'PJ Lisensi Adobe';
    $title_tabel    = 'Kuesioner Pemanfaatan Adobe';
    $description    = 'Portfolio Home Page';
    $breadcrumbs    = ["/"=>"Home", "/Kontributor/Profiluser"=>"Adobe-BPS"];
    
    //BAST
    $linkdownloadbast = "Belum Upload";
    $sudahuploadbast = false;
    if(!$Data_BAST==null)
        {
            $sudahuploadbast= true;
            $linkdownloadbast = $Data_BAST->dokumen->path; 
        } 

    //Kuesioner Pemanfaatan
    $Dilihat        = 0; 
    $aboutme        = "adboutme";
    $phone        = "phone";
    $email        = "email";
    
@endphp

@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/baguetteBox.min.css"/>
    <link rel="stylesheet" href="/css/vendor/datatables.min.css"/> 

@endsection

@section('js_vendor')
    <script src="/js/vendor/baguetteBox.min.js"></script> 
    <script src="/js/cs/scrollspy.js"></script>
    <script src="/js/vendor/datatables.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/pages/portfolio.home.js"></script>
    <script src="/js/cs/datatable.extend.js"></script>
    <script src="/js/plugins/datatable.boxedvariations.js"></script>
    <script src="/js/cs/responsivetab.js"></script>

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
                    <!-- Upload Dokumen Button Start -->
                    <button type="button" class="btn btn-primary btn-icon btn-icon-start add-datatable" 
                        data-bs-toggle="modal"        
                        data-bs-target="#tambahlaporanadobe">
                        <i data-acorn-icon="upload"></i> 
                            <span>Upload BAST</span>
                    </button>
                    @include('adobebps.formBAST')   
                    <!-- Upload Dokumen Button End --> 
                </div>
                <!-- Top Buttons End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <div class="row gx-4 gy-5">
            <!-- Left Side Start -->
            <div class="col-12 col-xl-4 col-xxl-3">
                <!-- Biography Start -->
                <!-- <h2 class="small-title">Profil Kontributor</h2> -->
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
                                        @if($sudahuploadbast) 
                                            <div class="border border-success sw-5 sh-5 rounded-xl d-flex justify-content-center align-items-center">
                                            <i data-acorn-icon="check-circle" class="text-success"></i>
                                            </div> 
                                        @else
                                            <div class="border border-danger sw-5 sh-5 rounded-xl d-flex justify-content-center align-items-center">
                                            <i data-acorn-icon="multiply" class="text-danger"></i>
                                            </div> 
                                        @endif 
                                </div>
                                <div class="col ps-3">
                                    <div class="row g-0">
                                        <div class="col">
                                            <div class="sh-5 d-flex align-items-center lh-1-25">BAST</div>
                                        </div>
                                        <div class="col-auto">
                                            @if($sudahuploadbast) 
                                                <div class="sh-5 d-flex align-items-center">
                                                    <a href='{{$linkdownloadbast}}'> Download </a>
                                                </div>
                                            @else
                                                <div class="sh-5 d-flex align-items-center">{{$linkdownloadbast}}</div>
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div>
                            </div> 
 
                            <div class="row g-0 align-items-center mb-2">
                                <div class="col-auto">
                                    <div class="border border-primary sw-5 sh-5 rounded-xl d-flex justify-content-center align-items-center">
                                        <i data-acorn-icon="file-text" class="text-primary"></i>
                                    </div>
                                </div>
                                <div class="col ps-3">
                                    <div class="row g-0">
                                        <div class="col">
                                            <div class="sh-5 d-flex align-items-center lh-1-25">% Pemanfaatan</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="sh-5 d-flex align-items-center">{{$Dilihat}}%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            
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
                @if(session()->has('message'))
                    <div class="alert alert-info">
                    {!! session()->get('message') !!}
                    </div>
                @endif

            @include('adobebps.tablelaporanbulanan')   
            </div>
            <!-- Right Side End -->
        </div> 
    </div>
@endsection
