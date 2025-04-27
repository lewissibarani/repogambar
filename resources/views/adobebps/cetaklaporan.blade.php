@php
    $html_tag_data  = ["override"=>'{"attributes" : { "layout": "boxed" }}'];
    $title          = 'Satker anda tidak mendapat lisensi adobe';
    $description    = "";
@endphp

@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/baguetteBox.min.css"/>
    <link rel="stylesheet" href="/css/vendor/datatables.min.css"/> 
    <link rel="stylesheet" href="/css/vendor/select2.min.css"/>
    <link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css"/>

@endsection

@section('js_vendor')
    <script src="/js/vendor/jquery.validate/jquery.validate.min.js"></script>
    <script src="/js/vendor/jquery.validate/additional-methods.min.js"></script>
    <script src="/js/vendor/baguetteBox.min.js"></script> 
    <script src="/js/cs/scrollspy.js"></script>
    <script src="/js/vendor/datatables.min.js"></script>
    <script src="/js/vendor/select2.full.min.js"></script>

@endsection

@section('js_page') 
    <script src="/js/cs/datatable.extend.js"></script>
    <script src="/js/plugins/datatable.boxedvariations.js"></script> 
    <script src="/js/forms/controls.select2.js"></script> 
    <script src="/js/forms/validation.js"></script>


@endsection

@section('content')

<div id="printpage">  
 <H4><b>Laporan Pemanfaatan Satker</b></H4>
 <h1 class=""><b>Badan Pusat Statistik Provinsi Aceh</b></h1>
 <br>
 <h4 class=""><b>Pemanfaatan per Bulan</b></h4>
<hr/>
</div>  

<a href="#" onclick="printdiv()">Print</a>
@endsection('content')

<script>
function printdiv()
{
    //your print div data
    //alert(document.getElementById("printpage").innerHTML);
    var newstr=document.getElementById("printpage").innerHTML;

    var header='<header><div align="center"><h3 style="color:#EB5005"> Your HEader </h3></div><br></header><hr><br>'

    var footer ="Your Footer";

    //You can set height width over here
    var popupWin = window.open('', '_blank', 'width=1100,height=600');
    popupWin.document.open();
    popupWin.document.write('<html> <body onload="window.print()">'+ newstr + '</html>' + footer);
    popupWin.document.close(); 
    return false;
}
</script>