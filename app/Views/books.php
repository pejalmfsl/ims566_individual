<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?php $summary = $summary ?? []; $books = $books ?? []; ?>

<div class="hero-shell rounded-4 p-4 p-lg-5 mb-4">
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <div>
      <span class="badge bg-uitm mb-2">Books</span>
      <h1 class="h3 mb-1 text-uitm">Book Catalogue</h1>
    </div>
    <span class="badge bg-uitm-gold text-dark align-self-start align-self-md-center">Library Inventory</span>
  </div>
</div>

<section class="row g-3 mb-4">
  <div class="col-12 col-sm-6 col-lg-3">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <p class="text-secondary mb-1">Total Books</p>
          <h2 class="h4 mb-0"><?= esc(number_format((int) ($summary['totalBooks'] ?? 0))) ?></h2>
        </div>
        <i class="bi bi-book fs-2 text-uitm"></i>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-lg-3">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <p class="text-secondary mb-1">Available</p>
          <h2 class="h4 mb-0"><?= esc(number_format((int) ($summary['available'] ?? 0))) ?></h2>
        </div>
        <i class="bi bi-check-circle fs-2 text-uitm-gold"></i>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-lg-3">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <p class="text-secondary mb-1">Borrowed</p>
          <h2 class="h4 mb-0"><?= esc(number_format((int) ($summary['borrowed'] ?? 0))) ?></h2>
        </div>
        <i class="bi bi-arrow-left-right fs-2 text-uitm"></i>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-lg-3">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <p class="text-secondary mb-1">Reserved</p>
          <h2 class="h4 mb-0"><?= esc(number_format((int) ($summary['reserved'] ?? 0))) ?></h2>
        </div>
        <i class="bi bi-bookmark fs-2 text-uitm-gold"></i>
      </div>
    </div>
  </div>
</section>

<section class="card border-0 shadow-sm">
  <div class="card-header bg-white d-flex flex-column flex-lg-row gap-3 justify-content-between align-items-lg-center">
    <div>
      <h2 class="h5 mb-1">Book Inventory</h2>
    </div>
    <div class="d-flex flex-column flex-sm-row gap-2">
      <input type="search" class="form-control" placeholder="Search title, author or ISBN">
      <select class="form-select">
        <option selected>All Statuses</option>
        <option value="available">Available</option>
        <option value="borrowed">Borrowed</option>
        <option value="reserved">Reserved</option>
      </select>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light">
        <tr>
          <th scope="col">ISBN</th>
          <th scope="col">Title</th>
          <th scope="col">Author</th>
          <th scope="col">Category</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($books as $book): ?>
          <tr>
            <td><?= esc($book['isbn']) ?></td>
            <td><?= esc($book['title']) ?></td>
            <td><?= esc($book['author']) ?></td>
            <td><?= esc($book['category']) ?></td>
            <td><span class="badge text-bg-<?= esc($book['statusBadge']) ?>"><?= esc($book['status']) ?></span></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>
<?= $this->endSection() ?>
