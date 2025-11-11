<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Pegawai extends Controller
{
    /**
     * Menampilkan halaman utama (dashboard) untuk Admin.
     */
    public function index()
    {
        // Ganti 'admin.dashboard' dengan nama view Blade Anda (misalnya: v_admin)
        return view('pegawai.index');
    }
}
