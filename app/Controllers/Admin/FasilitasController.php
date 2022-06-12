<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FasilitasModel;

class FasilitasController extends BaseController
{
    protected $fasilitasModel;
    public function __construct()
    {
        $this->fasilitasModel = new FasilitasModel();
    }
    public function index()
    {
        $data = [
            'nav' => 'fasilitas',
            'title' => 'Manajemen Fasilitas'
        ];

        return view('admin/fasilitas/index', $data);
    }

    public function getTable()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'list' => $this->fasilitasModel->find()
            ];
            $hasil = [
                'data' => view('admin/fasilitas/table', $data)
            ];
            return $this->response->setJSON($hasil);
        } else {
            exit('bukan dari AJAX');
        }
    }

    public function form()
    {
        if ($this->request->isAJAX()) {
            $hasil = [
                'data' => view('admin/fasilitas/form')
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
            'nama' => [
                'label' => 'Nama Fasilitas',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal 3 karakter'
                ]
            ],
            'jumlah' => [
                'label' => 'Jumlah',
                'rules' => 'required|greater_than[0]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} tidak boleh 0'
                ]
            ],
        ]);

        if (!$valid) {
            $pesan = [
                'error' => [
                    'nama' => $validasi->getError('nama'),
                    'jumlah' => $validasi->getError('jumlah'),
                ]
            ];
            return $this->response->setJSON($pesan);
        } else {
            $input = [
                'nama' => $this->request->getPost('nama'),
                'jumlah' => $this->request->getPost('jumlah'),
            ];
            $this->fasilitasModel->save($input);
            $pesan = [
                'sukses' => 'Fasilitas Berhasil ditambahkan'
            ];
            return $this->response->setJSON($pesan);
        }
    }

    public function hapus($id)
    {
        if ($this->request->isAJAX()) {
            $this->fasilitasModel->delete($id);
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
            $item = $this->fasilitasModel->find($id);
            $data = [
                'id' => $item['id'],
                'nama' => $item['nama'],
                'jumlah' => $item['jumlah']
            ];
            $hasil = [
                'data' => view('admin/fasilitas/edit', $data)
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
            'nama' => [
                'label' => 'Nama Fasilitas',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal 3 karakter'
                ]
            ],
            'jumlah' => [
                'label' => 'Jumlah',
                'rules' => 'required|greater_than[0]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} tidak boleh 0'
                ]
            ],
        ]);

        if (!$valid) {
            $pesan = [
                'error' => [
                    'nama' => $validasi->getError('nama'),
                    'jumlah' => $validasi->getError('jumlah'),
                ]
            ];
            return $this->response->setJSON($pesan);
        } else {
            $input = [
                'id' => $id,
                'nama' => $this->request->getPost('nama'),
                'jumlah' => $this->request->getPost('jumlah'),
            ];
            $this->fasilitasModel->save($input);
            $pesan = [
                'sukses' => 'Fasilitas Berhasil ditambahkan'
            ];
            return $this->response->setJSON($pesan);
        }
    }
}
