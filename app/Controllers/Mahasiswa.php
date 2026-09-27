<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    public function index()
    {
        $m = new MahasiswaModel();

        $data['mahasiswa'] = $m->findAll();

        return view('mahasiswa/index', $data);
    }

    public function tambah()
    {
        return view('mahasiswa/tambah');
    }

    public function simpan()
    {
        $m = new MahasiswaModel();

        if (! $this->validate([
            'nim' =>'required|min_length[5]|is_unique[mahasiswa.nim]',
            'nama'=>'required|min_length[3]',
            'alamat'=>'required',
        ])) {
            return redirect()
            ->back()
            ->withInput()
            ->with('validasi', $this->validator->getErrors());
        }

        $m->insert([
            'nim'    => $this->request->getPost('nim'),
            'nama'   => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat')
        ]);

        return redirect()
            ->to('mahasiswa')
            ->with('pesan', 'Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $m = new MahasiswaModel();
        $data['mhs'] = $m->find($id);

        if (! $data['mhs']) {
            return redirect()->to('mahasiswa')->with('pesan', 'Data tidak ditemukan');
        }

        return view('mahasiswa/edit', $data);
    }
    public function update($id)
    {
        $m = new MahasiswaModel();
        $mhs = $m->find($id);
        if (! $mhs) {
            return redirect()->to('mahasiswa')->with('pesan', 'Data tidak ditemukan');
        }

        if (! $this->validate([
            'nim' =>"required|min_length[5]|is_unique[mahasiswa.nim,id,{$id}]",
            'nama' =>'required|min_length[3]',
            'alamat' =>'required',
        ])) {
            return redirect()
                ->back()
                ->withInput()
                ->with('validasi', $this->validator->getErrors());
        }

        $m->update($id, [
            'nim' =>$this->request->getPost('nim'),
            'nama' =>$this->request->getPost('nama'),
            'alamat' =>$this->request->getPost('alamat'),
        ]);

        return redirect()
            ->to('mahasiswa')
            ->with('pesan', 'Data berhasil diubah');
    }
    public function hapus($id)
    {
        $m = new MahasiswaModel();
        $mhs = $m->find($id);
        if (! $mhs) {
            return redirect()->to('mahasiswa')->with('pesan', 'Data tidak ditemukan');
        }

        $m->delete($id);

        return redirect()
            ->to('mahasiswa')
            ->with('pesan', 'Data berhasil dihapus');
    }
}