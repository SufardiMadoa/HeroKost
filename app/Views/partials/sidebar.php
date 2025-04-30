<link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">

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
        <a href="#" class="nav-link">
          <i class="bi bi-person-badge"></i>
          Pemilik Kost
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
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
      </a>
    </div>
  </div>