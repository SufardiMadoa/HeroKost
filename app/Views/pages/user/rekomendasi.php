<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="container mt-4">
    <h1><?= $title; ?></h1>
    
    <div class="row mb-4">
        <div class="col-md-6">
            <form action="/kost/search" method="get" class="d-flex">
                <input type="text" class="form-control me-2" name="keyword" placeholder="Cari nama atau alamat kost..." value="<?= isset($keyword) ? $keyword : ''; ?>">
                <button class="btn btn-primary" type="submit">Cari</button>
            </form>
        </div>
        <div class="col-md-6">
            <form action="/kost/filter" method="get" class="d-flex">
                <input type="number" class="form-control me-2" name="min_price" placeholder="Harga min" value="<?= isset($min_price) ? $min_price : ''; ?>">
                <input type="number" class="form-control me-2" name="max_price" placeholder="Harga max" value="<?= isset($max_price) ? $max_price : ''; ?>">
                <button class="btn btn-outline-primary" type="submit">Filter</button>
            </form>
        </div>
    </div>
    
    <div class="row">
        <?php if (empty($kosts)): ?>
            <div class="col-md-12">
                <div class="alert alert-info">
                    Data kost tidak ditemukan.
                </div>
            </div>
        <?php else: ?>
            <?php foreach ($kosts as $kost): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <?php if (!empty($kost['gambar_utama'])): ?>
                            <img src="<?= base_url('uploads/' . $kost['gambar_utama']['path_gambar']); ?>" class="card-img-top" alt="<?= $kost['nama_kost']; ?>" style="height: 200px; object-fit: cover;">
                        <?php else: ?>
                            <div class="bg-light text-center py-5">
                                <i class="fa fa-home fa-3x text-muted"></i>
                                <p class="text-muted">Tidak ada gambar</p>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= $kost['nama_kost']; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?= $kost['alamat_kost']; ?></h6>
                            <p class="card-text fw-bold text-primary">Rp <?= number_format($kost['harga_kost'], 0, ',', '.'); ?> / bulan</p>
                            <p class="card-text"><?= substr($kost['deskripsi_kost'], 0, 100); ?>...</p>
                            <?php if ($kost['jumlah_fasilitas'] > 0): ?>
                                <p class="card-text"><small class="text-muted"><i class="fa fa-check-circle"></i> <?= $kost['jumlah_fasilitas']; ?> fasilitas tersedia</small></p>
                            <?php endif; ?>
                            <a href="<?= site_url('kost/detail/') . $kost['id_kost']; ?>" class="btn btn-primary w-100">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    
    <!-- Pagination -->
    
</div>
<?= $this->endSection(); ?>