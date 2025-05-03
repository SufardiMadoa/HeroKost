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
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            padding: 25px;
            margin-bottom: 30px;
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
        
        /* Enhanced DataTable Styling */
        #example {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
            border-radius: 8px;
            overflow: hidden;
        }
        
        #example thead th {
            background: linear-gradient(135deg, #1a3253, #2a4a70);
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 15px 10px;
            border: none;
            position: relative;
        }
        
        #example tbody tr {
            transition: all 0.2s ease;
            border-bottom: 1px solid #f0f0f0;
        }
        
        #example tbody tr:hover {
            background-color: #f8f9ff;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        
        #example tbody td {
            padding: 12px 10px;
            vertical-align: middle;
            font-size: 0.9rem;
            color: #444;
            border: none;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .badge {
            padding: 6px 10px;
            border-radius: 30px;
            font-weight: 500;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }
        
        .bg-success {
            background-color: #28a745 !important;
            color: white;
        }
        
        .btn-group .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            border-radius: 0.2rem;
            margin-right: 5px;
        }
        
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
        }
        
        .btn-hapus {
            background-color: #dc3545;
            border-color: #dc3545;
            color: white;
            border: none;
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            border-radius: 0.2rem;
            cursor: pointer;
        }
        
        /* DataTables specific styling */
        .dataTables_wrapper .dataTables_length, 
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 20px;
            color: #495057;
        }
        
        .dataTables_wrapper .dataTables_length select, 
        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 6px 10px;
            background-color: #f8f9fa;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        
        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            outline: 0;
        }
        
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border-radius: 5px;
            margin: 0 3px;
            padding: 5px 12px;
            border: 1px solid #dee2e6;
            background-color: #fff;
            color: #495057;
            transition: all 0.2s;
        }
        
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #e9ecef;
            border-color: #dee2e6;
            color: #495057 !important;
        }
        
        .dataTables_wrapper .dataTables_paginate .paginate_button.current, 
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: linear-gradient(135deg, #1a3253, #2a4a70);
            border-color: #1a3253;
            color: white !important;
        }
        
        .dataTables_wrapper .dataTables_info {
            color: #6c757d;
            font-size: 0.875rem;
            padding-top: 0.85em;
        }
        
        /* General styling */
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
                        <h4><i class="fas fa-list-alt me-2"></i>Kelola Daftar Kost</h4>
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
new DataTable('#example', {
    language: {
        search: "<i class='fas fa-search'></i> Cari:",
        lengthMenu: "Tampilkan _MENU_ data per halaman",
        zeroRecords: "Tidak ada data yang ditemukan",
        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        infoEmpty: "Tidak ada data yang tersedia",
        infoFiltered: "(difilter dari _MAX_ total data)",
        paginate: {
            first: "<i class='fas fa-angle-double-left'></i>",
            last: "<i class='fas fa-angle-double-right'></i>",
            next: "<i class='fas fa-angle-right'></i>",
            previous: "<i class='fas fa-angle-left'></i>"
        }
    },
    responsive: true,
    columnDefs: [
        { className: "align-middle", targets: "_all" }
    ]
});
</script>

<?= $this->endSection(); ?>