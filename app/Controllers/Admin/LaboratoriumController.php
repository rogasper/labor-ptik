<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FasilitasModel;
use App\Models\LaboratoriumModel;

class LaboratoriumController extends BaseController
{
    protected $laboratoriumModel;
    public function __construct()
    {
        $this->laboratoriumModel = new LaboratoriumModel();
    }
    public function index()
    {
        $data = [
            'nav' => 'laboratorium',
            'title' => 'Manajemen Laboratorium'
        ];

        return view('admin/laboratorium/index', $data);
    }

    public function getTable()
    {
        if ($this->request->isAJAX()) {
            $fasilitasModel = new FasilitasModel();
            $data = [
                'list' => $this->laboratoriumModel->find(),
                'fasilitas' => $fasilitasModel->find()
            ];
            $hasil = [
                'data' => view('admin/laboratorium/table', $data)
            ];
            return $this->response->setJSON($hasil);
        } else {
            exit('bukan dari AJAX');
        }
    }

    public function form()
    {
        $fasilitasModel = new FasilitasModel();
        if ($this->request->isAJAX()) {
            $data = [
                'fasilitas' => $fasilitasModel->find()
            ];
            $hasil = [
                'data' => view('admin/laboratorium/form', $data)
            ];
            return $this->response->setJSON($hasil);
        } else {
            exit('bukan dari AJAX');
        }
    }

    public function insert()
    {
        $validasi = \Config\Services::validation();
        $valid = $this->validate([
            'nama_lab' => [
                'label' => 'Nama Laboratorium',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal 3 karakter'
                ]
            ],
            'kapasitas' => [
                'label' => 'Kapasitas',
                'rules' => 'required|greater_than[0]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'greater_than' => '{field} tidak boleh 0'
                ]
            ],
            'harga' => [
                'label' => 'Harga',
                'rules' => 'required|greater_than_equal_to[50000]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'greater_than_equal_to' => '{field} tidak boleh kurang dari Rp.50000'
                ]
            ],
            'fasilitas' => [
                'label' => 'Fasilitas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'foto_lab' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto_lab,4096]',
                'errors' => [
                    'max_size' => '{field} terlalu besar'
                ]
            ]
        ]);

        if (!$valid) {
            $pesan = [
                'error' => [
                    'nama_lab' => $validasi->getError('nama_lab'),
                    'kapasitas' => $validasi->getError('kapasitas'),
                    'harga' => $validasi->getError('harga'),
                    'fasilitas' => $validasi->getError('fasilitas'),
                    'foto_lab' => $validasi->getError('foto_lab'),
                ]
            ];
            return $this->response->setJSON($pesan);
        } else {
            if ($this->request->getFile('foto_lab')->getName() != '') {
                $foto = $this->request->getFile('foto_lab');
                $namafoto = $foto->getRandomName();
                $foto->move(ROOTPATH . 'public/images/lab', $namafoto);
            } else {
                switch ($this->request->getPost('kategori_lab')) {
                    case 'Software Engineering':
                        $namafoto = 'software.jpg';
                        break;
                    case 'Multimedia Studio':
                        $namafoto = 'multimedia.jpg';
                        break;

                    default:
                        $namafoto = 'computernetwork.jpg';
                        break;
                }
            }
            $fasilitasTogether = implode(", ", $this->request->getPost('fasilitas'));
            $input = [
                'nama_lab' => $this->request->getPost('nama_lab'),
                'kapasitas' => $this->request->getPost('kapasitas'),
                'harga' => $this->request->getPost('harga'),
                'fasilitas' => $fasilitasTogether,
                'kategori_lab' => $this->request->getPost('kategori_lab'),
                'foto_lab' => $namafoto,
            ];
            $this->laboratoriumModel->save($input);
            $pesan = [
                'sukses' => 'Fasilitas Berhasil ditambahkan'
            ];
            return $this->response->setJSON($pesan);
        }
    }

    public function hapus($id)
    {
        if ($this->request->isAJAX()) {
            $this->laboratoriumModel->delete($id);
            $pesan = [
                'sukses' => 'Fasilitas berhasil dihapus'
            ];
            return $this->response->setJSON($pesan);
        } else {
            exit('bukan dari AJAX');
        }
    }

    public function edit($id)
    {
        if ($this->request->isAJAX()) {
            $fasilitasModel = new FasilitasModel();
            $item = $this->laboratoriumModel->find($id);
            $fasilitasArray = explode(",", $item['fasilitas']);
            $data = [
                'id_lab' => $item['id'],
                'nama_lab' => $item['nama_lab'],
                'kategori_lab' => $item['kategori_lab'],
                'kapasitas' => $item['kapasitas'],
                'harga' => $item['harga'],
                'foto_lab' => $item['foto_lab'],
                'fasilitas_edit' => json_encode($fasilitasArray),
                'fasilitaslist' => $fasilitasModel->find()
                // 'fasilitas_edit' => $item['fasilitas'],
            ];
            $hasil = [
                'data' => view('admin/laboratorium/edit', $data)
            ];
            return $this->response->setJSON($hasil);
        } else {
            exit('bukan dari AJAX');
        }
    }

    public function update($id)
    {
        $validasi = \Config\Services::validation();
        $valid = $this->validate([
            'nama_lab' => [
                'label' => 'Nama Laboratorium',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal 3 karakter'
                ]
            ],
            'kapasitas' => [
                'label' => 'Kapasitas',
                'rules' => 'required|greater_than[0]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'greater_than' => '{field} tidak boleh 0'
                ]
            ],
            'harga' => [
                'label' => 'Harga',
                'rules' => 'required|greater_than_equal_to[50000]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'greater_than_equal_to' => '{field} tidak boleh kurang dari Rp.50000'
                ]
            ],
            'fasilitas' => [
                'label' => 'Fasilitas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'foto_lab' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto_lab,4096]',
                'errors' => [
                    'max_size' => '{field} terlalu besar'
                ]
            ]
        ]);

        if (!$valid) {
            $pesan = [
                'error' => [
                    'nama_lab' => $validasi->getError('nama_lab'),
                    'kapasitas' => $validasi->getError('kapasitas'),
                    'harga' => $validasi->getError('harga'),
                    'fasilitas' => $validasi->getError('fasilitas'),
                    'foto_lab' => $validasi->getError('foto_lab'),
                ]
            ];
            return $this->response->setJSON($pesan);
        } else {
            if ($this->request->getFile('foto_lab')->getName() != '') {
                $foto = $this->request->getFile('foto_lab');
                $namafoto = $foto->getRandomName();
                $foto->move(ROOTPATH . 'public/images/lab', $namafoto);
            } else {
                $namafoto = $this->request->getPost('foto_lablama');
            }
            $fasilitasTogether = implode(", ", $this->request->getPost('fasilitas'));
            $input = [
                'id' => $id,
                'nama_lab' => $this->request->getPost('nama_lab'),
                'kapasitas' => $this->request->getPost('kapasitas'),
                'harga' => $this->request->getPost('harga'),
                'fasilitas' => $fasilitasTogether,
                'kategori_lab' => $this->request->getPost('kategori_lab'),
                'foto_lab' => $namafoto,
            ];
            $this->laboratoriumModel->save($input);
            $pesan = [
                'sukses' => 'Fasilitas Berhasil ditambahkan'
            ];
            return $this->response->setJSON($pesan);
        }
    }
}
