<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
    }

    public function index()
    {
        $data = [
            'nav' => 'dashboard',
        ];
        return view('index', $data);
    }
    public function tim()
    {
        $data = [
            'nav' => 'tim'
        ];
        return view('tim', $data);
    }

    public function kontak()
    {
        $data = [
            'nav' => 'kontak'
        ];
        return view('kontak', $data);
    }

    public function admin()
    {
        $builder = $this->db->table('orders');
        $totalPesanan = $builder->selectCount('id');
        $dataTotalPesanan = $totalPesanan->countAll();

        // total member
        $tm = $this->db->table('users');
        $tm = $tm->selectCount('id');
        $totalMember = $tm->countAll();

        // total keuntungan
        $tk = $this->db->table('orders');
        $tk = $tk->selectSum('total_harga');
        $totalKeuntungan = $tk->get()->getResultArray();

        // Total Lab
        $tl = $this->db->table('labs');
        $tl = $tl->selectCount('id');
        $totalLabs = $tl->countAll();

        // data chart
        // grafik total sewa
        $month = $this->db->query("SELECT MONTH(tanggal_sewa) MONTH, COUNT(*) COUNT FROM orders WHERE YEAR(tanggal_sewa)=" . date('Y') . " GROUP BY MONTH(tanggal_sewa)")->getResultArray();

        // grafik kategori lab
        $kategori = $this->db->query("SELECT labs.kategori_lab, sum(orders.total_harga) as jumlah from orders left join labs on orders.labs_id = labs.id group by orders.id, labs.kategori_lab")->getResultArray();

        // anggota
        $member = $this->db->query("SELECT MONTH(created_at) MONTH, COUNT(*) COUNT FROM users WHERE YEAR(created_at)=" . date('Y') . " GROUP BY MONTH(created_at)")->getResultArray();

        $data = [
            'nav' => 'dashboard',
            'title' => 'Dashboard',
            'totalOrder' => $dataTotalPesanan,
            'totalMember' => $totalMember,
            'uang' => $totalKeuntungan,
            'totalLab' => $totalLabs,
            'month' => json_encode($month),
            'kategori' => json_encode($kategori),
            'member' => json_encode($member)
        ];
        return view('admin/dashboard/index', $data);
        // return json_encode($kategori);
    }
}
