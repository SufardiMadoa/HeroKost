<link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
<nav class="navbar navbar-expand-lg bg-white shadow-sm position-absolute
">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="<?= base_url('logo/logo.png') ?>" alt="Logo" width="143" height="40" class="d-inline-block align-text-top me-2">
      <!-- <strong>HERO KOST</strong> -->
    </a>

    <!-- Toggle button untuk mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active fw-bold" aria-current="page" href="#">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tentang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Rekomendasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Testimoni</a>
        </li>
      </ul>

      <!-- Tombol Log In dan Sign Up -->
      <div class="d-flex gap-2">
        <a href="#" class="text-decoration-none align-self-center">Log In</a>
        <a href="#" class="btn btn-dark rounded-pill px-4">Sign Up</a>
      </div>
    </div>
  </div>
</nav>
<script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>