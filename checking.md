# UiTM Library Management System - Project Flow and Technical Documentation

## 1. Project Overview

This project is a CodeIgniter 4 web application for a UiTM Library Management System. It provides a simple authenticated admin interface for monitoring library members, books, borrowing activity, reports, and user profile information.

The application is currently built as a dashboard-style system. It can display real database data when the expected library tables exist, and it automatically falls back to demo data when the database is unavailable or not migrated yet.

## 2. Technology Stack

- Framework: CodeIgniter 4
- Language: PHP
- Database support: MySQL or MariaDB through CodeIgniter database configuration
- Frontend: Bootstrap 5.3 and Bootstrap Icons from CDN
- Session handling: CodeIgniter session service
- Authentication: Session-based login with database user lookup and demo fallback credentials

## 3. Main Application Flow

1. User opens the application.
2. The root route `/` redirects into the login flow through `AuthController::index`.
3. User submits username and password through `POST /login`.
4. `AuthController::attempt` validates the credentials.
5. If valid, the controller stores login information in the session:
   - `isLoggedIn`
   - `username`
   - `role`
   - `fullName`
6. Authenticated users are redirected to `/dashboard`.
7. Protected pages are guarded by `AuthFilter`.
8. Each protected controller loads data through `LibraryRepository`.
9. `LibraryRepository` checks whether the database and required tables are available.
10. If database tables exist, data is loaded using CodeIgniter models.
11. If database tables do not exist, the application uses `DemoLibraryData`.
12. Views render the final UI inside the shared layout `app/Views/layouts/main.php`.
13. User can log out through `/logout`, which destroys the session and redirects back to `/login`.

## 4. Route Structure

Routes are defined in `app/Config/Routes.php`.

Public routes:

- `GET /` -> `AuthController::index`
- `GET /login` -> `AuthController::index`
- `POST /login` -> `AuthController::attempt`
- `GET /logout` -> `AuthController::logout`

Protected routes using the `auth` filter:

- `GET /dashboard` -> `DashboardController::index`
- `GET /members` -> `MembersController::index`
- `GET /books` -> `BooksController::index`
- `GET /borrowing` -> `BorrowingController::index`
- `GET /reports` -> `ReportsController::index`
- `GET /profile` -> `ProfileController::index`

## 5. Authentication Flow

Authentication is handled by `app/Controllers/AuthController.php`.

Login behavior:

- The login page is shown by `AuthController::index`.
- If the user is already authenticated, the user is redirected to `/dashboard`.
- Submitted credentials are processed by `AuthController::attempt`.
- The controller first tries to find an active user in the `library_users` table.
- If the database or table is unavailable, it falls back to the demo account.

Demo account:

- Username: `admin`
- Password: `123456`

Session values created after successful login:

- `isLoggedIn = true`
- `username`
- `role`
- `fullName`

Route protection is handled by `app/Filters/AuthFilter.php`. The filter checks `session()->get('isLoggedIn') === true`. If the user is not authenticated, the request is redirected to `/login`.

## 6. Controller and View Flow

All main controllers extend `BaseController`. The base controller loads the URL helper and initializes the CodeIgniter session service.

Module flow:

- `DashboardController`
  - Loads dashboard summary, borrowing trend, and recent borrowing records.
  - View: `app/Views/dashboard.php`

- `MembersController`
  - Loads member summary and member list.
  - View: `app/Views/members.php`

- `BooksController`
  - Loads book summary and book list.
  - View: `app/Views/books.php`

- `BorrowingController`
  - Loads report data, active borrowings, recent returns, overdue items, and dashboard summary.
  - View: `app/Views/borrowing/index.php`

- `ReportsController`
  - Loads report summary, borrowing overview, monthly trend, top books, borrowing records, and overdue items.
  - View: `app/Views/reports.php`

- `ProfileController`
  - Loads static profile details for the current library officer.
  - View: `app/Views/profile/index.php`

The common UI layout is stored in `app/Views/layouts/main.php`. It contains the Bootstrap imports, UiTM color styling, navigation bar, page content section, footer, and logout button.

## 7. Data Access Flow

The main data access layer is `app/Libraries/LibraryRepository.php`.

The repository decides whether to use database data or demo data by running `usesDatabase()`.

Database mode is enabled only when:

- The database connection can initialize successfully.
- The database is connected.
- The following tables exist:
  - `library_members`
  - `library_books`
  - `library_borrowings`

If any of these checks fail, the repository returns fallback data from `app/Libraries/DemoLibraryData.php`.

Current repository methods:

- `dashboardSummary()`
- `memberSummary()`
- `bookSummary()`
- `dashboardTrend()`
- `recentBorrowings()`
- `members()`
- `books()`
- `reports()`

