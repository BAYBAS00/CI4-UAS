<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $user;
    protected $rules;

    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function index()
    {
        if (!session()->get('username')) {
            return redirect()->route('Login::index');
        }
        $data = [
            'data' => $this->user->paginate('5', 'user'),
            'title' => 'Data User',
            'pager' => $this->user->pager,
        ];
        return view('user/index', $data);
    }

    public function tambah()
    {
        if (!session()->get('username')) {
            return redirect()->route('Login::index');
        }
        return view('user/tambah', ['title' => 'Tambah Data User']);
    }

    public function save()
    {
        if (!session()->get('username')) {
            return redirect()->route('Login::index');
        }
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'email' => $this->request->getVar('email'),
            'hak_akses' => $this->request->getVar('hak_akses'),
            'name' => $this->request->getVar('name'),
            'no_telp' => $this->request->getVar('no_telp'),
            'alamat' => $this->request->getVar('alamat'),
            'status' => $this->request->getVar('status'),
            'kode' => $this->request->getVar('kode')

        ];
        if (!$this->validateData($data, [
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'hak_akses' => 'required',
            'name' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'status' => 'required',
            'kode' => 'required',
        ])) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->user->save($data);
        return redirect()->route('User::index')->with('message', 'Tambah Data Berhasil');
    }

    public function edit($id)
    {
        if (!session()->get('username')) {
            return redirect()->route('Login::index');
        }
        $data = [
            'title' => 'Edit Data User',
            'user' => $this->user->find($id),
        ];

        return view('user/edit', $data);
    }

    public function update($id)
    {
        if (!session()->get('username')) {
            return redirect()->route('Login::index');
        }
        $data = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'hak_akses' => $this->request->getVar('hak_akses'),
            'name' => $this->request->getVar('name'),
            'no_telp' => $this->request->getVar('no_telp'),
            'alamat' => $this->request->getVar('alamat'),
            'status' => $this->request->getVar('status'),
            'kode' => $this->request->getVar('kode')

        ];
        if (!$this->validateData($data, [
            'username' => 'required',
            'email' => 'required',
            'hak_akses' => 'required',
            'name' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'kode' => 'required'
        ])) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        if ($this->request->getVar('password')) {
            $data['password'] = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }

        $this->user->update($id, $data);

        return redirect()->route('User::index')->with('message', 'Ubah Data Berhasil');
    }

    public function hapus($id)
    {
        if (!session()->get('username')) {
            return redirect()->route('Login::index');
        }
        $this->user->delete($id);
        return redirect()->route('User::index')->with('message', 'Hapus Data Berhasil');
    }
}
