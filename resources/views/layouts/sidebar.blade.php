<ul class="navbar-nav bg-white sidebar sidebar-light accordion shadow-sm" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center py-4" href="/">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/logo.webp') }}" alt="Logo Sekolah" class="rounded-circle shadow-sm" style="width: 60px; height: 60px; object-fit: cover;">
        </div>
        <div class="sidebar-brand-text mx-2 fw-bold text-blue" style="font-size: 0.8rem; letter-spacing: 1px;">SMA ERHA<br><span class="small font-weight-normal opacity-75">JATINAGARA</span></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0 opacity-25">

    <!-- Heading -->
    <div class="sidebar-heading mt-4 mb-2 text-muted small fw-bold text-uppercase px-4" style="font-size: 0.65rem; opacity: 0.6;">Utama</div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('dashboard.admin') ? 'active fw-bold' : '' }}" href="{{ route('dashboard.admin') }}">
            <i class="fas fa-fw fa-tachometer-alt text-primary"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-2 opacity-25">

    <!-- Heading -->
    <div class="sidebar-heading mt-3 mb-2 text-muted small fw-bold text-uppercase px-4" style="font-size: 0.65rem; opacity: 0.6;">Profil & Konten</div>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.profil') ? 'active fw-bold' : '' }}" href="{{ route('admin.profil') }}">
            <i class="fas fa-fw fa-school text-indigo"></i>
            <span>Profil Sekolah</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/staff*') ? 'active fw-bold' : '' }}" href="{{ route('admin.staff') }}">
            <i class="bi bi-people-fill text-primary"></i>
            <span>Kelola Staff / Guru</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/ekskul*') ? 'active fw-bold' : '' }}" href="{{ route('admin.ekskul') }}">
            <i class="bi bi-collection text-success"></i>
            <span>Ekstrakurikuler</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/prestasi*') ? 'active fw-bold' : '' }}" href="{{ route('admin.prestasi') }}">
            <i class="bi bi-trophy text-warning"></i>
            <span>Prestasi Siswa</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/berita*') ? 'active fw-bold' : '' }}" href="{{ route('berita.index') }}">
            <i class="bi bi-newspaper text-info"></i>
            <span>Berita & Artikel</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-2 opacity-25">

    <!-- Heading -->
    <div class="sidebar-heading mt-3 mb-2 text-muted small fw-bold text-uppercase px-4" style="font-size: 0.65rem; opacity: 0.6;">Administrasi</div>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/datasiswa*') || request()->routeIs('datasiswa') ? 'active fw-bold' : '' }}" href="{{ route('datasiswa') }}">
            <i class="fas fa-fw fa-users text-danger"></i>
            <span>Data Pendaftar</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/pesan*') ? 'active fw-bold' : '' }}" href="{{ route('admin.pesan') }}">
            <i class="bi bi-chat-dots-fill text-warning"></i>
            <span>Pesan Masuk</span>
            <span class="badge bg-danger rounded-pill ms-auto sidebar-message-count" style="{{ (isset($unreadMessagesCount) && $unreadMessagesCount > 0) ? '' : 'display: none;' }}">
                {{ $unreadMessagesCount ?? 0 }}
            </span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-2 opacity-25">

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/profile') ? 'active fw-bold' : '' }}" href="{{ route('profile.admin') }}">
            <i class="fas fa-fw fa-user-cog text-secondary"></i>
            <span>Pengaturan Akun</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block mt-4 mb-4">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0 shadow-sm" id="sidebarToggle" style="background-color: #f8f9fc;"></button>
    </div>

</ul>

<style>
    .text-indigo { color: #6610f2 !important; }
    .sidebar .nav-item .nav-link.active {
        color: #0e2e72 !important;
        background-color: rgba(14, 46, 114, 0.05);
        border-right: 4px solid #0e2e72;
    }
    .sidebar .nav-item .nav-link i {
        font-size: 1.1rem;
        transition: transform 0.3s ease;
    }
    .sidebar .nav-item .nav-link:hover i {
        transform: scale(1.2);
    }
    .text-blue { color: #0e2e72 !important; }
</style>
