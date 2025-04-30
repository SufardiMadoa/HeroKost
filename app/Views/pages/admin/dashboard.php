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
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0,0,0,.125);
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            height: 100%;
        }
        .card-body {
            flex: 1 1 auto;
            padding: 1.25rem;
            display: flex;
            align-items: center;
        }
        .card-title {
            margin-bottom: 0.5rem;
            font-weight: 600;
            font-size: 1.1rem;
        }
        .card-subtitle {
            color: #6c757d;
            margin-bottom: 0.25rem;
            font-size: 0.875rem;
        }
        .card-text {
            margin-bottom: 0;
            font-size: 0.875rem;
            line-height: 1.4;
        }
        .stats-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background-color: #f0f4f9;
            margin-right: 1rem;
        }
        .stats-icon i {
            font-size: 1.5rem;
            color: #0e2c5a;
        }
        .me-3 {
            margin-right: 1rem;
        }
        .h-100 {
            height: 100%;
        }
        h3.card-title {
            font-size: 1.75rem;
            margin-bottom: 0;
            font-weight: 700;
            color: #212529;
        }
        .welcome-card {
            background-color: #0e2c5a;
            color: white;
        }
        .welcome-card .card-title {
            color: white;
            margin-bottom: 0.5rem;
        }
        .welcome-card .card-text {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.8rem;
        }
        .rounded {
            border-radius: 50% !important;
            width: 50px;
            height: 50px;
        }
        .small {
            font-size: 0.875rem;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .col-md-4 {
                flex: 0 0 50%;
                max-width: 50%;
            }
        }
        @media (max-width: 768px) {
            .col-md-4 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row my-4">
            <div class="col-md-12">
                <h2 class="mb-4">Dashboard Admin Hero Kost</h2>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <div>
                        <h6 class="card-subtitle text-muted">Total Daftar Kost</h6>
                        <h3 class="card-title">468+</h3>
                    </div>
                    <div class="stats-icon" style="margin-left: auto;">
                        <i class="fas fa-home"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <div>
                        <h6 class="card-subtitle text-muted">Total Customer</h6>
                        <h3 class="card-title">123+</h3>
                    </div>
                    <div class="stats-icon" style="margin-left: auto;">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card welcome-card h-100">
                <div class="card-body">
                    <div class="me-3">
                        <img src="/api/placeholder/60/60" class="rounded" alt="Admin Profile">
                    </div>
                    <div>
                        <h5 class="card-title">Selamat Datang, di Dashboard Admin Hero Kost!</h5>
                        <p class="card-text small">Kelola data kost dengan lebih mudah dan efisien! Dengan dashboard ini, kamu bisa mengelola listing kost dan memastikan setiap rekomendasi tetap worth it dan terpercaya.</p>
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
