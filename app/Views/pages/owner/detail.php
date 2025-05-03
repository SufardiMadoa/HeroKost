
    <!-- Font Awesome & Other CDN Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #222831;
            --secondary-color: #393E46;
            --accent-color: #00ADB5;
            --light-color: #EEEEEE;
            --warning-color: #FFD369;
            --danger-color: #FF5252;
            --success-color: #66BB6A;
            --transition: all 0.3s ease;
            --shadow-sm: 0 4px 6px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 6px 12px rgba(0, 0, 0, 0.08);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 24px;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }
        
        .floating-action-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
            background: var(--accent-color);
            border-radius: 50%;
            height: 60px;
            width: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-md);
            text-decoration: none;
        }
        
        .floating-action-btn i {
            color: white;
            font-size: 24px;
        }
        
        .property-header {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            padding: 2.5rem 0;
            color: white;
            border-radius: var(--radius-lg);
            margin-bottom: 2rem;
            box-shadow: var(--shadow-md);
        }
        
        .property-title {
            font-weight: 700;
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
        }
        
        .location-badge {
            display: inline-flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.1);
            padding: 8px 15px;
            border-radius: 30px;
        }
        
        .btn-modern {
            border-radius: 50px;
            padding: 10px 25px;
            font-weight: 600;
            box-shadow: var(--shadow-sm);
            border: none;
        }
        
        .btn-modern-primary {
            background-color: var(--accent-color);
            color: white;
        }
        
        .btn-modern-primary:hover {
            background-color: #0097a7;
            color: white;
        }
        
        .btn-modern-danger {
            background-color: var(--danger-color);
            color: white;
        }
        
        .btn-modern-danger:hover {
            background-color: #e53935;
            color: white;
        }
        
        .image-gallery {
            position: relative;
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-md);
        }
        
        .main-image {
            height: 450px;
            width: 100%;
            object-fit: cover;
        }
        
        .gallery-controls {
            position: absolute;
            bottom: 20px;
            right: 20px;
            display: flex;
            gap: 10px;
        }
        
        .gallery-control-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
        }
        
        .thumbnail-gallery {
            margin-top: 15px;
            display: flex;
            gap: 10px;
            overflow-x: auto;
            padding: 5px 0;
            scroll-behavior: smooth;
        }
        
        .thumbnail-gallery::-webkit-scrollbar {
            height: 6px;
        }
        
        .thumbnail-gallery::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .thumbnail-gallery::-webkit-scrollbar-thumb {
            background: var(--accent-color);
            border-radius: 10px;
        }
        
        .thumbnail {
            width: 100px;
            height: 70px;
            border-radius: var(--radius-sm);
            object-fit: cover;
            cursor: pointer;
            opacity: 0.7;
            border: 2px solid transparent;
        }
        
        .thumbnail:hover, .thumbnail.active {
            opacity: 1;
            border-color: var(--accent-color);
        }
        
        .card-modern {
            border: none;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-md);
            overflow: hidden;
            margin-bottom: 25px;
        }
        
        .card-header-modern {
            background: var(--primary-color);
            color: white;
            padding: 1.2rem 1.5rem;
            font-weight: 600;
            font-size: 1.1rem;
            border-bottom: none;
        }
        
        .card-body-modern {
            padding: 1.5rem;
        }
        
        .price-display {
            background: linear-gradient(135deg, var(--accent-color), #26c6da);
            color: white;
            padding: 15px 20px;
            border-radius: var(--radius-md);
            font-size: 1.3rem;
            font-weight: 700;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        
        .price-icon {
            background: rgba(255, 255, 255, 0.2);
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }
        
        .status-badge-modern {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            border-radius: var(--radius-md);
            font-weight: 600;
            margin-bottom: 20px;
            box-shadow: var(--shadow-sm);
            width: 100%;
            justify-content: center;
        }
        
        .status-available {
            background-color: var(--success-color);
            color: white;
        }
        
        .status-occupied {
            background-color: var(--danger-color);
            color: white;
        }
        
        .toggle-status-btn {
            width: 100%;
            padding: 12px;
            border-radius: var(--radius-md);
            font-weight: 600;
            border: none;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .toggle-occupied {
            background-color: var(--warning-color);
            color: #333;
        }
        
        .toggle-available {
            background-color: var(--success-color);
            color: white;
        }
        
        .nav-pills-modern {
            border-radius: var(--radius-md);
            overflow: hidden;
            background: var(--light-color);
            padding: 5px;
            display: flex;
            margin-bottom: 20px;
        }
        
        .nav-pills-modern .nav-link {
            border-radius: var(--radius-sm);
            padding: 10px 20px;
            font-weight: 600;
            color: var(--secondary-color);
            margin: 0 5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .nav-pills-modern .nav-link.active {
            background: var(--accent-color);
            color: white;
            box-shadow: var(--shadow-sm);
        }
        
        .nav-pills-modern .nav-link:hover:not(.active) {
            background: rgba(0, 0, 0, 0.05);
        }
        
        .section-title-modern {
            color: var(--primary-color);
            font-weight: 700;
            position: relative;
            padding-left: 15px;
            margin-bottom: 25px;
        }
        
        .section-title-modern::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 5px;
            background: var(--accent-color);
            border-radius: 5px;
        }
        
        .info-card {
            background: white;
            border-radius: var(--radius-md);
            padding: 20px;
            box-shadow: var(--shadow-sm);
            margin-bottom: 15px;
        }
        
        .info-card-icon {
            background: rgba(0, 173, 181, 0.1);
            color: var(--accent-color);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-right: 15px;
        }
        
        .facility-item {
            display: flex;
            align-items: center;
            background: white;
            padding: 12px 15px;
            border-radius: var(--radius-sm);
            margin-bottom: 10px;
            box-shadow: var(--shadow-sm);
        }
        
        .facility-icon {
            background: rgba(0, 173, 181, 0.1);
            color: var(--accent-color);
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1rem;
        }
        
        .detail-card {
            background: white;
            border-radius: var(--radius-md);
            padding: 15px;
            box-shadow: var(--shadow-sm);
            margin-bottom: 15px;
            border-left: 3px solid var(--accent-color);
        }
        
        .detail-title {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 5px;
        }
        
        .gallery-thumbnail-wrapper {
            position: relative;
            border-radius: var(--radius-sm);
            overflow: hidden;
            margin-bottom: 10px;
        }
        
        .delete-image-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background: var(--danger-color);
            color: white;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            opacity: 0;
        }
        
        .gallery-thumbnail-wrapper:hover .delete-image-btn {
            opacity: 1;
        }
        
        @media (max-width: 768px) {
            .property-title {
                font-size: 1.8rem;
            }
            
            .main-image {
                height: 350px;
            }
            
            .floating-action-btn {
                height: 50px;
                width: 50px;
                bottom: 20px;
                right: 20px;
            }
        }
    </style>
    <div class="container" style="padding-top: 80px;">
        <!-- Property Header -->
        <div class="property-header" style="padding-left: 40px; padding-right: 40px;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-md-7">
                        <h1 class="property-title"><?= $kost['nama_kost']; ?></h1>
                        <div class="location-badge">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            <?= $kost['alamat_kost']; ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5 text-md-end mt-3 mt-md-0">
                        <a href="<?= base_url('pemilik/kost/edit/' . $kost['id_kost']); ?>" class="btn btn-modern btn-modern-primary me-2">
                            <i class="fas fa-edit me-1"></i> Edit
                        </a>
                        <button type="button" class="btn btn-modern btn-modern-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="fas fa-trash-alt me-1"></i> Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row">
            <!-- Left Column: Photo Gallery & Details -->
            <div class="col-lg-8">
                <!-- Image Gallery -->
                <div class="image-gallery mb-4">
                    <?php if (empty($gambar)): ?>
                        <img src="<?= base_url('assets/img/no-image.jpg'); ?>" class="main-image" id="mainImage" alt="No Image Available">
                    <?php else: ?>
                        <img src="<?= base_url($gambar[0]['path_gambar']); ?>" class="main-image" id="mainImage" alt="<?= $kost['nama_kost']; ?>">
                    <?php endif; ?>
                    
                    <div class="gallery-controls">
                        <button class="gallery-control-btn" id="prevImage">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="gallery-control-btn" id="nextImage">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Thumbnails -->
                <?php if (!empty($gambar)): ?>
                <div class="thumbnail-gallery">
                    <?php foreach ($gambar as $index => $img): ?>
                        <img src="<?= base_url($img['path_gambar']); ?>" 
                             class="thumbnail <?= $index === 0 ? 'active' : ''; ?>" 
                             data-index="<?= $index; ?>"
                             alt="Thumbnail">
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                
                <!-- Thumbnails with Delete -->
                <div class="row g-2 mb-4 mt-3">
                    <?php foreach ($gambar as $img): ?>
                        <div class="col-6 col-md-3">
                            <div class="gallery-thumbnail-wrapper">
                                <img src="<?= base_url($img['path_gambar']); ?>" class="img-fluid w-100 h-100 object-fit-cover" style="border-radius: var(--radius-sm);" alt="Thumbnail">
                                <a href="<?= base_url('pemilik/kost/delete-image/' . $img['id_gambar']); ?>" 
                                   class="delete-image-btn" 
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus gambar ini?')">
                                    <i class="fas fa-times"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Tabs for Details -->
                <div class="card-modern">
                    <div class="card-body-modern">
                        <ul class="nav nav-pills-modern" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-overview-tab" data-bs-toggle="pill" data-bs-target="#pills-overview" type="button" role="tab">
                                    <i class="fas fa-home"></i> Overview
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-facilities-tab" data-bs-toggle="pill" data-bs-target="#pills-facilities" type="button" role="tab">
                                    <i class="fas fa-clipboard-list"></i> Fasilitas
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-details-tab" data-bs-toggle="pill" data-bs-target="#pills-details" type="button" role="tab">
                                    <i class="fas fa-info-circle"></i> Detail
                                </button>
                            </li>
                        </ul>
                        
                        <div class="tab-content" id="pills-tabContent">
                            <!-- Overview Tab -->
                            <div class="tab-pane fade show active" id="pills-overview" role="tabpanel">
                                <h4 class="section-title-modern">Deskripsi</h4>
                                <div class="mb-4">
                                    <?= $kost['deskripsi_kost']; ?>
                                </div>
                                
                                <h4 class="section-title-modern">Informasi Properti</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="info-card d-flex align-items-center">
                                            <div class="info-card-icon">
                                                <i class="fas fa-venus-mars"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-bold">Jenis Kost</h6>
                                                <p class="mb-0"><?= ucfirst($kost['jenis']); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-card d-flex align-items-center">
                                            <div class="info-card-icon">
                                                <i class="fas fa-map"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-bold">Lokasi</h6>
                                                <p class="mb-0"><?= $kost['lokasi']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-card d-flex align-items-center">
                                            <div class="info-card-icon">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-bold">Kontak</h6>
                                                <p class="mb-0"><?= $kost['kontak']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-card d-flex align-items-center">
                                            <div class="info-card-icon">
                                                <i class="fas fa-calendar-check"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-bold">Terakhir Diperbarui</h6>
                                                <p class="mb-0"><?= date('d M Y', strtotime($kost['updated_at'])); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Facilities Tab -->
                            <div class="tab-pane fade" id="pills-facilities" role="tabpanel">
                                <h4 class="section-title-modern">Fasilitas Tersedia</h4>
                                <?php if (empty($fasilitas)): ?>
                                    <div class="alert alert-light">
                                        <i class="fas fa-info-circle me-2"></i> Tidak ada fasilitas tersedia
                                    </div>
                                <?php else: ?>
                                    <div class="row">
                                        <?php foreach ($fasilitas as $index => $f): ?>
                                            <div class="col-md-6">
                                                <div class="facility-item">
                                                    <div class="facility-icon">
                                                        <i class="fas fa-check"></i>
                                                    </div>
                                                    <span><?= $f['nama_fasilitas']; ?></span>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Additional Details Tab -->
                            <div class="tab-pane fade" id="pills-details" role="tabpanel">
                                <h4 class="section-title-modern">Detail Tambahan</h4>
                                <?php if (empty($detailTambahan)): ?>
                                    <div class="alert alert-light">
                                        <i class="fas fa-info-circle me-2"></i> Tidak ada detail tambahan
                                    </div>
                                <?php else: ?>
                                    <div class="row">
                                        <?php foreach ($detailTambahan as $index => $detail): ?>
                                            <div class="col-md-6">
                                                <div class="detail-card">
                                                    <h6 class="detail-title"><?= $detail['label']; ?></h6>
                                                    <p class="mb-0"><?= $detail['deskripsi']; ?></p>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Summary and Actions -->
            <div class="col-lg-4">
                <!-- Price and Status Card -->
                <div class="card-modern " style="top: 20px;">
                    <div class="card-header-modern">
                        <i class="fas fa-home me-2"></i> Informasi Kamar
                    </div>
                    <div class="card-body-modern">
                        <div class="price-display">
                            <div class="d-flex align-items-center">
                                <div class="price-icon">
                                    <i class="fas fa-tag"></i>
                                </div>
                                <div>
                                    <div class="fs-6 opacity-75">Harga</div>
                                    <div class="fs-4 fw-bold">Rp <?= number_format($kost['harga_kost'], 0, ',', '.'); ?></div>
                                </div>
                            </div>
                            <div class="fs-6">per bulan</div>
                        </div>
                        
                        <div class="status-badge-modern <?= $kost['status'] == 'ready' ? 'status-available' : 'status-occupied'; ?>">
                            <i class="fas <?= $kost['status'] == 'ready' ? 'fa-check-circle' : 'fa-times-circle'; ?> me-2"></i>
                            <?= $kost['status'] == 'ready' ? 'Tersedia' : 'Sudah Terisi'; ?>
                        </div>
                        
                        <!-- Toggle Status Button -->
                        <button class="toggle-status-btn <?= $kost['status'] == 'ready' ? 'toggle-occupied' : 'toggle-available'; ?>" 
                                data-id="<?= $kost['id_kost']; ?>" 
                                data-status="<?= $kost['status'] == 'ready' ? 'soldout' : 'ready'; ?>">
                            <i class="fas <?= $kost['status'] == 'ready' ? 'fa-user-slash' : 'fa-user-check'; ?>"></i>
                            <?= $kost['status'] == 'ready' ? 'Tandai Sudah Terisi' : 'Tandai Tersedia'; ?>
                        </button>
                        
                        <!-- Quick Info List -->
                        <div class="mt-4">
                            <h5 class="mb-3 fw-bold">Info Singkat</h5>
                            
                            <div class="info-list">
                                <div class="info-item d-flex align-items-center p-3 bg-light rounded-3 mb-3">
                                    <div class="flex-shrink-0 me-3 text-center" style="width: 35px; color: var(--accent-color);">
                                        <i class="fas fa-building"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="text-secondary small">Tipe</div>
                                        <div class="fw-semibold">Kost <?= ucfirst($kost['jenis']); ?></div>
                                    </div>
                                </div>
                                
                                <div class="info-item d-flex align-items-center p-3 bg-light rounded-3 mb-3">
                                    <div class="flex-shrink-0 me-3 text-center" style="width: 35px; color: var(--accent-color);">
                                        <i class="fas fa-map-marked-alt"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="text-secondary small">Lokasi</div>
                                        <div class="fw-semibold"><?= $kost['lokasi']; ?></div>
                                    </div>
                                </div>
                                
                                <div class="info-item d-flex align-items-center p-3 bg-light rounded-3">
                                    <div class="flex-shrink-0 me-3 text-center" style="width: 35px; color: var(--accent-color);">
                                        <i class="fas fa-list-alt"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="text-secondary small">Fasilitas Utama</div>
                                        <div class="fw-semibold">
                                        <?php
                                        if (!empty($fasilitas)) {
                                            $fasilitasShown = array_slice($fasilitas, 0, 3);
                                            foreach ($fasilitasShown as $index => $f) {
                                                echo $f['nama_fasilitas'];
                                                if ($index < count($fasilitasShown) - 1) {
                                                    echo ', ';
                                                }
                                            }
                                            if (count($fasilitas) > 3) {
                                                echo ' <span class="badge rounded-pill text-bg-primary">' . (count($fasilitas) - 3) . '+</span>';
                                            }
                                        } else {
                                            echo '<span class="text-muted">Tidak ada data</span>';
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0" style="border-radius: var(--radius-md); overflow: hidden;">
                <div class="modal-header bg-danger text-white border-0">
                    <h5 class="modal-title" id="deleteModalLabel">
                        <i class="fas fa-exclamation-triangle me-2"></i> Konfirmasi Hapus
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="text-center mb-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-danger-subtle text-danger rounded-circle mb-3" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-trash-alt fa-2x"></i>
                        </div>
                    </div>
                    <p class="text-center">Apakah Anda yakin ingin menghapus data kost <strong><?= $kost['nama_kost']; ?></strong>?</p>
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <strong>Perhatian:</strong> Tindakan ini tidak dapat dibatalkan dan semua data terkait akan dihapus permanen.
                    </div>
                </div>
                <div class="modal-footer border-0 justify-content-center gap-2">
                    <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i> Batal
                    </button>
                    <a href="<?= base_url('pemilik/kost/delete/' . $kost['id_kost']); ?>" class="btn btn-danger px-4">
                        <i class="fas fa-trash-alt me-2"></i> Hapus Permanen
                    </a>
                </div>
            </div>
        </div>
    </div>
    
 

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- AOS Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
    
    <script>
        $(document).ready(function() {
            // Initialize AOS
            AOS.init({
                duration: 800,
                once: true
            });
            
            // Handle status toggle with page refresh
            $('.toggle-status-btn').click(function() {
                const id = $(this).data('id');
                const newStatus = $(this).data('status');
                
                $.ajax({
                    url: '<?= base_url('pemilik/kost/update-status'); ?>',
                    type: 'POST',
                    data: {
                        id: id,
                        status: newStatus
                    },
                    success: function(response) {
                        const data = JSON.parse(response);
                        if (data.success) {
                            // Show success toast
                            showToast(data.message, 'success');
                            // Refresh the page to show updated status
                            setTimeout(function() {
                                location.reload();
                            }, 1500);
                        } else {
                            showToast(data.message, 'error');
                        }
                    },
                    error: function() {
                        showToast('Terjadi kesalahan. Silakan coba lagi.', 'error');
                    }
                });
            });

            // Image gallery functionality
            const images = <?= json_encode(array_column($gambar, 'path_gambar')) ?>;
            let currentIndex = 0;
            
            if (images.length > 0) {
                // Next image function
                $('#nextImage').click(function() {
                    currentIndex = (currentIndex + 1) % images.length;
                    updateMainImage();
                });
                
                // Previous image function
                $('#prevImage').click(function() {
                    currentIndex = (currentIndex - 1 + images.length) % images.length;
                    updateMainImage();
                });
                
                // Thumbnail click function
                $('.thumbnail').click(function() {
                    currentIndex = parseInt($(this).data('index'));
                    updateMainImage();
                });
                
                // Update main image and active thumbnail
                function updateMainImage() {
                    $('#mainImage').fadeOut(200, function() {
                        $(this).attr('src', '<?= base_url() ?>' + images[currentIndex]);
                        $(this).fadeIn(200);
                    });
                    
                    // Update active thumbnail
                    $('.thumbnail').removeClass('active');
                    $(`.thumbnail[data-index="${currentIndex}"]`).addClass('active');
                }
            }
            
            // Custom toast function
            function showToast(message, type) {
                // Create toast element
                const toast = $(`
                    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header ${type === 'success' ? 'bg-success text-white' : 'bg-danger text-white'}">
                                <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'} me-2"></i>
                                <strong class="me-auto">${type === 'success' ? 'Sukses' : 'Error'}</strong>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                ${message}
                            </div>
                        </div>
                    </div>
                `);
                
                // Append to body
                $('body').append(toast);
                
                // Remove after 3 seconds
                setTimeout(function() {
                    toast.remove();
                }, 3000);
            }
            
            // Keyboard navigation for gallery
            $(document).keydown(function(e) {
                if (images.length > 0) {
                    if (e.keyCode === 37) { // Left arrow
                        $('#prevImage').click();
                    } else if (e.keyCode === 39) { // Right arrow
                        $('#nextImage').click();
                    }
                }
            });
            
            
            
            $('body').append(addImageBtn);
        });
    </script>