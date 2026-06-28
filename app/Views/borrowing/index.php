<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?php
  $summary = $summary ?? [];
  $activeBorrowings = $activeBorrowings ?? [];
  $recentReturns = $recentReturns ?? [];
  $overdueItems = $overdueItems ?? [];
?>

<div class="hero-shell rounded-4 p-4 p-lg-5 mb-4">
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <div>
      <span class="badge bg-uitm mb-2">Borrowing</span>
      <h1 class="h3 mb-1 text-uitm">Borrowing Management</h1>
    </div>
    <div class="text-md-end">
      <p class="text-secondary mb-1">Current session</p>
      <h2 class="h5 mb-0 text-uitm"><?= esc($currentUsername ?? 'guest') ?></h2>
    </div>
  </div>
</div>

<section class="row g-3 mb-4">
  <div class="col-12 col-sm-6 col-lg-3">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <p class="text-secondary mb-1">Borrowed Today</p>
          <h2 class="h4 mb-0"><?= esc(number_format((int) ($summary['borrowedToday'] ?? 0))) ?></h2>
        </div>
        <i class="bi bi-arrow-left-right fs-2 text-uitm"></i>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-lg-3">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <p class="text-secondary mb-1">Returned</p>
          <h2 class="h4 mb-0"><?= esc(number_format((int) count($recentReturns))) ?></h2>
        </div>
        <i class="bi bi-check-circle fs-2 text-uitm-gold"></i>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-lg-3">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <p class="text-secondary mb-1">Active Borrowings</p>
          <h2 class="h4 mb-0"><?= esc(number_format((int) count($activeBorrowings))) ?></h2>
        </div>
        <i class="bi bi-book fs-2 text-uitm"></i>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-lg-3">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <p class="text-secondary mb-1">Overdue</p>
          <h2 class="h4 mb-0"><?= esc(number_format((int) ($summary['overdueBooks'] ?? count($overdueItems)))) ?></h2>
        </div>
        <i class="bi bi-exclamation-circle fs-2 text-danger"></i>
      </div>
    </div>
  </div>
</section>

<section class="row g-3 mb-4">
  <div class="col-12 col-lg-8">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <div>
          <h2 class="h5 mb-1">Active Borrowings</h2>
          <p class="text-secondary mb-0">Current circulation records in progress</p>
        </div>
        <span class="badge bg-uitm-gold text-dark">Hardcoded</span>
      </div>
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead class="table-light">
            <tr>
              <th scope="col">Member</th>
              <th scope="col">Book</th>
              <th scope="col">Borrow Date</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($activeBorrowings as $row): ?>
              <tr>
                <td><?= esc($row['member']) ?></td>
                <td><?= esc($row['bookTitle']) ?></td>
                <td><?= esc($row['borrowDate']) ?></td>
                <td><span class="badge text-bg-<?= esc($row['badge']) ?>"><?= esc($row['status']) ?></span></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-12 col-lg-4">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-header bg-white">
        <h2 class="h5 mb-1">Borrowing Notes</h2>
        <p class="text-secondary mb-0">Quick summary for presentation</p>
      </div>
      <div class="card-body">
        <div class="d-grid gap-3">
          <div class="p-3 rounded-4 bg-light">
            <p class="text-secondary small mb-1">Policy</p>
            <div class="fw-semibold text-uitm">7 days loan period</div>
          </div>
          <div class="p-3 rounded-4 bg-light">
            <p class="text-secondary small mb-1">Reminder</p>
            <div class="fw-semibold text-uitm">Automatic overdue follow-up after due date</div>
          </div>
          <div class="p-3 rounded-4 bg-light">
            <p class="text-secondary small mb-1">Focus</p>
            <div class="fw-semibold text-uitm">Borrowed, Returned, and Overdue tracking</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="row g-3">
  <div class="col-12 col-lg-6">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-header bg-white">
        <h2 class="h5 mb-1">Recent Returns</h2>
        <p class="text-secondary mb-0">Latest completed borrowings</p>
      </div>
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead class="table-light">
            <tr>
              <th scope="col">Member</th>
              <th scope="col">Book</th>
              <th scope="col">Date</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($recentReturns as $row): ?>
              <tr>
                <td><?= esc($row['member']) ?></td>
                <td><?= esc($row['bookTitle']) ?></td>
                <td><?= esc($row['borrowDate']) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-12 col-lg-6">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <div>
          <h2 class="h5 mb-1">Overdue Items</h2>
          <p class="text-secondary mb-0">Borrowings that need immediate follow-up</p>
        </div>
        <a class="btn btn-uitm btn-sm" href="<?= site_url('reports') ?>#overdue-items">View Reports</a>
      </div>
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead class="table-light">
            <tr>
              <th scope="col">Member</th>
              <th scope="col">Book</th>
              <th scope="col">Days Late</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($overdueItems as $item): ?>
              <tr>
                <td><?= esc($item['member']) ?></td>
                <td><?= esc($item['bookTitle']) ?></td>
                <td><?= esc($item['daysLate']) ?> days</td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>
