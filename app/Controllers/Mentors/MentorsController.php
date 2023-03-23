<?php

namespace App\Controllers\Mentors;

use App\Controllers\BaseController;

class MentorsController extends BaseController
{
    public function index()
    {
        $data=[
            'title' => 'Mentors'
        ];
        return view('/mentors/dashboard/index', $data);
    }
}
