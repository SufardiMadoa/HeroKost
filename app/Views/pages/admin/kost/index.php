<?= $this->extend('layout/admin-layout'); ?>

<?= $this->section('content'); ?>
<style>
    body {
        background-color: #f5f5f5;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .table thead {
        background-color: #343a40;
        color: white;
    }
    
    .table thead th {
        border-color: #454d55;
    }
</style>
<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Kelola Daftar Kost</h5>
                <div>
                    <a href="<?= base_url('/admin/kost/new'); ?>" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Tambah Kost
                    </a>
                </div>
            </div>
            
            <!-- Flash Messages -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show mx-3 mt-3" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table id="kostTable" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kost</th>
                                <th>Detail Kost</th>
                                <th>Foto</th>
                                <th>Harga</th>
                                <th>Jenis</th>
                                <th>Lokasi</th>
                                <th>Kontak</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kosts as $index => $kost): ?>
                                <tr>
                                    <td><?= $index + 1; ?></td>
                                    <td><?= $kost['nama_kost']; ?></td>
                                    <td><?= $kost['deskripsi_kost']; ?></td>
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
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= base_url('admin/kost/edit/' . $kost['id_kost']); ?>" class="btn btn-sm btn-warning me-1">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger btn-hapus" data-id="<?= $kost['id_kost']; ?>">
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
        </div>
    </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data kost ini?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" action="" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
// Tunggu seluruh dokumen termuat
document.addEventListener('DOMContentLoaded', function () {
    // Inisialisasi DataTable
    if ($.fn.DataTable) {
        $('#kostTable').DataTable({
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Indonesian.json'
            }
        });
    }

    // Setup delete confirmation
    const deleteButtons = document.querySelectorAll('.btn-hapus');
    const deleteForm = document.getElementById('deleteForm');
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));

    deleteButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            deleteForm.setAttribute('action', '<?= base_url('admin/kost'); ?>/' + id);
            deleteModal.show();
        });
    });
});
</script>
<?= $this->endSection(); ?>