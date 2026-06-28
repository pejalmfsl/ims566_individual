<?php

namespace App\Libraries;

class DemoLibraryData
{
    public function dashboardSummary(): array
    {
        return [
            'totalMembers' => 1248,
            'totalBooks' => 5432,
            'borrowedToday' => 86,
            'overdueBooks' => 23,
        ];
    }

    public function dashboardTrend(): array
    {
        return [
            [
                'label' => 'Jan',
                'issued' => 32,
                'returned' => 28,
            ],
            [
                'label' => 'Feb',
                'issued' => 41,
                'returned' => 37,
            ],
            [
                'label' => 'Mar',
                'issued' => 49,
                'returned' => 45,
            ],
            [
                'label' => 'Apr',
                'issued' => 38,
                'returned' => 34,
            ],
            [
                'label' => 'May',
                'issued' => 55,
                'returned' => 48,
            ],
            [
                'label' => 'Jun',
                'issued' => 71,
                'returned' => 49,
            ],
        ];
    }

    public function recentBorrowings(): array
    {
        return [
            [
                'member' => 'Aisyah Rahman',
                'bookTitle' => 'Web Design Essentials',
                'borrowDate' => '27 Jun 2026',
                'status' => 'Returned',
                'badge' => 'success',
            ],
            [
                'member' => 'Amir Hakim',
                'bookTitle' => 'Introduction to Databases',
                'borrowDate' => '26 Jun 2026',
                'status' => 'Borrowed',
                'badge' => 'warning',
            ],
            [
                'member' => 'Nur Iman',
                'bookTitle' => 'Information Management',
                'borrowDate' => '25 Jun 2026',
                'status' => 'Overdue',
                'badge' => 'danger',
            ],
        ];
    }

    public function members(): array
    {
        return [
            [
                'memberId' => 'STU24001',
                'name' => 'Aina Safiya',
                'category' => 'Student',
                'categoryBadge' => 'primary',
                'unit' => 'Faculty of Information Management',
                'status' => 'Active',
                'statusBadge' => 'success',
            ],
            [
                'memberId' => 'STU24018',
                'name' => 'Muhammad Danish',
                'category' => 'Student',
                'categoryBadge' => 'primary',
                'unit' => 'Faculty of Computer Science',
                'status' => 'Active',
                'statusBadge' => 'success',
            ],
            [
                'memberId' => 'STF0104',
                'name' => 'Dr. Nur Hidayah',
                'category' => 'Staff',
                'categoryBadge' => 'warning text-dark',
                'unit' => 'Library Services',
                'status' => 'Active',
                'statusBadge' => 'success',
            ],
            [
                'memberId' => 'STF0112',
                'name' => 'Encik Amirul',
                'category' => 'Staff',
                'categoryBadge' => 'warning text-dark',
                'unit' => 'Administration',
                'status' => 'Pending',
                'statusBadge' => 'secondary',
            ],
            [
                'memberId' => 'STU24036',
                'name' => 'Nurul Izzah',
                'category' => 'Student',
                'categoryBadge' => 'primary',
                'unit' => 'Faculty of Business Management',
                'status' => 'Overdue',
                'statusBadge' => 'danger',
            ],
        ];
    }

    public function books(): array
    {
        return [
            [
                'isbn' => '978-0132350884',
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'category' => 'Software Engineering',
                'status' => 'Available',
                'statusBadge' => 'success',
            ],
            [
                'isbn' => '978-1492078005',
                'title' => 'Designing Data-Intensive Applications',
                'author' => 'Martin Kleppmann',
                'category' => 'Databases',
                'status' => 'Borrowed',
                'statusBadge' => 'warning',
            ],
            [
                'isbn' => '978-0596007126',
                'title' => 'Head First Design Patterns',
                'author' => 'Eric Freeman',
                'category' => 'Programming',
                'status' => 'Available',
                'statusBadge' => 'success',
            ],
            [
                'isbn' => '978-0134757599',
                'title' => 'Effective Java',
                'author' => 'Joshua Bloch',
                'category' => 'Programming',
                'status' => 'Reserved',
                'statusBadge' => 'secondary',
            ],
            [
                'isbn' => '978-1119787565',
                'title' => 'Information Architecture',
                'author' => 'Donna Spencer',
                'category' => 'Information Management',
                'status' => 'Overdue',
                'statusBadge' => 'danger',
            ],
        ];
    }

