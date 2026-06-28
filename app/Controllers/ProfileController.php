<?php

namespace App\Controllers;

class ProfileController extends BaseController
{
    public function index()
    {
        return view('profile/index', [
            'pageTitle' => 'Profile - UiTM Library Management System',
            'activeMenu' => 'profile',
            'currentUsername' => $this->session->get('username'),
            'profile' => [
                'name' => 'Faizal',
                'phone' => '+60 12-345 6789',
                'email' => 'faizal@uitm.edu.my',
                'department' => 'Bahagian Perkhidmatan Pelanggan, PTAR',
                'role' => 'Library Officer',
                'location' => 'UiTM Perpustakaan Tun Abdul Razak',
            ],
        ]);
    }
}
