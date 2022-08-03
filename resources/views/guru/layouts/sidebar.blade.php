<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main"> 
    <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="{{ asset('img/logo-smp.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">E-Learning</span>
    </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link {{ request()->is('guru/dashboard*') ? 'active' : '' }}" href="{{ url('/guru/dashboard') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
        </a>
        </li>

        <li class="nav-item">
        <a class="nav-link {{ request()->is('guru/pengumuman*') ? 'active' : '' }}" href="{{ url('/guru/pengumuman') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-bell-55 text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Pengumuman</span>
        </a>
        </li>

        <li class="nav-item">
        <a class="nav-link {{ request()->is('guru/materi*') ? 'active' : '' }}" href="{{ url('/guru/materi') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-single-copy-04 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Materi</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ request()->is('guru/tugas*') ? 'active' : '' }}" href="{{ url('/guru/tugas') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-ruler-pencil text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Tugas</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ request()->is('guru/data-tugas*') ? 'active' : '' }}" href="{{ url('/guru/data-tugas') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-archive-2 text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Data Tugas</span>
        </a>
        </li>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ request()->is('guru/ujian*') ? 'active' : '' }}" href="{{ url('/guru/ujian') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-paper-diploma text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Ujian</span>
        </a>
        </li>

        <li class="nav-item">
        <a class="nav-link {{ request()->is('guru/nilai*') ? 'active' : '' }}" href="{{ url('/guru/nilai') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-trophy text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Nilai</span>
        </a>
        </li>
        
        <li class="nav-item">
        <a class="nav-link {{ request()->is('guru/forum*') ? 'active' : '' }}" href="{{ url('/guru/forum') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-chat-round text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Forum</span>
        </a>
        </li>


        <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ request()->is('guru/profil-guru*') ? 'active' : '' }}" href="{{ url('/guru/profil-guru') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
        </a>
        </li>
        
    </ul>
    </div>
</aside>