    public function reports(): array
    {
        return [
            'summary' => [
                'totalLoans' => 286,
                'returned' => 241,
                'overdue' => 23,
                'activeBorrowers' => 39,
            ],
            'borrowingOverview' => [
                [
                    'label' => 'Issued',
                    'value' => 286,
                    'icon' => 'arrow-up-right',
                    'badge' => 'uitm',
                ],
                [
                    'label' => 'Returned',
                    'value' => 241,
                    'icon' => 'arrow-down-left',
                    'badge' => 'uitm-gold',
                ],
                [
                    'label' => 'Currently Out',
                    'value' => 45,
                    'icon' => 'book',
                    'badge' => 'secondary',
                ],
                [
                    'label' => 'Overdue',
                    'value' => 23,
                    'icon' => 'exclamation-circle',
                    'badge' => 'danger',
                ],
            ],
            'monthlyTrend' => [
                ['label' => 'Jan', 'issued' => 32, 'returned' => 28],
                ['label' => 'Feb', 'issued' => 41, 'returned' => 37],
                ['label' => 'Mar', 'issued' => 49, 'returned' => 45],
                ['label' => 'Apr', 'issued' => 38, 'returned' => 34],
                ['label' => 'May', 'issued' => 55, 'returned' => 48],
                ['label' => 'Jun', 'issued' => 71, 'returned' => 49],
            ],
            'topBooks' => [
                ['title' => 'Designing Data-Intensive Applications', 'count' => 26],
                ['title' => 'Clean Code', 'count' => 21],
                ['title' => 'Effective Java', 'count' => 18],
                ['title' => 'Information Architecture', 'count' => 14],
                ['title' => 'Head First Design Patterns', 'count' => 12],
            ],
            'borrowingRecords' => [
                [
                    'member' => 'Aisyah Rahman',
                    'bookTitle' => 'Web Design Essentials',
                    'borrowDate' => '27 Jun 2026',
                    'status' => 'Returned',
                    'badge' => 'success',
                ],
                [
                    'member' => 'Amir Hakim',
                    'bookTitle' => 'Introduction to Databases',
                    'borrowDate' => '26 Jun 2026',
                    'status' => 'Borrowed',
                    'badge' => 'warning',
                ],
                [
                    'member' => 'Nur Iman',
                    'bookTitle' => 'Information Management',
                    'borrowDate' => '25 Jun 2026',
                    'status' => 'Overdue',
                    'badge' => 'danger',
                ],
                [
                    'member' => 'Faris Hanif',
                    'bookTitle' => 'Clean Code',
                    'borrowDate' => '24 Jun 2026',
                    'status' => 'Returned',
                    'badge' => 'success',
                ],
            ],
            'overdueItems' => [
                [
                    'member' => 'Nurul Izzah',
                    'bookTitle' => 'Information Architecture',
                    'dueDate' => '20 Jun 2026',
                    'daysLate' => 7,
                    'statusBadge' => 'danger',
                ],
                [
                    'member' => 'Faris Hanif',
                    'bookTitle' => 'Clean Code',
                    'dueDate' => '22 Jun 2026',
                    'daysLate' => 5,
                    'statusBadge' => 'warning',
                ],
                [
                    'member' => 'Amir Hakim',
                    'bookTitle' => 'Introduction to Databases',
                    'dueDate' => '24 Jun 2026',
                    'daysLate' => 3,
                    'statusBadge' => 'secondary',
                ],
            ],
        ];
    }
}
