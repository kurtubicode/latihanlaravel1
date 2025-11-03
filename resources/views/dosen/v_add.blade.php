@extends('layout.v_template')

@section('content')
<div class="container mt-4">
    <h2>Tambah Dosen</h2>

    <form action="{{ url('/dosen/insert') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control" value="{{ old('nip') }}" required>
        </div>

        <div class="mb-3">
            <label>Nama Dosen</label>
            <input type="text" name="nama_dosen" class="form-control" value="{{ old('nama_dosen') }}" required>
        </div>

        <div class="mb-3">
            <label>Mata Kuliah</label>
            <input type="text" name="mata_kuliah" class="form-control" value="{{ old('mata_kuliah') }}" required>
        </div>

        <div class="mb-3">
            <label>Foto Dosen</label>
            <input type="file" name="foto_dosen" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ url('/dosen') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
