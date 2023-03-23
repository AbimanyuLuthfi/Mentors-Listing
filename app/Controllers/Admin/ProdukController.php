<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class ProdukController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Produk | Comprof',
            'head' => 'Daftar Produk',
        ];
        return view('admin/produk/index', $data);
    }
    public function kategori()
    {
        $data = [
            'title' => 'Kategori Produk | Comprof',
            'head' => 'Daftar Kategori Produk',
        ];
        return view('admin/produk/kategori', $data);
    }
}
