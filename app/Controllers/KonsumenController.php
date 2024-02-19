<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KonsumenModel;
use CodeIgniter\HTTP\ResponseInterface;

class KonsumenController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Konsumen',
            'isi' => 'konsumen/index',
        ];
        return view('layout/wrapper', $data);
    }

    public function listData()
    {
        if ($this->request->isAjax()) {
            $model = new KonsumenModel();
            $data = [
                'konsumen' => $model->where('status', 1)->findAll(),
            ];
            $msg = [
                'data' => view('konsumen/data', $data),
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
                'data' => view('konsumen/modalTambah'),
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
                'nama' => [
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

                'notlp' => [
                    'label' => 'No Telepon',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],

            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama' => $validation->getError('nama'),
                        'alamat' => $validation->getError('alamat'),
                        'notlp' => $validation->getError('notlp'),
                    ]
                ];
                echo json_encode($msg);
            } else {

                $data = [
                    'nama' => $this->request->getPost('nama'),
                    'alamat' => $this->request->getPost('alamat'),
                    'no_telp' => $this->request->getPost('notlp'),
                    'keterangan' => $this->request->getPost('keterangan'),
                    'ins_by' => 1,
                    'status' => 1,
                ];

                $model = new KonsumenModel();
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
            $model = new KonsumenModel();
            $kons = $model->find($id);
            $data = [
                'kons' => $kons
            ];
            $msg = [
                'data' => view('konsumen/modalEdit', $data),
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
                'nama' => [
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

                'notlp' => [
                    'label' => 'No Telepon',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],

            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama' => $validation->getError('nama'),
                        'alamat' => $validation->getError('alamat'),
                        'notlp' => $validation->getError('notlp'),
                    ]
                ];
                echo json_encode($msg);
            } else {
                $id = $this->request->getPost('id');
                $data = [
                    'nama' => $this->request->getPost('nama'),
                    'alamat' => $this->request->getPost('alamat'),
                    'no_telp' => $this->request->getPost('notlp'),
                    'keterangan' => $this->request->getPost('keterangan'),
                    'ins_by' => 1,
                    'status' => 1,
                ];

                $model = new KonsumenModel();
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
            $kons = new KonsumenModel();
            $kons->delete($id);
        } else {
            exit('Data tidak dapat diproses');
        };
    }
}
