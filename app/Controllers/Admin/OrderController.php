<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LaboratoriumModel;
use App\Models\OrderModel;
use App\Models\UserModel;
use CodeIgniter\Database\Query;

class OrderController extends BaseController
{
    protected $orderModel;
    protected $userModel;
    protected $labModel;
    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->userModel = new UserModel();
        $this->labModel = new LaboratoriumModel();
    }

    public function index()
    {
        $order = $this->orderModel->getAllDataOrderJadwal();

        $data = [
            'nav' => 'reservasi',
            'title' => 'Jadwal Sewa',
            'list' => $order
        ];

        // return json_encode($order);
        // print_r($order);
        return view('admin/reservasi/data/index', $data);
    }

    public function payindex()
    {
        $data = [
            'nav' => 'payment',
            'title' => 'Konfirmasi Pembayaran'
        ];

        return view('admin/reservasi/payment/index', $data);
    }

    public function getTable()
    {

        if ($this->request->isAJAX()) {
            $query = $this->orderModel->getAllDataOrder();
            $data = [
                'list' => $query,
            ];
            $hasil = [
                'data' => view('admin/reservasi/data/table', $data)
            ];

            return $this->response->setJSON($hasil);
        } else {
            exit('bukan dari AJAX');
        }
    }

    public function getPayTable()
    {

        if ($this->request->isAJAX()) {
            $query = $this->orderModel->getAllDataOrderPending();
            $data = [
                'list' => $query,
            ];
            $hasil = [
                'data' => view('admin/reservasi/payment/table', $data)
            ];

            return $this->response->setJSON($hasil);
        } else {
            exit('bukan dari AJAX');
        }
    }

    public function getConfirmForm($id)
    {
        if ($this->request->isAJAX()) {
            $item = $this->orderModel->getAllDataOrderByUsername($id);
            $data = [
                'id' => $id,
                'username' => $item[0]['username'],
                'kode' => $item[0]['kode'],
                'nama' => $item[0]['nama'],
                'nama_lab' => $item[0]['nama_lab'],
                'kategori_lab' => $item[0]['kategori_lab'],
                'tanggal_sewa' => $item[0]['tanggal_sewa'],
                'status' => $item[0]['status'],
                'start_time' => $item[0]['start_time'],
                'end_time' => $item[0]['end_time'],
                'total_harga' => $item[0]['total_harga'],
                'telepon' => $item[0]['telepon']
            ];
            // return json_encode($item);
            $hasil = [
                'data' => view('admin/reservasi/payment/confirmform', $data)
            ];
            return $this->response->setJSON($hasil);
        } else {
            exit('bukan dari AJAX');
        }
    }

    public function getDetailForm($id)
    {
        if ($this->request->isAJAX()) {
            $item = $this->orderModel->getAllDataOrderByUsername($id);
            $data = [
                'id' => $id,
                'username' => $item[0]['username'],
                'kode' => $item[0]['kode'],
                'nama' => $item[0]['nama'],
                'nama_lab' => $item[0]['nama_lab'],
                'kategori_lab' => $item[0]['kategori_lab'],
                'tanggal_sewa' => $item[0]['tanggal_sewa'],
                'status' => $item[0]['status'],
                'start_time' => $item[0]['start_time'],
                'end_time' => $item[0]['end_time'],
                'total_harga' => $item[0]['total_harga'],
                'telepon' => $item[0]['telepon']
            ];
            // return json_encode($item);
            $hasil = [
                'data' => view('admin/reservasi/data/confirmform', $data)
            ];
            return $this->response->setJSON($hasil);
        } else {
            exit('bukan dari AJAX');
        }
    }

    public function confirmPayment($id)
    {
        $order = $this->orderModel->find($id);
        $order['status'] = 'lunas';
        $this->orderModel->save($order);
        session()->setFlashdata('sukses', 'Kode sewa <strong>' . $order['kode'] . '</strong> berhasil konfirmasi sewa');
        return redirect()->to('/admin/paymentreservasi');
    }

    public function cancelPayment($id)
    {
        $order = $this->orderModel->find($id);
        $order['status'] = 'cancel';
        $this->orderModel->save($order);
        session()->setFlashdata('sukses', 'Kode sewa<strong>' . $order['kode'] . '</strong> berhasil dibatalkan');
        return redirect()->to('/admin/paymentreservasi');
    }
}
