<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MentorsModel;

class DashboardController extends BaseController
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
        return view('admin/dashboard/index', $viewData);
    }

    /**
     * GET : /admin/add/mentors
     * Function Add Mentors for Admin
     */
    public function admin_mentors_listing_create_index()
    {
        $viewData = [
            'title' => 'Add Mentors',
            'head' => 'Add Mentors',
        ];
        return view('admin/dashboard/add-mentors', $viewData);
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
            return redirect()->to('/admin/dashboard')->with('success', 'Berhasil input barang');
        } else {
            return redirect()->to('/admin/dashboard')->with('message', 'Gagal input barang');
        }
    }

    /**
     * GET : /admin/(:any)/update/post
     * Function Update Mentors
     */
    public function	admin_mentors_listing_update($mentors_uuid) {
        $mentorsModel = new MentorsModel();
        $getItems = $mentorsModel->where('uuid', $mentors_uuid)->first();

        $gambar = $this->request->getFile('gambar');
        $imageName = '';
    
        if(!empty($getItems)) {
            
            if($gambar->isValid() && !$gambar->hasMoved())
            {
                $old_img_name = $getItems ['gambar'];
                if(is_file("/uploads/".$old_img_name))
                {
                    unlink("uploads/".$old_img_name);
                }
                $imageName = $gambar->getRandomName();
                $gambar->move('uploads/', $imageName);
            }

            
            $mentorsModel->where('uuid', $mentors_uuid)->set([
                'image' => $imageName,
                'nama' => $this->request->getVar('nama'),
                'bidang_keahlian' => $this->request->getVar('bidang_keahlian'),
                'deskripsi_profil' => $this->request->getVar('deskripsi_profil'),
                'waktu_tersedia' => $this->request->getVar('waktu_tersedia'),
                ])->update();
            return redirect()->to('/admin/dashboard')->with('success', 'Berhasil update item');
        } else {
            return redirect()->to('/admin/dashboard')->with('errors', 'Gagal update item');
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
            $mentorsModel->where('uuid', $mentors_uuid)->delete();
            return redirect()->back()->with('success', 'Berhasil Menghapus Data Mentor');
        }
        else return redirect()->back()->with('error', 'Gagal Menghapus Data Mentor');
    }

}
