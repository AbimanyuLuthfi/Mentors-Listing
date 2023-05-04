<?php

namespace App\Controllers\Mentors;

use App\Controllers\BaseController;
use App\Models\MentorsModel;

class APIMentorsController extends BaseController
{
    public function index()
    {
        $mentorsModel = new MentorsModel();
        $getItems = $mentorsModel->getAllItem();
        
        $viewData = [
            'title' => 'Mentors Listing | Dashboard',
            'head' => 'Mentors Listing',
            'array_mentors' => $getItems,
        ];
        return $this->response->setJSON($viewData);
    }
    public function edit_account_page() {
        $mentorsModel = new MentorsModel();
        $dataMentor = $mentorsModel
        ->where('id', $_SESSION['id'])
        ->first();
        $data = [
            'title' => 'Mentors Personal Account',
            'head' => 'Mentors Personal Account',
            'data_mentor' => $dataMentor,
        ];
        return view('mentors/dashboard/edit-accounts', $data);
    }

    public function update_account() {
        $gambar = $this->request->getFile('gambar');
        $nama = $this->request->getVar('nama');
        $bidang_keahlian = $this->request->getVar('bidang_keahlian');
        $deskripsi_profil = $this->request->getVar('deskripsi_profil');
        $waktu_tersedia = $this->request->getVar('waktu_tersedia');

        $mentorsModel = new MentorsModel();
        $dataMentors = $mentorsModel
        ->where('id', $_SESSION['id'])
        ->first();

        if(empty($_SESSION['gambar'])){
            if($gambar ->isValid() && ! $gambar->hasMoved())
            {
                $imageName = $gambar->getRandomName();
                $gambar->move('uploads/', $imageName);
            }
        }

        if(!empty($dataMentors)){
            $updateMentors =[
                'nama' => $nama,
                'bidang_keahlian' => $bidang_keahlian,
                'deskripsi_profil' => $deskripsi_profil,
                'waktu_tersedia' => $waktu_tersedia,
            ];
            
            if($gambar->isValid() && !$gambar->hasMoved()) {
                $old_img_name = $dataMentors['gambar'];
                    if(is_file("/uploads/".$old_img_name))
                    {
                        unlink("/uploads/".$old_img_name);
                    }
                $imageName = $gambar->getRandomName();
                $gambar->move('uploads/', $imageName);
                $updateMentors['gambar'] = $imageName;
            }

            $mentorsModel->where('id',  $_SESSION['id'])->set($updateMentors)->update();
            return redirect()->to('/dashboard/index')->with('success', 'Berhasil Update Akun');
        } else {
            return redirect()->to('/mentors/personal/account')->with('errors', 'Gagal Update Akun');
        }
    }

}
