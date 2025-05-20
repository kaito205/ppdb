@extends('layouts.app')

@section('containt')

<div id="carouselExampleIndicators" class="carousel slide mt-4 p-lg-4">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('img/head1.jpg') }}" class="d-block w-100" alt="Gambar 1">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/head2.jpg') }}" class="d-block w-100" alt="Gambar 2">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/head3.jpg') }}" class="d-block w-100" alt="Gambar 3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Sebelumnya</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Selanjutnya</span>
    </button>
</div>

<section class="berita mt-5">
    <div class="container">
        <h1 class="text-center mt-5">Ponpes Riyadlul Hidayah Al-Munawarah</h1>
        <h3 class="text-center font-weight-bold mb-3 mt-5">Artikel & Berita</h3>
        <p class="text-center mt-3">
            Kami menyediakan berbagai artikel dan berita yang dapat memberikan informasi terkini tentang Ponpes Riyadlul Hidayah Al-Munawarah.
        </p>

        <div class="row mt-5 text-center">
            <!-- Contoh 2 berita, bisa ditambah -->
            <div class="col-md-4">
                <div class="card mt-4" style="width: 20rem">
                    <img src="{{ asset('img/head1.jpg') }}" class="card-img-top" alt="Berita 1">
                    <div class="card-body">
                        <h5 class="card-title">Berita</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="#" class="btn btn-blue">Lihat Berita</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mt-4" style="width: 20rem">
                    <img src="{{ asset('img/head2.jpg') }}" class="card-img-top" alt="Berita 2">
                    <div class="card-body">
                        <h5 class="card-title">Berita</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="#" class="btn btn-blue">Lihat Berita</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mt-4" style="width: 20rem">
                    <img src="{{ asset('img/head2.jpg') }}" class="card-img-top" alt="Berita 2">
                    <div class="card-body">
                        <h5 class="card-title">Berita</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="#" class="btn btn-blue">Lihat Berita</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
