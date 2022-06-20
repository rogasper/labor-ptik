<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;
use App\Models\OrderModel;

class SewaController extends BaseController
{
    protected $orderModel;
    public function __construct()
    {
        $this->orderModel = new OrderModel();
    }

    public function index()
    {
        $order = $this->orderModel->getAllDataOrderJadwal();
        $data = [
            'nav' => 'sewa',
            'title' => 'Sewa Laboratorium',
            'list' => $order
        ];
        return view('member/sewa/index', $data);
    }

    public function software()
    {
        // $order = $this->orderModel->getAllDataOrderJadwal();
        $data = [
            'nav' => 'sewa',
            'title' => 'Software Engineering'
        ];
        return view('member/sewa/software', $data);
    }
}
