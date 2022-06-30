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
        $page = (int)(($this->request->getVar('page') !== null) ? $this->request->getVar('page') : 1) - 1;
        $perPage = 3;
        $query = new OrderModel();
        $querytotal = $query->getAllDataRiwayatByIdAll($id);

        $query = $query->getAllDataRiwayatById($id, $page, $perPage);

        // return json_encode($query);
        $total = count($querytotal);

        $pager->makeLinks($page, $perPage, $total);

        $data = [
            'nav' => 'riwayat',
            'title' => 'Riwayat Pemesanan',
            'list' => $query,
            'total' => $total,
            'pager' => $pager
        ];

        return view('member/riwayat/index', $data);
    }
}
