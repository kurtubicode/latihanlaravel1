<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MDosen extends Model
{
    use HasFactory;

    protected $table = 'dosens';

    protected $fillable = [
        'nip',
        'nama_dosen',
        'mata_kuliah',
        'foto_dosen',
    ];

    public function allData()
    {
        return DB::table($this->table)->get();
    }

    public function detailData($id_dosen)
    {
        return DB::table($this->table)->where('id', $id_dosen)->first();
    }

    public function addData($data)
    {
        DB::table($this->table)->insert($data);
    }

    public function editData($id_dosen, $data)
    {
        DB::table($this->table)->where('id', $id_dosen)->update($data);
    }

    public function deleteData($id_dosen)
    {
        DB::table($this->table)->where('id', $id_dosen)->delete();
    }
}
