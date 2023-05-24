@php
    $html_tag_data = ["override"=>'{"attributes" : { "layout": "boxed" }}'];
    $title = 'Hasil Pencarian';
    $description = 'Knowledge Base Page';
    $breadcrumbs = ["/"=>"Home", "/Pages"=>"Pages", "/Pages/Miscellaneous"=>"Miscellaneous"]
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
<script src="/js/vendor/jquery.validate/jquery.validate.min.js"></script>
<script src="/js/vendor/jquery.validate/additional-methods.min.js"></script>
@endsection

@section('js_page')
<script src="/js/pages/auth.search_.js"></script>
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
                                <div class="cta-3 text-black mb-3">Ketik kata kuncinya di bawah ini!</div>
                                <form id="searchGambarForm_" action="{{route('dashboard.hasilpencarian_')}}" method="POST">                                
                                    <div class="row g-2 justify-content-center">
                                        <div class="col-12 col-sm-6">
                                            <div class="d-flex flex-column justify-content-start">
                                            @csrf
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                                    <div class="text-muted mb-3 mb-sm-0">
                                                        <input type="text" class="form-control" value="{{$Katakunci}}" placeholder="kata kunci pencarian..." name="katakunci_" />
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-12 col-sm-auto">
                                                    <button type="submit" class="btn btn-icon btn-icon-start btn-primary" >
                                                        <i data-acorn-icon="search"></i>
                                                        <span>Cari Gambar</span>
                                                    </button> 
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Top Search End -->

            <!-- Categories Start -->
            <div class="col-12 col-xl-12 col-xxl-12 mb-5">
                <h3 class="small-title">Hasil Pencarian untuk "{{$Katakunci}}" | <span class=""><i data-acorn-icon="image"></i> </span> ({{$Data->count()}}) </h3>
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-5 gallery g-2 mb-5">
                    @foreach ($Data as $datas)
                        <div class="col">
                            <div class="card hover-img-scale-up hover-reveal">
                                    <img class="card-img sh-50 scale" 
                                    src="{{$datas->thumbnail_path}}"
                                    alt="card image" />
                                    <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="/Dashboard/DetailGambar/{{$datas->id}}" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">{{$datas->judul}}</h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-uppercase"><span class='badge rounded-pill bg-light'>{{$datas->tipe_gambar}}</span></div>
                                                </div>
                                                @php
                                                if($datas->file_id!==null)
                                                    {
                                                    @endphp
                                                    <div class="d-inline-block">
                                                        <div class="text-uppercase"><span class='badge rounded-pill bg-light'>ZIP</span></div>
                                                    </div>
                                                    @php
                                                        $file = "zip";
                                                    }
                                                @endphp
                                                <div class="d-inline-block">
                                                    <div class="text-uppercase"><span class='badge rounded-pill bg-light'>{{$datas->source->sumber_gambar}}</span></div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <!-- src="{{$datas->thumbnail_path}}"  -->
                    @endforeach
                </div>
            </div>
            <!-- Categories End -->
        </div>
    </div>
@endsection
