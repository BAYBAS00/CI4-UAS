<?php

namespace App\Controllers;

use App\Models\MatkulModel;
use App\Models\UserModel;

class Matkul extends BaseController
{
    protected $matkul;
    protected $user;
    protected $rules;

    public function __construct()
    {
        $this->matkul = new MatkulModel();
        $this->user = new UserModel();

        
        $this->rules = [
            'id_user' => 'required',
            'nama_matkul' => 'required',
            'sks' => 'required',
            'semester' => 'required'
        ];
    }

    public function index()
    {
        if (!session()->get('username')) {
            return redirect()->route('Login::index');
        }

        $dosen = $this->matkul->join('user', 'user.id_user = matkul.id_user');
        if (session()->get('hak_akses') == 2) {
            $dosen->where('matkul.id_user', session()->id_user);
        }
        $data = [
            'data' => $dosen->paginate('5', 'matkul'),
            'title' => 'Data Mata Kuliah',
            'pager' => $this->matkul->pager,
        ];
        return view('matkul/index', $data);
    }


    public function tambah()
    {
        if (!session()->get('username')) {
            return redirect()->route('Login::index');
        }
        
        $data = [
            'title' => 'Tambah Data Mata Kuliah',
            'user' => $this->user->where('hak_akses', 2)->findAll()
        ];
        return view('matkul/tambah', $data);
    }

    public function save()
    {
        if (!session()->get('username')) {
            return redirect()->route('Login::index');
        }

        $data = $this->request->getPost();
        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->matkul->save($data);
        return redirect()->route('Matkul::index')->with('message', 'Tambah Data Berhasil');
    }

    public function edit($id)
    {
        if (!session()->get('username')) {
            return redirect()->route('Login::index');
        }

        $data = [
            'title' => 'Edit Data Mata Kuliah',
            'data' => $this->matkul->join('user', 'user.id_user = matkul.id_user')
                ->findAll(),
            'matkul' => $this->matkul->find($id),
            'user' => $this->user->where('hak_akses', 2)->findAll()
        ];

        return view('matkul/edit', $data);
    }

    public function update($id)
    {
        if (!session()->get('username')) {
            return redirect()->route('Login::index');
        }

        $data = $this->request->getPost();
        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->matkul->update($id, $data);

        return redirect()->route('Matkul::index')->with('message', 'Ubah Data Berhasil');
    }

    public function hapus($id)
    {
        if (!session()->get('username')) {
            return redirect()->route('Login::index');
        }

        $this->matkul->delete($id);
        return redirect()->route('Matkul::index')->with('message', 'Hapus Data Berhasil');
    }

    
}
