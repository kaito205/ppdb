<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 sticky-top shadow-sm">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ms-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-end p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="d-flex me-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-danger" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                @if(isset($navbarAlertsCount) && $navbarAlertsCount > 0)
                <span class="badge bg-danger badge-counter">{{ $navbarAlertsCount }}</span>
                @endif
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-end shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Pemberitahuan Pendaftaran
                </h6>
                @if(isset($navbarAlerts) && $navbarAlerts->count() > 0)
                    @foreach($navbarAlerts as $alert)
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('datasiswa') }}">
                        <div class="me-3">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-user-plus text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">{{ $alert->created_at->format('d M Y') }}</div>
                            <span class="font-weight-bold">Siswa Baru: {{ $alert->nama }}</span>
                            <div class="small text-muted">Menunggu verifikasi berkas</div>
                        </div>
                    </a>
                    @endforeach
                @else
                    <a class="dropdown-item text-center small text-gray-500 py-3" href="#">Tidak ada pendaftaran baru</a>
                @endif
                <a class="dropdown-item text-center small text-gray-500" href="{{ route('datasiswa') }}">Lihat Semua Pendaftar</a>
            </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                @if(isset($navbarMessagesCount) && $navbarMessagesCount > 0)
                <span class="badge bg-danger badge-counter">{{ $navbarMessagesCount }}</span>
                @endif
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-end shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Message Center
                </h6>
                @if(isset($navbarMessages) && $navbarMessages->count() > 0)
                    @foreach($navbarMessages as $msg)
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.pesan') }}">
                        <div class="dropdown-list-image me-3">
                            <img class="rounded-circle" src="https://ui-avatars.com/api/?name={{ urlencode($msg->name) }}&background=random"
                                alt="...">
                            <div class="status-indicator bg-success"></div>
                        </div>
                        <div class="font-weight-bold">
                            <div class="text-truncate">{{ Str::limit($msg->message, 30) }}</div>
                            <div class="small text-gray-500">{{ $msg->name }} · {{ $msg->created_at->diffForHumans() }}</div>
                        </div>
                    </a>
                    @endforeach
                @else
                    <a class="dropdown-item text-center small text-gray-500" href="#">Tidak ada pesan baru</a>
                @endif
                <a class="dropdown-item text-center small text-gray-500" href="{{ route('admin.pesan') }}">Read More Messages</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="me-2 d-none d-lg-inline text-dark">{{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle"
                    src="{{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : asset('img/user.jpeg') }}" style="object-fit: cover; width: 32px; height: 32px;">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('profile.admin') }}">
                    <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>
                    Settings
                </a>

                <div class="dropdown-divider"></div>

                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>

    </ul>

</nav>

