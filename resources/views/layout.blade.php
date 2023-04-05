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
    <meta name="description" content="{{$description}}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    {{-- @if ($title!=="Landing Page")  --}}
    @include('_layout.head') 
    {{-- @else 
    @include('_layout.head_lp')
    @endif --}}

</head>

<body>
<div id="root"> 
        <div id="nav" class="nav-container d-flex" @isset($custom_nav_data) @foreach ($custom_nav_data as $key=> $value)
        data-{{$key}}="{{$value}}"
            @endforeach
            @endisset
        >
        @if ($title!=="Landing Page") 
            @include('_layout.nav')
        @else
        @include('_layout.navlp')
        @endif
        </div>  
    <main>
        @yield('content')
    </main>
    @include('_layout.footer')
</div>
@include('_layout.modal_settings')
@include('_layout.modal_search')
@include('_layout.scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function()
        {
            $('img').lazyload();
        });
</script>
</body>

</html>
