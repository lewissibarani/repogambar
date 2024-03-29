

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
    <div class="user-container d-flex">

        @auth
        <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="profile" alt="profile" src="{{ Auth::user()->profilepicture}}" />
            <div class="name">{{ Auth::user()->name }}</div>
        </a>
        <div class="dropdown-menu dropdown-menu-end user-menu wide w-120"> 
            <div class="row mb-1 ms-0 me-0">

                <div class="col-12 ps-1 mb-2">
                    <div class="text-extra-small text-primary mb-2">ACCOUNT</div>

                    <div class="row mg-bottom-lv2-i"> 
                        <div class="sw-10 me-1 mb-1 d-inline-block">
                            <img src="{{ Auth::user()->profilepicture}}" class="img-fluid rounded-md" alt="thumb">
                        </div> 

                        <div class="col mg-none pd-none">
                            <span class="" style="font-size: 12px;">{{ Auth::user()->name }}</span>
                            <span class="mb-1" style="font-size: 12px;">{{ Auth::user()->email }}</span>
                            <a href="" style="background:rgb(0, 183, 255);" class="mt-3  btn btn-sm"><span class="text-white"> Edit Profile </span></a>
                        </div>
                    </div> 
                </div>
                <hr class="full-width mg-bottom-lv2">
                <div class="col-12 pe-1 ps-1">

                    <div class="text-extra-small text-primary mb-2">MENU APLIKASI</div>

                    <ul class="list-unstyled">
                        <li>
                            <a href="/Petugas/Review/Daftar">
                                <i data-acorn-icon="form" class="me-2" data-acorn-size="17"></i>
                                <span class="label">Karya Under Review</span>
                            </a>
                        </li>
                        <li>
                            <a href="/Petugas/Review/Daftar">
                                <i data-acorn-icon="download" class="me-2" data-acorn-size="17"></i>
                                <span class="label">Downloads</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('album.index')}}">
                                <i data-acorn-icon="folder" class="me-2" data-acorn-size="17"></i>
                                <span class="label">Koleksi Saya</span>
                            </a>
                        </li>
                        <li>
                            <a href="/Kontributor/Profiluser/{{Auth::user()->id}}">
                                <i data-acorn-icon="camera" class="me-2" data-acorn-size="17"></i>
                                <span class="label">Halaman Kontributor</span>
                            </a> 
                        </li>

                        <hr class="full-width mg-bottom-lv2">

                        <li>
                            <form id="logoutForm" action="{{route('logout')}}" method="post">
                            @csrf
                                <a href="" onclick="document.getElementById('logoutForm').submit();">
                                    <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                                    <span class="align-middle">Logout</span>
                                </a>
                            </form>
                            <!-- <a href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Logout</span>
                            </a> -->
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @else

        @endauth
    </div>
    <!-- User Menu End -->

    <!-- Icons Menu Start -->
    <ul class="list-unstyled list-inline text-center menu-icons"> 
        <li class="list-inline-item">
            <a href="#" id="colorButton">
                <i data-acorn-icon="light-on" class="light" data-acorn-size="18"></i>
                <i data-acorn-icon="light-off" class="dark" data-acorn-size="18"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#" data-bs-toggle="dropdown" data-bs-target="#notifications" aria-haspopup="true" aria-expanded="false" class="notification-button">
                <div class="position-relative d-inline-flex">
                    <span class="badge rounded-pill bg-danger me-2 position-absolute s-3 t-n2 z-index-">
                    <small> {{auth()->user()->unreadNotifications->count()}}</small>
                    </span>
                    <i data-acorn-icon="bell" data-acorn-size="18"></i>
                    
                        
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu wide notification-dropdown scroll-out" id="notifications" style="width:390px; ">
                <div class="scroll " style="height:300px; width:350px;">
                    <ul class="border-last-none">
                        @forelse(auth()->user()->notifications->sortBy('read_at') as $notification)
                            @if( $notification->type=='App\Notifications\PermintaanNotification')
                            <li class="pb-1 border-bottom border-separator-light ">
                                <div class="row align-items-start ">
                                    <div class="col-2 align-self-center "style="margin-b:350px;" >
                                        <div class="">
                                            <img src="{{$notification->data['peminta_pp']}}" class="sw-5 sh-5 rounded-xl" alt="..." />
                                        </div>
                                    </div>
                                    <div class=" col align-self-center">
                                        <div class="p-3">
                                            <a href="
                                            {{route('petugas.layani',
                                                [
                                                    'transaksi_id'=>$notification->data['permintaan_id'], 
                                                    'permintaan_id'=>$notification->data['kode_permintaan_id']
                                                ]
                                            )}}
                                            " 
                                            >
                                            <b>{{$notification->data['namapeminta']}}</b>, membuat permintaan: {{$notification->data['kode_permintaan_id']}}.</a>
                                            <div class="d-flex flex-row">
                                                <div class="mark-as-read">
                                                    <span id="tanggal-mark-as-read" class="text-primary text-small"><b> {{$notification->updated_at}}</b></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ( $notification->read_at==null)
                                    <div id="icon-mark-as-read" class="col col-lg-1 align-self-center">
                                        <div class="sw-1 me-3">
                                            <div class="bg-gradient-light sw-1 sh-1 rounded-xl d-flex justify-content-center align-items-center">
                                            </div> 
                                        </div>
                                    </div>
                                    @else
                                    <div id="icon-mark-as-read" class="col col-lg-1 align-self-center">
                                        <div class="sw-1 me-3">
                                            <div class="sw-1 sh-1 rounded-xl d-flex justify-content-center align-items-center border border-primary">
                                            </div> 
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </li>
                            @else
                            <li class="pb-1 border-bottom border-separator-light ">
                                <div class="row align-items-start ">
                                    <div class="col-2 align-self-center "style="margin-b:350px;" >
                                            <div class="sw-1 mb-4">
                                                <img src="{{$notification->data['petugas_pp']}}" class="sw-5 sh-5 rounded-xl" alt="..." /> 
                                            </div>
                                    </div>
                                    <div class=" col align-self-center">
                                        <div class="p-3">
                                            <a href="{{route('dashboard.detailgambar',[
                                                'gambar_id'=>$notification->data['gambar_id']
                                                ])}}"
                                            >
                                                Hai, permintaan <strong class="text-primary">{{$notification->data['kode_permintaan_id']}}</strong> sudah kami proses. Klik disini.</a>
                                            <div class="d-flex flex-row">
                                                <div class="mark-as-read">
                                                    <span id="tanggal-mark-as-read" class="text-primary text-small"><b> {{$notification->updated_at}}</b></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ( $notification->read_at==null)
                                    <div id="icon-mark-as-read" class="col col-lg-1 align-self-center">
                                        <div class="sw-1 me-3">
                                            <div class="bg-gradient-light sw-1 sh-1 rounded-xl d-flex justify-content-center align-items-center">
                                            </div> 
                                        </div>
                                    </div>
                                    @else
                                    <div id="icon-mark-as-read" class="col col-lg-1 align-self-center">
                                        <div class="sw-1 me-3">
                                            <div class="sw-1 sh-1 rounded-xl d-flex justify-content-center align-items-center border border-primary">
                                            </div> 
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </li>
                            @endif
                            @empty
                            <li class="mb-3 pb-3 border-bottom border-separator-light ">
                                <div class="row align-items-start ">
                                    <div class="col-2 align-self-center">
                                        <div class="">
                                        
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforelse 
                    </ul>
                </div>
            </div>
        </li>
    </ul> 
    <!-- Icons Menu End -->

    <!-- Menu Start -->
    <div class="menu-container flex-grow-1">
        <ul id="menu" class="menu" style="margin-left :3em;">
            <li>
                <a href="/Dashboard">
                    <i data-acorn-icon="home" class="icon" data-acorn-size="18"></i>
                    <span class="label">Dashboard</span>
                </a>
            </li> 
            <li>
                <a href="/KelolaGambar/Index">
                    <i data-acorn-icon="notebook-1" class="icon" data-acorn-size="18"></i>
                    <span class="label">Permintaan Gambar</span>
                </a>
            </li> 
            @if( Auth::user()->level<=3)
            <li>
                <a href="/Petugas/Index">
                    <i data-acorn-icon="screen" class="icon" data-acorn-size="18"></i>
                    <span class="label">Halaman Petugas</span>
                </a>
                <ul id="interfaceComponents"> 

                            <li>
                                <a href="/Petugas/Index">
                                    <span class="label">Daftar Permintaan Gambar</span>
                                </a>
                            </li>
                            <li>
                                <a href="/Petugas/Review/Daftar">
                                    <span class="label">Daftar Karya Under Review</span>
                                </a>
                            </li>

                            <li>
                                <a href="/Petugas/Pengaturan">
                                    <span class="label">Pengaturan Petugas</span>
                                </a>
                            </li>  
                </ul>
            </li> 
            @endif 
            
            <li>
                <a href="/Kontributor/Profiluser/{{Auth::user()->id}}">
                    <i data-acorn-icon="camera" class="icon" data-acorn-size="18"></i>
                    <span class="label">Halaman Kontributor</span>
                </a>
            </li> 
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