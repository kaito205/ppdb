<ul class="navbar-nav bg-primary sidebar sidebar-white accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Sekolah" class="rounded-circle" style="width: 80px;">
        </div>
        <div class="sidebar-brand-text mx-2">SMA ERHA JATINAGARA</div>
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
        <a class="nav-link" href="{{ route('admin.profil') }}">
            <i class="fas fa-school"></i>
            <span>Profil Sekolah</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/ekskul*') ? 'active' : '' }}" href="{{ route('admin.ekskul') }}">
            <i class="bi bi-collection"></i>
            <span>Ekstrakurikuler</span>
        </a>
    </li>



    <li class="nav-item">
        <a class="nav-link" href="{{ route('datasiswa') }}">
            <i class="fas fa-user-plus"></i>
            <span>Data Pendaftar</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('pengumuman.admin') }}">
            <i class="fas fa-bullhorn"></i>
            <span>Pengumuman Hasil</span>
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.verifikasi') }}"> {{-- BARIS INI YANG DIPERBAIKI: Ditambahkan '>' --}}
            <i class="bi bi-file-check-fill"></i>
            <span>Verifikasi Dokumen</span>
        </a>
    </li>




    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler -->
    <div class="text-center">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
