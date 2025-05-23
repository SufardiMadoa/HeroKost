<link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>

<nav style="z-index: auto; z-index: 200;" class="navbar navbar-expand-lg navbar-light bg-white position-fixed top-0 start-0 end-0 shadow-sm ">
  <div class="container ">
    <a class="navbar-brand" href="#">
      <img style="width:143px;" src="<?= base_url('images/logo.png') ?>" alt="HIRDKOST Logo" />
    </a>
    
    <?php if (session()->get('role') != 'pemilik'): ?>
    <!-- Tombol toggle menu hanya ditampilkan jika bukan role pemilik -->
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('') ?>">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('#tentang') ?>">Tentang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url(relativePath: 'rekomendasi') ?>">Rekomendasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('#testimoni') ?>">Testimoni</a>
        </li>
      </ul>
    <?php endif; ?>

      <div class="<?= session()->get('role') != 'pemilik' ? 'd-flex' : 'ms-auto' ?>">
        <?php if (!session()->get('logged_in')): ?>
          <!-- Tombol untuk user yang belum login -->
          <a href="<?= site_url('login') ?>" class="btn me-2">Log in</a>
          <a href="<?= site_url('register') ?>" class="btn btn-sign-up bg-dark text-white">Sign Up</a>
        <?php else: ?>
          <!-- Avatar dengan inisial untuk user yang sudah login -->
          <?php
          // Ambil nama dari session
          $nama = session()->get('nama_user') ?? 'User';

          // Ambil inisial (karakter pertama dari setiap kata dalam nama)
          $namaParts = explode(' ', $nama);
          $inisial   = '';

          // Ambil hanya 2 huruf pertama jika ada
          foreach ($namaParts as $idx => $part) {
            if ($idx < 2 && !empty($part)) {
              $inisial .= strtoupper(substr($part, 0, 1));
            }
          }

          // Jika inisial kosong atau kurang dari 1 karakter, gunakan 'U' (User)
          if (strlen($inisial) < 1) {
            $inisial = 'U';
          }

          // Generate warna background yang konsisten berdasarkan nama
          $hash       = md5($nama);
          $colorValue = hexdec(substr($hash, 0, 6)) % 360;  // Nilai hue untuk HSL
          ?>
          
          <div class="dropdown">
            <a class="dropdown-toggle d-flex align-items-center hidden-arrow text-decoration-none" 
               href="#" 
               id="navbarDropdownMenuAvatar" 
               role="button" 
               data-bs-toggle="dropdown" 
               aria-expanded="false">
              <div class="rounded-circle d-flex justify-content-center align-items-center text-white" 
                   style="background-color: hsl(<?= $colorValue ?>, 70%, 50%); width: 35px; height: 35px; font-weight: bold;">
                <?= $inisial ?>
              </div>
              
            </a>
            <ul
              class="dropdown-menu dropdown-menu-end"
              aria-labelledby="navbarDropdownMenuAvatar"
            >
              <?php if (session()->get('role') == 'pemilik'): ?>
              
              <li><hr class="dropdown-divider"></li>
              <?php endif; ?>
              <li>
                <a class="dropdown-item" href="<?= site_url('riwayat-pembayaran') ?>">Riwayat</a>
              </li>
              <li>
                <a class="dropdown-item" href="<?= site_url('logout') ?>">Logout</a>
              </li>
            </ul>
          </div>
        <?php endif; ?>
      </div>
    <?php if (session()->get('role') != 'pemilik'): ?>
    </div>
    <?php endif; ?>
  </div>
</nav>