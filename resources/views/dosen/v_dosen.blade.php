{{-- @include('layout.v_template') --}}

@extends('layout.v_template')
@section('bodyclass')
    class="sb-nav-fixed"
@endsection

@section('title')
    Page Home
@endsection

@section('content')
    <main>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Table widh defalut features</h3>
            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered table-striped">
                    @if (session('pesan'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismis="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Success</h5>
                            {{ session('pesan') }}
                        </div>

                    @endif

                    <div align="right">
                        {{-- <a href="" class="btn btn-sm btn-primary">Add Data</a><br> --}}
                        <a href="/dosen/add" class="btn btn-primary">Add Data</a>

                    </div>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama Dosen</th>
                            <th>Mata Kuliah</th>
                            <th>Foto Dosen</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        @foreach ($dosens as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nip }}</td>
                                <td>{{ $data->nama_dosen }}</td>
                                <td>{{ $data->mata_kuliah }}</td>
                                <td><img src="{{ url('foto_dosen/' . $data->foto_dosen) }}" width="100px" alt=""></td>
                                <td>
                                    <a href="dosen/detail/{{ $data->id }}" class="btn btn-sm btn-success">Detail</a>
                                    <a href="/dosen/edit/{{ $data->id }}" class="btn btn-sm btn-warning">Edit</a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#delete{{ $data->id }}">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama Dosen</th>
                            <th>Mata Kuliah</th>
                            <th>Foto Dosen</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
                @foreach ($dosens as $data)
                    <div class="modal fade" id="delete{{ $data->id }}">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content bg-danger">
                                <div class="modal-header">
                                    <h6 class="modal-title">{{ $data->nama_dosen }}</h6>
                                    <button type="button" class="close" data-dismis="modal" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah anda ingin menghapus data ini?</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <a href="/dosen/delete/{{ $data->id }}" class="btn btn-outline-light">Yes</a>
                                    <button type="button" class="btn btn-outline-light" data-dismis="modal">
                                        No
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </main>
@endsection