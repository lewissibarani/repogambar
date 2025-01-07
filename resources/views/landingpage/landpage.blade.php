@php   
    $html_tag_data = [];
    $title = 'Landing Page'; 
    $breadcrumbs = ["/"=>"Home","/Dashboard"=>"Beranda"];
    $file = "";
    $jumlahresourcekoleksichild=null;
    $jumlahresourcekoleksi=null;  
@endphp  
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>""]) 

@section('css')
    <link rel="stylesheet" href="/css/landpagecss.css"/>
@endsection

@push('pushcss')
  <style>
  :root { 
    --main-spacing-horizontal: 0rem; 
    --main-spacing-vertical:0rem;
  }  

  html[data-placement=horizontal] .nav-container .nav-shadow,
  html[data-placement=vertical] .nav-container .nav-shadow {
    width: 0%;
    height: 0%;
    position: absolute;
    box-shadow: var(--menu-shadow);
    pointer-events: none;
    z-index: 1001;
  }

  html[data-placement=horizontal] main { 
  padding-top: 0px; 
  /* margin-top: calc(var(--nav-size-slim) + calc(var(--main-spacing-horizontal) / 2)); */
  }

  html[data-placement=horizontal] .nav-container {
  height: var(--nav-size-slim);
  right: 0;
  left: 0;
  width: 100%;
  justify-content: center;
  flex-direction: row;
  padding-left: calc(var(--main-spacing-horizontal) + 200px);
  padding-right: calc(var(--main-spacing-horizontal) + 200px);
  border-top-right-radius: 0;
  border-top-left-radius: 0;
  border-bottom-right-radius: var(--border-radius-lg);
  border-bottom-left-radius: var(--border-radius-lg);
}

</style>  

@endpush

@section('js_vendor')
    <script src="/js/cs/scrollspy.js"></script>  
@endsection
    
