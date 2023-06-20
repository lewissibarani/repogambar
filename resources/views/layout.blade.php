<!DOCTYPE html>
<html lang="en" data-url-prefix="/" data-footer="true"
@isset($html_tag_data)
    @foreach ($html_tag_data as $key=> $value)
    data-{{$key}}='{{$value}}'
    @endforeach
@endisset
>

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title> PIKART | {{$title}}</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="description" content="{{$description}}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">   
    @include('_layout.head')  
    @stack('landpage')  
    @stack('show.album') 
</head>

<body>
<div id="root"> 
        @if ($title=="Landing Page") 
            <div id="nav" style="background:transparent;" class="nav-container d-flex" @isset($custom_nav_data) @foreach ($custom_nav_data as $key=> $value)
            data-{{$key}}="{{$value}}"
                @endforeach
                @endisset
            >   
                @include('_layout.navlp')
                
            </div>  
        @else 
            <div id="nav" class="nav-container d-flex" @isset($custom_nav_data) @foreach ($custom_nav_data as $key=> $value)
                data-{{$key}}="{{$value}}"
                    @endforeach
                    @endisset
                >  
                        @include('_layout.nav') 
                    
            </div>   
        @endif
    <main>
        @yield('content')
    </main>
    @if ($title!=="Beranda")  
    @include('_layout.footer')
    @endif
</div>
@stack('scripts')
@include('_layout.modal_settings')
@include('_layout.modal_search')
@include('_layout.scripts')  
<script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.js"></script> 
 
</body>

</html>
