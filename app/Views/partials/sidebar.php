<link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
<link rel="stylesheet" xhref="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.dataTables.css">
<style>
     #example thead th {
        background-color: #1a3253 !important;
        color: #fff !important;
    }
    .table thead {
        background-color: #000;
        color: #fff;
    }

    .dataTables_filter {
        text-align: right !important;
    }

    .dataTables_filter input {
        border-radius: 5px;
        border: 1px solid #ced4da;
        padding: 5px 10px;
        outline: none;
        transition: 0.3s ease;
    }

    .dataTables_filter input:focus {
        border-color: #495057;
        box-shadow: 0 0 0 0.2rem rgba(0,0,0,0.1);
    }
</style>
<?php
$uri = service('uri');  // Mengambil segment URI
?>

<div  class="sidebar bg-white p-3 shadow" style="min-height: 100vh;">
  <div class="sidebar-header mb-4 text-center">
    <img src="<?= base_url('images/logo.png') ?>" alt="HeroKost Logo" class="img-fluid" style="max-height: 80px;">
  </div>
  
  <ul class="nav flex-column">
    <li class="nav-item mb-2">
      <a href="<?= site_url('admin') ?>" class="nav-link <?= $uri->getSegment(2) == '' ? 'active bg-dark text-white' : 'text-dark' ?>">
        <i class="bi bi-speedometer2"></i> Dashboard
      </a>
    </li>
    
    <li class="nav-item mb-2">
      <a href="<?= site_url('admin/kost') ?>" class="nav-link <?= $uri->getSegment(2) == 'kost' ? 'active bg-dark text-white' : 'text-dark' ?>">
        <i class="bi bi-house-door"></i> Kost
      </a>
    </li>
    
    <li class="nav-item mb-2">
      <a href="<?= site_url('/admin/pemilik-kost') ?>" class="nav-link <?= $uri->getSegment(2) == 'pemilik-kost' ? 'active bg-dark text-white' : 'text-dark' ?>">
        <i class="bi bi-person-badge"></i> Pemilik Kost
      </a>
    </li>
    
    <li class="nav-item mb-2">
      <a href="<?= site_url('admin/pelanggan') ?>" class="nav-link <?= $uri->getSegment(2) == 'pelanggan' ? 'active bg-dark text-white' : 'text-dark' ?>">
        <i class="bi bi-people"></i> Pelanggan
      </a>
    </li>
    
    <li class="nav-item mb-2">
      <a href="<?= site_url('admin/fasilitas') ?>" class="nav-link <?= $uri->getSegment(2) == 'fasilitas' ? 'active bg-dark text-white' : 'text-dark' ?>">
        <i class="bi bi-star"></i> Fasilitas
      </a>
    </li>
  </ul>
  
  <div class="sidebar-footer mt-auto">
    <a href="<?= site_url('/logout') ?>" class="btn btn-dark btn-sm w-100">
      <i class="bi bi-box-arrow-left"></i> Logout
    </a>
  </div>
</div>

<!-- javascript -->
 <script>
  new DataTable('#example');
 </script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>