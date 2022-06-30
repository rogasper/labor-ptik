<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $usermodel;
    public function __construct()
    {
        $this->usermodel = new UserModel();
    }

    public function index()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $remember = $this->request->getPost('rememberme');
        $otentik = $this->usermodel->where(['email' => $email])->first();

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|valid_email|validateUser[email,password]',
                'password' => 'required|validateUser[email,password]'
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'email atau password tidak tepat'
                ],
                'email' => [
                    'validateUser' => 'email atau password tidak tepat'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                return view('login', [
                    "validation" => $this->validator,
                    "email" => $email
                ]);
            } else {
                if ($otentik['is_verified'] == 1) {
                    if ($otentik) {
                        $sesi = [
                            'email' => $otentik['email'],
                            'username' => $otentik['username'],
                            'nama' => $otentik['nama'],
                            'avatar' => $otentik['avatar'],
                            'id' => $otentik['id'],
                            'is_verified' => $otentik['is_verified'],
                            'civitas' => $otentik['civitas'],
                            'role' => $otentik['role'],
                            'isLoggedIn' => TRUE
                        ];
                        if (isset($remember)) {
                            $nama = 'username';
                            $nilai = $otentik['username'];
                            $durasi = strtotime('+7 days');
                            $path = '/';
                            setcookie($nama, $nilai, $durasi, $path);
                        }
                        session()->set($sesi);
                        if ($otentik['role'] == 'admin') {
                            return redirect()->to('/admin');
                        } else {
                            return redirect()->to('/');
                        }
                    }
                } else {
                    session()->setFlashdata('warning', 'Akun anda belum terverifikasi. Silahkan hubungi kontak kami untuk pemrosesan lebih cepat');
                    return redirect()->to('/login');
                }
            }
        }
    }

    public function newAccount()
    {
        $validasi = \Config\Services::validation();
        $valid = $this->validate([
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal 8 karakter'
                ]
            ],
            'telepon' => [
                'label' => 'Telepon',
                'rules' => 'required|min_length[8]|numeric',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal 8 karakter',
                    'numeric' => '{field} hanya boleh angka'
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'valid_email' => '{field} tidak valid'
                ]
            ],
            'tanggal_lahir' => [
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'username' => [
                'label' => 'Nama Pengguna',
                'rules' => 'required|is_unique[users.username]|min_length[5]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah digunakan',
                    'min_length' => '{field} minimal 5 karakter',
                ]
            ],
            'password' => [
                'label' => 'Sandi',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal 8 karakter',
                ]
            ],
            'repassword' => [
                'label' => 'Ulang Sandi',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'matches' => '{field} tidak sesuai dengan sandi'
                ]
            ]
        ]);


        if (!$valid) {
            $pesan = [
                'error' => [
                    'nama' => $validasi->getError('nama'),
                    'telepon' => $validasi->getError('telepon'),
                    'email' => $validasi->getError('email'),
                    'username' => $validasi->getError('username'),
                    'password' => $validasi->getError('password'),
                    'repassword' => $validasi->getError('repassword'),
                    'tanggal_lahir' => $validasi->getError('tanggal_lahir'),
                ]
            ];
            return $this->response->setJSON($pesan);
        } else {
            $namafoto = 'default.jpg';
            $civitas = 0;
            $email = $this->request->getPost('email');
            $regex = '/^[A-Za-z0-9._%+-]+@student\.uns.ac.id$/';

            if (preg_match($regex, $email)) {
                $civitas = 1;
            }

            $input = [
                'avatar' => $namafoto,
                'nama' => $this->request->getPost('nama'),
                'email' => $email,
                'username' => $this->request->getPost('username'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'telepon' => $this->request->getPost('telepon'),
                'alamat' => $this->request->getPost('alamat'),
                'password' => md5($this->request->getPost('password')),
                'role' => 'member',
                'tempat_lahir' => '',
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'is_verified' => 0,
                'civitas' => $civitas
            ];
            $this->usermodel->save($input);
            session()->setFlashdata('sukses', 'Anda berhasil mendaftar, tunggu konfirmasi admin atau bisa hubungi kontak kami.');
            $pesan = [
                'sukses' => 'Anda berhasil mendaftar, tunggu konfirmasi admin atau bisa hubungi kontak kami.'
            ];
            return $this->response->setJSON($pesan);
        }
    }

    public function logout()
    {
        session()->destroy();
        $nama = 'username';
        $nilai = '';
        $durasi = strtotime('-7 days');
        $path = '/';
        setcookie($nama, $nilai, $durasi, $path);
        return redirect()->to('/login');
    }

    public function forget()
    {
        return view('request');
    }

    public function requestreset()
    {
        $email = $this->request->getPost('email');
        $user = $this->usermodel->where('email', $email)->first();

        if ($user['reset_password'] == 1) {
            return view('resetform', ['id' => $user['id']]);
        }
        $user['request_reset'] = 1;
        $this->usermodel->save($user);
        session()->setFlashdata('sukses', 'Berhasil mengirimkan permintaan ganti sandi. <br> Tunggu lah beberapa saat dan coba kirim kembali <br>Hubungi kontak kami untuk pemrosesan lebih cepat.');
        return redirect()->to('/forget');
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
        $newUser = new UserModel();

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
                'reset_password' => 0
            ];

            $newUser->save($input);

            $pesan = [
                'sukses' => 'Password Berhasil diganti'
            ];
            session()->setFlashdata('sukses', 'Berhasil direset. Silahkan login kembali dengan sandi baru.');
            return $this->response->setJSON($pesan);
        }
    }
}
