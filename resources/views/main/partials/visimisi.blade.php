{{-- ====== VISI & MISI ====== --}}
<section id="visimisi" class="visi-misi py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">VISI & <span class="text-success">MISI</span></span></h2>
            <hr class="w-25 mx-auto border-success">
        </div>

        <div class="row">
            <div class="col-md-12" data-aos="fade-up">

                <h4 class="fw-bold text-success">VISI :</h4>
                <p class="fs-5 fst-italic">
                    "{{ $profil->visi }}"
                </p>

                <h4 class="fw-bold text-success mt-4">MISI :</h4>
                <ul class="fs-5">
                    @foreach (explode("\n", $profil->misi) as $m)
                    <li>{{ $m }}</li>
                    @endforeach
                </ul>

            </div>
        </div>

    </div>
</section>
