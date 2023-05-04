<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MentorsModel;
use Ramsey\Uuid\Uuid;

class APIAuthController extends BaseController
{
    /**
     * GET : auth/login/index
     * Login Page
     */
    public function login_view()
    {
        $data = [
            'title' => 'Login | Mentors Listing'
        ];
        return view('login', $data);
    }

    /**
     * GET : auth/register/index
     * Register Page
     */
    public function register_index()
    {
        $data = [
            'title' => 'Login | Mentors Listing'
        ];
        return view('register', $data);
    }
    /**
     * GET : /
     * Homepage
     */
    public function homepage()
    {
        $data = [
            'title' => 'Homepage | Mentors Listing'
        ];
        return view('homepage', $data);
    }
    /**
     * GET : /dashboard/index
     * Dashboard Page
     */
    public function login_index()
    {
        $mentorsModel = new MentorsModel ();
        $getItems = $mentorsModel->getAllItem();

        $getMentor= $mentorsModel
        ->where('role', 'mentor')
        ->where('gambar !=', null)
        ->where('bidang_keahlian !=', null)
        ->where('deskripsi_profil !=', null)
        ->where('waktu_tersedia !=', null)
        ->findAll();
        $data = [
            'array_items' => $getItems,
            'title'=> 'Dashboard | Mentors Listing',
            'data_mentor' => $getMentor,
        ];
        return view('dashboard', $data);
    }

    /*
     * POST : auth/register/process
     * Function Process Register
     */
    public function auth_account_create_post()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $nama = $this->request->getVar('nama');
        
        $rules = [
            'email'         => ['rules' => 'required|max_length[50]|valid_email|is_unique[mentors.email]',
                                'errors'=> [
                                    'required' => '{field} tidak boleh kosong!!!',                
                                    'is_unique' => 'Email Sudah digunakan Sebelumnya!',
                                    'max_length' => '{field} Maximal 50 Karakter!',
                                    ],
                                ],
            'nama'         => ['rules' => 'required|min_length[4]|is_unique[mentors.nama]',
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
            $mentorsModel = new MentorsModel();
            $uuid4 = Uuid::uuid4();
            $generateUUID = $uuid4;
            $data = [
                'uuid' => $generateUUID,
                'email'    => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'role'     => 'user',
                'is_active'     => 'not_active',
                'gambar'     => NULL,
                'nama'     => $nama,
                'bidang_keahlian'     => NULL,
                'deskripsi_profil'     => NULL,
                'waktu_tersedia'     => NULL,
            ];
            $mentorsModel->save($data);
            $data=['success' => "Berhasil Membuat Akun Baru"];
            return $this->response->setJSON($data);
        } else {
            $data=['error' => $this->validator->listerrors()];
            // session()->setFlashdata('error', $this->validator->listerrors());
            return $this->response->setJSON($data);
        }
    }

    /**
     * GET : /
     * Homepage
     */
    public function validation_account() {
        $session = session();   
        $mentorsModel = new MentorsModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $auth = $mentorsModel->where('email', $email)->first();

            if(($auth)){
                if($auth['is_active'] == "active"){
                    $pass = $auth['password'];
                    $authenticatePassword = password_verify($password, $pass);
                    if($authenticatePassword == true){                           
                        $ses_data = [
                            'id' => $auth['id'],
                            'uuid' => $auth['uuid'],
                            'email' => $auth['email'],
                            'role' => $auth['role'],
                            'is_active' => $auth['is_active'],
                            'gambar' => $auth['gambar'],
                            'nama' => $auth['nama'],
                            'bidang_keahlian' => $auth['bidang_keahlian'],
                            'deskripsi_profil' => $auth['deskripsi_profil'],
                            'waktu_tersedia' => $auth['waktu_tersedia'],
                            'isLoggedIn' => TRUE
                        ];
                        $data = $session->set($ses_data);
                        $data = ['status' => '200', 'success' => 'Berhasil Login'];
                        // return redirect()->to('/dashboard/index')->with('success', 'Berhasil Login');
                        return $this->response->setJSON($data);
                    } else {
                        $session->setFlashdata('msg', 'Password is incorrect.');
                        return redirect()->to('/auth/login/index')->withInput()->with('msg', 'Password Anda Salah');
                    }
                } else {
                    $session->setFlashdata('msg', 'Email Anda Belum Aktif');
                    return redirect()->to('/auth/login/index')->with('msg', 'Email Anda Belum Aktif');
                }
        } else {
            $session->setFlashdata('msg', 'Akun Tidak Ditemukan');
            return redirect()->to('/auth/login/index')->with('msg', 'Akun Tidak Ditemukan');
        }
    }

    /*
     * GET : auth/logout/process
     * Function Logout Process
     */
    public function logout_index(){
        $this->session->destroy();
        return redirect()->to('/auth/login/index');
    }

}
