@php
    $html_tag_data  = ["override"=>'{"attributes" : { "layout": "none" }}'];
    $title          = 'Statistik Laporan';
    $description    ="";
    $title_tabel    = 'Kuesioner Pemanfaatan Adobe'; 
    $breadcrumbs    = ["/"=>"Home", "{{route('adobebps.indexstatistik')}}"=>"Statistik Laporan"];
    
    
    
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

@push('pushcss')
  <style> 
  main { 
    padding-left: calc(var(--nav-size) + var(--main-spacing-horizontal));
    padding-right: var(--main-spacing-horizontal);
    padding-top: var(--main-spacing-vertical);
    padding-bottom: var(--main-spacing-vertical);
    background:#f2f5fa;
  } 
  </style>  

@endpush

@section('content')
 <!-- <div class="" style="padding:10px; background: #e8e8e8;"> -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-container">
                    <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                        @include('_layout.breadcrumb',['breadcrumbs'=>$breadcrumbs])  
                </div>
            </div>
        </div>

        <section id="CTA" class="cta scroll-section " style="  padding-bottom: 20px;">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 flex-grow-1 bd-highlight">

                        </div>

                        <div class="p-2 bd-highlight">
                            <button type="button" class="btn btn-primary btn-icon btn-icon-start rounded-xl mt-1" 
                            data-bs-toggle="modal"        
                            data-bs-target="#modalrincianBAST">
                            <i data-acorn-icon="file-text"></i> 
                                <span>Rincian BAST</span>
                            </button>
                        </div>

                        <div class="p-2 bd-highlight">
                            <button type="button" class="btn btn-success btn-icon btn-icon-start rounded-xl mt-1" 
                            data-bs-toggle="modal"        
                            data-bs-target="#_modalrinciankuesioner">
                            <i data-acorn-icon="file-chart"></i> 
                                <span>Rincian Kuesioner</span>
                            </button>
                        </div>
                    </div>
                </div> 
                @include('adobebps.modalrincianBAST')
                @include('adobebps.modalrinciankuesioner')  
            </div>  
        </section> 

       
 
@endsection
