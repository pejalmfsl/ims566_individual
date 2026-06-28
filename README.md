# UiTM Library Management System

Repository: https://github.com/pejalmfsl/ims566_individual

Live application: https://ptarapps.uitm.edu.my/ims566_individual

## Overview

UiTM Library Management System is a CodeIgniter 4 web application developed for the IMS566 individual project. The system provides an authenticated admin dashboard for monitoring library members, books, borrowing activity, reports, and library officer profile information.

This project is not published through GitHub Pages because CodeIgniter 4 requires a PHP runtime, server routing, and database/application configuration. The GitHub repository is used for source code hosting, while the working application is deployed at:

```text
https://ptarapps.uitm.edu.my/ims566_individual
```

## Demo Login

Use the following demo account to access the system:

```text
Username: admin
Password: 123456
```

## Features

- Session-based login and logout
- Protected admin dashboard
- Summary cards for members, books, borrowed books, and overdue books
- Member listing with category and status information
- Book listing with ISBN, title, author, category, and availability status
- Borrowing page for active borrowings, recent returns, and overdue items
- Reports page with borrowing summary, monthly trend, top books, and overdue list
- Library officer profile page
- Bootstrap-based responsive interface
- Demo data fallback when database tables are unavailable

## Main Modules

- Authentication
- Dashboard
- Members
- Books
- Borrowing
- Reports
- Profile

## Technology Stack

- CodeIgniter 4
- PHP 8.2 or newer
- MySQL or MariaDB
- Bootstrap 5.3
- Composer

## Local Setup

1. Clone the repository:

   ```bash
   git clone https://github.com/pejalmfsl/ims566_individual.git
   cd ims566_individual
   ```

2. Install PHP dependencies:

   ```bash
   composer install
   ```

3. Create an environment file:

   ```bash
   cp env .env
   ```

4. Update the application URL and database settings in `.env`.

   Example for local development:

   ```text
   CI_ENVIRONMENT = development
   app.baseURL = 'http://localhost/ims566_individual/public/'
   ```

5. Run database migrations and seeders if a database is configured:

   ```bash
   php spark migrate
   php spark db:seed LibraryUsersSeeder
   php spark db:seed LibrarySeeder
   ```

6. Start the local development server:

   ```bash
   php spark serve
   ```

7. Open the local URL shown by CodeIgniter in your browser.

## Deployment Note

The deployed version is configured to run under:

```text
https://ptarapps.uitm.edu.my/ims566_individual/
```

Because this is a dynamic PHP application, GitHub Pages is not suitable for hosting it. GitHub Pages only serves static files, while this project depends on CodeIgniter 4 server-side execution.

## Database Behavior

The application can load live data when the expected database tables are available:

- `library_users`
- `library_members`
- `library_books`
- `library_borrowings`

If the database is unavailable or the required tables are not ready, selected pages can display demo data for testing and presentation purposes.

## License

This project is based on the CodeIgniter 4 application starter.
