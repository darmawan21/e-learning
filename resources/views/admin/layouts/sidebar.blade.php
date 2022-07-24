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
        <a class="nav-link {{ request()->is('admin/dashboard*') ? 'active' : '' }}" href="{{ url('/admin/dashboard') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
        </a>
        </li>

        <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/pengumuman*') ? 'active' : '' }}" href="{{ url('/admin/pengumuman') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-bell-55 text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Pengumuman</span>
        </a>
        </li>

        <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/kelas*') ? 'active' : '' }}" href="{{ url('/admin/kelas') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-collection text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Kelas</span>
        </a>
        </li>

        <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/mata-pelajaran*') ? 'active' : '' }}" href="{{ url('/admin/mata-pelajaran') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-books text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Mata Pelajaran</span>
        </a>
        </li>

        <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/jenis-ujian*') ? 'active' : '' }}" href="{{ url('/admin/jenis-ujian') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-ui-04 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Jenis Ujian</span>
        </a>
        </li>

        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account Manage</h6>
            <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/guru*') ? 'active' : '' }}" href="{{ url('/admin/guru') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-badge text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Guru</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/siswa*') ? 'active' : '' }}" href="{{ url('/admin/siswa') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-circle-08 text-secondary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Siswa</span>
            </a>
            </li>
        </li>
        
        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/profil-admin*') ? 'active' : '' }}" href="{{ url('/admin/profil-admin') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Profile</span>
            </a>
            </li>
        </li>
    </ul>
    </div>
</aside>