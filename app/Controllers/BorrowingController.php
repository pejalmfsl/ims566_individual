<?php

namespace App\Controllers;

use App\Libraries\LibraryRepository;

class BorrowingController extends BaseController
{
    public function index()
    {
        $library = new LibraryRepository();
        $reports = $library->reports();
        $summary = $library->dashboardSummary();

        $activeBorrowings = array_values(array_filter($reports['borrowingRecords'], static function (array $row): bool {
            return in_array($row['status'], ['Borrowed', 'Overdue'], true);
        }));

        $recentReturns = array_values(array_filter($reports['borrowingRecords'], static function (array $row): bool {
            return $row['status'] === 'Returned';
        }));

        return view('borrowing/index', [
            'pageTitle' => 'Borrowing - UiTM Library Management System',
            'activeMenu' => 'borrowing',
            'currentUsername' => $this->session->get('username'),
            'summary' => $summary,
            'activeBorrowings' => $activeBorrowings,
            'recentReturns' => $recentReturns,
            'overdueItems' => $reports['overdueItems'],
        ]);
    }
}
