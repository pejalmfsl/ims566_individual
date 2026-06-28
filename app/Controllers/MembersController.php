<?php

namespace App\Controllers;

use App\Libraries\LibraryRepository;

class MembersController extends BaseController
{
    public function index()
    {
        $library = new LibraryRepository();

        return view('members', [
            'pageTitle' => 'Members - UiTM Library Management System',
            'activeMenu' => 'members',
            'currentUsername' => $this->session->get('username'),
            'summary' => $library->memberSummary(),
            'members' => $library->members(),
        ]);
    }
}
