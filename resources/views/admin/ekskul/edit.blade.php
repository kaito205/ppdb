@extends('layouts.admin')

@section('containt')
<div class="container mt-4">

    <h3 class="mb-4">Edit Ekstrakurikuler</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.ekskul.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Ekstrakurikuler</label>
                    <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Saat Ini</label><br>
                    <img src="{{ asset('uploads/ekskul/' . $data->foto) }}"
                        alt="" class="img-thumbnail" width="200">
                </div>

                <div class="mb-3">
                    <label class="form-label">Ganti Foto (optional)</label>
                    <input type="file" name="foto" class="form-control">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                </div>

                <button type="submit" class="btn btn-success px-4">Update</button>
                <a href="{{ route('admin.ekskul') }}" class="btn btn-secondary px-4">Kembali</a>
            </form>

        </div>
    </div>

</div>
@endsection
