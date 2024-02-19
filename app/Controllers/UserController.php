<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class UserController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'User',
            'isi' => 'user/index',
        ];
        return view('layout/wrapper', $data);
    }

    public function listData()
    {
        if ($this->request->isAjax()) {
            $model = new UsersModel();
            $data = [
                'User' => $model->where('status', 1)->findAll(),
            ];
            $msg = [
                'data' => view('user/data', $data),
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
                'data' => view('user/modalTambah'),
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

                'username' => [
                    'label' => 'Username',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],

                'email' => [
                    'label' => 'Email',
                    'rules' => 'trim|required|valid_email',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'valid_email' => '{field} tidak valid',
                    ]
                ],

                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],

                'role' => [
                    'label' => 'Level',
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
                        'username' => $validation->getError('username'),
                        'email' => $validation->getError('email'),
                        'password' => $validation->getError('password'),
                        'role' => $validation->getError('role'),
                    ]
                ];
                echo json_encode($msg);
            } else {

                $data = [
                    'name' => $this->request->getPost('nama'),
                    'username' => $this->request->getPost('username'),
                    'email' => $this->request->getPost('email'),
                    'password' => password_hash($this->request->getvar('password'), PASSWORD_DEFAULT),
                    'role' => $this->request->getPost('role'),
                    'status' => 1,
                ];

                $model = new UsersModel();
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
            $model = new UsersModel();
            $kons = $model->find($id);
            $data = [
                'kons' => $kons
            ];
            $msg = [
                'data' => view('user/modalEdit', $data),
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

                $model = new UsersModel();
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
            $kons = new UsersModel();
            $kons->delete($id);
        } else {
            exit('Data tidak dapat diproses');
        };
    }
}
