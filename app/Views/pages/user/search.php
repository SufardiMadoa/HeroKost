<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="mb-4"><?= $title ?></h2>
        </div>
        <div class="col-md-4">
            <form action="<?= base_url('kost/search') ?>" method="get" class="d-flex">
                <input type="text" name="keyword" class="form-control me-2" placeholder="Cari kost..." value="<?= $keyword ?? '' ?>">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i> Cari
                </button>
            </form>
        </div>
    </div>

    <?php if (empty($kosts)): ?>
        <div class="col-md-12">
            <div class="alert alert-info">
                <?php if (!empty($keyword)): ?>
                    Tidak ada kost yang sesuai dengan pencarian "<?= esc($keyword) ?>".
                <?php else: ?>
                    Belum ada data kost tersedia.
                <?php endif; ?>
            </div>
        </div>
    <?php else: ?>
        <?php if (!empty($keyword)): ?>
            <div class="alert alert-success">
                Menampilkan hasil pencarian untuk "<?= esc($keyword) ?>"
            </div>
        <?php endif; ?>

        <div class="row g-4">
            <?php foreach ($kosts as $kost): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                    <?php if (!empty($kost['gambar_utama'])): ?>
              <img src="<?= base_url($kost['gambar_utama']['path_gambar']); ?>" class="card-img-top" alt="<?= $kost['nama_kost']; ?>">
            <?php else: ?>
                            <div class="bg-light text-center py-5">
                                <i class="bi bi-house-door fs-1 text-muted"></i>
                                <p class="text-muted">Tidak ada gambar</p>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title fw-bold"><?= $kost['nama_kost']; ?></h5>
                            <p class="card-text text-muted">
                                <i class="bi bi-geo-alt"></i> <?= $kost['alamat_kost']; ?>
                            </p>
                            
                            <?php if (!empty($kost['fasilitas'])): ?>
                                <div class="mb-3">
                                    <p class="mb-1 fw-bold">Fasilitas:</p>
                                    <ul class="list-unstyled">
                                        <?php foreach ($kost['fasilitas'] as $fasilitas): ?>
                                            <li><i class="bi bi-check-circle-fill text-success me-1"></i> <?= esc($fasilitas['nama_fasilitas']) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="card-footer bg-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fs-5 fw-bold text-primary">Rp <?= number_format($kost['harga_kost'], 0, ',', '.'); ?> / bulan</span>
                                <a href="<?= base_url('kost/detail/' . $kost['id_kost']); ?>" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        
    <?php endif; ?>
</div>

<?= $this->endSection(); ?>