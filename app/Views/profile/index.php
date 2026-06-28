<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?php $profile = $profile ?? []; ?>

<div class="hero-shell rounded-4 p-4 p-lg-5 mb-4">
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <div>
      <span class="badge bg-uitm mb-2">Profile</span>
      <h1 class="h3 mb-1 text-uitm">Staff Profile</h1>
    </div>
    <div class="text-md-end">
      <p class="text-secondary mb-1">Current access</p>
      <h2 class="h5 mb-0 text-uitm"><?= esc($currentUsername ?? 'guest') ?></h2>
    </div>
  </div>
</div>

<section class="row g-4 align-items-stretch">
  <div class="col-12 col-lg-3">
    <div class="card border-0 shadow-sm h-100 overflow-hidden">
      <img src="<?= base_url('assets/images/faizal.jpg') ?>" class="img-fluid" alt="Profile picture of Faizal">
      <div class="card-body text-center">
        <h2 class="h4 text-uitm mb-1">Mohd Faizal Sawardi Lukman</h2>
        <p class="text-secondary mb-3">Library Officer</p>
        <div class="d-flex justify-content-center gap-2 flex-wrap">
          <span class="badge bg-uitm">UiTM</span>
          <span class="badge bg-uitm-gold text-dark">Library Staff</span>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12 col-lg-9">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-header bg-white">
        <h2 class="h5 mb-1">Personal Details</h2>
        <p class="text-secondary mb-0">Key contact information</p>
      </div>
      <div class="card-body">
        <div class="row g-3">
          <div class="col-12 col-md-6">
            <div class="p-3 rounded-4 bg-light h-100">
              <p class="text-secondary small mb-1">Name</p>
              <div class="fw-semibold text-uitm">Mohd Faizal Sawardi Lukman</div>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="p-3 rounded-4 bg-light h-100">
              <p class="text-secondary small mb-1">Phone Number</p>
              <div class="fw-semibold text-uitm">+60162667061</div>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="p-3 rounded-4 bg-light h-100">
              <p class="text-secondary small mb-1">Email</p>
              <div class="fw-semibold text-uitm">2023183251@student.uitm.edu.my</div>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="p-3 rounded-4 bg-light h-100">
              <p class="text-secondary small mb-1">Department</p>
              <div class="fw-semibold text-uitm">Bahagian Perkhidmatan Pelanggan</div>
            </div>
          </div>
          <div class="col-12">
            <div class="p-3 rounded-4 bg-white border h-100">
              <p class="text-secondary small mb-1">Office</p>
              <div class="fw-semibold text-uitm">Perpustakaan Tun Abdul Razak, UiTM</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>
