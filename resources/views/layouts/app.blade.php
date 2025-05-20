<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow pt-3 pb-3">
            <div class="container">
                <img src="{{ asset('img/logo2.png') }}" class="mb-3" alt="" width="50" height="50">
                <a class="navbar-brand h2 p-lg-2" href="/">Sekolah Swasta 123 </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-link mr-3 {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                <a class="nav-link mr-3 {{ request()->is('tentang') ? 'active' : '' }}" href="tentang">Tentang Kami</a>
                <a class="nav-link mr-3 {{ request()->is('info') ? 'active' : '' }}" href="info">Informasi</a>
                <a class="nav-link mr-3 {{ request()->is('pendaftaran') ? 'active' : '' }}" href="kontak">contact</a>
                <a class="btn btn-blue btn-circle mr-3{{ request()->is('login') ? 'active' : '' }}" href="login/user">Masuk</a>
                <a class="btn btn-blue btn-circle {{ request()->is('registrasi') ? 'active' : '' }}" href="registrasi/user">Daftar</a>
            </div>
            </div>
            </div>
        </nav>
    </header>
        {{--  content  --}}
        @yield('containt')
        {{--  endcontent  --}}

        {{--  footer  --}}
        <footer>
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('img/logo2.png') }}" alt="" height="70px" class="mb-3">
                        <h3>Sekolah Swasta 123</h3>

                        <ul>
                            <li>
                                <i class="bi bi-geo-alt-fill"></i>
                                Alamat: Sekolah Swasta 123, Kecamatan Jatinagara, Kabupaten Ciamis, Jawa Barat
                            </li>
                            <li>
                                <i class="bi bi-telephone-fill"></i>
                                Telp: (0341) 2345678
                            </li>
                            <li>
                                <i class="bi bi-envelope-fill"></i>
                                Email: aryad@gmail.com
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        {{--  endfooter  --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>
</html>
