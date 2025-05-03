<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HeroKost Admin Dashboard</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">


  <style>
    body {
            background-color: #f5f5f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 250px;
      height: 100vh;
      
      color: #fff;
      z-index: 1000;
      transition: all 0.3s;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }
    
    .sidebar-header {
      padding: 20px;
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    
    .sidebar-header img {
      height: 40px;
    }
    
    .sidebar .nav-link {
      padding: 15px 20px;
      color: rgba(255,255,255,0.7);
      border-radius: 5px;
      margin: 5px 10px;
      transition: all 0.3s;
    }
    
    .sidebar .nav-link:hover {
      background-color: rgba(255,255,255,0.1);
      color: #fff;
    }
    
    .sidebar .nav-link.active {
      background-color: #e63946;
      color: #fff;
      box-shadow: 0 5px 10px rgba(230, 57, 70, 0.2);
    }
    
    .sidebar .nav-link i {
      margin-right: 10px;
      width: 24px;
      text-align: center;
      font-size: 1.25rem;
    }
    
    .sidebar-footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      margin-right: 20px;
      padding: 20px;
      padding-right: 60px;
      border-top: 1px solid rgba(255,255,255,0.1);
    }
    
    .main-content {
      margin-left: 250px;
      transition: all 0.3s;
      padding: 20px;
    }
    
    .navbar {
      background-color: #fff;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
      transition: all 0.3s;
    }
    
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 15px rgba(0,0,0,0.1);
    }
    
    .stat-card {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      position: relative;
      overflow: hidden;
    }
    
    .stat-card .icon {
      position: absolute;
      right: 20px;
      top: 20px;
      width: 50px;
      height: 50px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
    }
    
    .stat-card.kost .icon {
      background: rgba(230, 57, 70, 0.1);
      color: #e63946;
    }
    
    .stat-card.customer .icon {
      background: rgba(29, 53, 87, 0.1);
      color: #1d3557;
    }
    
    .welcome-card {
      background: linear-gradient(to right, #1d3557, #457b9d);
      color: #fff;
      padding: 30px;
      border-radius: 10px;
      position: relative;
      overflow: hidden;
    }
    
    .welcome-card::before {
      content: '';
      position: absolute;
      top: -30px;
      right: -30px;
      width: 200px;
      height: 200px;
      background: rgba(255,255,255,0.1);
      border-radius: 50%;
    }
    
    .welcome-card img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid rgba(255,255,255,0.3);
    }
    
    .table {
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .table thead {
      background-color: #1d3557;
      color: #fff;
    }
    
    .btn-hapus {
      background-color: #e63946;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 0.85rem;
      padding: 5px 15px;
      cursor: pointer;
      transition: all 0.3s;
    }
    
    .btn-hapus:hover {
      background-color: #d62828;
    }
    
    .search-bar {
      position: relative;
    }
    
    .search-bar input {
      padding-left: 40px;
      border-radius: 20px;
      border: 1px solid #e1e5eb;
    }
    
    .search-bar i {
      position: absolute;
      top: 50%;
      left: 15px;
      transform: translateY(-50%);
      color: #6c757d;
    }
    
    .pagination {
      justify-content: center;
      margin-top: 20px;
    }
    
    .pagination .page-item.active .page-link {
      background-color: #1d3557;
      border-color: #1d3557;
    }
    
    .pagination .page-link {
      color: #1d3557;
      border-radius: 5px;
      margin: 0 3px;
    }
    
    .user-profile {
      display: flex;
      align-items: center;
    }
    
    .user-profile img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #e63946;
    }
    
    @media (max-width: 768px) {
      .sidebar {
        margin-left: -250px;
      }
      .sidebar.active {
        margin-left: 0;
      }
      .main-content {
        margin-left: 0;
        width: 100%;
      }
      .main-content.active {
        margin-left: 250px;
      }
      .navbar-toggler {
        display: block;
      }
    }
  </style>
</head>
<body>

  <?= view('partials/sidebar') ?>
  
  
  <!-- Main Content -->
  <div class="main-content">
    <?= view('partials/header-admin') ?>
  <?= $this->renderSection('content') ?>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
  <script>
    // Toggle sidebar on mobile
    document.getElementById('sidebarToggle').addEventListener('click', function() {
      document.querySelector('.sidebar').classList.toggle('active');
      document.querySelector('.main-content').classList.toggle('active');
    });
  </script>
</body>
</html>