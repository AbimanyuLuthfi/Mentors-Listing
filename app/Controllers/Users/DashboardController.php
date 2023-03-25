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
    /**
     * GET : /admin/dashboard
     * Function Read Admin
     */
    public function users_mentors_listing_detail_index($mentors_uuid)
    {
        $mentorsModel = new MentorsModel();
        $getItems = $mentorsModel->where('uuid', $mentors_uuid)->first();
        
        $viewData = [
            'title' => 'Update Mentors',
            'head' => 'Update Mentors Information',
            'data' => $getItems,
        ];
        return view('users/dashboard/detail-mentors', $viewData);
    }
}
