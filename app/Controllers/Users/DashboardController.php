<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\MentorsModel;

class DashboardController extends BaseController
{
    /**
     * GET : /admin/dashboard
     * Function Read Admin
     */
    public function users_mentors_listing_index()
    {
        $mentorsModel = new MentorsModel();
        $getItems = $mentorsModel->getAllItem();
        $viewData = [
            'title' => 'Mentors Listing | Dashboard',
            'head' => 'Mentors Listing',
            'array_mentors' => $getItems,
        ];
        return view('users/dashboard/index', $viewData);
    }
}
