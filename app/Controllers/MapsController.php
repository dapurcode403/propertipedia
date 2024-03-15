<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UnitBekasModel;
use CodeIgniter\HTTP\ResponseInterface;

class MapsController extends BaseController
{

    public function index()
    {

        $model = new UnitBekasModel();
        $rumah = $model->findAll();

        $data = [
            'title' => 'Maps',
            'rumah' => $rumah,
            'isi' => 'maps/index',
        ];
        return view('layout/wrapper', $data);
    }
}