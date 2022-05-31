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
        return view('admin/index');
    }
}
