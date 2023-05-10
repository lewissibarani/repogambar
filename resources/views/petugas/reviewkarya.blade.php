@php
    $html_tag_data = ["override"=>'{"attributes" : { "layout": "boxed" }}',"scrollspy"=>"true"];
    $title = 'Details';
    $description = 'Detail content that made out of images, text, carousel and so on. They might be combined with other blocks to create pages for different layouts.';
    $breadcrumbs = ["/"=>"Home","/Blocks"=>"Blocks"]
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/glide.core.min.css"/>
    <link rel="stylesheet" href="/css/vendor/baguetteBox.min.css"/>
    <link rel="stylesheet" href="/css/vendor/plyr.css"/>
    <link rel="stylesheet" href="/css/vendor/select2.min.css"/>
    <link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css"/>
@endsection

@section('js_vendor')
    <script src="/js/cs/scrollspy.js"></script>
    <script src="/js/vendor/baguetteBox.min.js"></script>
    <script src="/js/vendor/glide.min.js"></script>
    <script src="/js/vendor/jquery.barrating.min.js"></script>
    <script src="/js/vendor/plyr.min.js"></script>
    <script src="/js/vendor/select2.full.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/cs/glide.custom.js"></script>
    <script src="/js/pages/blocks.details.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">  

                <!-- Content Start -->
                <div>
                    <div class="card mb-5">
                        <div class="card-body">
                            <p class="mb-0">{{ $description }}</p>
                        </div>
                    </div>       

                    <!-- Product Start -->
                    <section class="scroll-section" id="product"> 
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-xl-6">
                                        <a href="/{{$Data->gambar->path}}">
                                            <img
                                                    alt="detail"
                                                    src="/{{$Data->gambar->path}}"
                                                    class="responsive border-0 rounded-md img-fluid"
                                            />
                                        </a> 
                                    </div>

                                    <div class="col-12 col-xl-6"> 

                                        <table class="table table-borderless">
                                            <thead>
                                              <tr> 
                                                <th scope="col"><h2 class="font-weight-bold">Judul</h2></th>
                                                <th scope="col"><h2>{{$Data->gambar->judul}}</h2></th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr> 
                                                <td class="font-weight-bold">Karya</td>
                                                <td>{{$Data->gambar->user->name}}</td>
                                              </tr> 
                                              <tr> 
                                                <td class="font-weight-bold">Satker</td>
                                                <td>{{$Data->gambar->user->satker}}</td>
                                              </tr> 
                                              <tr> 
                                                <td class="font-weight-bold">Tanggal Upload</td>
                                                <td>{{$Data->updated_at}}</td>
                                              </tr> 
                                              <tr> 
                                                <td class="font-weight-bold">Jenis Karya</td>
                                                <td>
                                                    @if($Data->gambar->fileid===null)
                                                    Fotografi 
                                                    @elseif($Data->gambar->file->kategori_file===1) 
                                                        Indesign
                                                    @elseif($Data->gambar->file->kategori_file===2) 
                                                        Illustrator
                                                    @elseif($Data->gambar->file->kategori_file===3) 
                                                        Photoshop
                                                    @elseif($Data->gambar->file->kategori_file===4) 
                                                    Font
                                                    @else
                                                    Tidak Diketahui
                                                    @endif  
                                                </td>
                                              </tr> 
                                              <tr> 
                                                <td class="font-weight-bold">File</td>
                                                <td> @if($Data->gambar->fileid===null)
                                                    <i>Tidak ada file terlampir</i>
                                                    @else

                                                    @endif
                                                </td>
                                              </tr>
                                              <tr> 
                                                <td class="font-weight-bold">Tags</td>
                                                <td> @foreach($Data->gambar->tags as $tag)
                                                    <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1" href="/hasilpencarian/katakunci/{{$tag->name}}">
                                                        <span>{{ $tag->name }}({{ $tag->count }})</span>
                                                    </a>
                                                    @endforeach</td>
                                              </tr> 
                                            </tbody>
                                          </table>
                                          
    
                                        <div>
                                            <a href="{{route('review.publish', $Data->id)}}" class="btn btn-icon btn-icon-start btn-primary mb-1" type="button"> 
                                                <span>Publikasikan</span>
                                            </a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Product End -->
                </div>
                <!-- Content End -->
            </div> 
        </div>
    </div>
@endsection
