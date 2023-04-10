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

@section('js_vendor')
    <script src="/js/cs/scrollspy.js"></script>  
@endsection
    
@section('content')   
<section id="hero" class="scroll-section hero">
  <div id="hero">  
    <div class="container">    
      <div class="row d-flex align-items-center">
        <div class="row">
          <div class="col-12 col-lg-6 " style="padding-top: 70px;">
            <h1 class="display-1 mb-3 text-dark">
              <span class="d-block">Banyak Aset</span>
              <span class="d-block">Siap Pakai</span>
            </h1>
              <p class="heading mb-7 pe-lg-6">
              Pikart hadir untuk memudahkan pegawai BPS baru untuk saling berbagi aset media digital. Website ini berfungsi untuk melayani permintaan gambar shutterstock dan freepik bagi pegawai BPS di seluruh Indonesia.
              <br> 
              </p> 
              <!-- Search Input Start -->   
              <div class="card">
                <div class="card-body p-0 d-flex flex-row align-items-center px-3 py-3">
                    <input class="form-control border-0 shadow-none" placeholder="Cari Aset..."  />
                    <div class="d-flex flex-row">  
                        <button class="sumbit" id="chatSendButton" type="button" style="border: none;background: none">
                            <i data-acorn-icon="search"></i>
                        </button>
                    </div>
                </div>  
              <!-- Search Input End -->
            </div>
          </div>
          <div class="col-12 col-lg-6 align-items-right ">
          <img src="../../landpage_asset/img/cta-bg.png" class="feature-image" alt="feature image" style="max-width: 80%;">
          </div> 
        </div>
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
    </div>

  </div>
</section><!-- End Hero -->  
  <main id="main">

    <!-- ======= Clients Section ======= -->
    {{-- <section id="clients" class="clients ">
      <div class="container">

        <div class="row" data-aos="zoom-in">

          <div class="col-lg-4 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="/landpage_asset/img/clients/client-1.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-4 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="/landpage_asset/img/clients/client-2.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-4 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="/landpage_asset/img/clients/client-3.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section> --}}
    <!-- End Cliens Section -->

    <!-- ======= About Us Section ======= -->
    <section id="tentangaplikasi" class="scroll-section about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 class="display-s3 text-center mb-4">Tentang Pikart</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6" style="padding-left: 200px;">
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
            <img src="../../landpage_asset/img/about-us.png" class="feature-image" alt="feature image" style="max-width: 200%;">
            {{-- <a href="#" class="btn-learn-more">Learn More</a> --}}
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    {{-- <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <h3>Eum ipsam laborum deleniti <strong>velit pariatur architecto aut nihil</strong></h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>
            </div>

            <div class="accordion-list">
              <ul>
                <li>
                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                    <p>
                      Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                    </p>
                  </div>
                </li>

              </ul>
            </div>

          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("/landpage_asset/img/why-us.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
        </div>

      </div>
    </section><!-- End Why Us Section --> --}}

    {{-- <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
            <img src="/landpage_asset/img/skills.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
            <h3>Statistik Pikart</h3>
            <p class="fst-italic">
              Grafik di bawah adalah jumlah aset yang ada di Pikart berdasarkan sumber gambar-nya
            </p>

            <div class="skills-content">

              <div class="progress">
                <span class="skill">Shutterstock <i class="val">100%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">Freepik <i class="val">90%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">Badan Pusat Statistik <i class="val">75%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div> 

            </div>

          </div>
        </div>

      </div>
    </section><!-- End Skills Section --> --}}

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

    <!-- ======= Cta Section ======= -->
    {{-- <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Jelajahi Gambar yang sedang tren di Pikart</h3>
            <p> Periksa apa yang populer di Pikart dan jadikan proyek Anda terlihat trendi dan profesional</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            {{-- <a class="cta-btn align-middle" href="#">Pikart</a> 
          </div>
        </div>

      </div>
    </section> --}}
    <!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    {{-- <section id="portofolio" class="scroll-section portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Portfolio</h2>
          <p>Gambar-gambar yang ada di Pikart adalah gambar pilihan dari tim kami di Direktorat Diseminasi Statistik</p>
        </div>

        {{-- <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <li data-filter="*" class="filter-active">All</li>
          <li data-filter=".filter-app">App</li>
          <li data-filter=".filter-card">Card</li>
          <li data-filter=".filter-web">Web</li>
        </ul>  

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="/landpage_asset/img/portfolio/portfolio-1.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>App 1</h4>
              <p>App</p>
              <a href="/landpage_asset/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="/landpage_asset/img/portfolio/portfolio-2.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <a href="/landpage_asset/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="/landpage_asset/img/portfolio/portfolio-3.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>App 2</h4>
              <p>App</p>
              <a href="/landpage_asset/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="/landpage_asset/img/portfolio/portfolio-4.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Card 2</h4>
              <p>Card</p>
              <a href="/landpage_asset/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="/landpage_asset/img/portfolio/portfolio-5.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Web 2</h4>
              <p>Web</p>
              <a href="/landpage_asset/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="/landpage_asset/img/portfolio/portfolio-6.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>App 3</h4>
              <p>App</p>
              <a href="/landpage_asset/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="/landpage_asset/img/portfolio/portfolio-7.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Card 1</h4>
              <p>Card</p>
              <a href="/landpage_asset/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="/landpage_asset/img/portfolio/portfolio-8.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Card 3</h4>
              <p>Card</p>
              <a href="/landpage_asset/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="/landpage_asset/img/portfolio/portfolio-9.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <a href="/landpage_asset/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

        </div>

      </div>
    </section> --}}
    <!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    {{-- <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>Kenalin tim kami di Pikart</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="/landpage_asset/img/team/team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Lewis Anggi</h4>
                <span>Ketua Tim Pikart</span>
                <p>Staf Diseminasi Statistik </p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
              <div class="pic"><img src="/landpage_asset/img/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
                <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
              <div class="pic"><img src="/landpage_asset/img/team/team-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
                <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
              <div class="pic"><img src="/landpage_asset/img/team/team-4.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
                <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section --> --}}

    <!-- ======= Frequently Asked Questions Section ======= -->
    {{-- <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="500">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section --> --}}

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
{{-- 
  <div id="preloader"></div>--}}
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