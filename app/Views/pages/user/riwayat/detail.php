<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    .contact-btn {
    background-color: #25D366;
    color: white;
    border: none;
    border-radius: 10px;
    padding: 10px 20px;
    font-weight: 600;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .contact-btn:hover {
    background-color: #128C7E;
    color: white;
    transform: translateY(-2px);
  }

  .contact-btn i {
    margin-right: 8px;
    font-size: 1.2rem;
  }
</style>
<div class="container " style="padding-top: 80px;">
    <!-- Alert Messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill me-2"></i>
                <?= session()->getFlashdata('success') ?>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-exclamation-circle-fill me-2"></i>
                <?= session()->getFlashdata('error') ?>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Back Button -->
    <div class="mb-4">
        <a href="<?= base_url('/riwayat-pembayaran') ?>" class="btn btn-outline-dark btn-sm rounded-pill px-3">
            <i class="bi bi-arrow-left me-2"></i> Kembali ke Riwayat Pembayaran
        </a>
    </div>

    <div class="row g-4">
        <!-- Payment Info -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 rounded-3 h-100">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h5 class="fw-bold text-dark">Informasi Pembayaran</h5>
                </div>
                <div class="card-body p-4">
                    <?php
                    $badgeClass = 'bg-warning';
                    $badgeIcon  = 'clock';

                    if ($pembayaran['status_pembayaran'] == 'Sukses') {
                        $badgeClass = 'bg-success';
                        $badgeIcon  = 'check-circle';
                    } elseif ($pembayaran['status_pembayaran'] == 'Ditolak' || $pembayaran['status_pembayaran'] == 'Dibatalkan') {
                        $badgeClass = 'bg-danger';
                        $badgeIcon  = 'x-circle';
                    }
                    ?>

                    <div class="text-center mb-4">
                        <span class="badge <?= $badgeClass ?> fs-6 py-2 px-4 rounded-pill">
                            <i class="bi bi-<?= $badgeIcon ?> me-1"></i>
                            <?= $pembayaran['status_pembayaran'] ?>
                        </span>
                    </div>

                    <div class="card bg-light rounded-3 border-0 p-3 mb-4">
                        <div class="mb-3">
                            <span class="text-muted small d-block mb-1">ID Pembayaran</span>
                            <span class="fw-bold fs-6">#<?= $pembayaran['id_pembayaran'] ?></span>
                        </div>
                        
                        <div class="mb-3">
                            <span class="text-muted small d-block mb-1">Tanggal Bayar</span>
                            <span class="fw-medium"><?= date('d M Y', strtotime($pembayaran['tanggal_bayar'])) ?></span>
                        </div>
                        
                        <div>
                            <span class="text-muted small d-block mb-1">Jumlah</span>
                            <span class="fw-bold fs-5">Rp <?= number_format($pembayaran['jumlah_bayar'], 0, ',', '.') ?></span>
                        </div>
                        <div style="margin-top: 20px;">
                            <?php $admin_phone = isset($kost['no_hp']) ? $kost['no_hp'] : '6281234567890'; ?>
                            <a href="https://wa.me/<?= $admin_phone ?>" class="contact-btn w-100 mb-4">
                                <i class="fab fa-whatsapp"></i> 
                                Hubungi Pemilik
                            </a>
                        </div>
                    </div>
                   
                    
                    <h6 class="fw-bold mb-3">Bukti Pembayaran</h6>
                    <div class="text-center mb-3">
                        <div class="position-relative overflow-hidden rounded-3 shadow-sm mb-3">
                            <img src="<?= base_url('uploads/bukti/' . $pembayaran['bukti_pembayaran']) ?>" 
                                 alt="Bukti Pembayaran" 
                                 class="img-fluid w-100" 
                                 style="max-height: 300px; object-fit: cover;">
                            <a href="<?= base_url('uploads/bukti/' . $pembayaran['bukti_pembayaran']) ?>" 
                               class="position-absolute bottom-0 end-0 m-2 btn btn-sm btn-dark rounded-circle"
                               target="_blank">
                                <i class="bi bi-arrows-fullscreen"></i>
                            </a>
                        </div>
                    </div>
                    
                    <?php if ($pembayaran['status_pembayaran'] == 'Pending'): ?>
                        <div class="d-grid gap-2 mt-4">
                            <a href="<?= base_url('/riwayat-pembayaran/batalkan/' . $pembayaran['id_pembayaran']) ?>" 
                               class="btn btn-outline-danger rounded-pill py-2"
                               onclick="return confirm('Apakah Anda yakin ingin membatalkan pembayaran ini?')">
                                <i class="bi bi-x-circle me-2"></i> Batalkan Pembayaran
                            </a>
                        </div>
                    <?php elseif ($pembayaran['status_pembayaran'] == 'Ditolak'): ?>
                        <div class="d-grid gap-2 mt-4">
                            <a href="<?= base_url('/riwayat-pembayaran/update-bukti/' . $pembayaran['id_pembayaran']) ?>" 
                               class="btn btn-primary rounded-pill py-2">
                                <i class="bi bi-arrow-repeat me-2"></i> Update Bukti Pembayaran
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Kost Info -->
        <div class="col-lg-8 d-flex flex-column">
            <div class="card shadow-sm border-0 rounded-3 mb-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h3 class="fw-bold text-dark mb-2"><?= $kost['nama_kost'] ?></h3>
                            <span class="badge bg-dark rounded-pill px-3 py-2 mb-2">
                                <i class="bi bi-house-door me-1"></i> <?= $kost['jenis'] ?>
                            </span>
                        </div>
                        <div class="text-end">
                            <p class="text-muted small mb-1">Harga</p>
                            <p class="fw-bold fs-4">Rp <?= number_format($kost['harga_kost'], 0, ',', '.') ?></p>
                        </div>
                    </div>
                    
                    <div class="card bg-light border-0 rounded-3 p-3 mb-4">
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-geo-alt-fill text-dark me-2"></i>
                            <h6 class="fw-bold mb-0">Alamat</h6>
                        </div>
                        <p class="mb-0"><?= $kost['alamat_kost'] ?></p>
                    </div>
                    
                    <div class="mb-0">
                        <h6 class="fw-bold mb-3">Deskripsi</h6>
                        <p class="text-muted mb-0"><?= $kost['deskripsi_kost'] ?></p>
                    </div>
                </div>
            </div>

            <!-- Image Gallery -->
            <?php if (!empty($gambar)): ?>
                <div class="card shadow-sm border-0 rounded-3 mb-4">
                    <div class="card-header bg-white border-0 pt-4 pb-0 d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold text-dark mb-0">Galeri Kost</h5>
                        <span class="badge bg-light text-dark rounded-pill">
                            <i class="bi bi-images me-1"></i> <?= count($gambar) ?> Foto
                        </span>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <?php foreach ($gambar as $img): ?>
                                <div class="col-6 col-md-4">
                                    <div class="position-relative overflow-hidden rounded-3 shadow-sm h-100">
                                        <img src="<?= base_url($img['path_gambar']) ?>" 
                                             alt="<?= $kost['nama_kost'] ?>" 
                                             class="img-fluid w-100 h-100" 
                                             style="object-fit: cover; aspect-ratio: 4/3;">
                                        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-10 opacity-0 hover-opacity-100 transition-opacity d-flex align-items-center justify-content-center">
                                            <a href="<?= base_url($img['path_gambar']) ?>" 
                                               class="btn btn-sm btn-dark rounded-circle"
                                               target="_blank">
                                                <i class="bi bi-zoom-in"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Facilities -->
            <?php if (!empty($fasilitas)): ?>
                <div class="card shadow-sm border-0 rounded-3 mb-4">
                    <div class="card-header bg-white border-0 pt-4 pb-0">
                        <h5 class="fw-bold text-dark mb-0">Fasilitas</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <?php foreach ($fasilitas as $fas): ?>
                                <div class="col-md-4 col-6">
                                    <div class="d-flex align-items-center p-2 rounded-3 bg-light">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        <span class="fw-medium"><?= $fas['nama_fasilitas'] ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Additional Details -->
            <?php if (!empty($detailTambahan)): ?>
                <div class="card shadow-sm border-0 rounded-3 mb-4">
                    <div class="card-header bg-white border-0 pt-4 pb-0">
                        <h5 class="fw-bold text-dark mb-0">Detail Tambahan</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <?php foreach ($detailTambahan as $detail): ?>
                                <div class="col-md-6">
                                    <div class="card border-0 bg-light rounded-3 p-3 h-100">
                                        <h6 class="fw-bold text-dark mb-2"><?= $detail['label'] ?></h6>
                                        <p class="mb-0"><?= $detail['deskripsi'] ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>