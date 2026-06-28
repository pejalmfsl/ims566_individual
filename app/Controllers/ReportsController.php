<?php

namespace App\Controllers;

use App\Libraries\LibraryRepository;

class ReportsController extends BaseController
{
    public function index()
    {
        $library = new LibraryRepository();
        $reports = $library->reports();

        return view('reports', [
            'pageTitle' => 'Reports - UiTM Library Management System',
            'activeMenu' => 'reports',
            'currentUsername' => $this->session->get('username'),
            'summary' => $reports['summary'],
            'borrowingOverview' => $reports['borrowingOverview'],
            'monthlyTrend' => $reports['monthlyTrend'],
            'topBooks' => $reports['topBooks'],
            'borrowingRecords' => $reports['borrowingRecords'],
            'overdueItems' => $reports['overdueItems'],
        ]);
    }
}
