<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function admin()
    {
        $data = [
            'nav' => 'dashboard',
            'title' => 'Dashboard'
        ];
        return view('admin/dashboard/index', $data);
    }
}
