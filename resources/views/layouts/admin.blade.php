<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin | @yield('title')</title>
    <link rel="icon" href="{{ asset('img/favicon.png') }}" sizes="32x32" type="image/png">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('asset/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">


    <!-- Custom styles for this template-->
    <link href="{{ asset('asset/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">


</head>
<style>
    .bg-primary,
    .btn-primary,
    .navbar-primary,
    text-primary {
        background-color: #F9F8F6 !important;
    }

    .btn-primary,
    .btn-primary:hover,
    .btn-primary:focus,
    .btn-primary:active {
        background-color: #0E2E72 !important;
    }

    /* Fixed/Sticky Navigation for Admin */
    #wrapper #accordionSidebar {
        height: 100vh;
        position: sticky;
        top: 0;
        z-index: 1000;
        overflow-y: auto;
    }

    #sidebar-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(9, 29, 74, 0.45); /* Matching text-blue-deep */
        z-index: 1045;
        display: none;
        backdrop-filter: blur(4px); /* Premium overlay blur */
        transition: all 0.3s ease;
    }

    @media (max-width: 768px) {
        #wrapper #accordionSidebar {
            position: fixed;
            z-index: 1050;
            left: -100%;
            transition: all 0.3s ease;
            height: 100vh;
        }
        #wrapper #accordionSidebar.toggled {
            left: 0;
            width: 14rem !important;
        }
        #content-wrapper {
            margin-left: 0 !important;
        }
        .topbar {
            padding: 0 0.5rem;
        }
        body.sidebar-toggled #sidebar-backdrop {
            display: block !important;
        }
    }

    /* Global Sharp Modern Border Radius */
    .btn, 
    .card, 
    .form-control, 
    .badge, 
    .modal-content, 
    .input-group-text,
    .dropdown-menu {
        border-radius: 8px !important;
    }

    /* Modern Scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    ::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #999;
    }

    /* Force Sticky Navbar Aggressively */
    #wrapper, #content-wrapper {
        overflow: visible !important;
    }

    .topbar {
        position: -webkit-sticky !important; /* Safari */
        position: sticky !important;
        top: 0 !important;
        z-index: 1040 !important;
        box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15) !important; /* Restore shadow if lost */
    }

    /* SKELETON LOADING */
    .skeleton {
        background: #e2e8f0;
        background: linear-gradient(110deg, #ececec 8%, #f5f5f5 18%, #ececec 33%);
        border-radius: 5px;
        background-size: 200% 100%;
        animation: 2.3s shine linear infinite;
    }
    @keyframes shine { to { background-position-x: -200%; } }
    .skeleton-text { width: 100%; height: 12px; margin-bottom: 10px; }
    .skeleton-title { width: 60%; height: 20px; margin-bottom: 15px; }
    .skeleton-img { width: 40px; height: 40px; border-radius: 50%; }
    .skeleton-container { display: block; }
    .content-loaded .skeleton-container { display: none; }
    .real-content { display: none; }
    .content-loaded .real-content { display: block; animation: fadeIn 0.8s ease-out forwards; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
</style>


<body id="page-top">

    <!-- Mobile Sidebar Backdrop -->
    <div id="sidebar-backdrop"></div>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-dark">@yield('title')</h1>

                    </div>

                    <!-- Content Row -->
                    @yield('containt')


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layouts.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('asset/vendor/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('asset/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('asset/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('asset/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('asset/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('asset/js/demo/chart-pie-demo.js') }}"></script>

    <!-- Real-time Polling for Messages & Notifications -->
    <script>
        function checkNewMessages() {
            $.ajax({
                url: "{{ route('admin.pesan.unread-count') }}",
                type: 'GET',
                success: function(data) {
                    // 1. Update Pesan (Messages)
                    const mCount = data.messageCount;
                    const navMsgBadge = $('.navbar-unread-count');
                    if (mCount > 0) {
                        navMsgBadge.text(mCount).fadeIn();
                    } else {
                        navMsgBadge.fadeOut();
                    }

                    // Inbox Page updates
                    const inboxBadge = $('#unread-badge');
                    const inboxCount = $('#unread-count');
                    if (inboxCount.length) {
                        if (parseInt(inboxCount.text()) !== mCount) {
                            inboxCount.text(mCount);
                            if (mCount > 0) {
                                inboxBadge.addClass('animate__pulse animate__infinite').removeClass('bg-secondary').addClass('bg-primary');
                            } else {
                                inboxBadge.removeClass('animate__pulse animate__infinite').removeClass('bg-primary').addClass('bg-secondary');
                            }
                        }
                    }

                    // 2. Update Pendaftaran (Alerts)
                    const pCount = data.pendaftaranCount;
                    const navAlertBadge = $('.navbar-alerts-count');
                    if (pCount > 0) {
                        navAlertBadge.text(pCount).fadeIn();
                    } else {
                        navAlertBadge.fadeOut();
                    }
                },
                error: function() {
                    console.log('Error checking for updates');
                }
            });
        }

        // Dismiss sidebar on mobile when clicking backdrop
        $('#sidebar-backdrop').on('click', function() {
            $("body").removeClass("sidebar-toggled");
            $("#accordionSidebar").removeClass("toggled");
        });

        setInterval(checkNewMessages, 10000);
        $(document).ready(checkNewMessages);
    </script>
    @stack('scripts')
</body>

</html>
