<?php

namespace App\Http\Controllers;

use App\Models\MDosen;
use Illuminate\Http\Request;

class C_Dosen extends Controller
{
    protected $MDosen;
    public function __construct()
    {
        $this->MDosen = new MDosen();
    }

    public function index()
    {
        $data = [
            'dosens' => $this->MDosen->allData(),
        ];
        return view('dosen.index', $data);
    }

    public function detail($id_dosen)
    {
        if (!$this->MDosen->detailData($id_dosen)) {
            abort(404);
        }
        $data = [
            'dosen' => $this->MDosen->detailData($id_dosen),
        ];
        return view('dosen.v_detail', $data);
    }

    public function add()
    {
        return view('dosen.v_add');
    }

    public function insert()
    {
        request()->validate([
            'nip' => 'required|unique:dosens,nip',
            'nama_dosen' => 'required',
            'mata_kuliah' => 'required',
            'foto_dosen' => 'nullable|image|max:2048',
        ], [
            'nip.required' => 'NIP wajib diisi.',
            'nip.unique' => 'NIP sudah digunakan.',
            'nama_dosen.required' => 'Nama Dosen wajib diisi.',
            'mata_kuliah.required' => 'Mata Kuliah wajib diisi.',
            'foto_dosen.image' => 'Foto Dosen harus berupa gambar.',
            'foto_dosen.max' => 'Ukuran Foto Dosen maksimal 2MB.',
        ]);
        $file = request()->file('foto_dosen');
        $fileName = request()->nip . '.' . $file->extension();
        $file->move(public_path('foto_dosen'), $fileName);

        $data = [
            'nip' => request()->nip,
            'nama_dosen' => request()->nama_dosen,
            'mata_kuliah' => request()->mata_kuliah,
            'foto_dosen' => $fileName,
        ];

        $this->MDosen->addData($data);
        return redirect()->to('/dosen')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id_dosen)
    {
        if (!$this->MDosen->detailData($id_dosen)) {
            abort(404);
        }
        $data = [
            'dosen' => $this->MDosen->detailData($id_dosen),
        ];
        return view('dosen.v_edit', $data);
    }

    public function update($id_dosen)
    {
        request()->validate([
            'nip' => 'required',
            'nama_dosen' => 'required',
            'mata_kuliah' => 'required',
            'foto_dosen' => 'nullable|image|max:2048',
        ], [
            'nip.required' => 'NIP wajib diisi.',
            'nip.min' => 'NIP minimal 17 karakter.',
            'nip.max' => 'NIP maksimal 18 karakter.',
            'nama_dosen.required' => 'Nama Dosen wajib diisi.',
            'mata_kuliah.required' => 'Mata Kuliah wajib diisi.',
            'foto_dosen.image' => 'Foto Dosen harus berupa gambar.',
            'foto_dosen.max' => 'Ukuran Foto Dosen maksimal 2MB.',
        ]);

        if (request()->hasFile('foto_dosen') <> "") {
            $file = request()->file('foto_dosen');
            $fileName = request()->nip . '.' . $file->extension();
            $file->move(public_path('foto_dosen'), $fileName);

            $data = [
                'nip' => request()->nip,
                'nama_dosen' => request()->nama_dosen,
                'mata_kuliah' => request()->mata_kuliah,
                'foto_dosen' => isset($fileName) ? $fileName : null,
            ];
            $this->MDosen->editData($id_dosen, $data);
        } else {
            $data = [
                'nip' => request()->nip,
                'nama_dosen' => request()->nama_dosen,
                'mata_kuliah' => request()->mata_kuliah,
            ];
            $this->MDosen->editData($id_dosen, $data);
        }

        return redirect()->to('/dosen')->with('success', 'Data berhasil diupdate.');
    }

    public function delete($id_dosen)
    {
        $dosen = $this->MDosen->detailData($id_dosen);
        if ($dosen->foto_dosen <> "") {
            unlink(public_path('foto_dosen') . '/' . $dosen->foto_dosen);
        }
        $this->MDosen->deleteData($id_dosen);
        return redirect()->to('/dosen')->with('success', 'Data berhasil dihapus.');
    }
}
