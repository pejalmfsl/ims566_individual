<?php $error = $error ?? ''; $username = $username ?? ''; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UiTM Library Management System - Login</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bg-uitm { background-color: #4b0082; }
    .text-uitm { color: #4b0082; }
    .border-uitm-gold { border-color: #f6c343 !important; }
    .btn-uitm {
      background-color: #4b0082;
      border-color: #4b0082;
      color: #fff;
    }
    .btn-uitm:hover {
      background-color: #2f0052;
      border-color: #2f0052;
      color: #fff;
    }
  </style>
</head>
<body class="bg-light min-vh-100 d-flex align-items-center justify-content-center p-3">
  <main class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-7 col-lg-5 col-xl-4">
        <section class="card shadow border-0 rounded-3 overflow-hidden">
          <div class="card-header bg-uitm text-white text-center border-bottom border-5 border-uitm-gold p-4">
            <div class="bg-white border border-4 border-uitm-gold rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 150px; height: 150px;">
              <img src="<?= base_url('assets/images/LogoUiTM.png') ?>" alt="UiTM Logo" class="img-fluid p-3">
            </div>
            <span class="badge bg-white text-uitm mb-2">UiTM University Library</span>
            <h1 class="h4 fw-bold mb-1">UiTM Library Management System</h1>
            <p class="small mb-0">University library portal for students and staff</p>
          </div>

          <div class="card-body p-4">
            <?php if ($error !== ''): ?>
              <div class="alert alert-danger" role="alert"><?= esc($error) ?></div>
            <?php endif; ?>

            <form method="post" action="<?= site_url('login') ?>">
              <?= csrf_field() ?>
              <div class="mb-3">
                <label for="username" class="form-label fw-semibold text-uitm">Username</label>
                <input type="text" id="username" name="username" class="form-control" value="<?= esc($username) ?>" placeholder="Enter username" required>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label fw-semibold text-uitm">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
              </div>

              <button type="submit" class="btn btn-uitm w-100 py-2 fw-semibold">Login</button>
            </form>

            <p class="text-secondary small text-center mt-3 mb-0">UiTM Library demo account: admin / 123456</p>
          </div>
        </section>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
