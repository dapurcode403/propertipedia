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

    public function add()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('unit_bekas/modalTambah'),
            ];
            echo json_encode($msg);
        } else {
            exit('Data tidak dapat diproses');
        }
    }

    public function save()
    {
        if ($this->request->isAjax()) {
            $tanggal = $this->request->getPost('tglAktivitas');
            $lat = $this->request->getPost('lat');
            $long = $this->request->getPost('long');
            $nama_kontak = $this->request->getPost('nama_kontak');
            $no_wa = $this->request->getPost('no_wa');
            $alamat = $this->request->getPost('alamat');
            $catatan = $this->request->getPost('catatan');
            $ins_by = session('id');

            $image = $this->request->getVar('imagecam');
            if ($image) {
                $image = str_replace('data:image/jpeg;base64,', '', $image);
                $image = base64_decode($image, true);
                $filename = session('id') . '-' . date('YmdHis') . '.' . 'jpg';
                file_put_contents(FCPATH . 'assets/img/scnd_unit/' . $filename, $image);
            } else {
                $filename = '';
            }


            $data = [

                'tanggal' => tglIndoToSystem($tanggal),
                'foto' => $filename,
                'nama_kontak' => $nama_kontak,
                'no_wa' => $no_wa,
                'alamat' => $alamat,
                'catatan' => $catatan,
                'longitude' => $long,
                'latitude' => $lat,
                'ins_by' => $ins_by,
                'status' => 1,
            ];

            $model = new UnitBekasModel();
            $model->insert($data);

            $msg = [
                'success' => $data,
            ];
            echo json_encode($msg);
        } else {
            exit('Data tidak dapat diproses');
        };
    }

    public function showFoto()
    {
        if ($this->request->isAJAX()) {
            $gambar = $this->request->getPost('gambar');
            $data = [
                'gambar' => $gambar,
            ];
            if ($gambar != '') {
                $msg = [
                    'data' => view('unit_bekas/modalfoto', $data),
                ];
            } else {
                $msg = [
                    'data' => '',
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Data tidak dapat diproses');
        }
    }
}