@extends('layouts.app')

@section('containt')

<section class="tentang">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('img/hero1.png') }}" alt="" class="img-fluid d-block mx-auto">
            </div>
            <div class="col-md-6">
                <h3 class="font-waight-bold mb-3 mt-5">TENTANG <span class="text-success">KAMI</span></h3>

                <p class="deskripsi"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit libero,
                    veniam repellat eaque autem veritatis voluptates nulla, dolore sequi, rerum
                    iure in fugit sunt earum. Accusamus dolores impedit nisi iure, nulla facere
                    voluptatum ducimus saepe quia modi delectus atque ut quos ipsum corporis
                    praesentium sequi. Quidem mollitia unde dolorum fugit.
                </p>

                <h5 class="mt-5">Sosoal media kami</h5>
                <div class="icon-mds">
                    <a href="#" class="w-9 h-9 mr-3"><i class="bi bi-whatsapp"></i></a>
                    <a href="#" class="w-9 h-9 mr-3"><i class="bi bi-youtube"></i></a>
                    <a href="#" class="w-9 h-9 mr-3"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="w-9 h-9 mr-3"><i class="bi bi-tiktok"></i></a>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="bg-blue pt-5 pb-5">
    <div class="container">
        <h3 class="text-white text-center mb-5">STATISTIK PENDAFTARAN</h3>
        <div class="row">
            <div class="col-md-4 text-center">
                <h3 class="text-white font-weight-bold h1">293</h3>
                <p class="text-white">TOTAL PENDAFTAR</p>
            </div>
            <div class="col-md-4 text-center">
                <h3 class="text-white font-weight-bold h1">193</h3>
                <p class="text-white">LAKI-LAKI</p>
            </div>
            <div class="col-md-4 text-center">
                <h3 class="text-white font-weight-bold h1">100</h3>
                <p class="text-white">PEREMPUAN</p>
            </div>
        </div>
    </div>
</section>

<section class="alumni mt-5">
    <div class="container">
        <h3 class="text-center font-weight-bold mb-3">
            Apa kata alumni?
        </h3>
        <p class="text-center mb-4">
            Beberapa testimoni dari para alumni yangtelah merasakan manfaat dengan mondok di pesantren Riyadlul Hidayah Al-munawarah
        </p>

        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card mt-4">
                    <div class="card-body">
                        <img src="{{ asset('img/user.jpeg') }}" alt="cobaa">

                        <p class="text-center">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic soluta, voluptates esse repellendus numquam rerum, tempora vitae, nesciunt laborum sapiente quaerat iusto. Veritatis enim placeat quae cumque, qui quidem esse.
                        </p>

                        <p class="font-weight-bold text-center mb-0">Iis siti maesaroh</p>
                        <span>Web Developer, kaito</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mt-4">
                    <div class="card-body">
                        <img src="{{ asset('img/user.jpeg') }}" alt="cobaa">

                        <p class="text-center">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic soluta, voluptates esse repellendus numquam rerum, tempora vitae, nesciunt laborum sapiente quaerat iusto. Veritatis enim placeat quae cumque, qui quidem esse.
                        </p>

                        <p class="font-weight-bold text-center mb-0">Iis siti maesaroh</p>
                        <span>Web Developer, kaito</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mt-4">
                    <div class="card-body">
                        <img src="{{ asset('img/user.jpeg') }}" alt="cobaa">

                        <p class="text-center">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic soluta, voluptates esse repellendus numquam rerum, tempora vitae, nesciunt laborum sapiente quaerat iusto. Veritatis enim placeat quae cumque, qui quidem esse.
                        </p>

                        <p class="font-weight-bold text-center mb-0">Iis siti maesaroh</p>
                        <span>Web Developer, kaito</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
