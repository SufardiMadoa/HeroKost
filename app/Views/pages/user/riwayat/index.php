<div class="container " style="padding-top: 70px;">
    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold text-dark">Riwayat Pembayaran</h2>
            <p class="text-secondary">Daftar riwayat pembayaran kost Anda</p>
        </div>
    </div>

    <!-- Alert Messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Payment History Cards -->
    <?php if (empty($pembayaran)): ?>
        <div class="card shadow-sm border-0 rounded-3 mb-4">
            <div class="card-body text-center py-5">
                <img src="<?= base_url('assets/images/empty.svg') ?>" alt="No Data" class="mb-4" style="max-width: 180px;">
                <h5 class="text-secondary fw-bold">Belum ada riwayat pembayaran</h5>
                <p class="text-muted">Anda belum melakukan pembayaran kost apapun</p>
                <a href="<?= base_url('/rekomendasi') ?>" class="btn btn-dark mt-3 px-4 py-2 rounded-pill">Lihat Rekomendasi Kost</a>
            </div>
        </div>
    <?php else: ?>
        <div class="row g-4">
            <?php foreach ($pembayaran as $item): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm border-0 h-100 rounded-3 overflow-hidden">
                        <?php
                        // Query untuk mendapatkan gambar kost
                        $db      = \Config\Database::connect();
                        $builder = $db->table('gambar_kost');
                        $builder->where('id_kost', $item['id_kost']);
                        $builder->limit(1);
                        $gambar = $builder->get()->getRowArray();

                        $gambarPath = !empty($gambar) ? $gambar['path_gambar'] : 'default.jpg';
                        ?>
                        
                        <div class="position-relative">
                            <img src="<?= base_url($gambarPath) ?>" 
                                 class="card-img-top" 
                                 alt="<?= $item['nama_kost'] ?>"
                                 style="height: 180px; object-fit: cover;">
                                 
                            <div class="position-absolute top-0 end-0 m-3">
                                <?php
                                $badgeClass = 'bg-warning';
                                $badgeIcon  = 'clock';

                                if ($item['status_pembayaran'] == 'Sukses') {
                                  $badgeClass = 'bg-success';
                                  $badgeIcon  = 'check-circle';
                                } elseif ($item['status_pembayaran'] == 'Ditolak' || $item['status_pembayaran'] == 'Dibatalkan') {
                                  $badgeClass = 'bg-danger';
                                  $badgeIcon  = 'x-circle';
                                }
                                ?>
                                <span class="badge <?= $badgeClass ?> px-3 py-2 rounded-pill">
                                    <i class="bi bi-<?= $badgeIcon ?> me-1"></i>
                                    <?= $item['status_pembayaran'] ?>
                                </span>
                            </div>
                        </div>
                        
                        <div class="card-body p-4">
                            <h5 class="fw-bold text-dark mb-3"><?= $item['nama_kost'] ?></h5>
                            
                            <div class="row g-3 mb-3">
                                <div class="col-6">
                                    <div class="d-flex flex-column">
                                        <span class="text-muted small mb-1">Tanggal Bayar</span>
                                        <span class="fw-medium"><?= date('d M Y', strtotime($item['tanggal_bayar'])) ?></span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex flex-column">
                                        <span class="text-muted small mb-1">Jumlah</span>
                                        <span class="fw-bold">Rp <?= number_format($item['jumlah_bayar'], 0, ',', '.') ?></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <span class="text-muted small d-block mb-1">Alamat</span>
                                <span class="fw-medium"><?= substr($item['alamat_kost'], 0, 40) . (strlen($item['alamat_kost']) > 40 ? '...' : '') ?></span>
                            </div>
                            
                            <div class="d-flex justify-content-between pt-3 border-top">
                                <a href="<?= base_url('/riwayat-pembayaran/detail/' . $item['id_pembayaran']) ?>" 
                                   class="btn btn-sm btn-dark rounded-pill px-3">
                                    <i class="bi bi-info-circle me-1"></i> Detail
                                </a>
                                
                                <?php if ($item['status_pembayaran'] == 'Pending'): ?>
                                    <a href="<?= base_url('/riwayat-pembayaran/batalkan/' . $item['id_pembayaran']) ?>" 
                                       class="btn btn-sm btn-outline-danger rounded-pill px-3"
                                       onclick="return confirm('Apakah Anda yakin ingin membatalkan pembayaran ini?')">
                                        <i class="bi bi-x-circle me-1"></i> Batalkan
                                    </a>
                                <?php elseif ($item['status_pembayaran'] == 'Ditolak'): ?>
                                    <a href="<?= base_url('/riwayat-pembayaran/update-bukti/' . $item['id_pembayaran']) ?>" 
                                       class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                        <i class="bi bi-arrow-repeat me-1"></i> Update Bukti
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>