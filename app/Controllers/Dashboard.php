<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Dashboard',
            'isi' => 'dashboard/index',
        ];
        return view('layout/wrapper', $data);
    }
}