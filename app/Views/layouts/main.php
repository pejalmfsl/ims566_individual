<?php $pageTitle = $pageTitle ?? 'UiTM Library Management System'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($pageTitle) ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root {
      --uitm-purple: #4b0082;
      --uitm-purple-dark: #2f0052;
      --uitm-gold: #f6c343;
    }

    body {
      background:
        radial-gradient(circle at top left, rgba(246, 195, 67, 0.14), transparent 24%),
        linear-gradient(180deg, #fafafa 0%, #f5f4fb 100%);
    }

    .bg-uitm { background-color: var(--uitm-purple); }
    .text-uitm { color: var(--uitm-purple); }
    .text-uitm-gold { color: var(--uitm-gold); }
    .bg-uitm-gold { background-color: var(--uitm-gold); }
    .border-uitm-gold { border-color: var(--uitm-gold) !important; }
    .btn-uitm {
      background-color: var(--uitm-purple);
      border-color: var(--uitm-purple);
      color: #fff;
    }
    .btn-uitm:hover {
      background-color: var(--uitm-purple-dark);
      border-color: var(--uitm-purple-dark);
      color: #fff;
    }
    .hero-shell {
      background:
        radial-gradient(circle at top right, rgba(246, 195, 67, 0.18), transparent 28%),
        linear-gradient(180deg, rgba(75, 0, 130, 0.06), rgba(75, 0, 130, 0.015));
      border: 1px solid rgba(75, 0, 130, 0.08);
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-uitm navbar-dark border-bottom border-5 border-uitm-gold">
    <div class="container-fluid">
      <a class="navbar-brand fw-semibold d-flex align-items-center gap-2" href="<?= site_url('dashboard') ?>">
        <img src="<?= base_url('assets/images/LogoUiTM.png') ?>" alt="UiTM" width="32" height="32" class="rounded bg-white p-1">
        <span>UiTM Library System</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link <?= ($activeMenu ?? '') === 'dashboard' ? 'active' : '' ?>" href="<?= site_url('dashboard') ?>">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link <?= ($activeMenu ?? '') === 'members' ? 'active' : '' ?>" href="<?= site_url('members') ?>">Members</a></li>
          <li class="nav-item"><a class="nav-link <?= ($activeMenu ?? '') === 'books' ? 'active' : '' ?>" href="<?= site_url('books') ?>">Books</a></li>
          <li class="nav-item"><a class="nav-link <?= ($activeMenu ?? '') === 'borrowing' ? 'active' : '' ?>" href="<?= site_url('borrowing') ?>">Borrowing</a></li>
          <li class="nav-item"><a class="nav-link <?= ($activeMenu ?? '') === 'reports' ? 'active' : '' ?>" href="<?= site_url('reports') ?>">Reports</a></li>
          <li class="nav-item"><a class="nav-link <?= ($activeMenu ?? '') === 'profile' ? 'active' : '' ?>" href="<?= site_url('profile') ?>">Profile</a></li>
          <li class="nav-item"><a class="btn btn-outline-light btn-sm ms-lg-2 mt-2 mt-lg-0" href="<?= site_url('logout') ?>">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container py-4">
    <?= $this->renderSection('content') ?>
  </main>

  <footer class="container pb-4">
    <p class="text-center text-secondary small mb-0">IMS566 Individual Project - UiTM Library Management System</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <?= $this->renderSection('scripts') ?>
</body>
</html>
