@php
    $html_tag_data = []; 
    $title = 'Upload Karya';
    $description = 'Empty Page';
    $breadcrumbs = ["/"=>"Home", "/Kontributor/UploadKarya"=>"Upload Karya"]
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@livewireStyles
@section('css') 
<link rel="stylesheet" href="/css/main.css"/> 
<link rel="stylesheet" href="/css/tag.css"/>
<link rel="stylesheet" href="/css/wizard.css"/>
<link rel="stylesheet" href="/css/vendor/select2.min.css"/>
<link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css"/>
<link rel="stylesheet" href="/css/vendor/tagify.css"/> 
@endsection


@section('js_vendor')
<script src="/js/vendor/bootstrap-submenu.js"></script>
<script src="/js/vendor/mousetrap.min.js"></script>
<script src="/js/vendor/select2.full.min.js"></script>
<script src="/js/vendor/tagify.min.js"></script>   
@endsection

@section('js_page')
<script src="/js/forms/controls.select2.js"></script>
<script src="/js/forms/controls.tag.js"></script>  
@endsection
  


@section('content') 
<div class="container" style="width: 65%;">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <!-- Title Start -->
                <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                    @include('_layout.breadcrumb',['breadcrumbs'=>$breadcrumbs])
                </div>
                <!-- Title End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->  
            <livewire:wizard />   
</div> 
@livewireScripts 

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 

<script type="text/javascript">
      
$(document).ready(function (e) {
 
   
   $('#image_input').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
        $('.container-image-preview').attr("hidden",true);
        $('#preview-image-before-upload').attr('src', e.target.result).removeAttr('hidden'); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
 
</script>
 

@endsection
