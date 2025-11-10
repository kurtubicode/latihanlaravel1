<?php

namespace App\Http\Controllers;

use App\M_User;
use Illuminate\Http\Request;

class C_Register extends Controller
{
    // protected $M_user // Menyimpan instance dari model M_User
    protected $M_User;

    public function __construct($M_User)
    {
        $this->M_User = $M_User;
    }

    public function index()
    {
        return view('v_register');
    }

    public function register(Request $request)
    {
        $alertScript = "<script>alert('Registrasi User Berhasil!');</script>";
        $id = '';
        $email_verified_at = '';

        $data = [
            'id' => null,
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => null,
            'password' => $request->password,
            'remember_token' => null,
            'created_at' => null,
            'updated_at' => null,
            'level' => $request->level,
        ];

        $this->M_User->registerData($data);

        return redirect()->route('root')
            ->with('alertScript2', $alertScript);
    }
}
