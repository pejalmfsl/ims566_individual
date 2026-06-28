<?php

namespace App\Controllers;

use App\Libraries\LibraryRepository;

class DashboardController extends BaseController
{
    public function index()
    {
        $library = new LibraryRepository();

        return view('dashboard', [
            'pageTitle' => 'Dashboard - UiTM Library Management System',
            'activeMenu' => 'dashboard',
            'currentUsername' => $this->session->get('username'),
            'summary' => $library->dashboardSummary(),
            'borrowingTrend' => $library->dashboardTrend(),
            'recentBorrowings' => $library->recentBorrowings(),
        ]);
    }
}
