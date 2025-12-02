@extends('layouts.admin')

@section('containt')
<div class="container mt-4">
    <h3>Edit Berita</h3>

    <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}" required>
        </div>

        <div class="mb-3">
            <label>Isi Berita</label>
            <textarea name="isi" rows="6" class="form-control" required>{{ $berita->isi }}</textarea>
        </div>

        <div class="mb-3">
            <label>Gambar Baru (optional)</label>
            <input type="file" name="gambar" class="form-control">

            @if ($berita->gambar)
                <img src="{{ asset('uploads/berita/'.$berita->gambar) }}" width="150" class="mt-2">
            @endif
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
