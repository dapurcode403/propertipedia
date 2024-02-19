<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DeveloperModel;
use App\Models\PerumahanModel;
use CodeIgniter\HTTP\ResponseInterface;

class PerumahanController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Perumahan',
            'isi' => 'perumahan/index',
        ];
        return view('layout/wrapper', $data);
    }

    public function listData()
    {
        if ($this->request->isAjax()) {
            $model = new PerumahanModel();
            $data = [
                'perumahan' => $model->where('status', 1)->findAll(),
            ];
            $msg = [
                'data' => view('perumahan/data', $data),
            ];
            echo json_encode($msg);
        } else {
            exit('Data tidak dapat diproses');
        };
    }

    public function add()
    {
        if ($this->request->isAJAX()) {

            $model = new DeveloperModel();
            $developer = $model->where('status_dev', 1)->orderBy('nama_dev')->get()->getResultArray();

            $data = [
                'developer' => $developer
            ];

            $msg = [
                'data' => view('perumahan/modalTambah', $data),
            ];
            echo json_encode($msg);
        } else {
            exit('Data tidak dapat diproses');
        }
    }

    public function save()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama_per' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],

                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],

                'lat' => [
                    'label' => 'Latitude',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],

                'long' => [
                    'label' => 'Longitude',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],

            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_per' => $validation->getError('nama_per'),
                        'alamat' => $validation->getError('alamat'),
                        'lat' => $validation->getError('lat'),
                        'long' => $validation->getError('long'),

                    ]
                ];
                echo json_encode($msg);
            } else {

                $data = [
                    'id_dev' => $this->request->getPost('id_dev'),
                    'nama' => $this->request->getPost('nama_per'),
                    'alamat' => $this->request->getPost('alamat'),
                    'no_telp' => $this->request->getPost('notlp'),
                    'latitude' => $this->request->getPost('lat'),
                    'longitude' => $this->request->getPost('long'),
                    'status' => 1,
                ];

                $model = new PerumahanModel();
                $model->insert($data);

                $msg = [
                    'success' => 'Data Berhasil Disimpan',
                ];
                echo json_encode($msg);
            };
        } else {
            exit('Data tidak dapat diproses');
        }
    }

    public function edit($id)
    {
        if ($this->request->isAJAX()) {
            $model = new PerumahanModel();
            $per = $model->find($id);

            $modelDev = new DeveloperModel();
            $developer = $modelDev->where('status_dev', 1)->orderBy('nama_dev')->get()->getResultArray();
            $data = [
                'per' => $per,
                'developer' => $developer
            ];
            $msg = [
                'data' => view('perumahan/modalEdit', $data),
            ];
            echo json_encode($msg);
        } else {
            exit('Data tidak dapat diproses');
        }
    }

    public function save_edit()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama_per' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],

                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],

                'lat' => [
                    'label' => 'Latitude',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],

                'long' => [
                    'label' => 'Longitude',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],

            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_per' => $validation->getError('nama_per'),
                        'alamat' => $validation->getError('alamat'),
                        'lat' => $validation->getError('lat'),
                        'long' => $validation->getError('long'),

                    ]
                ];
                echo json_encode($msg);
            } else {
                $id = $this->request->getPost('id');
                $data = [
                    'id_dev' => $this->request->getPost('id_dev'),
                    'nama' => $this->request->getPost('nama_per'),
                    'alamat' => $this->request->getPost('alamat'),
                    'no_telp' => $this->request->getPost('notlp'),
                    'latitude' => $this->request->getPost('lat'),
                    'longitude' => $this->request->getPost('long'),
                    'status' => 1,
                ];

                $model = new PerumahanModel();
                $model->update($id, $data);

                $msg = [
                    'success' => 'Data Berhasil Disimpan',
                ];
                echo json_encode($msg);
            };
        } else {
            exit('Data tidak dapat diproses');
        }
    }

    public function delete($id)
    {
        if ($this->request->isAjax()) {
            $per = new PerumahanModel();
            $per->delete($id);
        } else {
            exit('Data tidak dapat diproses');
        };
    }
}