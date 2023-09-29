@php
    $title = 'Pengumuman';
    $description = ''
@endphp
@extends('layout_full',['title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
    <script src="/js/vendor/countdown.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/pages/misc.comingsoon.js"></script>
@endsection

@section('content_left')
@endsection

@section('content_right')
    <div class="sw-lg-80 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
        <div class="sw-lg-60 px-5">
            <div class="sh-10">
                <h1 class="display-1">P I K <strong class="">A R T</strong></h1>
            </div>
            <div class="mb-3">
                <h2 class="cta-1 mb-0">pindah ke <strong class=""> <a href="https://pikart.web.bps.go.id"> pikart.web.bps.go.id</a></strong></h2>
            </div>
            <!-- <div class="mb-5 sh-9">
                <div id="timer"></div>
            </div> -->
            <hr/>
            <div class="mb-3">
                <p class="h6 lh-1-5">
                   Di alamat ini kamu masih bisa:
                </p>
            </div> 

            <div class="mb-n2">
                <div class="row g-0 mb-2">
                    <div class="col-auto">
                        <div class="sw-3 me-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-chevron-right text-muted align-top"><path d="M7 4L12.6464 9.64645C12.8417 9.84171 12.8417 10.1583 12.6464 10.3536L7 16"></path></svg>
                        </div>
                    </div>
                    <div class="col lh-1-25">
                        <p class="alternate-link align-top text-dark">Download gambar yang sudah pernah diminta pada halaman <a href="{{route('kelolagambar.index')}}" class="text-primary">permintaan gambar</a>.</p>
                    </div>
                </div>
                <div class="row g-0 mb-2">
                    <div class="col-auto">
                        <div class="sw-3 me-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-chevron-right text-muted align-top"><path d="M7 4L12.6464 9.64645C12.8417 9.84171 12.8417 10.1583 12.6464 10.3536L7 16"></path></svg>
                        </div>
                    </div>
                    <div class="col lh-1-25">
                        <p class="alternate-link align-top text-dark">Browsing gambar dari di halaman <a href="{{route('dashboard.halamandepan')}}" class="text-primary"> beranda. </a></p>
                    </div>
                </div>
            </div>
<hr/>
            <div class="mb-3">
                <p class="h6 lh-1-5 text-danger">
                   Yang tidak bisa lagi dilakukan pada alamat ini:
                </p>
            </div> 

            <div class="mb-n2">
                <div class="row g-0 mb-2">
                    <div class="col-auto">
                        <div class="sw-3 me-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-chevron-right text-muted align-top"><path d="M7 4L12.6464 9.64645C12.8417 9.84171 12.8417 10.1583 12.6464 10.3536L7 16"></path></svg>
                        </div>
                    </div>
                    <div class="col lh-1-25">
                        <p class="alternate-link align-top text-dark">Melakukan permintaan download gambar.</p>
                    </div>
                </div>                
                <div class="row g-0 mb-2">
                    <div class="col-auto">
                        <div class="sw-3 me-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-chevron-right text-muted align-top"><path d="M7 4L12.6464 9.64645C12.8417 9.84171 12.8417 10.1583 12.6464 10.3536L7 16"></path></svg>
                        </div>
                    </div>
                    <div class="col lh-1-25">
                    <p class="alternate-link align-top text-dark">Upload karya pribadi.</p>
                    </div>
                </div>
            </div>


            {{-- <div>
                <form>
                    <div class="mb-3 filled">
                        <i data-acorn-icon="email"></i>
                        <input class="form-control" id="password" type="password" placeholder="Email" />
                    </div>
                    <a href="/" class="btn btn-icon btn-icon-end btn-primary">
                        <span>Submit</span>
                        <i data-acorn-icon="chevron-right"></i>
                    </a>
                </form>
            </div> --}}
        </div>
    </div>
@endsection
