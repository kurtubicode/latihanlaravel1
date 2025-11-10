@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Dosen</h2>

    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control" value="{{ old('nip', $dosen->nip) }}" required>
        </div>

        <div class="mb-3">
            <label>Nama Dosen</label>
            <input type="text" name="nama_dosen" class="form-control" value="{{ old('nama_dosen', $dosen->nama_dosen) }}" required>
        </div>

        <div class="mb-3">
            <label>Mata Kuliah</label>
            <input type="text" name="mata_kuliah" class="form-control" value="{{ old('mata_kuliah', $dosen->mata_kuliah) }}" required>
        </div>

        <div class="mb-3">
            <label>Foto Dosen</label><br>
            @if($dosen->foto_dosen)
                <img src="{{ asset('uploads/foto_dosen/' . $dosen->foto_dosen) }}" width="80" class="mb-2">
            @endif
            <input type="file" name="foto_dosen" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
