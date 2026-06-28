<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?php
  $summary = $summary ?? [];
  $recentBorrowings = $recentBorrowings ?? [];
  $borrowingTrend = $borrowingTrend ?? [];

  $chartLabels = array_map(static fn (array $item): string => $item['label'], $borrowingTrend);
  $issuedSeries = array_map(static fn (array $item): int => (int) $item['issued'], $borrowingTrend);
  $returnedSeries = array_map(static fn (array $item): int => (int) $item['returned'], $borrowingTrend);
?>

<div class="hero-shell rounded-4 p-4 p-lg-5 mb-4">
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <div>
      <span class="badge bg-uitm mb-2">Dashboard</span>
      <h1 class="h3 mb-1 text-uitm">University Library Overview</h1>
      <p class="text-secondary mb-0">Logged in as <?= esc($currentUsername ?? 'guest') ?></p>
    </div>
    <div class="text-md-end">
      <p class="text-secondary mb-1">Today's snapshot</p>
      <h2 class="h4 mb-0 text-uitm"><?= esc(date('d M Y')) ?></h2>
    </div>
  </div>
</div>

<section class="row g-3 mb-4">
  <div class="col-12 col-sm-6 col-lg-3">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <p class="text-secondary mb-1">Members</p>
          <h2 class="h4 mb-0"><?= esc(number_format((int) ($summary['totalMembers'] ?? 0))) ?></h2>
        </div>
        <i class="bi bi-people fs-2 text-uitm"></i>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-lg-3">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <p class="text-secondary mb-1">Books</p>
          <h2 class="h4 mb-0"><?= esc(number_format((int) ($summary['totalBooks'] ?? 0))) ?></h2>
        </div>
        <i class="bi bi-book fs-2 text-uitm-gold"></i>
      </div>
    </div>
  </div>

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
          <p class="text-secondary mb-1">Overdue</p>
          <h2 class="h4 mb-0"><?= esc(number_format((int) ($summary['overdueBooks'] ?? 0))) ?></h2>
        </div>
        <i class="bi bi-exclamation-circle fs-2 text-uitm-gold"></i>
      </div>
    </div>
  </div>
</section>

<section class="card border-0 shadow-sm mb-4">
  <div class="card-header bg-white d-flex justify-content-between align-items-center">
    <div>
      <h2 class="h5 mb-1">Borrowing Trend</h2>
      <p class="text-secondary mb-0">Issued versus returned across recent months</p>
    </div>
    <span class="badge bg-uitm-gold text-dark">Hardcoded data</span>
  </div>
  <div class="card-body">
    <div style="height: 320px;">
      <canvas id="borrowingTrendChart"></canvas>
    </div>
  </div>
</section>

<section class="row g-3 mb-4">
  <div class="col-12 col-lg-4">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <div>
          <h2 class="h5 mb-1">Quick Action</h2>
          <p class="text-secondary mb-0">Jump straight into reports</p>
        </div>
        <i class="bi bi-graph-up-arrow fs-3 text-uitm"></i>
      </div>
      <div class="card-body d-grid gap-2">
        <a class="btn btn-uitm" href="<?= site_url('reports') ?>">Open Reports</a>
        <a class="btn btn-outline-secondary" href="<?= site_url('reports') ?>#overdue-items">Overdue Items</a>
      </div>
    </div>
  </div>

  <div class="col-12 col-lg-8">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <div>
          <h2 class="h5 mb-1">Recent Borrowing</h2>
          <p class="text-secondary mb-0">Latest circulation activity</p>
        </div>
        <a class="btn btn-uitm btn-sm" href="<?= site_url('reports') ?>">View Reports</a>
      </div>
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead class="table-light">
            <tr>
              <th scope="col">Member</th>
              <th scope="col">Book</th>
              <th scope="col">Date</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($recentBorrowings as $row): ?>
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
</section>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
<script>
  const ctx = document.getElementById('borrowingTrendChart');
  if (ctx) {
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: <?= json_encode($chartLabels, JSON_UNESCAPED_SLASHES) ?>,
        datasets: [
          {
            label: 'Issued',
            data: <?= json_encode($issuedSeries, JSON_UNESCAPED_SLASHES) ?>,
            borderColor: '#4b0082',
            backgroundColor: 'rgba(75, 0, 130, 0.12)',
            tension: 0.35,
            fill: true,
          },
          {
            label: 'Returned',
            data: <?= json_encode($returnedSeries, JSON_UNESCAPED_SLASHES) ?>,
            borderColor: '#f6c343',
            backgroundColor: 'rgba(246, 195, 67, 0.15)',
            tension: 0.35,
            fill: true,
          },
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'bottom',
            labels: { usePointStyle: true, boxWidth: 10 }
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            grid: { color: 'rgba(75, 0, 130, 0.08)' }
          },
          x: {
            grid: { display: false }
          }
        }
      }
    });
  }
</script>
<?= $this->endSection() ?>
