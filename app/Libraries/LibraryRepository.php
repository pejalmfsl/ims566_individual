<?php

namespace App\Libraries;

use App\Models\BorrowingModel;
use App\Models\BookModel;
use App\Models\MemberModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

class LibraryRepository
{
    private DemoLibraryData $demo;

    public function __construct()
    {
        $this->demo = new DemoLibraryData();
    }

    public function usesDatabase(): bool
    {
        try {
            $db = db_connect();
            $db->initialize();

            return $db->isConnected() && $db->tableExists('library_members') && $db->tableExists('library_books') && $db->tableExists('library_borrowings');
        } catch (DatabaseException) {
            return false;
        }
    }

    public function dashboardSummary(): array
    {
        if (! $this->usesDatabase()) {
            return $this->demo->dashboardSummary();
        }

        $members = new MemberModel();
        $books = new BookModel();
        $borrowings = new BorrowingModel();

        return [
            'totalMembers' => $members->countAllResults(),
            'totalBooks' => $books->countAllResults(),
            'borrowedToday' => $borrowings->where('borrowed_at >=', date('Y-m-d 00:00:00'))->countAllResults(),
            'overdueBooks' => $borrowings->where('status', 'Overdue')->countAllResults(),
        ];
    }

    public function memberSummary(): array
    {
        if (! $this->usesDatabase()) {
            return [
                'totalMembers' => 1248,
                'students' => 1102,
                'staff' => 146,
                'activeToday' => 324,
            ];
        }

        $members = new MemberModel();

        return [
            'totalMembers' => $members->countAllResults(),
            'students' => $members->where('category', 'Student')->countAllResults(),
            'staff' => $members->where('category', 'Staff')->countAllResults(),
            'activeToday' => $members->where('status', 'Active')->countAllResults(),
        ];
    }

    public function bookSummary(): array
    {
        if (! $this->usesDatabase()) {
            return [
                'totalBooks' => 5432,
                'available' => 4018,
                'borrowed' => 1194,
                'reserved' => 220,
            ];
        }

        $books = new BookModel();

        return [
            'totalBooks' => $books->countAllResults(),
            'available' => $books->where('status', 'Available')->countAllResults(),
            'borrowed' => $books->where('status', 'Borrowed')->countAllResults(),
            'reserved' => $books->where('status', 'Reserved')->countAllResults(),
        ];
    }

    public function dashboardTrend(): array
    {
        return $this->demo->dashboardTrend();
    }

    public function recentBorrowings(): array
    {
        if (! $this->usesDatabase()) {
            return $this->demo->recentBorrowings();
        }

        $borrowings = new BorrowingModel();

        $rows = $borrowings
            ->select('library_borrowings.borrowed_at, library_borrowings.status, library_members.name AS member_name, library_books.title AS book_title')
            ->join('library_members', 'library_members.id = library_borrowings.member_id')
            ->join('library_books', 'library_books.id = library_borrowings.book_id')
            ->orderBy('library_borrowings.borrowed_at', 'DESC')
            ->findAll(3);

        return array_map(static function (array $row): array {
            return [
                'member' => $row['member_name'],
                'bookTitle' => $row['book_title'],
                'borrowDate' => date('d M Y', strtotime($row['borrowed_at'])),
                'status' => $row['status'],
                'badge' => match ($row['status']) {
                    'Returned' => 'success',
                    'Borrowed' => 'warning',
                    default => 'danger',
                },
            ];
        }, $rows);
    }

    public function members(): array
    {
        if (! $this->usesDatabase()) {
            return $this->demo->members();
        }

        $members = new MemberModel();

        return array_map(static function (array $row): array {
            return [
                'memberId' => $row['member_code'],
                'name' => $row['name'],
                'category' => $row['category'],
                'categoryBadge' => $row['category'] === 'Staff' ? 'warning text-dark' : 'primary',
                'unit' => $row['unit'],
                'status' => $row['status'],
                'statusBadge' => match ($row['status']) {
                    'Active' => 'success',
                    'Pending' => 'secondary',
                    default => 'danger',
                },
            ];
        }, $members->orderBy('name', 'ASC')->findAll());
    }

    public function books(): array
    {
        if (! $this->usesDatabase()) {
            return $this->demo->books();
        }

        $books = new BookModel();

        return array_map(static function (array $row): array {
            return [
                'isbn' => $row['isbn'],
                'title' => $row['title'],
                'author' => $row['author'],
                'category' => $row['category'],
                'status' => $row['status'],
                'statusBadge' => match ($row['status']) {
                    'Available' => 'success',
                    'Borrowed' => 'warning',
                    'Reserved' => 'secondary',
                    default => 'danger',
                },
            ];
        }, $books->orderBy('title', 'ASC')->findAll());
    }

    public function reports(): array
    {
        return $this->demo->reports();
    }
}
