@php
    $html_tag_data = ["override"=>'{"attributes" : { "layout": "boxed" }}',"scrollspy"=>"true"];
    $title = 'Details';
    $description = 'Halaman review digunkaan petugas untuk menentukan apakah karya yang diajukan layak tayang atau tidak';
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
                                        <a href="{{$Data->transaksi->gambar->path}}">
                                            <img
                                                    alt="detail"
                                                    src="{{$Data->transaksi->gambar->path}}"
                                                    class="responsive border-0 rounded-md img-fluid"
                                            />
                                        </a> 
                                    </div>

                                    <div class="col-12 col-xl-6"> 

                                        <table class="table table-borderless">
                                            <thead>
                                              <tr> 
                                                <th scope="col"><h2 class="font-weight-bold">Judul</h2></th>
                                                <th scope="col"><h2>{{$Data->transaksi->gambar->judul}}</h2></th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr> 
                                                <td class="font-weight-bold">Karya</td>
                                                <td>{{$Data->transaksi->gambar->user->name}}</td>
                                              </tr> 
                                              <tr> 
                                                <td class="font-weight-bold">Satker</td>
                                                <td>{{$Data->transaksi->gambar->user->satker}}</td>
                                              </tr> 
                                              <tr> 
                                                <td class="font-weight-bold">Tanggal Upload</td>
                                                <td>{{$Data->updated_at}}</td>
                                              </tr> 
                                              <tr> 
                                                <td class="font-weight-bold">Jenis Karya</td>
                                                <td>
                                                    {{$Data->transaksi->gambar->kategorifile->nama_kategori}} 
                                                </td>
                                              </tr> 
                                              <tr> 
                                                <td class="font-weight-bold">File Aset</td>
                                                <td> @if($Data->transaksi->gambar->file===null)
                                                    <i>Tidak ada file terlampir</i>
                                                    @else
                                                    <a href="/{{$Data->transaksi->gambar->file->path}}"> File Terlampir </a>
                                                    @endif
                                                </td>
                                              </tr>
                                              <tr> 
                                                <td class="font-weight-bold">Tags</td>
                                                <td> @foreach($Data->transaksi->gambar->tags as $tag)
                                                    <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1 " href="/hasilpencarian/katakunci/{{$tag->name}}">
                                                        <span>{{ $tag->name }}({{ $tag->count }})</span>
                                                    </a>
                                                    @endforeach</td>
                                              </tr> 
                                            </tbody>
                                          </table>
                                          
                                          <div class="footer" style=" ">
                                            <a href="{{route('review.publish', $Data->id)}}" 
                                                style="width: 120px; "
                                                class="btn btn-icon btn-icon-start btn-primary mb-1 btn-block" type="button"> 
                                                <span>Publikasikan</span>
                                            </a>  
                                            <button type="button" 
                                                    style="width: 120px;"
                                                    class="btn btn-outline-danger mb-1 btn-block" data-bs-toggle="modal" data-bs-target="#verticallyCenteredScrollable">
                                                     
                                                    Tolak 
                                            </button>
                                        </div> 

                                        <!-- Add Edit Modal Start -->
                                        <div  class="modal fade"
                                        id="verticallyCenteredScrollable"
                                        tabindex="-1"
                                        role="dialog"
                                        aria-labelledby="verticallyCenteredScrollableLabel"
                                        aria-hidden="true">

                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font-weight-bold" id="modalTitle">Berikan alasan penolakan:</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="createGambarForm" action="{{route('review.unpublish', $Data->id)}}" method="POST" novalidate>
                                                        @csrf
                                                        <div class="form-group"> 
                                                            <input type="hidden" name="tugasreviewid" value="{{$Data->id}}">
                                                            <textarea type="text" rows="5" name="komentar" 
                                                            placeholder="Tuliskan alasan penolakan dengan singkat dan jelas.  "
                                                            class="form-control mb-3" ></textarea>
                                                            @error('komentar')
                                                            <div class="mb-3 text-danger">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div> 
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit"  
                                                        style="width: 120px; "
                                                        class="btn btn-icon btn-icon-start btn-primary mb-1 btn-block" type="button"> 
                                                        <span>Submit</span>
                                                    </button> 
                                                </div>  
                                                        </form>
                                                </div>
                                        </div>
                                        <!-- Add Edit Modal End -->

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
