<div class="nav-content d-flex">
    <!-- Logo Start -->
    <div class="logo position-relative">
        <a href="/" class="text-dark"> 
            <!-- Logo can be added directly --> 
            {{-- <img src="/img/logo/logo-light.svg" alt="logo" /> --}}
            <h1 class="display">P I K <strong class="">A R T</strong></h1>
            <!-- Or added via css to provide different ones for different color themes -->
            <!-- <div class="img"></div> -->
        </a>
    </div> 

    <!-- User Menu Start -->
    <div class="user-container d-flex"  style="margin-left :3em;  "> 
        <a href="#tentangaplikasi" class="nav-link text-dark">
            <i data-acorn-icon="star" class="icon" data-acorn-size="18"></i>
            <span class="label">Tentang Aplikasi</span>
        </a>
    </div>  
    <div class="user-container d-flex"  style="margin-left :3em;  "> 
        <a href="#jenislayanan" class="nav-link text-dark">
            <i data-acorn-icon="support" class="icon" data-acorn-size="18"></i>
            <span class="label">Jenis Layanan</span>
        </a>
    </div> 
    {{-- <div class="user-container d-flex"  style="margin-left :3em; margin-right: 50px;"> 
        <a href="#portofolio" class="nav-link text-dark">
            <i data-acorn-icon="tv" class="icon" data-acorn-size="18"></i>
            <span class="label">Portofolio</span>
        </a>
    </div>  --}}
    <div class="user-container d-flex"  style="margin-left :3em;  "> 
        <a href="/Dashboard" class="btn btn-primary  rounded-xl"> 
            <i data-acorn-icon="login" class="icon" data-acorn-size="18"></i>
            <span class="label">Login Pikart</span>
        </a>
    </div> 
    
    <!-- User Menu End -->

    <!-- Icons Menu Start -->
    <ul class="list-unstyled list-inline text-center menu-icons"> 
        <li>
            {{-- <a href="/Dashboard">
                <i data-acorn-icon="home" class="icon" data-acorn-size="18"></i>
                <span class="label">Tentang Pikart</span>
            </a> --}}
        </li> 
    </ul> 
    <!-- Icons Menu End -->

    <!-- Menu Start -->
    <div class="menu-container flex-grow-1">
        <ul id="menu" class="menu" style="margin-left :3em;">
            {{-- <li>
                <a href="/Dashboard">
                    <i data-acorn-icon="home" class="icon" data-acorn-size="18"></i>
                    <span class="label">Tentang Pikart</span>
                </a>
            </li> 
            <li>
                <a href="/Petugas/Statistik">
                    <i data-acorn-icon="activity" class="icon" data-acorn-size="18"></i>
                    <span class="label">Layanan</span>
                </a>
            </li> 
            <li>
                <a href="/Petugas/Statistik">
                    <i data-acorn-icon="activity" class="icon" data-acorn-size="18"></i>
                    <span class="label">Portofolio</span>
                </a>
            </li>  --}}
        </ul>
    </div>
    <!-- Menu End -->

    <!-- Mobile Buttons Start -->
    <div class="mobile-buttons-container">
        <!-- Scrollspy Mobile Button Start -->
        <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
            <i data-acorn-icon="menu-dropdown"></i>
        </a>
        <!-- Scrollspy Mobile Button End -->

        <!-- Scrollspy Mobile Dropdown Start -->
        <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
        <!-- Scrollspy Mobile Dropdown End -->

        <!-- Menu Button Start -->
        <a href="#" id="mobileMenuButton" class="menu-button">
            <i data-acorn-icon="menu"></i>
        </a>
        <!-- Menu Button End -->
    </div>
    <!-- Mobile Buttons End -->
</div>
<div class="nav-shadow"></div>