Important technical note: `dashboardTrend()` and `reports()` currently always use demo data. Members, books, summary counts, and recent borrowings can use database data when the tables exist.

## 8. Database Design

Database migrations are stored in `app/Database/Migrations`.

### `library_users`

Created by `2026-06-27-000000_CreateLibraryUsers.php`.

Fields:

- `id`
- `username`
- `password_hash`
- `full_name`
- `role`
- `status`
- `created_at`
- `updated_at`

Indexes:

- Primary key: `id`
- Unique key: `username`

### `library_members`

Created by `2026-06-27-000001_CreateLibraryMembers.php`.

Fields:

- `id`
- `member_code`
- `name`
- `category`
- `unit`
- `status`
- `created_at`
- `updated_at`

Indexes:

- Primary key: `id`
- Unique key: `member_code`

Allowed category values:

- `Student`
- `Staff`

Allowed status values:

- `Active`
- `Pending`
- `Overdue`

### `library_books`

Created by `2026-06-27-000002_CreateLibraryBooks.php`.

Fields:

- `id`
- `isbn`
- `title`
- `author`
- `category`
- `status`
- `created_at`
- `updated_at`

Indexes:

- Primary key: `id`
- Unique key: `isbn`

Allowed status values:

- `Available`
- `Borrowed`
- `Reserved`
- `Overdue`

### `library_borrowings`

Created by `2026-06-27-000003_CreateLibraryBorrowings.php`.

Fields:

- `id`
- `member_id`
- `book_id`
- `borrowed_at`
- `returned_at`
- `status`
- `created_at`
- `updated_at`

Indexes:

- Primary key: `id`
- Index: `member_id`
- Index: `book_id`

Allowed status values:

- `Borrowed`
- `Returned`
- `Overdue`

Technical note: The borrowing migration adds indexes for `member_id` and `book_id`, but it does not define explicit foreign key constraints.

## 9. Models

Models are stored in `app/Models`.

- `UserModel`
  - Table: `library_users`
  - Handles admin login user records.

- `MemberModel`
  - Table: `library_members`
  - Handles library member records.

- `BookModel`
  - Table: `library_books`
  - Handles library book records.

- `BorrowingModel`
  - Table: `library_borrowings`
  - Handles borrowing records.

All models return arrays and use CodeIgniter timestamp fields:

- `created_at`
- `updated_at`

## 10. Seed Data

Seeders are stored in `app/Database/Seeds`.

- `LibraryUsersSeeder`
  - Creates the admin user.
  - Username: `admin`
  - Password: `123456`

- `LibrarySeeder`
  - Inserts sample members.
  - Inserts sample books.

Technical note: `LibrarySeeder` does not insert borrowing records. Because of this, borrowing-related pages may rely on demo report data unless borrowing records are manually added to `library_borrowings`.

## 11. Setup and Run Flow

Recommended setup steps:

1. Configure the environment file.

   Copy `env` to `.env` if needed, then configure:

   ```ini
   CI_ENVIRONMENT = development
   app.baseURL = 'http://localhost/ims566_individual/public/'

   database.default.hostname = localhost
   database.default.database = your_database_name
   database.default.username = your_database_user
   database.default.password = your_database_password
   database.default.DBDriver = MySQLi
   database.default.port = 3306
   ```

2. Install dependencies if the `vendor` folder is missing.

   ```bash
   composer install
   ```

3. Run migrations.

   ```bash
   php spark migrate
   ```

4. Run seeders.

   ```bash
   php spark db:seed LibraryUsersSeeder
   php spark db:seed LibrarySeeder
   ```

5. Open the app in the browser and log in.

   ```text
   Username: admin
   Password: 123456
   ```

## 12. Current Technical Notes

- The project still contains the default CodeIgniter starter `README.md`, so this `checking.md` file documents the actual customized project flow.
- The login page uses a demo credential fallback, so the app can still be accessed even when the database is not ready.
- The dashboard and module pages are read-only in the current implementation.
- There are no create, update, or delete routes for members, books, users, or borrowings yet.
- Borrowing reports are partly demo-driven because the report methods currently come from `DemoLibraryData`.
- The frontend depends on CDN assets for Bootstrap and Bootstrap Icons.
- The main navigation is centralized in `app/Views/layouts/main.php`.

## 13. Suggested Next Improvements

- Add CRUD modules for members, books, and borrowing records.
- Add real database queries for reports and monthly borrowing trends.
- Add explicit foreign key constraints for `library_borrowings.member_id` and `library_borrowings.book_id`.
- Seed borrowing records so dashboard and borrowing pages can be fully database-driven.
- Add validation rules for future form submissions.
- Add role-based access checks if more user roles are introduced.
- Add automated feature tests for login, protected routes, and repository fallback behavior.
