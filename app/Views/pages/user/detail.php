<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item"><a href="/kost/list" class="text-decoration-none">Daftar Kost</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $kost['nama_kost']; ?></li>
                </ol>
            </nav>
            <h1 class="display-5 fw-bold"><?= $kost['nama_kost']; ?></h1>
            <p class="text-muted">
                <i class="bi bi-geo-alt-fill me-1"></i> <?= $kost['alamat_kost']; ?>
            </p>
        </div>
        <div class="col-md-4 text-md-end d-flex align-items-center justify-content-md-end">
            <a href="/kost/list" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row g-4">
        <!-- Gambar Kost Column -->
        <div class="col-lg-7 mb-4">
            <?php if (!empty($gambarKost)): ?>
                <div id="carouselGambarKost" class="carousel slide rounded shadow overflow-hidden" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php $first = true;
                        foreach ($gambarKost as $gambar): ?>
                        <div class="carousel-item <?= $first ? 'active' : ''; ?>">
                            <img src="<?= base_url('uploads/' . $gambar['path_gambar']); ?>" class="d-block w-100" alt="Gambar Kost" style="height: 400px; object-fit: cover;">
                        </div>
                        <?php $first = false;
                        endforeach; ?>
                    </div>
                    <?php if (count($gambarKost) > 1): ?>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselGambarKost" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselGambarKost" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <div class="carousel-indicators">
                        <?php for ($i = 0; $i < count($gambarKost); $i++): ?>
                        <button type="button" data-bs-target="#carouselGambarKost" data-bs-slide-to="<?= $i ?>" <?= $i == 0 ? 'class="active"' : '' ?> aria-current="<?= $i == 0 ? 'true' : 'false' ?>" aria-label="Slide <?= $i + 1 ?>"></button>
                        <?php endfor; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="text-center mt-2">
                    <small class="text-muted"><?= count($gambarKost) ?> foto tersedia</small>
                </div>
            <?php else: ?>
                <div class="card bg-light h-100 shadow-sm">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center py-5">
                        <i class="bi bi-image text-muted" style="font-size: 4rem;"></i>
                        <p class="text-muted mt-3">Belum ada foto tersedia untuk kost ini</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Info Dan Action Column -->
        <div class="col-lg-5">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="h5 fw-bold text-primary mb-0">Informasi Harga</h2>
                        <span class="badge bg-primary rounded-pill py-2 px-3">Available</span>
                    </div>
                    <h3 class="display-6 fw-bold">Rp <?= number_format($kost['harga_kost'], 0, ',', '.'); ?></h3>
                    <p class="text-muted">per bulan</p>
                    <hr>
                    <div class="d-grid gap-2">
                        <a href="#" class="btn btn-success btn-lg">
                            <i class="bi bi-whatsapp me-2"></i>Hubungi Pemilik
                        </a>
                        <a href="https://maps.google.com/?q=<?= $kost['alamat_kost']; ?>" target="_blank" class="btn btn-outline-primary">
                            <i class="bi bi-geo-alt me-2"></i>Lihat di Peta
                        </a>
                    </div>
                </div>
            </div>

            <!-- Fasilitas Card -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <h2 class="h5 fw-bold mb-0">
                        <i class="bi bi-list-check me-2"></i>Fasilitas
                    </h2>
                </div>
                <div class="card-body">
                    <?php if (empty($fasilitasKost)): ?>
                        <div class="text-center py-3">
                            <i class="bi bi-x-circle text-muted" style="font-size: 2rem;"></i>
                            <p class="text-muted mt-2">Tidak ada fasilitas tercatat</p>
                        </div>
                    <?php else: ?>
                        <div class="row g-2">
                            <?php foreach ($fasilitasKost as $fasilitas): ?>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center p-2 border rounded-3 bg-light">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        <span><?= $fasilitas['nama_fasilitas']; ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Deskripsi dan Detail -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <ul class="nav nav-tabs card-header-tabs" id="kostDetailTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="deskripsi-tab" data-bs-toggle="tab" data-bs-target="#deskripsi" type="button" role="tab" aria-controls="deskripsi" aria-selected="true">Deskripsi</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail" type="button" role="tab" aria-controls="detail" aria-selected="false">Detail Info</button>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="kostDetailTabsContent">
                        <div class="tab-pane fade show active" id="deskripsi" role="tabpanel" aria-labelledby="deskripsi-tab">
                            <div class="p-2">
                                <h3 class="h5 fw-bold mb-3">Deskripsi Kost</h3>
                                <div class="bg-light p-3 rounded">
                                    <?= nl2br($kost['deskripsi_kost']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                            <div class="p-2">
                                <h3 class="h5 fw-bold mb-3">Informasi Detail</h3>
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th style="width: 200px;" class="text-muted">ID Kost</th>
                                            <td>#<?= $kost['id']; ?></td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted">Tanggal Ditambahkan</th>
                                            <td><?= date('d F Y', strtotime($kost['created_at'])); ?></td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted">Terakhir Diperbarui</th>
                                            <td><?= date('d F Y', strtotime($kost['updated_at'])); ?></td>
                                        </tr>
                                        <!-- Tambahkan detail lainnya jika ada -->
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>