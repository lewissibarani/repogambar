@php
    $title = 'Login Page';
    $description = 'Login Page'
@endphp
@extends('layout_full',['title'=>$title, 'description'=>$description])
@section('css')
@endsection

@section('js_vendor')
    <script src="/js/vendor/jquery.validate/jquery.validate.min.js"></script>
    <script src="/js/vendor/jquery.validate/additional-methods.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/pages/auth.login.js"></script>
@endsection

@section('content_left')
    <div class="min-h-100 d-flex align-items-center">
        <div class="w-100 w-lg-75 w-xxl-50">
            <div>
                <div class="mb-5">
                    <h1 class="display-3 text-white">SIMRAD</h1>
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
            <div class="mb-5">
                <h2 class="cta-1 mb-0 text-primary">Selamat Datang,</h2>
                <!-- <h2 class="cta-1 text-primary">let's get started!</h2> -->
            </div>
            <div class="mb-5">
                <p class="h6">Silahkan login terlebih dahulu</p>
                <p class="h6">
                    Jika belum memiliki akun, silahkan
                    <a href="{{route('register')}}">daftar</a>
                    .
                </p>
            </div>
            <div>
                <form id="loginForm" class="tooltip-end-bottom" action="login" method="POST" novalidate>
                    @csrf
                    @error('email')
                    <div class="mb-3 text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="email"></i>
                        <input class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" />
                    </div>
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="lock-off"></i>
                        <input class="form-control pe-7" name="password" type="password" placeholder="Password" />
                        <a class="text-small position-absolute t-3 e-3" href="/Pages/Authentication/ForgotPassword">Forgot?</a>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
