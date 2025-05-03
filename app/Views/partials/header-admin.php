<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

<style>
  .navbar {
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    padding: 15px 20px;
    border-radius: 10px;
  }
  
  .search-bar {
    position: relative;
    max-width: 400px;
    width: 100%;
  }
  
  .search-bar input {
    padding: 10px 15px 10px 40px;
    border-radius: 50px;
    border: 1px solid #e1e5eb;
    width: 100%;
    font-size: 14px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
  }
  
  .search-bar i {
    position: absolute;
    top: 50%;
    left: 15px;
    transform: translateY(-50%);
    color: #6c757d;
    font-size: 16px;
  }
  
  .notification-icon {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background-color: #f8f9fa;
    border-radius: 50%;
  }
  
  .badge-notification {
    position: absolute;
    top: -5px;
    right: -5px;
    font-size: 10px;
    padding: 3px 6px;
  }
  
  .user-profile img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #e9ecef;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  }
  
  .navbar-toggler {
    border: none;
    background-color: #f8f9fa;
    border-radius: 5px;
    padding: 8px 10px;
  }
  
  .navbar-toggler:focus {
    box-shadow: none;
    outline: none;
  }
  
  .dropdown-menu {
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    padding: 10px 0;
    border: none;
  }
  
  .dropdown-item {
    padding: 8px 20px;
    font-size: 14px;
  }
  
  .dropdown-item:hover {
    background-color: #f8f9fa;
  }
  
  .dropdown-divider {
    margin: 5px 0;
  }
  
  @media (max-width: 768px) {
    .search-bar {
      margin: 10px 0;
      max-width: 100%;
    }
    
    .navbar .container-fluid {
      flex-wrap: nowrap;
    }
  }
</style>

<header class="navbar navbar-expand-lg navbar-light bg-white mb-4">
  <div class="container-fluid">
    <!-- Sidebar Toggle Button -->
    <button id="sidebarToggle" class="navbar-toggler me-3">
      <i class="bi bi-list"></i>
    </button>
    
    
    
    <!-- Search Bar -->
    <div class="search-bar  flex-grow-1">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" placeholder="Cari Daftar Kost...">
    </div>
    
    <!-- Right Side Menu Items -->
    <div class="ms-auto d-flex align-items-center gap-3">
      <!-- Notifications Dropdown -->
      
      
      <!-- User Profile Dropdown -->
      <div class="d-flex">
        <?php if (!session()->get('logged_in')): ?>
          <!-- Tombol untuk user yang belum login -->
          
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
            <a class="dropdown-toggle d-flex align-items-center hidden-arrow" 
               href="" 
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
              
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item" href="<?= site_url('logout') ?>">Logout</a>
              </li>
            </ul>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</header>

<!-- Bootstrap JS with Popper -->
<script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>

<script>
  // Toggle sidebar functionality
  document.getElementById('sidebarToggle').addEventListener('click', function() {
    document.querySelector('.sidebar').classList.toggle('collapsed');
    document.querySelector('.main-content').classList.toggle('expanded');
  });
  
  // Initialize dropdowns
  var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
  var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
    return new bootstrap.Dropdown(dropdownToggleEl);
  });
</script>