<?= $this->extend('layout/admin-layout'); ?>
<?= $this->section('content'); ?>


<link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.dataTables.css">
<!-- Font Awesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
                    <h4><?= $totalKost ?>+</h4>
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
                    <h4><?= $totalUser ?>+</h4>
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
                        <!-- <div class="search-container">
                            <input type="text" class="form-control" placeholder="Cari ID Kost" style="padding-right: 50px;">
                            <button class="btn btn-dark" style="height: 100%; width: 50pxP;">
                                <i class="fas fa-search" style="color: #f5f5f5;"></i>
                            </button>
                        </div> -->
                    </div>
                    
                    <div class="card-body">
                <div class="table-responsive">
                <table id="example" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID_Kost</th>
                                    <th>Nama Kost</th>
                                    <th>Foto</th>
                                    <th>Harga</th>
                                    <th>Jenis</th>
                                    <th>Lokasi</th>
                                    <th>Kontak</th>
                                    <th>Status</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kosts as $kost): ?>
                                    <tr>
                                        <td><?= $kost['id_kost']; ?></td>
                                        <td><?= $kost['nama_kost']; ?></td>
                                        <td>
                                            <?php if (!empty($kost['foto_kost'])): ?>
                                                <img src="<?= base_url($kost['gambar_utama']['path_gambar']); ?>" alt="Foto Kost" width="50" class="img-thumbnail">
                                            <?php else: ?>
                                                <span class="text-muted">No Image</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>Rp. <?= number_format($kost['harga_kost'], 0, ',', '.'); ?></td>
                                        <td><?= $kost['jenis']; ?></td>
                                        <td><?= $kost['lokasi']; ?></td>
                                        <td><?= $kost['kontak']; ?></td>
                                        <td>
                                            <span class="badge bg-success">Ready</span>
                                        </td>
                                        <td><?= $kost['alamat_kost']; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url('admin/kost/edit/' . $kost['id_kost']); ?>" class="btn btn-sm btn-warning me-1">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <button type="button" class="btn-hapus" data-id="<?= $kost['id_kost']; ?>">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                </div>
            </div>
                    
                    <!-- <nav>
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
                    </nav> -->
                </div>
            </div>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>

<script>
new DataTable('#example');
</script>

<?= $this->endSection(); ?>