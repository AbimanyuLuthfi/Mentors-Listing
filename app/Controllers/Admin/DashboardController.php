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
}
