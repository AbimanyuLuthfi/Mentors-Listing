<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;

class AuthController extends BaseController
{
    // public function __construct(){
    //     helper('form');
    // }
    public function login_index()
    {
        return view('login');
    }
    public function register_index()
    {
        return view('register');
    }

    public function authentication(){
        echo("lanjut login cuy");
    }

    /*
     * POST : auth/register/process
     * Function Process Register
     */
    public function auth_account_create()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $rules = [
            'email'         => ['rules' => 'required|max_length[50]|valid_email|is_unique[mentors.email]',
                                'errors'=> [
                                    'required' => '{field} tidak boleh kosong!!!',                
                                    'is_unique' => 'Email Sudah digunakan Sebelumnya!',
                                    'max_length' => '{field} Maximal 50 Karakter!',
                                    ],
                                ],
            'name'         => ['rules' => 'required|min_length[4]|valid_email|is_unique[mentors.nama]',
                                'errors'=> [
                                    'required' => '{field} tidak boleh kosong!!!',                
                                    'is_unique' => 'Nama Sudah digunakan Sebelumnya!',
                                    'min_length' => '{field} Minimal 4 Karakter!',
                                    ],
                                ],
            'password'      => ['rules' => 'required|min_length[4]|max_length[20]',
                                'errors'=> [
                                    'required' => '{field} tidak boleh kosong!!!',
                                    'min_length' => '{field} Minimal 4 Karakter',
                                    'max_length' => '{field} Maksimal 20 Karakter',
                                    ],
                                ],
            'confirmpassword'  => ['rules' => 'matches[password]',
                                    'errors'=> [
                                    'matches' => 'Password tidak sesuai dengan Konfirmasi Password',
                                    ],
                                ],  
        ];

        if($this->validate($rules)){
            $authModel = new AuthModel();
            $data = [
                'email'    => $email,
                'role'     => 'member',
                'is_active'     => 'not_active',
                'gambar'     => '',
                'nama'     => '',
                'bidang_keahlian'     => '',
                'deskripsi_profil'     => '',
                'waktu_tersedia'     => '',
                'password' => password_hash($password, PASSWORD_BCRYPT)
            ];
            $authModel->save($data);
            return redirect()->to('/users/dashboard')->with('success', 'Anda Berhasil Membuat Akun Baru');
        } else {
            session()->setFlashdata('error', $this->validator->listerrors());
            return redirect()->to('/auth/register/index')->with('error', 'Anda Gagal Membuat Akun Baru');
        }
    }

}
