<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\M_Dosen;
use DB; // Menggunakan facade DB
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\DB; // Pastikan ini juga ada
// ... (Controller lainnya)
class C_Login extends Controller
{
    function index()
    {
        return view("v_login");
    }

    function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Mengambil nilai tabel menggunakan metode binding sql yang langsung
        // ke data DB select
        $data = DB::select("SELECT name, password, level FROM users WHERE email = ? AND password = ?", [$email, $password]);

        // Memeriksa apakah data ditemukan
        if (!empty($data)) {
            $user = $data[0]; // Ambil data user pertama

            // Set session user
            session()->put('user', $user);

            // Pesan session
            session()->flash('login_success', 'Berhasil login sebagai ' . $user->name . '.');
            
            // Script Alert yang digunakan
            $user->name = "<script>alert('Berhasil login sebagai {$user->name}');</script>";

            // Redirect based on user level
            switch ($user->level) {
                case 'admin':
                    return redirect()->route('admin.index')
                        ->with('alertScript', $user->name);
                case 'pegawai':
                    return redirect()->route('pegawai.index')
                        ->with('alertScript', $user->name);
                case 'mahasiswa':
                    return redirect()->route('mahasiswa.index')
                        ->with('alertScript', $user->name);
                case 'dosen':
                    return redirect()->route('dosen.index')
                        ->with('alertScript', $user->name);
                default:
                    return 'Invalid user level';
            }
        } else {
            // Jika tidak ada data, kembalikan pesan kesalahan atau lakukan tindakan lain
            // return 'User tidak ditemukan';
            return dd($data);
        }
    }

    public function logout(Request $request)
    {
        // Hapus data session
        session()->flush();

        // Redirect to login page
        return redirect()->route('root')
            ->with('status', 'Logout Berhasil');
    }
}