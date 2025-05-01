<link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<<<<<<< HEAD
<div class="sidebar">
    <div class="sidebar-header">
      <img src="<?= base_url('images/logo.png') ?>" alt="HeroKost Logo" class="img-fluid">
    </div>
    
    <ul class="nav flex-column mt-4">
      <li class="nav-item">
        <a href="<?= site_url('admin/') ?>" class="nav-link active">
          <i class="bi bi-speedometer2"></i>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= site_url('admin/kost') ?>" class="nav-link">
          <i class="bi bi-house-door"></i>
          Kost
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= site_url('admin/pemilik') ?>" class="nav-link">
          <i class="bi bi-person-badge"></i>
          Pemilik Kost
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= site_url('admin/pelanggan') ?>" class="nav-link">
          <i class="bi bi-people"></i>
          Pelanggan
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= site_url('admin/fasilitas') ?>" class="nav-link">
          <i class="bi bi-star"></i>
          Fasilitas
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="bi bi-graph-up"></i>
          Laporan
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="bi bi-gear"></i>
          Pengaturan
        </a>
      </li>
    </ul>
    
    <div class="sidebar-footer">
      <a href="<?= site_url('/logout') ?>" class="btn btn-outline-light btn-sm w-100">
        <i class="bi bi-box-arrow-left"></i> Logout
=======
<?php
$uri = service('uri');  // Mengambil segment URI
?>

<div class="sidebar bg-dark text-white p-3" style="min-height: 100vh;">
  <div class="sidebar-header mb-4 text-center">
    <img src="<?= base_url('images/logo.png') ?>" alt="HeroKost Logo" class="img-fluid" style="max-height: 80px;">
  </div>
  
  <ul class="nav flex-column">
    <li class="nav-item">
      <a href="<?= site_url('admin') ?>" class="nav-link text-white <?= $uri->getSegment(2) == '' ? 'active bg-primary' : '' ?>">
        <i class="bi bi-speedometer2"></i> Dashboard
>>>>>>> 9aedf008f51eec6e105a4c4c69648d79100236cb
      </a>
    </li>
    
    <li class="nav-item">
      <a href="<?= site_url('admin/kost') ?>" class="nav-link text-white <?= $uri->getSegment(2) == 'kost' ? 'active bg-primary' : '' ?>">
        <i class="bi bi-house-door"></i> Kost
      </a>
    </li>
    
    <li class="nav-item">
      <a href="<?= site_url('admin/pemilik') ?>" class="nav-link text-white <?= $uri->getSegment(2) == 'pemilik' ? 'active bg-primary' : '' ?>">
        <i class="bi bi-person-badge"></i> Pemilik Kost
      </a>
    </li>
    
    <li class="nav-item">
      <a href="<?= site_url('admin/pelanggan') ?>" class="nav-link text-white <?= $uri->getSegment(2) == 'pelanggan' ? 'active bg-primary' : '' ?>">
        <i class="bi bi-people"></i> Pelanggan
      </a>
    </li>
    
    <li class="nav-item">
      <a href="<?= site_url('admin/fasilitas') ?>" class="nav-link text-white <?= $uri->getSegment(2) == 'fasilitas' ? 'active bg-primary' : '' ?>">
        <i class="bi bi-star"></i> Fasilitas
      </a>
    </li>
  </ul>
  
  <div class="sidebar-footer mt-auto">
    <a href="<?= site_url('/logout') ?>" class="btn btn-outline-light btn-sm w-100 ">
      <i class="bi bi-box-arrow-left"></i> Logout
    </a>
  </div>
</div>
