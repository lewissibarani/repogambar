@php
    $html_tag_data = ["override"=>'{"attributes" : { "layout": "boxed" }}'];
    $title = 'Knowledge Base';
    $description = 'Knowledge Base Page';
    $breadcrumbs = ["/"=>"Home", "/Pages"=>"Pages", "/Pages/Miscellaneous"=>"Miscellaneous"]
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <!-- Top Search Start -->
            <div class="col-12">
                <div class="card w-100 sh-30 sh-md-25 mb-5">
                    <img src="/img/banner/cta-wide-3.webp" class="card-img h-100" alt="card image" />
                    <div class="card-img-overlay d-flex flex-column justify-content-center bg-transparent">
                        <div class="row d-flex">
                            <div class="col-12 text-center">
                                <div class="cta-3 text-primary">Ingin mencari gambar?</div>
                                <div class="cta-3 text-black mb-3">Ketikkn kata kuncinya di bawah ini!</div>
                                <div class="row g-2 justify-content-center">
                                    <div class="col-12 col-sm-6">
                                        <div class="d-flex flex-column justify-content-start">

                                            <div class="text-muted mb-3 mb-sm-0">
                                                <input type="text" class="form-control" placeholder="Search" />
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-auto">
                                        <a href="#" class="btn btn-icon btn-icon-start btn-primary">
                                            <i data-acorn-icon="search"></i>
                                            <span>Search</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Top Search End -->

            <!-- Categories Start -->
            <div class="col-12 col-xl-12 col-xxl-12 mb-5">
                <h2 class="small-title">Categories</h2>
                <div class="row row-cols-1 row-cols-lg-2 g-2">
                    <div class="col">
                        <div class="card mb-2 h-100">
                            <div class="card-body row g-0">
                                <div class="col-auto">
                                    <div class="d-inline-block d-flex">
                                        <div class="bg-gradient-light sw-6 sh-6 rounded-xl">
                                            <div class="text-white d-flex justify-content-center align-items-center h-100">
                                                <i data-acorn-icon="radish"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-body d-flex flex-column pe-0 pt-0 pb-0 h-100 justify-content-start">
                                        <div class="d-flex flex-column">
                                            <div class="d-flex flex-column justify-content-center sh-6">
                                                <a href="#" class="heading">Chupa Chups Bonbon</a>
                                            </div>
                                        </div>
                                        <div class="mb-n2">
                                            <div class="row g-0 mb-2">
                                                <div class="col-auto">
                                                    <div class="sw-3 me-1">
                                                        <i data-acorn-icon="chevron-right" class="text-muted align-top" data-acorn-size="17"></i>
                                                    </div>
                                                </div>
                                                <div class="col lh-1-25">
                                                    <a href="#" class="alternate-link align-top">Chocolate cake marshmallow muffin</a>
                                                </div>
                                            </div>
                                            <div class="row g-0 mb-2">
                                                <div class="col-auto">
                                                    <div class="sw-3 me-1">
                                                        <i data-acorn-icon="chevron-right" class="text-muted align-top" data-acorn-size="17"></i>
                                                    </div>
                                                </div>
                                                <div class="col lh-1-25">
                                                    <a href="#" class="alternate-link align-top">Bear claw marzipan tiramisu topping</a>
                                                </div>
                                            </div>
                                            <div class="row g-0 mb-2">
                                                <div class="col-auto">
                                                    <div class="sw-3 me-1">
                                                        <i data-acorn-icon="chevron-right" class="text-muted align-top" data-acorn-size="17"></i>
                                                    </div>
                                                </div>
                                                <div class="col lh-1-25">
                                                    <a href="#" class="alternate-link align-top">Gingerbread biscuit bear claw marzipan tiramisu topping</a>
                                                </div>
                                            </div>
                                            <div class="row g-0 mb-2">
                                                <div class="col-auto">
                                                    <div class="sw-3 me-1">
                                                        <i data-acorn-icon="chevron-right" class="text-muted align-top" data-acorn-size="17"></i>
                                                    </div>
                                                </div>
                                                <div class="col lh-1-25">
                                                    <a href="#" class="alternate-link align-top">Sweet roll apple pie tiramisu bonbon sugar plum muffin sesame snaps chocolate</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Categories End -->
        </div>
    </div>
@endsection
