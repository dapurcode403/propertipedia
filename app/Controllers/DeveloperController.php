<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DeveloperModel;
use CodeIgniter\HTTP\ResponseInterface;

class DeveloperController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Developer',
            'isi' => 'developer/index',
        ];
        return view('layout/wrapper', $data);
    }

    public function listData()
    {
        if ($this->request->isAjax()) {
            $model = new DeveloperModel();
            $data = [
                'developer' => $model->where('status_dev', 1)->findAll(),
            ];
            $msg = [
                'data' => view('developer/data', $data),
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
                'data' => view('developer/modalTambah'),
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
                'nama_dev' => [
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

            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_dev' => $validation->getError('nama_dev'),
                        'alamat' => $validation->getError('alamat'),

                    ]
                ];
                echo json_encode($msg);
            } else {

                $data = [
                    'nama_dev' => $this->request->getPost('nama_dev'),
                    'alamat_dev' => $this->request->getPost('alamat'),
                    'no_telp_dev' => $this->request->getPost('notlp'),
                    'status_dev' => 1,
                ];

                $model = new DeveloperModel();
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
            $model = new DeveloperModel();
            $dev = $model->find($id);
            $data = [
                'dev' => $dev
            ];
            $msg = [
                'data' => view('developer/modalEdit', $data),
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
                'nama_dev' => [
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

            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_dev' => $validation->getError('nama_dev'),
                        'alamat' => $validation->getError('alamat'),

                    ]
                ];
                echo json_encode($msg);
            } else {
                $id = $this->request->getPost('id');
                $data = [
                    'nama_dev' => $this->request->getPost('nama_dev'),
                    'alamat_dev' => $this->request->getPost('alamat'),
                    'no_telp_dev' => $this->request->getPost('notlp'),
                    'status_dev' => 1,
                ];

                $model = new DeveloperModel();
                $model->update($id, $data);

                $msg = [
                    'success' => 'Data Berhasil Diedit',
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
            $dev = new DeveloperModel();
            $dev->delete($id);
        } else {
            exit('Data tidak dapat diproses');
        };
    }
}
