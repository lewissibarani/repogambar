@php
    $title = 'Daftar Akun';
    $description = 'Daftar Akun'
@endphp
@extends('layout_full',['title'=>$title, 'description'=>$description])
@section('css')
@endsection

@section('js_vendor')
    <script src="/js/vendor/jquery.validate/jquery.validate.min.js"></script>
    <script src="/js/vendor/jquery.validate/additional-methods.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/pages/auth.register.js"></script>
@endsection

@section('content_left')
    <div class="min-h-100 d-flex align-items-center">
        <div class="w-100 w-lg-75 w-xxl-50">
            <div>
                <div class="mb-5">
                    <h1 class="display-3 text-white">Gudang Gambar</h1>
                    <h1 class="display-3 text-white">Badan Pusat Statistik</h1>
                </div>
                <p class="h6 text-white lh-1-5 mb-5">
                    Website portal penyedia aset digital visual Shutterstock dan Freepik untuk seluruh pegawai Badan Pusat Statistik
                </p>
                <!-- <div class="mb-5">
                    <a class="btn btn-lg btn-outline-white" href="/">Learn More</a>
                </div> -->
            </div>
        </div>
    </div>
@endsection

@section('content_right')
    <div class="sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
        <div class="sw-lg-50 px-5">
            <div class="sh-11">
                <a href="/">
                    <div class="logo-default"></div>
                </a>
            </div>
            <!-- <div class="mb-5">
                <h2 class="cta-1 mb-0 text-primary">Selamat Datang,</h2> 
            </div> -->
            <div class="mb-5">
                <!-- <p class="h6">Silahkan gunakan formulir dibawah untuk daftar.</p> -->
                <p class="h6">
                    Jika sudah punya akun, silahkan
                    <a href="login">login</a>
                    .
                </p>
            </div>
            <div>
                <form id="registerForm" class="tooltip-end-bottom" action="register" method="POST" novalidate>
                    @csrf
                    @error('email')
                    <div class="mb-3 text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="user"></i>
                        <input class="form-control" placeholder="Nama User" name="name" />
                    </div>
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="email"></i>
                        <input class="form-control" placeholder="Email" name="email" />
                    </div>
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="lock-off"></i>
                        <input class="form-control" name="password" type="password" placeholder="Password" />
                    </div>
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="phone"></i>
                        <input class="form-control" placeholder="No Handphone" name="nohp" />
                    </div>
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="building-small"></i>
                        <input class="form-control" placeholder="Kode Satuan Kerja" name="kodesatker" />
                    </div>
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="building-large"></i>
                        <input class="form-control" placeholder="Satuan Kerja" name="satker" />
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary">Signup</button>
                </form>
            </div>
        </div>
    </div>
@endsection
