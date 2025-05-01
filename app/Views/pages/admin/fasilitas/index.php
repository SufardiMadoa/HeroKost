<?= $this->extend('layout/admin-layout'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0 fw-bold text-primary">Daftar Fasilitas</h5>
                    <a href="<?= base_url('/admin/fasilitas/create'); ?>" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Fasilitas
                    </a>
                </div>
                <div class="card-body">
                    <?php if (session()->has('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-2"></i> <?= session('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" width="10%">#</th>
                                    <th scope="col">Nama Fasilitas</th>
                                    <th scope="col" width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($fasilitas)): ?>
                                    <tr>
                                        <td colspan="3" class="text-center py-4 text-muted">
                                            <i class="bi bi-info-circle fs-4 d-block mb-2"></i>
                                            Belum ada data fasilitas
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($fasilitas as $index => $fasilitas_item): ?>
                                        <tr>
                                            <td><?= esc($fasilitas_item['id_fasilitas']) ?></td>
                                            <td><?= esc($fasilitas_item['nama_fasilitas']) ?></td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="<?= base_url('fasilitas/edit/' . $fasilitas_item['id_fasilitas']); ?>" 
                                                       class="btn btn-warning btn-sm" 
                                                       data-bs-toggle="tooltip" 
                                                       title="Edit">
                                                        <i class="bi bi-pencil-square me-1"></i> Edit
                                                    </a>
                                                    <a href="<?= base_url('fasilitas/delete/' . $fasilitas_item['id_fasilitas']); ?>" 
                                                       class="btn btn-danger btn-sm" 
                                                       onclick="return confirm('Apakah Anda yakin ingin menghapus fasilitas ini?')"
                                                       data-bs-toggle="tooltip" 
                                                       title="Hapus">
                                                        <i class="bi bi-trash me-1"></i> Hapus
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white border-top-0 text-muted small text-end">
                    Total fasilitas: <?= count($fasilitas) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Initialize tooltips -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
});
</script>
<?= $this->endSection(); ?>