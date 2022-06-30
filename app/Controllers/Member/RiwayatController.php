<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;
use App\Models\OrderModel;

class RiwayatController extends BaseController
{

    public function index($id)
    {
        if (session()->get('id') != $id) {
            return redirect('/');
        }
        $pager = \Config\Services::pager();
        $page = 2;
        $perPage = 0;
        $query = new OrderModel();


        $query = $query->getAllDataRiwayatById($id, $page, $perPage);
        $total = count($query);

        $data = [
            'nav' => 'riwayat',
            'title' => 'Riwayat Pemesanan',
            'list' => $query,
            'total' => $total
        ];

        return view('member/riwayat/index', $data);
    }
}
