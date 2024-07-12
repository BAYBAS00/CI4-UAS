<?php

// app/Controllers/Kehadiran.php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\MatkulModel;
use App\Models\KehadiranModel;

class Kehadiran extends BaseController
{
    protected $matkul;
    protected $user;
    protected $kehadiran;
    protected $rules;

    public function __construct()
    {
        $this->matkul = new MatkulModel();
        $this->user = new UserModel();
        $this->kehadiran = new KehadiranModel();

        $this->rules = [
            'id_matkul' => 'required',
            'tgl_hadir' => 'required',
            'absensi' => 'required'
        ];
    }

    public function index()
    {
        // if (!session()->get('username')) {
        //     return redirect()->route('Login::index');
        // }
        $dosen = $this->kehadiran->join('user', 'user.id_user = kehadiran.id_user', 'left')
            ->join('matkul', 'matkul.id_matkul = kehadiran.id_matkul', 'left');
        if (session()->get('hak_akses') == 2) {
            $dosen->where('kehadiran.id_user', session()->id_user);
        }
        $data = [
            'data' => $dosen->paginate('5', 'kehadiran'),
            'title' => 'Data Kehadiran',
            'pager' => $this->kehadiran->pager,
        ];
        return view('kehadiran/index', $data);
    }


    public function tambah()
    {
        $id_user = session()->get('id_user');
        $data = [
            'title' => 'Kehadiran',
            'user' => $this->user->findAll(),
            'matkul' => $this->matkul->where('id_user', $id_user)->findAll()
        ];
        return view('kehadiran/tambah', $data);
    }

    public function save()
    {

        $data = $this->request->getPost();
        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $data['id_user'] = session()->get('id_user');

        $this->kehadiran->save($data);
        return redirect()->route('Kehadiran::index')->with('message', 'Kehadiran Tersimpan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Kehadiran',
            'data' => $this->kehadiran
                ->join('user', 'user.id_user = kehadiran.id_user')
                ->join('matkul', 'matkul.id_matkul = kehadiran.id_matkul')
                ->findAll(),
            'kehadiran' => $this->kehadiran->find($id),
            'matkul' => $this->matkul->findAll(),
            'user' => $this->user->findAll()
        ];

        return view('kehadiran/edit', $data);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->kehadiran->update($id, $data);

        return redirect()->route('Kehadiran::index')->with('message', 'Ubah Data Berhasil');
    }

    public function hadir($id)
    {
        $kehadiran = $this->kehadiran
            ->join('user', 'user.id_user = kehadiran.id_user')
            ->join('matkul', 'matkul.id_matkul = kehadiran.id_matkul')->find($id);

        $nama_matkul = $kehadiran['nama_matkul'];
        $name = $kehadiran['name'];
        $semester = $kehadiran['semester'];
        $absensi = $kehadiran['absensi'];
        $catatan = $kehadiran['catatan'];
        $tanggal = $kehadiran['tgl_hadir'];

        $token = getenv('TOKEN_BOT'); //token bot
        $datas = [
            'text' => "Dosen $name dengan Mata Kuliah $nama_matkul untuk Semester $semester pada $tanggal akan $absensi. Catatan: $catatan",
            'chat_id' => getenv('CHAT_ID')  //contoh bot, group id -442697126
        ];

        file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($datas));

        return redirect()->route('Kehadiran::index')->with('message', 'Notifikasi Terkirim!');
    }

    public function hapus($id)
    {
        $this->kehadiran->delete($id);
        return redirect()->route('Kehadiran::index')->with('message', 'Hapus Data Berhasil');
    }
}
