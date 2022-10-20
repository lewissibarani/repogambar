<script>
    function getMessage() {
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type:'POST',
        url:'/Notifikasi/Dibaca',
        data:'_token = {{csrf_token()}}',
        success:function(data) {
            // $("#msg").html(data.msg);
            alert("Hello! I am an alert box!!");
        }
    });
    }
</script>

<div class="nav-content d-flex">
    <!-- Logo Start -->
    <div class="logo position-relative">
        <a href="/">
            <!-- Logo can be added directly -->
            <!-- <img src="/img/logo/logo-white.svg" alt="logo" /> -->

            <!-- Or added via css to provide different ones for different color themes -->
            <div class="img"></div>
        </a>
    </div>
    <!-- Logo End -->

    <!-- Language Switch Start -->
    <!-- <div class="language-switch-container">
        <button class="btn btn-empty language-button dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EN</button>
        <div class="dropdown-menu">
            <a href="#" class="dropdown-item">DE</a>
            <a href="#" class="dropdown-item active">EN</a>
            <a href="#" class="dropdown-item">ES</a>
        </div>
    </div> -->
    <!-- Language Switch End -->

    <!-- User Menu Start -->
    <div class="user-container d-flex">

        @auth
        <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="profile" alt="profile" src="{{ Auth::user()->profilepicture}}" />
            <div class="name">{{ Auth::user()->name }}</div>
        </a>
        <div class="dropdown-menu dropdown-menu-end user-menu wide">
            <!-- <div class="row mb-3 ms-0 me-0">
                <div class="col-12 ps-1 mb-2">
                    <div class="text-extra-small text-primary">ACCOUNT</div>
                </div>
                <div class="col-6 ps-1 pe-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">User Info</a>
                        </li>
                        <li>
                            <a href="#">Preferences</a>
                        </li>
                        <li>
                            <a href="#">Calendar</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Security</a>
                        </li>
                        <li>
                            <a href="#">Billing</a>
                        </li>
                    </ul>
                </div>
            </div> -->
            <!-- <div class="row mb-1 ms-0 me-0">
                <div class="col-12 p-1 mb-2 pt-2">
                    <div class="text-extra-small text-primary">APPLICATION</div>
                </div>
                <div class="col-6 ps-1 pe-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Themes</a>
                        </li>
                        <li>
                            <a href="#">Language</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Devices</a>
                        </li>
                        <li>
                            <a href="#">Storage</a>
                        </li>
                    </ul>
                </div>
            </div> -->
            <div class="row mb-1 ms-0 me-0">
                <div class="col-6 ps-1 pe-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">
                                <i data-acorn-icon="help" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Help</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i data-acorn-icon="file-text" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Docs</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">
                                <i data-acorn-icon="gear" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Settings</span>
                            </a>
                        </li>
                        <li>
                            <form id="logoutForm" action="{{route('logout')}}" method="post">
                            @csrf
                                <a onclick="document.getElementById('logoutForm').submit();">
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
        <!-- <li class="list-inline-item">
            <a href="#" data-bs-toggle="modal" data-bs-target="#searchPagesModal">
                <i data-acorn-icon="search" data-acorn-size="18"></i>
            </a>
        </li> -->
        <!-- <li class="list-inline-item">
            <a href="#" id="pinButton" class="pin-button">
                <i data-acorn-icon="lock-on" class="unpin" data-acorn-size="18"></i>
                <i data-acorn-icon="lock-off" class="pin" data-acorn-size="18"></i>
            </a>
        </li> -->
        <li class="list-inline-item">
            <a href="#" id="colorButton">
                <i data-acorn-icon="light-on" class="light" data-acorn-size="18"></i>
                <i data-acorn-icon="light-off" class="dark" data-acorn-size="18"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#" data-bs-toggle="dropdown" data-bs-target="#notifications" 
            aria-haspopup="true" aria-expanded="false" class="notification-button">
                <div class="position-relative d-inline-flex">
                    <span class="badge rounded-pill bg-danger me-2 position-absolute s-3 t-n2 z-index-">
                    <small> {{auth()->user()->unreadNotifications->count()}}</small>
                    </span>
                    <i data-acorn-icon="bell" data-acorn-size="18"></i>                        
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu wide scroll-out" id="notifications" style="">
                <div class="scroll ">
                    <ul class="list-unstyled border-last-none">
                    @foreach(auth()->user()->unreadNotifications as $notification)
                    @php
                    if(auth()->user()->level==3){
                    @endphp 
                        <li class="mb-3 pb-3 border-bottom border-separator-light ">
                            <div class="row align-items-start ">
                                <div class="col-auto">
                                    <div class="sw-1 me-3">
                                        <img src="{{$notification->data['peminta_pp']}}" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                                    </div>
                                </div>
                                <div class=" col">
                                    <a href="{{route('petugas.layani',['transaksi_id'=>$notification->data['permintaan_id'], 'permintaan_id'=>$notification->data['kode_permintaan_id']])}}"
                                    data-id="{{ $notification->id }}"
                                    >
                                    <b>{{$notification->data['namapeminta']}}</b>, membuat permintaan: {{$notification->data['kode_permintaan_id']}}.</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" d-flex flex-row-reverse bd-highlight">
                                    <div class="p-2 bd-highlight ">
                                        <span class="text-muted text-small"><b> {{$notification->updated_at}}</b></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @php
                    }else{
                    @endphp
                        <li class="mb-3 pb-3 border-bottom border-separator-light ">
                            <div class="row align-items-start ">
                                <div class="col-auto">
                                    <div class="sw-1 me-3">
                                        <img src="{{$notification->data['petugas_pp']}}" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                                    </div>
                                </div>
                                <div class=" col">
                                    <a href="{{route('dashboard.detailgambar',['gambar_id'=>$notification->data['gambar_id']])}}">
                                        Hai, permintaan <strong class="text-primary">{{$notification->data['kode_permintaan_id']}}</strong> sudah kami proses. Klik disini.</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" d-flex flex-row-reverse bd-highlight">
                                    <div class="p-2 bd-highlight ">
                                        <span class="text-muted text-small"> {{$notification->updated_at}}</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @php
                    }
                    @endphp
                        
                    @endforeach
                    </ul>
                </div>
            </div>
        </li>
    </ul>
    <!-- Icons Menu End -->

    <!-- Menu Start -->
    <div class="menu-container flex-grow-1">
        <ul id="menu" class="menu">
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
            @php 
            if( Auth::user()->level==3){
            @endphp
                <li>
                <a href="/Petugas/Index">
                    <i data-acorn-icon="screen" class="icon" data-acorn-size="18"></i>
                    <span class="label">Halaman Petugas</span>
                </a>
                <ul id="interfaceComponents">
                            <!-- <li>
                                <a href="/Statistik/Index">
                                    <span class="label">Statistik Aplikasi</span>
                                </a>
                            </li> -->

                            <li>
                                <a href="/Petugas/Index">
                                    <span class="label">Daftar Tugas</span>
                                </a>
                            </li>

                            <li>
                                <a href="/Petugas/Pengaturan">
                                    <span class="label">Pengaturan Petugas</span>
                                </a>
                            </li>
                </ul>
            </li>

            @php
            };
            @endphp
            
            <li>
                <!-- <a href="/Kontribusi">
                    <i data-acorn-icon="camera" class="icon" data-acorn-size="18"></i>
                    <span class="label">Halaman Kontributor</span>
                </a> -->
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