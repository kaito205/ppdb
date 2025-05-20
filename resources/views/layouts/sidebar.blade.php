<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/logo2.png') }}" alt="Logo Sekolah" class="rounded-circle" style="width: 50px; height: 50px;">
        </div>
        <div class="sidebar-brand-text mx-2">PPDB 123</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Items -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard.admin') }}">
            <i class="fas fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('datasiswa') }}">
            <i class="fas fa-user-plus"></i>
            <span>Data Pendaftar</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('seleksi.admin') }}"
            <i class="fas fa-check-circle"></i>
            <span>Seleksi Administrasi & Akademik</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('pengumuman.admin') }}">
            <i class="fas fa-bullhorn"></i>
            <span>Pengumuman Hasil</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('daftar.admin') }}">
            <i class="fas fa-redo"></i>
            <span>Pendaftaran Ulang</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler -->
    <div class="text-center">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
