<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_About extends Controller
{
    public function index($nama_pt)
    {
        $data = [
            'judul_halaman' => 'About Us',
            'nama_pt' => $nama_pt,
            'alamat'=> 'Cibogo, Subang'
        ];

        return view('v_about', $data);
    }
}
