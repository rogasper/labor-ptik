<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $data = [
            'nav' => 'user-atur',
            'title' => 'Manajemen User'
        ];

        return view('admin/user/pengaturan/index', $data);
    }

    public function confirmindex()
    {
        $data = [
            'nav' => 'user-konfir',
            'title' => 'Konfirmasi User'
        ];

        return view('admin/user/konfirmasi/index', $data);
    }

    public function resetindex()
    {
        $data = [
            'nav' => 'user-reset',
            'title' => 'Konfirmasi Reset Password User'
        ];

        return view('admin/user/reset/index', $data);
    }

    public function confirmAccount($username)
    {
        $user = $this->userModel->where('username', $username)->first();
        $user['is_verified'] = 1;
        $this->userModel->save($user);
        session()->setFlashdata('sukses', '<strong>' . $user['nama'] . '</strong> berhasil dikonfirmasi');
        return redirect()->to('/admin/userconfirm');
    }

    public function confirmReset($username)
    {
        $user = $this->userModel->where('username', $username)->first();
        $user['reset_password'] = 1;
        $user['request_reset'] = 0;
        $this->userModel->save($user);
        session()->setFlashdata('sukses', 'Permintaan reset password <strong>' . $user['nama'] . '</strong> berhasil dikonfirmasi');
        return redirect()->to('/admin/userreset');
    }

    public function getTable()
    {
        if ($this->request->isAJAX()) {
            $userData = [];
            $user = $this->userModel->find();
            // to blank password
            foreach ($user as $us) {
                $us['password'] = '';
                array_push($userData, $us);
            }
            $data = [
                'list' => $userData
            ];
            $hasil = [
                'data' => view('admin/user/pengaturan/table', $data)
            ];
            return $this->response->setJSON($hasil);
        } else {
            exit('bukan dari AJAX');
        }
    }

    public function getTableConfirm()
    {
        if ($this->request->isAJAX()) {
            $userData = [];
            $user = $this->userModel->where('is_verified', 0)->findAll();
            // to blank password
            foreach ($user as $us) {
                $us['password'] = '';
                array_push($userData, $us);
            }
            $data = [
                'list' => $userData
            ];
            $hasil = [
                'data' => view('admin/user/konfirmasi/table', $data)
            ];
            return $this->response->setJSON($hasil);
        } else {
            exit('bukan dari AJAX');
        }
    }

    public function getTableReset()
    {
        if ($this->request->isAJAX()) {
            $userData = [];
            $user = $this->userModel->where('request_reset', 1)->findAll();
            // to blank password
            foreach ($user as $us) {
                $us['password'] = '';
                array_push($userData, $us);
            }
            $data = [
                'list' => $userData
            ];
            $hasil = [
                'data' => view('admin/user/reset/table', $data)
            ];
            return $this->response->setJSON($hasil);
        } else {
            exit('bukan dari AJAX');
        }
    }

    public function detail($username)
    {
        $user = $this->userModel->where('username', $username)->find();
        $data = [
            'nav' => 'user-atur',
            'title' => 'Manajemen User',
            'user' => $user[0]
        ];

        return view('admin/user/pengaturan/detail', $data);
    }

    public function getEditForm($username)
    {
        if ($this->request->isAJAX()) {
            $item = $this->userModel->where('username', $username)->first();
            $data = [
                'id' => $item['id'],
                'avatar' => $item['avatar'],
                'nama' => $item['nama'],
                'email' => $item['email'],
                'role' => $item['role'],
                'username' => $item['username'],
                'jenis_kelamin' => $item['jenis_kelamin'],
                'telepon' => $item['telepon'],
                'alamat' => $item['alamat'],
                'tempat_lahir' => $item['tempat_lahir'],
                'tanggal_lahir' => $item['tanggal_lahir'],
                'is_verified' => $item['is_verified'],
                'civitas' => $item['civitas'],
            ];
            $hasil = [
                'data' => view('admin/user/pengaturan/editform', $data)
            ];
            return $this->response->setJSON($hasil);
        } else {
            exit('bukan dari AJAX');
        }
    }

    public function getResetForm($username)
    {
        if ($this->request->isAJAX()) {
            $user = $this->userModel->find($username);
            $data = [
                'id' => $user['id']
            ];
            $hasil = [
                'data' => view('admin/user/pengaturan/resetform', $data)
            ];
            return $this->response->setJSON($hasil);
        } else {
            exit('bukan dari AJAX');
        }
    }

    public function resetPassword($username)
    {
        $validasi = \Config\Services::validation();
        $valid = $this->validate([
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']
            ],
            'repassword' => [
                'label' => 'Ulang password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'matches' => '{field} tidak sesuai dengan password baru'
                ]
            ],
        ]);

        if (!$valid) {
            $pesan = [
                'error' => [
                    'password' => $validasi->getError('password'),
                    'repassword' => $validasi->getError('repassword'),
                ]
            ];
            return $this->response->setJSON($pesan);
        } else {
            $input = [
                'id' => $username,
                'password' => md5($this->request->getPost('password')),
            ];
            $this->userModel->save($input);
            $pesan = [
                'sukses' => 'Password Berhasil diganti'
            ];
            return $this->response->setJSON($pesan);
        }
    }

    public function update($id)
    {
        $validasi = \Config\Services::validation();
        $valid = $this->validate([
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[users.email, id, {id}]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[users.username, id, {id}]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
        ]);

        if (!$valid) {
            $pesan = [
                'error' => [
                    'nama' => $validasi->getError('nama'),
                    'username' => $validasi->getError('username'),
                    'email' => $validasi->getError('email'),
                ]
            ];
            return $this->response->setJSON($pesan);
        } else {
            if ($this->request->getFile('avatar')->getName() != '') {
                $foto = $this->request->getFile('avatar');
                $namafoto = $foto->getRandomName();
                $foto->move(ROOTPATH . 'public/images/avatar', $namafoto);
            } else {
                $namafoto = $this->request->getPost('avalama');
            }
            $input = [
                'id' => $id,
                'avatar' => $namafoto,
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'role' => $this->request->getPost('role'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'telepon' => $this->request->getPost('telepon'),
                'alamat' => $this->request->getPost('alamat'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'is_verified' => $this->request->getPost('is_verified'),
                'civitas' => $this->request->getPost('civitas'),
            ];
            $this->userModel->save($input);
            $pesan = [
                'sukses' => 'User berhasil diubah'
            ];
            return $this->response->setJSON($pesan);
        }
    }
}
