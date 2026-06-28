<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?php $summary = $summary ?? []; $members = $members ?? []; ?>

<div class="hero-shell rounded-4 p-4 p-lg-5 mb-4">
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <div>
      <span class="badge bg-uitm mb-2">Members</span>
      <h1 class="h3 mb-1 text-uitm">Member Directory</h1>
      <p class="text-secondary mb-0">Search and review student or staff membership records</p>
    </div>
    <span class="badge bg-uitm align-self-start align-self-md-center">UiTM Library</span>
  </div>
</div>

<section class="row g-3 mb-4">
  <div class="col-12 col-sm-6 col-lg-3">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <p class="text-secondary mb-1">Total Members</p>
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
          <p class="text-secondary mb-1">Students</p>
          <h2 class="h4 mb-0"><?= esc(number_format((int) ($summary['students'] ?? 0))) ?></h2>
        </div>
        <i class="bi bi-mortarboard fs-2 text-uitm-gold"></i>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-lg-3">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <p class="text-secondary mb-1">Staff</p>
          <h2 class="h4 mb-0"><?= esc(number_format((int) ($summary['staff'] ?? 0))) ?></h2>
        </div>
        <i class="bi bi-person-badge fs-2 text-uitm"></i>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-lg-3">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <p class="text-secondary mb-1">Active Today</p>
          <h2 class="h4 mb-0"><?= esc(number_format((int) ($summary['activeToday'] ?? 0))) ?></h2>
        </div>
        <i class="bi bi-calendar-check fs-2 text-uitm-gold"></i>
      </div>
    </div>
  </div>
</section>

<section class="card border-0 shadow-sm">
  <div class="card-header bg-white d-flex flex-column flex-lg-row gap-3 justify-content-between align-items-lg-center">
    <div>
      <h2 class="h5 mb-1">Member Directory</h2>
      <p class="text-secondary mb-0">Search and review student or staff membership records</p>
    </div>
    <div class="d-flex flex-column flex-sm-row gap-2">
      <input type="search" class="form-control" placeholder="Search member name or ID">
      <select class="form-select">
        <option selected>All Categories</option>
        <option value="student">Student</option>
        <option value="staff">Staff</option>
      </select>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light">
        <tr>
          <th scope="col">Member ID</th>
          <th scope="col">Name</th>
          <th scope="col">Category</th>
          <th scope="col">Faculty / Department</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($members as $member): ?>
          <tr>
            <td><?= esc($member['memberId']) ?></td>
            <td><?= esc($member['name']) ?></td>
            <td><span class="badge text-bg-<?= esc($member['categoryBadge']) ?>"><?= esc($member['category']) ?></span></td>
            <td><?= esc($member['unit']) ?></td>
            <td><span class="badge text-bg-<?= esc($member['statusBadge']) ?>"><?= esc($member['status']) ?></span></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>
<?= $this->endSection() ?>
