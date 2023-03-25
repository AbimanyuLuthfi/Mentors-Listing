<?php

namespace App\Controllers\Mentors;

use App\Controllers\BaseController;
use App\Models\MentorsModel;

class MentorsController extends BaseController
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
        return view('mentors/dashboard/index', $viewData);
    }

}
