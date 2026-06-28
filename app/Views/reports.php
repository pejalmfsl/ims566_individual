<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?php
    $summary = $summary ?? [];
    $borrowingOverview = $borrowingOverview ?? [];
    $monthlyTrend = $monthlyTrend ?? [];
    $topBooks = $topBooks ?? [];
    $borrowingRecords = $borrowingRecords ?? [];
    $overdueItems = $overdueItems ?? [];

    $maxIssued = 1;
    foreach ($monthlyTrend as $month) {
        $maxIssued = max($maxIssued, (int) ($month['issued'] ?? 0));
    }
?>

<div class="hero-shell rounded-4 p-4 p-lg-5 mb-4">
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <div>
      <span class="badge bg-uitm mb-2">Reports</span>
      <h1 class="h3 mb-1 text-uitm">Library Reports</h1>
      <p class="text-secondary mb-0">Borrowing-focused reporting dashboard with circulation metrics and overdue tracking</p>
    </div>
    <div class="text-md-end">
      <p class="text-secondary mb-1">Report period</p>
      <h2 class="h4 mb-0 text-uitm">Jan - Jun 2026</h2>
    </div>
  </div>
</div>

<section class="row g-3 mb-4">
  <?php foreach ($borrowingOverview as $card): ?>
    <div class="col-12 col-sm-6 col-lg-3">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body d-flex justify-content-between align-items-center">
          <div>
            <p class="text-secondary mb-1"><?= esc($card['label']) ?></p>
            <h2 class="h4 mb-0"><?= esc(number_format((int) $card['value'])) ?></h2>
          </div>
          <i class="bi bi-<?= esc($card['icon']) ?> fs-2 text-<?= esc($card['badge']) ?>"></i>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</section>

<section class="row g-3 mb-4">
  <div class="col-12 col-xl-7">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-header bg-white">
        <h2 class="h5 mb-1">Monthly Activity Trend</h2>
        <p class="text-secondary mb-0">Issued versus returned across recent months</p>
      </div>
      <div class="card-body">
        <?php foreach ($monthlyTrend as $month): ?>
          <?php
            $issued = (int) $month['issued'];
            $returned = (int) $month['returned'];
            $issuedWidth = (int) round(($issued / $maxIssued) * 100);
            $returnedWidth = (int) round(($returned / $maxIssued) * 100);
          ?>
          <div class="mb-3">
            <div class="d-flex justify-content-between small mb-1">
              <strong><?= esc($month['label']) ?></strong>
              <span><?= esc($issued) ?> issued, <?= esc($returned) ?> returned</span>
            </div>
            <div class="progress" style="height: 12px;">
              <div class="progress-bar bg-uitm" role="progressbar" style="width: <?= esc($issuedWidth) ?>%"></div>
              <div class="progress-bar bg-uitm-gold" role="progressbar" style="width: <?= esc($returnedWidth) ?>%"></div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <div class="col-12 col-xl-5">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-header bg-white">
        <h2 class="h5 mb-1">Top Borrowed Books</h2>
        <p class="text-secondary mb-0">Most borrowed titles in the current period</p>
      </div>
      <div class="card-body">
        <div class="list-group list-group-flush">
          <?php foreach ($topBooks as $book): ?>
            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
              <span><?= esc($book['title']) ?></span>
              <span class="badge bg-uitm rounded-pill"><?= esc($book['count']) ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="card border-0 shadow-sm mb-4" id="borrowing-records">
  <div class="card-header bg-white d-flex flex-column flex-lg-row gap-2 justify-content-between align-items-lg-center">
    <div>
      <h2 class="h5 mb-1">Borrowing Records</h2>
      <p class="text-secondary mb-0">Latest borrowing activity linked from the dashboard shortcut</p>
    </div>
    <a class="btn btn-uitm btn-sm align-self-start align-self-lg-center" href="<?= site_url('dashboard') ?>">Back to Dashboard</a>
  </div>
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light">
        <tr>
          <th scope="col">Member</th>
          <th scope="col">Book Title</th>
          <th scope="col">Borrow Date</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($borrowingRecords as $row): ?>
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
</section>

<section class="card border-0 shadow-sm" id="overdue-items">
  <div class="card-header bg-white d-flex flex-column flex-lg-row gap-2 justify-content-between align-items-lg-center">
    <div>
      <h2 class="h5 mb-1">Overdue Items</h2>
      <p class="text-secondary mb-0">Records that need follow-up from the circulation desk</p>
    </div>
    <a class="btn btn-uitm btn-sm align-self-start align-self-lg-center" href="<?= site_url('books') ?>">Review Books</a>
  </div>
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light">
        <tr>
          <th scope="col">Member</th>
          <th scope="col">Book Title</th>
          <th scope="col">Due Date</th>
          <th scope="col">Days Late</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($overdueItems as $item): ?>
          <tr>
            <td><?= esc($item['member']) ?></td>
            <td><?= esc($item['bookTitle']) ?></td>
            <td><?= esc($item['dueDate']) ?></td>
            <td><?= esc($item['daysLate']) ?> days</td>
            <td><span class="badge text-bg-<?= esc($item['statusBadge']) ?>">Pending follow-up</span></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>
<?= $this->endSection() ?>
