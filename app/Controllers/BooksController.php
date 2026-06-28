<?php

namespace App\Controllers;

use App\Libraries\LibraryRepository;

class BooksController extends BaseController
{
    public function index()
    {
        $library = new LibraryRepository();

        return view('books', [
            'pageTitle' => 'Books - UiTM Library Management System',
            'activeMenu' => 'books',
            'currentUsername' => $this->session->get('username'),
            'summary' => $library->bookSummary(),
            'books' => $library->books(),
        ]);
    }
}
