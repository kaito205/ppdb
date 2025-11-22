<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User | @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Tambahkan di layout user -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<style>
    .text-blue {
        color: #0E2E72;
    }
</style>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow pt-3 pb-3">
            <div class="container-fluid">
                <img src="{{ asset('img/logo.png') }}" class="mb-3" alt="" height="70">
                <a class="navbar-brand h2 p-lg-2" href="/">SMA ERHA JATINAGARA</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto">
                        <a class="nav-link mr-3 {{ request()->is('/') ? 'active' : '' }}"
                            href="{{ route('dashboard.user') }}">Dashboard</a>
                        <a class="nav-link mr-3 {{ request()->is('formulir') ? 'active' : '' }}"
                            href="{{ route('formulir.user') }}">Formulir</a>
                        <a class="nav-link mr-3 {{ request()->is('seleksi') ? 'active' : '' }}"
                            href="{{ route('seleksi.user') }}">Status Pendaftaran</a>
                        <a class="nav-link mr-3 {{ request()->is('pendaftaran') ? 'active' : '' }}"
                            href="{{ route('profile.user') }}">Cetak Formulir</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger"><i
                                    class="bi bi-box-arrow-right"></i>Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    {{-- content --}}
    @yield('containt')
    {{-- endcontent --}}


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>

</body>

</html>
