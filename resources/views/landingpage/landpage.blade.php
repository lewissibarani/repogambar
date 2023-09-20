@php  

     
    $html_tag_data = ["override"=>'{"attributes" : { "layout": "none" }}'];
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
  main { 
    padding-left: calc(var(--nav-size) + var(--main-spacing-horizontal));
    padding-right: var(--main-spacing-horizontal);
    padding-top: var(--main-spacing-vertical);
    padding-bottom: var(--main-spacing-vertical);
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
  padding-left: var(--main-spacing-horizontal); 
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
    <div class="container">    
      <div class="row d-flex align-items-center">
        <div class="row">
          <div class="col-12 col-lg-6 " style="padding-top: 15%;">
            <h1 class="display-1 mb-3 text-dark">
              <span class="d-block">Banyak Aset</span>
              <span class="d-block">Siap Pakai</span>
            </h1>
              <p class="heading mb-7 pe-lg-6">
              Pikart hadir untuk memudahkan pegawai BPS baru untuk saling berbagi aset media digital. Website ini berfungsi untuk melayani permintaan gambar shutterstock dan freepik bagi pegawai BPS di seluruh Indonesia.
              <br> 
              </p> 
              <!-- Search Input Start -->    
              <form id="" action="{{route('dashboard.halamandepan')}}" method="POST">
                <div class="card w-75 mb-7">
                  <div class="card-body p-0 d-flex flex-row align-items-center px-3 py-3 ">
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
                  <a type="button" href="{{route('kelolagambar.index')}}" class="btn-xl btn-primary  rounded-xl mt-1"> 
                    <span class="label">Buat Permintaan</span>
                  </a>   
                  <a type="button" href="/Dashboard"  class="btn-xl btn-outline-primary rounded-xl mt-1">
                    <span class="label">Docs</span>
                  </a>  
              <!-- Search Input End --> 
          </div>
           <div class="col-12 col-lg-6 align-items-right ">
           
           </div> 
        </div>
      </div>


    </div> 
  </div>
</section><!-- End Hero -->  

  <main id="main">
 

    <!-- ======= CTA Section ======= -->
    <section id="CTA" class="cta scroll-section " style="padding-top: 20px; padding-bottom: 20px; background: #FFDF5A;">
      <div class="container" data-aos="fade-up">

        <h5 class="display-s4 text-center">Punya karya yang bagus ? kamu bisa sumbangkan karya kamu kedalam website Pikart &nbsp &nbsp
          <a type="button" href="{{route('kontributor.uploadkarya')}}" class="btn-xl btn-primary  rounded-xl mt-1"> 
           Upload Karya 
          </a>  
        </h5>
         
          
      </div>  
    </section>

    <!-- ======= Koleksi Section ======= -->
    <section id="koleksi" class="scroll-section about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 class="display-s3 text-center mb-4">Koleksi Pikart</h2>
        </div> 

        <div class="row">
          @foreach($koleksi as $datas) 
          <div class="col"> 
              <div class="sh-35 mb-2">
                  <div class="row g-1 h-100 gallery"> 
                      @if($datas['children']->count()>=1) 
                        @include ('album._thumbnaillandpage', ['childkoleksi' => $datas['children']])
                      @else 
                        @include ('album._thumbnail', ['gambar' => $datas['gambar']])
                      @endif 
                  </div>
              </div>
                <a href="{{route('album.show',['album' => $datas->id])}}">
                <div class=" ">
                  <h5 class="heading mb-0 d-flex"> 
                      <p class="font-weight-bold">{{$datas->judulalbum}}</p>
                  </h5>
                </div> 
                </a>
                <div class="pb-3">  
                    @if($datas['gambar']->count()>=100) 
                        <span class="text-muted"> 100+ Aset </span> 
                    @else
                      <span class="text-muted">  {{$datas['gambar']->count()}} Aset </span>
                    @endif
                </div>
          </div>
            
          @endforeach
        </div>     
    </section>

    <!-- ======= About Us Section ======= -->
    <section id="tentangaplikasi" class="scroll-section about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 class="display-s3 text-center mb-4">Tentang Pikart</h2>
        </div>
        

        <!-- Daftar Layanan End --> 

        <div class="row content">
          <div class="col-lg-6" >
            <p>
              Pikart adalah aplikasi yang dibuat untuk melayani permintaan gambar dan media penyimpanan gambar Badan Pusat Statitsik
            </p> 
 
            <div class="row g-0 sh-10">
                    <div class="col-auto">
                        <div class="sw-9 sh-10 d-inline-block d-flex justify-content-center align-items-center">
                          <i data-acorn-icon="check-circle"></i>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-body d-flex flex-column ps-0 pt-0 pb-0 h-100 justify-content-center">
                            <div class="d-flex flex-column">
                                <div class="text-alternate">Konten stok berkualitas tinggi</div>
                                <div class="text-muted">Pilihan gambar tanpa batas dengan kualitas terbaik untuk membuat proyek Anda terlihat profesional</div>
                            </div>
                        </div>
                    </div> 
            </div> 

            <div class="row g-0 sh-10">
                    <div class="col-auto">
                        <div class="sw-9 sh-10 d-inline-block d-flex justify-content-center align-items-center">
                          <i data-acorn-icon="check-circle"></i>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-body d-flex flex-column ps-0 pt-0 pb-0 h-100 justify-content-center">
                            <div class="d-flex flex-column">
                                <div class="text-alternate">Aset Siap Pakai</div>
                                <div class="text-muted">Akses ribuan gambar dan desain yang siap dipublikasikan dan siapkan proyek Anda dengan cepat</div>
                            </div>
                        </div>
                    </div> 
            </div>  

            <div class="row g-0 sh-10">
                    <div class="col-auto">
                        <div class="sw-9 sh-10 d-inline-block d-flex justify-content-center align-items-center">
                          <i data-acorn-icon="check-circle"></i>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-body d-flex flex-column ps-0 pt-0 pb-0 h-100 justify-content-center">
                            <div class="d-flex flex-column">
                                <div class="text-alternate">Hasil Pencarian Terjamin</div>
                                <div class="text-muted">Ada gambar dengan gaya untuk setiap proyek, apa pun kebutuhan Anda</div>
                            </div>
                        </div>
                    </div> 
            </div>   

            <div class="row g-0 sh-10">
                    <div class="col-auto">
                        <div class="sw-9 sh-10 d-inline-block d-flex justify-content-center align-items-center">
                          <i data-acorn-icon="check-circle"></i>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-body d-flex flex-column ps-0 pt-0 pb-0 h-100 justify-content-center">
                            <div class="d-flex flex-column">
                                <div class="text-alternate">Konten Segar Setiap Hari</div>
                                <div class="text-muted">Konten kami diperbarui setiap hari sehingga Anda dapat menemukan foto dan desain terbaru dan paling trending</div>
                            </div>
                        </div>
                    </div> 
            </div> 

          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <img src="{{url('/landpage_asset/img/about-us.png')}}" class="feature-image" alt="feature image" style="max-width: 200%;">
            {{-- <a href="#" class="btn-learn-more">Learn More</a> --}}
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->
 
    <!-- ======= Services Section ======= -->
    <!-- <section id="jenislayanan" class="scroll-section services ">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Layanan</h2>
          <p>Cari apa di Pikart ?</p>
        </div>

        <div class="row g-2 mb-5">
          <div class="col-12 col-sm-6 col-xl-3">
              <div class="card w-100 sh-23 hover-img-scale-up">
                  <img src="/img/banner/cta-vertical-1.webp" class="card-img h-100 scale" alt="card image">
                  <div class="card-img-overlay d-flex flex-column justify-content-between bg-transparent">
                      <div class="d-flex flex-column h-100 justify-content-between align-items-start">
                          <div class="cta-2 text-black w-75">Permintaan Download Gambar</div>
                          <a href="/Pages/Blog/List" class="btn btn-icon btn-icon-start btn-primary mt-3 stretched-link">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-chevron-right text-white"><path d="M7 4L12.6464 9.64645C12.8417 9.84171 12.8417 10.1583 12.6464 10.3536L7 16"></path></svg>
                              <span>View</span>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-12 col-sm-6 col-xl-3">
              <div class="card w-100 sh-23 hover-img-scale-up">
                  <img src="/img/banner/cta-vertical-2.webp" class="card-img h-100 scale" alt="card image">
                  <div class="card-img-overlay d-flex flex-column justify-content-between bg-transparent">
                      <div class="d-flex flex-column h-100 justify-content-between align-items-start">
                          <div class="cta-2 text-black w-75">Unggah Karya Pribadi</div>
                          <a href="/Pages/Blog/List" class="btn btn-icon btn-icon-start btn-primary mt-3 stretched-link">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-chevron-right text-white"><path d="M7 4L12.6464 9.64645C12.8417 9.84171 12.8417 10.1583 12.6464 10.3536L7 16"></path></svg>
                              <span>View</span>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-12 col-sm-6 col-xl-3">
              <div class="card w-100 sh-23 hover-img-scale-up">
                  <img src="/img/banner/cta-vertical-3.webp" class="card-img h-100 scale" alt="card image">
                  <div class="card-img-overlay d-flex flex-column justify-content-between bg-transparent">
                      <div class="d-flex flex-column h-100 justify-content-between align-items-start">
                          <div class="cta-2 text-black w-75">Browsing Gambar</div>
                          <a href="/Pages/Blog/List" class="btn btn-icon btn-icon-start btn-primary mt-3 stretched-link">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-chevron-right text-white"><path d="M7 4L12.6464 9.64645C12.8417 9.84171 12.8417 10.1583 12.6464 10.3536L7 16"></path></svg>
                              <span>View</span>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-12 col-sm-6 col-xl-3">
              <div class="card w-100 sh-23 hover-img-scale-up">
                  <img src="/img/banner/cta-vertical-4.webp" class="card-img h-100 scale" alt="card image">
                  <div class="card-img-overlay d-flex flex-column justify-content-between bg-transparent">
                      <div class="d-flex flex-column h-100 justify-content-between align-items-start">
                          <div class="cta-2 text-black w-75">Browsing Koleksi</div>
                          <a href="/Pages/Blog/List" class="btn btn-icon btn-icon-start btn-primary mt-3 stretched-link">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-chevron-right text-white"><path d="M7 4L12.6464 9.64645C12.8417 9.84171 12.8417 10.1583 12.6464 10.3536L7 16"></path></svg>
                              <span>View</span>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
        </div>
 

      </div>
    </section>End Services Section -->
 
 

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Jl. Dr. Sutomo 6-8 Jakarta 10710 Indonesia</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>bpshq@bps.go.id</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>(62-21) 3841195</p>
              </div>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15866.945462826323!2d106.82963754831422!3d-6.166048807145971!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5043d80af5b%3A0x606cc4c31fe3db80!2sBadan%20Pusat%20Statistik!5e0!3m2!1sen!2sid!4v1676019266417!5m2!1sen!2sid" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe> 
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  {{-- <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p></p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Contact Person</h3>
            <p>
              Jl. Dr. Sutomo 6-8  <br>
              Jakarta, 10710 <br>
              Indonesia <br><br>
              <strong>Phone:</strong> 082191492198<br>
              <strong>Email:</strong> lewis.anggi@bps.go.id<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Arsha</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer --> --}}
 
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i data-acorn-icon="arrow-double-top"></i> 

  @section('js_vendor')  
  <script src="/landpage_asset/vendor/aos/aos.js"></script>
  <script src="/landpage_asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/landpage_asset/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/landpage_asset/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/landpage_asset/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/landpage_asset/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="/landpage_asset/vendor/php-email-form/validate.js"></script> 
  <script src="/landpage_asset/js/main.js"></script> 
  @endsection 
 
 @endsection