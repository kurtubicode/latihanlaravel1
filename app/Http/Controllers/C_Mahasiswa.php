<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Mahasiswa extends Controller
{
    public function index()
    {
        $data = [
            'judul_halaman' => 'Data Mahasiswa',
            'paragraf' => 'Ini adalah konten paragraf yang dikirim dari controller.'
        ];

        // 2. Kirim array $data ke view
        return view('mahasiswa.index', $data);
    }
}
