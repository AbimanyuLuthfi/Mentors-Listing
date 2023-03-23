<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
class DashboardController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Admin Dashboard | Comprof'
        ];
        return view('/admin/dashboard/index', $data);
    }
}
