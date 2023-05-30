@php  
    $html_tag_data = ["override"=>'{"attributes" : { "layout": "none" }}'];
    $title = 'Landing Page'; 
    $breadcrumbs = ["/"=>"Home","/Dashboard"=>"Beranda"];
    $file = "";

@endphp
 

@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>""])

@section('css')
    <link rel="stylesheet" href="/css/landpagecss.css"/>
@endsection

@push('landpage')
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
<section id="hero" class="scroll-section hero">
  <div id="hero">  
    <div class="container">    
      <div class="row d-flex align-items-center">
        <div class="row">
          <div class="col-12 col-lg-6 " style="padding-top: 220px;">
            <h1 class="display-1 mb-3 text-dark">
              <span class="d-block">Banyak Aset</span>
              <span class="d-block">Siap Pakai</span>
            </h1>
              <p class="heading mb-7 pe-lg-6">
              Pikart hadir untuk memudahkan pegawai BPS baru untuk saling berbagi aset media digital. Website ini berfungsi untuk melayani permintaan gambar shutterstock dan freepik bagi pegawai BPS di seluruh Indonesia.
              <br> 
              </p> 
              <!-- Search Input Start -->   
              <div class="card w-75 mb-7">
                <div class="card-body p-0 d-flex flex-row align-items-center px-3 py-3 ">
                    <input class="form-control border-0 shadow-none " placeholder="Cari Aset..."  />
                    <div class="d-flex flex-row">  
                        <button class="sumbit" id="chatSendButton" type="button" style="border: none;background: none">
                            <i data-acorn-icon="search"></i>
                        </button>
                    </div> 
                </div>  
              <!-- Search Input End -->
              </div> 
                  <a href="/Dashboard" class="btn-xl btn-primary btn-lg rounded-xl"> 
                    <span class="label">Permintaan Gambar</span>
                  </a>  &nbsp 
                  <a href="/Dashboard"  class="btn-xl btn-primary btn-lg rounded-xl">
                    <span class="label">Upload Karya</span>
                  </a>  &nbsp 
                  <a href="/Dashboard"  class="btn-xl btn-outline-primary btn-lg rounded-xl">
                    <span class="label">Dokumentasi</span>
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
 

    <!-- ======= About Us Section ======= -->
    <section id="tentangaplikasi" class="scroll-section about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 class="display-s3 text-center mb-4">Tentang Pikart</h2>
        </div>
        
              <!-- Daftar Layanan Start --> 
       
              <div class="row justify-content-md-center" style="margin-top: 30px; " >   
                <div class="col-auto mb-5" style="margin-right: 50px; ">
                    <div class="card hover-border-primary sh-20 sw-20">
                        <div class="h-100 d-flex flex-column justify-content-between card-body align-items-center">
                            <div class="bg-gradient-light sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center">
                                <i data-acorn-icon="camera" class="text-white"></i>
                            </div>
                            <div class="heading text-center mb-0 sh-4 d-flex align-items-center lh-1">Foto</div>
                            <div class="text-small text-primary">14 PRODUCTS</div>
                        </div>
                    </div>
                </div>
                <div class="col-auto mb-5" style="margin-right: 60px; ">
                    <div class="card hover-border-primary sh-20 sw-20">
                        <div class="h-100 d-flex flex-column justify-content-between card-body align-items-center">
                            <div class="bg-gradient-light sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center">
                                <i data-acorn-icon="wizard" class="text-white"></i>
                            </div>
                            <div class="heading text-center mb-0 sh-4 d-flex align-items-center lh-1">Ilustrasi</div>
                            <div class="text-small text-primary">14 PRODUCTS</div>
                        </div>
                    </div>
                </div>
                <div class="col-auto mb-5" style="margin-right: 60px; ">
                    <div class="card hover-border-primary sh-20 sw-20">
                        <div class="h-100 d-flex flex-column justify-content-between card-body align-items-center">
                            <div class="bg-gradient-light sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center">
                                <i data-acorn-icon="light-on" class="text-white"></i>
                            </div>
                            <div class="heading text-center mb-0 sh-4 d-flex align-items-center lh-1">PSD</div>
                            <div class="text-small text-primary">14 PRODUCTS</div>
                        </div>
                    </div>
                </div>
                <div class="col-auto mb-5" style="margin-right: 60px; ">
                    <div class="card hover-border-primary sh-20 sw-20">
                        <div class="h-100 d-flex flex-column justify-content-between card-body align-items-center">
                            <div class="bg-gradient-light sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center">
                                <i data-acorn-icon="book" class="text-white"></i>
                            </div>
                            <div class="heading text-center mb-0 sh-4 d-flex align-items-center lh-1">Indesign</div>
                            <div class="text-small text-primary">14 PRODUCTS</div>
                        </div>
                    </div>
                </div>
                <div class="col-auto mb-5" style="margin-right: 60px; ">
                    <div class="card hover-border-primary sh-20 sw-20">
                        <div class="h-100 d-flex flex-column justify-content-between card-body align-items-center">
                            <div class="bg-gradient-light sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center">
                                <i data-acorn-icon="laptop" class="text-white"></i>
                            </div>
                            <div class="heading text-center mb-0 sh-4 d-flex align-items-center lh-1">Mockup</div>
                            <div class="text-small text-primary">14 PRODUCTS</div>
                        </div>
                    </div>
                </div>
                <div class="col-auto mb-5" style="margin-right: 60px; ">
                    <div class="card hover-border-primary sh-20 sw-20">
                        <div class="h-100 d-flex flex-column justify-content-between card-body align-items-center">
                            <div class="bg-gradient-light sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center">
                                <i data-acorn-icon="edit" class="text-white"></i>
                            </div>
                            <div class="heading text-center mb-0 sh-4 d-flex align-items-center lh-1">Font</div>
                            <div class="text-small text-primary">14 PRODUCTS</div>
                        </div>
                    </div>
                </div> 
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
    <section id="jenislayanan" class="scroll-section services ">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Layanan</h2>
          <p>Cari apa di Pikart ?</p>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4><a href="">Permintaan Download Gambar</a></h4>
              <p>Cukup lengkapi form dan masukkan link shutterstock atau freepik yang dibutuhkan. Petugas kami siap untuk downloadkan untuk kamu.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Unggah Karya Pribadi</a></h4>
              <p>Kamu bisa unggah hasil karyamu disini loh.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Aset Media Digital Badan Pusat Statistik</a></h4>
              <p>Template publikasi, foto pimpinan, dan foto gedung Badan Pusat Statisitk ada disini.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-layer"></i></div>
              <h4><a href="">Browsing Gambar</a></h4>
              <p>Kamu juga bisa sekedar melihat gambar-gambar yang sudah pernah diunggah.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->
 
 

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