<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UnitBekasModel;
use CodeIgniter\HTTP\ResponseInterface;

class UnitBekasController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Unit Bekas',
            'isi' => 'unit_bekas/index',
        ];
        return view('layout/wrapper', $data);
    }

    public function listData()
    {
        if ($this->request->isAjax()) {
            $model = new UnitBekasModel();
            $data = [
                'un_b' => $model->where('status', 1)->findAll(),
            ];
            $msg = [
                'data' => view('unit_bekas/data', $data),
            ];
            echo json_encode($msg);
        } else {
            exit('Data tidak dapat diproses');
        };
    }
}