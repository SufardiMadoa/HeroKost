<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-dark">
            <i class="bi bi-house-heart"></i> Daftar Kost Saya
        </h1>
        <a href="<?= base_url('pemilik'); ?>" class="btn btn-dark">
            <i class="bi bi-plus-circle"></i> Tambah Kost Baru
        </a>
    </div>
    
    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        <?= session()->getFlashdata('success'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>
    
    <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        <?= session()->getFlashdata('error'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>
    
    <!-- Search and Filter Section -->
    <div class="card bg-black text-white shadow-sm mb-4 rounded-4">
        <div class="card-body p-4">
            <div class="d-flex align-items-center">
                <div class="input-group">
                    <span class="input-group-text bg-dark border-0 text-white">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" id="search-input" class="form-control bg-dark border-0 text-white" placeholder="Cari kost...">
                </div>
            </div>
            
        </div>
    </div>
    
    <!-- Kost Cards -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="kost-container">
        <?php if (empty($kosts)): ?>
            <div class="col-12 text-center py-5">
                <img src="<?= base_url('assets/img/empty.svg'); ?>" alt="Tidak ada data" class="img-fluid mb-3" style="max-height: 200px;">
                <h4 class="text-muted">Belum ada data kost</h4>
                <p>Silahkan tambahkan data kost baru</p>
            </div>
        <?php else: ?>
            <?php foreach ($kosts as $kost): ?>
                <div class="col kost-item" 
                     data-jenis="<?= $kost['jenis']; ?>"
                     data-lokasi="<?= $kost['lokasi']; ?>"
                     data-status="<?= $kost['status']; ?>"
                     data-nama="<?= $kost['nama_kost']; ?>">
                    <div class="card h-100 shadow-sm hover-card border-0">
                        <div class="position-relative">
                            <img src="<?= base_url($kost['thumbnail']); ?>" class="card-img-top rounded-top" alt="<?= $kost['nama_kost']; ?>" style="height: 220px; object-fit: cover;">
                            <div class="position-absolute top-0 start-0 p-3">
                                <span class="badge <?= $kost['status'] === 'ready' ? 'bg-success' : 'bg-danger'; ?> rounded-pill px-3 py-2 fs-7">
                                    <?= $kost['status'] === 'ready' ? 'Tersedia' : 'Penuh'; ?>
                                </span>
                            </div>
                            <div class="position-absolute top-0 end-0 p-3">
                                <span class="badge bg-dark rounded-pill px-3 py-2 fs-7">
                                    <?= $kost['jenis']; ?>
                                </span>
                            </div>
                            <div class="kost-overlay">
                                <a href="<?= base_url('pemilik/kost/detail/' . $kost['id_kost']); ?>" class="btn btn-sm btn-light rounded-pill px-3">
                                    <i class="bi bi-eye-fill me-1"></i> Lihat Detail
                                </a>
                            </div>
                        </div>
                        <div class="card-body pt-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="card-title fw-bold text-truncate mb-0"><?= $kost['nama_kost']; ?></h5>
                                <?php if (session()->get('role') === 'admin' || session()->get('role') === 'pemilik'): ?>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-light rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                            <li>
                                                <a href="<?= base_url('pemilik/kost/edit/' . $kost['id_kost']); ?>" class="dropdown-item">
                                                    <i class="bi bi-pencil-square me-2 text-warning"></i> Edit
                                                </a>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <button class="dropdown-item text-danger btn-delete" data-id="<?= $kost['id_kost']; ?>" data-name="<?= $kost['nama_kost']; ?>">
                                                    <i class="bi bi-trash me-2"></i> Hapus
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <p class="card-text text-truncate text-muted mb-2">
                                <i class="bi bi-geo-alt-fill text-danger"></i> <?= $kost['alamat_kost']; ?>
                            </p>
                            
                            <div class="d-flex align-items-center mb-3">
                                <span class="badge bg-light text-dark me-2">
                                    <i class="bi bi-geo-fill"></i> <?= $kost['lokasi']; ?>
                                </span>
                                <span class="badge bg-light text-dark">
                                    <i class="bi bi-telephone-fill"></i> <?= $kost['kontak']; ?>
                                </span>
                            </div>
                            
                            <h4 class="fw-bold mb-3">Rp <?= number_format($kost['harga_kost'], 0, ',', '.'); ?><span class="fs-6 text-muted fw-normal">/bulan</span></h4>
                            
                            <div class="mb-3">
                                <div class="small text-muted mb-1">Fasilitas:</div>
                                <div class="d-flex flex-wrap gap-1">
                                    <?php $count = 0; ?>
                                    <?php foreach ($kost['fasilitas'] as $fas): ?>
                                        <?php if ($count < 4): ?>
                                            <span class="badge bg-light text-dark"><?= $fas['nama_fasilitas']; ?></span>
                                        <?php $count++;
      endif; ?>
                                    <?php endforeach; ?>
                                    
                                    <?php if (count($kost['fasilitas']) > 4): ?>
                                        <span class="badge bg-dark text-white">+<?= count($kost['fasilitas']) - 4; ?> lainnya</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <?php
                            $status         = $kost['status'];  // 'ready' atau 'soldout'
                            $statusText     = $status === 'ready' ? 'Tersedia' : 'Penuh';
                            $nextStatus     = $status === 'ready' ? 'soldout' : 'ready';
                            $nextStatusText = $nextStatus === 'ready' ? 'Set Tersedia' : 'Set Penuh';
                            $buttonClass    = $status === 'ready' ? 'btn-outline-danger' : 'btn-outline-success';
                            $iconClass      = $status === 'ready' ? 'bi-toggle-off' : 'bi-toggle-on';
                            ?>

                            <div class="d-flex gap-2 mt-auto">
                                <button class="btn btn-sm flex-fill status-toggle <?= $buttonClass; ?>"
                                        data-id="<?= $kost['id_kost']; ?>"
                                        data-status="<?= $nextStatus; ?>">
                                    <i class="bi <?= $iconClass; ?> me-1"></i>
                                    <?= $nextStatusText; ?>
                                </button>
                                    
                                <a href="<?= base_url('pemilik/kost/edit/' . $kost['id_kost']); ?>" class="btn btn-outline-dark btn-sm flex-fill">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-black text-white border-0">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <i class="bi bi-exclamation-triangle-fill text-danger" style="font-size: 3rem;"></i>
                </div>
                <p class="text-center">Apakah Anda yakin ingin menghapus data kost "<span id="delete-kost-name" class="fw-bold"></span>"?</p>
                <p class="text-danger text-center"><small>Tindakan ini tidak dapat dibatalkan dan akan menghapus semua data terkait.</small></p>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <form id="delete-form" action="" method="post">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Delete confirmation modal
    const deleteButtons = document.querySelectorAll('.btn-delete');
    const deleteForm = document.getElementById('delete-form');
    const deleteKostName = document.getElementById('delete-kost-name');
    
    deleteButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            const name = this.dataset.name;
            
            deleteForm.action = `<?= base_url('kost/delete/'); ?>/${id}`;
            deleteKostName.textContent = name;
            
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.show();
        });
    });
    
    // Status toggle functionality
    const statusToggleButtons = document.querySelectorAll('.status-toggle');
    
    statusToggleButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            const newStatus = this.dataset.status;
            
            fetch('<?= base_url('pemilik/kost/update-status'); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: `id=${id}&status=${newStatus}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                } else {
                    alert('Gagal mengubah status: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengubah status');
            });
        });
    });
    
    // Search functionality
    const searchInput = document.getElementById('search-input');
    const kostItems = document.querySelectorAll('.kost-item');
    
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        kostItems.forEach(item => {
            const kostName = item.dataset.nama.toLowerCase();
            const kostLokasi = item.dataset.lokasi.toLowerCase();
            const kostJenis = item.dataset.jenis.toLowerCase();
            
            if (kostName.includes(searchTerm) || kostLokasi.includes(searchTerm) || kostJenis.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
});
</script>

<style>
/* Custom styles */
body {
    background-color: #f8f9fa;
}

.hover-card {
    transition: all 0.3s ease;
    border-radius: 12px;
    overflow: hidden;
}

.hover-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
}

.fs-7 {
    font-size: 0.8rem;
}

.kost-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    opacity: 0;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.hover-card:hover .kost-overlay {
    opacity: 1;
}

.btn {
    border-radius: 8px;
}

.badge {
    padding: 0.5em 0.8em;
}

.form-control:focus, .form-select:focus {
    box-shadow: none;
    border-color: #212529;
}

.alert {
    border-radius: 10px;
}

.card-img-top {
    height: 220px;
    object-fit: cover;
}

/* Custom scrollbar */
::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
    background: #212529;
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: #555;
}
</style>
<?= $this->endSection(); ?>