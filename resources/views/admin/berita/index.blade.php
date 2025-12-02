@extends('layouts.admin')

@section('containt')
<div class="container mt-4">
    <h3>Data Berita</h3>

    <a href="{{ route('berita.create') }}" class="btn btn-success mb-3">Tambah Berita</a>

    <table class="table table-bordered">
        <tr>
            <th>Judul</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>

        @foreach ($berita as $b)
        <tr>
            <td>{{ $b->judul }}</td>
            <td>
                @if ($b->gambar)
                    <img src="{{ asset('uploads/berita/'.$b->gambar) }}" width="120">
                @endif
            </td>
            <td>
                <a href="{{ route('berita.edit', $b->id) }}" class="btn btn-warning">Edit</a>

                <form action="{{ route('berita.delete', $b->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Hapus berita?')" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{ $berita->links() }}
</div>
@endsection
