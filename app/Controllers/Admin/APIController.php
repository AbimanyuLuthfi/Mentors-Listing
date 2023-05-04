<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MentorsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class APIController extends BaseController
{
    /**
     * GET : /admin/dashboard
     * Function Read Admin
     */
    public function admin_mentors_listing_index()
    {
        $mentorsModel = new MentorsModel();
        $getItems = $mentorsModel->getAllItem();
        $viewData = [
            'title' => 'Admin Dashboard',
            'array_mentors' => $getItems,
        ];
        return $this->response->setJSON($viewData);
    }

    /**
     * GET : /admin/add/mentors
     * Function View Add Mentors for Admin
     */
    public function admin_mentors_listing_create_index()
    {
        $viewData = [
            'title' => 'Add Mentors',
            'head' => 'Add Mentors',
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/dashboard/add-mentors', $viewData);
    }

    /**
     * GET : /admin/add/mentors
     * Function View Add Mentors for Admin
     */
    public function admin_mentors_listing_update_index($mentors_uuid)
    {
        $mentorsModel = new MentorsModel();
        $getItems = $mentorsModel->where('uuid', $mentors_uuid)->first();
        
        $viewData = [
            'title' => 'Update Mentors',
            'head' => 'Update Mentors Information',
            'mentors' => $getItems,
        ];

        $data = [
            'status' => '200',
            'mentors' => $getItems,
        ];
        // return view('admin/dashboard/edit-mentors', $viewData);
        return $this->response->setJSON($data);
    }

    /**
     * POST : /admin/create/mentors/post
     * Function Create Mentors
     */
    public function admin_mentors_listing_create()
    {
        $uuid = $this->request->getVar('uuid');
        $gambar = $this->request->getFile('gambar');
        $nama = $this->request->getVar('nama');
        $bidang_keahlian = $this->request->getVar('bidang_keahlian');
        $deskripsi_profil = $this->request->getVar('deskripsi_profil');
        $waktu_tersedia = $this->request->getVar('waktu_tersedia');

        // Validasi
        if(!$this->validate([
            'gambar' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
            'nama' => 'required|is_unique[mentors.nama]',
            'bidang_keahlian' => 'required',
            'deskripsi_profil' => 'required',
            'waktu_tersedia' => 'required',
        ])){
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/add/mentors')->withInput()->with('validation', 'mnbbhghjg');
        }
        
        if($gambar ->isValid() && ! $gambar->hasMoved())
        {
            $imageName = $gambar->getRandomName();
            $gambar->move('uploads/', $imageName);
        }

        $mentorsModel = new MentorsModel();
        $array_mentors = $mentorsModel->createItem([
            'uuid' => $uuid,
            'gambar' => $imageName,
            'nama' => $nama,
            'bidang_keahlian' => $bidang_keahlian,
            'deskripsi_profil' => $deskripsi_profil,
            'waktu_tersedia' => $waktu_tersedia,
        ]);

        if (!empty($array_mentors['uuid'])) {
            return redirect()->to('/admin/dashboard')->with('success', 'Berhasil Menambah Data');
        } else {
            return redirect()->to('/admin/dashboard')->with('message', 'Gagal Menambah Data');
        }
    }

    /**
     * GET : /admin/(:any)/update/post
     * Function Update Mentors
     */
    public function	admin_mentors_listing_update($mentors_uuid) {
        $gambar = $this->request->getFile('gambar');
        $nama = $this->request->getVar('nama');
        $email = $this->request->getVar('email');
        $bidang_keahlian = $this->request->getVar('bidang_keahlian');
        $deskripsi_profil = $this->request->getVar('deskripsi_profil');
        $waktu_tersedia = $this->request->getVar('waktu_tersedia');
        $role= $this->request->getVar('role');
        $is_active = $this->request->getVar('is_active');
        
        $mentorsModel = new MentorsModel();
        $getItems = $mentorsModel->where('uuid', $mentors_uuid)->first();
        if(!empty($getItems)) {
            $updateMentors =[
                'nama' => $nama,
                'email' => $email,
                'bidang_keahlian' => $bidang_keahlian,
                'deskripsi_profil' => $deskripsi_profil,
                'waktu_tersedia' => $waktu_tersedia,
                'role' => $role,
                'is_active' => $is_active,
            ];

            if($gambar->isFile() && !$gambar->hasMoved()) {
                $old_img_name = $getItems['gambar'];
                    if(is_file("/uploads/".$old_img_name))
                    {
                        unlink("uploads/".$old_img_name);
                    }
                $imageName = $gambar->getRandomName();
                $gambar->move('uploads/', $imageName);
                $updateMentors['gambar'] = $imageName;
            }

            
            $data = $mentorsModel->where('uuid', $mentors_uuid)->set($updateMentors)->update();
            return $this->response->setJSON($data);
        } else {
            return redirect()->to('/dashboard/index')->with('errors', 'Gagal update item');
        }
    }

    /**
     * DELETE : /admin/(:any)/delete
     * Function Create Mentors
     */
    public function admin_mentors_listing_delete($mentors_uuid){
        $mentorsModel = new MentorsModel();
        $getItems = $mentorsModel->where('uuid', $mentors_uuid)->first();
        if(!empty($getItems)){
            $data= $mentorsModel->where('uuid', $mentors_uuid)->delete();
            $data = ['success' => 'Berhasil Menghapus Akun'];
            return $this->response->setJSON($data);
        }
        // else return redirect()->to('/dashboard/index')->with('success', 'Gagal Menghapus Data');
        $data = ['error' => 'Gagal Menghapus akun'];
        return $this->response->setJSON($data);
    }

    public function edit($id){
        $mentorsModel = new MentorsModel();
        return json_encode($this->$mentorsModel->find($id));
    }
}
