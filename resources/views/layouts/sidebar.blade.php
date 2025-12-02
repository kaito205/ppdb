<ul class="navbar-nav bg-white sidebar sidebar-light accordion shadow-sm" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center py-3" href="/">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Sekolah" class="rounded-circle" style="width: 70px; height: 70px; object-fit: cover;">
        </div>
        <div class="sidebar-brand-text mx-3 small">SMA ERHA JATINAGARA</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Items -->
    <li class="nav-item mt-3">
        <a class="nav-link" href="{{ route('dashboard.admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.profil') }}">
            <i class="fas fa-fw fa-school"></i>
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
        <a class="nav-link {{ request()->is('admin/prestasi*') ? 'active' : '' }}" href="{{ route('admin.prestasi') }}">
            <i class="bi bi-trophy"></i>
            <span>Prestasi</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('datasiswa') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Pendaftar</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/berita*') ? 'active' : '' }}" href="{{ route('berita.index') }}">
            <i class="bi bi-newspaper"></i>
            <span>Berita</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('profile.admin') }}">
            <i class="fas fa-fw fa-user-cog"></i>
            <span>Akun Saya</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
