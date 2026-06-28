# UiTM Library Management System

## Description

UiTM Library Management System is a CodeIgniter 4 web application developed for an IMS566 individual project. The system provides a simple admin dashboard for monitoring library members, books, borrowing activity, reports, and user profile information.

The application supports database-driven data when the required tables are available. If the database is not ready, it can still display demo data for presentation and testing purposes.

## Features

- Secure login page with session-based authentication
- Dashboard summary for total members, books, borrowed books, and overdue books
- Member listing with category and status information
- Book listing with ISBN, title, author, category, and availability status
- Borrowing page for active borrowings, recent returns, and overdue items
- Reports page with borrowing summary, monthly trend, top books, and overdue list
- Profile page for library officer information
- Bootstrap-based responsive user interface
- Demo data fallback when database tables are unavailable

## Login Instruction

Use the following demo account to access the system:

```text
Username: admin
Password: 123456
```

Login flow:

1. Open the application in a browser.
2. Go to the login page.
3. Enter the username and password.
4. Click the login button.
5. After successful login, the system redirects to the dashboard.

## Framework Used

- CodeIgniter 4
- PHP
- MySQL
- Bootstrap 5.3

## Main Modules

- Authentication
- Dashboard
- Members
- Books
- Borrowing
- Reports
- Profile
