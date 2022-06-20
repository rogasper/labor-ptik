<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'nav' => 'dashboard'
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
        $data = [
            'nav' => 'dashboard',
            'title' => 'Dashboard'
        ];
        return view('admin/dashboard/index', $data);
    }
}
