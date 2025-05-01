<?= $this->extend('layout/admin-layout'); ?>

<?= $this->section('content'); ?>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .welcome-card {
            background-color: #1a3253;
            color: white;
        }
        .stats-icon {
            background-color: #1a3253;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .table-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .search-container {
            position: relative;
        }
        .search-container .btn {
            position: absolute;
            right: 0;
            top: 0;
            border-radius: 0 5px 5px 0;
        }
        .action-btn {
            border-radius: 20px;
            font-size: 14px;
            padding: 4px 12px;
        }
        .table-responsive {
            overflow-x: auto;
        }
        .table th {
            background-color: #1a3253;
            color: white;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }
        .col-md-4 {
            flex: 0 0 33.333333%;
            max-width: 33.333333%;
            padding: 0 10px;
        }
        .mb-3 {
            margin-bottom: 1rem;
        }
        .mb-4 {
            margin-bottom: 1.5rem;
        }
        .card-stat {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            height: 100%;
        }
        
        .card-stat h4 {
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 5px;
            color: #333;
        }
        
        .stats-icon {
            width: 48px;
            height: 48px;
            background-color: #f8f9fa;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: #212529;
        }
        
        .welcome-card {
            background-color: #0f3057;
            color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .welcome-card .card-body {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .welcome-card img {
            width: 65px;
            height: 65px;
            object-fit: cover;
        }
        
        .text-muted {
            color: #6c757d !important;
        }
        
        /* Responsive adjustments */
        @media (max-width: 767.98px) {
            .welcome-card .card-body {
                flex-direction: column;
                text-align: center;
            }
            
            .welcome-card img {
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row my-4">
            <div class="col-md-12">
                <h2 class="mb-">Dashboard Admin Hero Kost</h2>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class=" pb-4">
        <div class="row g-1">
            <!-- Total Daftar Kost -->
            <div class="col-md-3">
                <div class="card-stat">
                    <div>
                        <h4>468+</h4>
                        <small class="text-muted">Total Daftar Kost</small>
                    </div>
                    <div class="stats-icon">
                        <i class="fas fa-home"></i>
                    </div>
                </div>
            </div>

            <!-- Total Customer -->
            <div class="col-md-3">
                <div class="card-stat">
                    <div>
                        <h4>123+</h4>
                        <small class="text-muted">Total Customer</small>
                    </div>
                    <div class="stats-icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>

            <!-- Welcome Card -->
            <div class="col-md-6">
                <div class="welcome-card ">
                    <div class="card-body">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" class="rounded" alt="Admin Profile">
                        <div>
                            <h6 class="mb-1 fw-bold">Selamat Datang, di Dashboard Admin Hero Kost!</h6>
                            <p class="mb-0 small">
                                Kelola data kost dengan lebih mudah dan efisien! Dengan dashboard ini, kamu bisa mengelola listing kost dan memastikan setiap rekomendasi tetap <i>worth it</i> dan terpercaya.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <!-- Main Content -->
        <div class="row">
            <div class="col-md-12">
                <div class="table-container">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4>Kelola Daftar Kost</h4>
                        <div class="search-container">
                            <input type="text" class="form-control" placeholder="Cari ID Kost" style="padding-right: 50px;">
                            <button class="btn btn-dark">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID_Kost</th>
                                    <th>Nama Kost</th>
                                    <th>Detail Kost</th>
                                    <th>Foto</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Kontak</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 1; $i <= 10; $i++): ?>
                                <tr>
                                    <td>PA-001</td>
                                    <td>Kost Putra Soekarno</td>
                                    <td>Fasilitas: Kamar Mandi Dalam</td>
                                    <td><img src="https://via.placeholder.com/50" alt="Foto Kost" class="rounded"></td>
                                    <td>Rp. 850.000</td>
                                    <td><span class="badge bg-success">Ready</span></td>
                                    <td>cp:081211*****</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger action-btn">Hapus</button>
                                    </td>
                                </tr>
                                <?php endfor; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>
