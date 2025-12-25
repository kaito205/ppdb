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

    .sticky-top {
        z-index: 999;
    }

    /* Custom Scrollbar for Sidebar */
    #accordionSidebar::-webkit-scrollbar {
        width: 5px;
    }
    #accordionSidebar::-webkit-scrollbar-thumb {
        background: rgba(0,0,0,0.1);
        border-radius: 10px;
    }
    .bg-light-blue {
        background-color: rgba(14, 46, 114, 0.03) !important;
    }

    /* Global Sharp Modern Border Radius */
    .btn, 
    .card, 
    .form-control, 
    .badge, 
    .modal-content, 
    .input-group-text,
    .dropdown-menu {
        border-radius: 5px !important;
    }
</style>

<body id="page-top">

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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

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

        setInterval(checkNewMessages, 10000);
        $(document).ready(checkNewMessages);
    </script>
    @stack('scripts')
</body>

</html>