@section('content')   
<section id="hero" class="scroll-section hero" style="margin-bottom: 0px">
  <div id="hero">    
    <div class="row d-flex align-items-center">
      <div class="row">
        <div class="col-12 col-lg-12 " style="padding-top: 10%; padding-left: 5%;padding-right: 5%;">
          <h1 class="d-flex justify-content-center text-light">
            <span class="d-block">Gudang aset digital, siap pakai</span> 
          </h1>
            <p class="d-flex justify-content-center mb-3 pe-lg-6 text-light">
            Pikart berfungsi untuk melayani permintaan download freepik bagi pegawai Badan Pusat Statistik di seluruh Indonesia.
            <br> 
            </p> 
            <!-- Search Input Start -->    
            <form class= "d-flex justify-content-center"  action="{{route('dashboard.halamandepan')}}" method="POST">
              <div class="card w-50 ">
                <div class="card-body d-flex flex-row align-items-center px-3 py-3 ">
                    @csrf
                    <input class="form-control border-0 shadow-none " placeholder="Cari Aset..."  />
                    <input type="hidden" value="null" id="tipeasetFilter" name="tipeasetFilter"/> 
                    <input type="hidden" value="Gambar" id="tipepencarianFilter" name="tipepencarianFilter"/>  
                    <div class="d-flex flex-row">  
                        <button class="sumbit" id="chatSendButton" type="button" style="border: none;background: none">
                            <i data-acorn-icon="search"></i>
                        </button>
                    </div>
                </div>  
              <!-- Search Input End -->
              </div>  
            </form> 
                
              <!-- ======= Koleksi Section ======= -->
              <section id="koleksi" class="scroll-section about">
                <div class="container mt-7" data-aos="fade-up">  
                  <div class="row"> 
                    <div class="col"> 
                      <div class="card hover-img-scale-up "> 
                        <img class="card-img sh-25 scale"  
                        src="{{url('/landpage_asset/img/thumbnaillp_fotopimpinan.jpeg')}}" 
                        alt="card image" />
                        <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                            <div class="row g-0">
                            </div>
                            <div class="row g-0">
                                <div class="col pe-2">
                                    <a href="{{route('album.show',['album' => 1])}}" class="stretched-link">
                                        <h5 class="heading text-white mb-1 fw-bold">Foto Pimpinan</h5>
                                    </a>
                                    <div class="d-inline-block">
                                        <div class="text-light"> Koleksi foto pimpinan BPS</div>
                                    </div>  
                                </div>
                            </div>
                        </div> 
                      </div>  
                    </div>  
                    
                    <div class="col"> 
                      <div class="card hover-img-scale-up "> 
                        <img class="card-img sh-25 scale"  
                        src="{{url('/landpage_asset/img/thumbnaillp_templat.jpeg')}}" 
                        alt="card image" />
                        <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                            <div class="row g-0">
                            </div>
                            <div class="row g-0">
                                <div class="col pe-2">
                                    <a href="{{route('album.show',['album' => 3])}}" class="stretched-link">
                                        <h5 class="heading text-white mb-1 fw-bold">Templat Publikasi</h5>
                                    </a>
                                    <div class="d-inline-block">
                                        <div class="text-light"> Koleksi templat publikasi</div>
                                    </div>  
                                    
                                </div>
                            </div>
                        </div> 
                      </div>  
                    </div> 

                      <div class="col"> 
                      <div class="card hover-img-scale-up "> 
                        <img class="card-img sh-25 scale"  
                        src="{{url('/landpage_asset/img/thumbnaillp_ilustrasi.jpeg')}}" 
                        alt="card image" />
                        <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                            <div class="row g-0">
                            </div>
                            <div class="row g-0">
                                <div class="col pe-2">
                                    <a href="{{route('album.show',['album' => 2])}}" class="stretched-link">
                                        <h5 class="heading text-white mb-1 fw-bold">Ilustrasi</h5>
                                    </a>
                                    <div class="d-inline-block">
                                        <div class="text-light"> Koleksi ilustrasi untuk kebutuhan publikasi</div>
                                    </div>  
                                    
                                </div>
                            </div>
                        </div> 
                      </div>  
                    </div> 

                    <div class="col"> 
                      <div class="card hover-img-scale-up "> 
                        <img class="card-img sh-25 scale"  
                        src="{{url('/landpage_asset/img/thumbnaillp_video.jpeg')}}" 
                        alt="card image" />
                        <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                            <div class="row g-0">
                            </div>
                            <div class="row g-0">
                                <div class="col pe-2">
                                    <a href="{{route('album.show',['album' => 5])}}" class="stretched-link">
                                        <h5 class="heading text-white mb-1 fw-bold">Video</h5>
                                    </a>
                                    <div class="d-inline-block">
                                        <div class="text-light"> Koleksi aset video publisitas BPS</div>
                                    </div>  
                                    
                                </div>
                            </div>
                        </div> 
                      </div>  
                    </div>

                    <div class="col"> 
                      <div class="card hover-img-scale-up "> 
                        <img class="card-img sh-25 scale"  
                        src="{{url('/landpage_asset/img/thumbnaillp_pemafaatandesign.jpeg')}}" 
                        alt="card image" />
                        <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                            <div class="row g-0">
                            </div>
                            <div class="row g-0">
                                <div class="col pe-2">
                                    <a href="{{route('adobebps.index')}}" class="stretched-link">
                                        <h5 class="heading text-white mb-1 fw-bold">Pemanfaatan Software Design</h5>
                                    </a>
                                    <div class="d-inline-block">
                                        <div class="text-light"> Disni kamu bisa melaporkan pemanfaatan software design</div>
                                    </div>  
                                    
                                </div>
                            </div>
                        </div> 
                      </div>  
                    </div>
                  </div>     
              </section>

                <!-- <a type="button" href="{{route('kelolagambar.index')}}" class="btn-xl btn-primary  rounded-xl mt-1"> 
                  <span class="label">Buat Permintaan</span>
                </a>   
                <a type="button" href="/Dashboard"  class="btn-xl btn-outline-primary rounded-xl mt-1">
                  <span class="label">Docs</span>
                </a>   --> 
            <!-- Search Input End --> 
        </div> 
      </div>
    </div>  
  </div>
</section><!-- End Hero -->   

    <!-- ======= CTA Section ======= -->
    <section  id ="tentangaplikasi" style="padding-top: 20px; padding-bottom: 20px; background: #FFDF5A;">
      <div class="container" data-aos="fade-up">

        <h5 class="display-s4 text-center">Punya karya yang bagus ? kamu bisa sumbangkan karya kamu kedalam website Pikart &nbsp &nbsp
          <a type="button" href="{{route('kontributor.uploadkarya')}}" class="btn-xl btn-primary  rounded-xl mt-1"> 
           Upload Karya 
          </a>  
        </h5> 
      </div>  
    </section>  
 <!-- ======= Footer ======= -->   
 <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i data-acorn-icon="arrow-double-top"></i>  -->
   
 @endsection