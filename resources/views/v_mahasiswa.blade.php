{{-- @include('layout.v_template') --}}

@extends('layout.v_template')
@section('bodyclass')
    class="sb-nav-fixed"
@endsection

@section('title')
    {{ $judul_halaman }}
@endsection

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ $judul_halaman }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active">{{ $judul_halaman }}</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <p>
                        {{ $paragraf }}
                    </p>
                </div>
            </div>
            
        </div>
    </main>
@endsection
