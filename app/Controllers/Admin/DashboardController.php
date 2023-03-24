<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MentorsModel;

class DashboardController extends BaseController
{
    // public function index()
    // {
    //     $data = [
    //         'title' => 'Admin Dashboard | Comprof'
    //     ];
    //     return view('/admin/dashboard/index', $data);
    // }
    public function admin_mentors_listing_index()
    {
        $mentorsModel = new MentorsModel();
        $getItems = $mentorsModel->getAllItem();
        $viewData = [
            'title' => 'Admin Dashboard | Comprof',
            'array_mentors' => $getItems,
        ];
        return view('admin/dashboard/index', $viewData);
    }

    public function admin_mentors_listing_create_index()
    {
        $viewData = [
            'title' => 'Add Mentors | Comprof',
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
     * DELETE : /admin/create/mentors/post
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
