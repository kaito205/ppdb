@extends('layouts.app')

@section('containt')
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h3 class="h1 mt-4">Pendaftaran <span class="text-success">siswa baru</span></h3>

                <p class="mt-3">
                    Selamat datang di sistem pendaftaran daring (online)
                    Penerimaan Siswa Baru di Sekolah Swasta 123  Tahun Ajaran 2024-2025
                </p>

                <a href="" class="btn btn-blue btn-lg rounded-pill">Daftar sekarang</a>
            </div>

            <div class="col-md-6 d-none d-sm-block">
                <img src="{{ asset('img/hero3.png') }}" alt="" class="img-fluid d-block mx-auto" style="max-height: 300px%;">
            </div>
        </div>
    </div>


</section>

<section>

    <div class="container">
        <div class="text-center">
            <h2><span class="text-success">Kenapa di</span> sekolah swasta 123 </h2>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="fasilitas">
                    <div class="description">
                        <h5 class="mt-4">Fasilitsa Lengkap</h5>
                        <p class="">Lorem ipsum, dolor sit amet consectetur adipisicing elit.Architecto, consequatur quaerat! Magnam soluta .</p>
                    </div>
                    <div class="icon-des">
                        <img src="{{ asset('img/open-book.png') }}" alt="fasilitas" class="img-fluid d-block mx-auto" style="max-height: 300px;">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="fasilitas">
                    <div class="description icon-left">
                        <h5 class="mt-4">Fasilitsa Lengkap</h5>
                        <p class="">Lorem ipsum, dolor sit amet consectetur adipisicing elit.Architecto, consequatur quaerat! Magnam soluta .</p>
                    </div>
                    <div class="icon-des">
                        <img src="{{ asset('img/school.png') }}" alt="fasilitas" class="img-fluid d-block mx-auto" style="max-height: 300px;">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="fasilitas">
                    <div class="description">
                        <h5 class="mt-4">Fasilitsa Lengkap</h5>
                        <p class="">Lorem ipsum, dolor sit amet consectetur adipisicing elit.Architecto, consequatur quaerat! Magnam soluta .</p>
                    </div>
                    <div class="icon-des">
                        <img src="{{ asset('img/people.png') }}" alt="fasilitas" class="img-fluid d-block mx-auto" style="max-height: 300px;">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="fasilitas">
                    <div class="description icon-left">
                        <h5 class="mt-4">Fasilitsa Lengkap</h5>
                        <p class="">Lorem ipsum, dolor sit amet consectetur adipisicing elit.Architecto, consequatur quaerat! Magnam soluta .</p>
                    </div>
                    <div class="icon-des">
                        <img src="{{ asset('img/blackboard.png') }}" alt="fasilitas" class="img-fluid d-block mx-auto" style="max-height: 300px;">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="fasilitas">
                    <div class="description">
                        <h5 class="mt-4">Fasilitsa Lengkap</h5>
                        <p class="">Lorem ipsum, dolor sit amet consectetur adipisicing elit.Architecto, consequatur quaerat! Magnam soluta .</p>
                    </div>
                    <div class="icon-des">
                        <img src="{{ asset('img/presentation.png') }}" alt="fasilitas" class="img-fluid d-block mx-auto" style="max-height: 300px;">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="fasilitas">
                    <div class="description icon-left">
                        <h5 class="mt-4">Fasilitsa Lengkap</h5>
                        <p class="">Lorem ipsum, dolor sit amet consectetur adipisicing elit.Architecto, consequatur quaerat! Magnam soluta .</p>
                    </div>
                    <div class="icon-des">
                        <img src="{{ asset('img/secure-shield.png') }}" alt="fasilitas" class="img-fluid d-block mx-auto" style="max-height: 300px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
