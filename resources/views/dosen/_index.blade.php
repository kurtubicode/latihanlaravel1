@extends('layout.v_template')

@section('content')
<div class="container mt-4">
    <h2>Daftar Dosen</h2>

    <a href="{{ route('dosen.create') }}" class="btn btn-primary mb-3">+ Tambah Dosen</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama Dosen</th>
                <th>Mata Kuliah</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dosens as $dosen)
                <tr>
                    <td>{{ $dosen->nip }}</td>
                    <td>{{ $dosen->nama_dosen }}</td>
                    <td>{{ $dosen->mata_kuliah }}</td>
                    <td>
                        @if($dosen->foto_dosen)
                            <img src="{{ asset('uploads/foto_dosen/' . $dosen->foto_dosen) }}" width="70" alt="Foto Dosen">
                        @else
                            <small>Tidak ada</small>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data dosen.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
