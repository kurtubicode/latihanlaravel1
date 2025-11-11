<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; // import DB

class M_User extends Model
{
    use HasFactory;

    public function registerData($data)
    {
        DB::table('users')->insert($data);
    }
}
