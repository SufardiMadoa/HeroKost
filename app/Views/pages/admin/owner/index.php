<?= $this->extend('layout/admin-layout'); ?>
<?= $this->section('content') ?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Kelola Pemilik Kost</h4>
                    
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                    <?php if (!empty($pemilik_kost)): ?>
<table id="example" class="display compact table table-striped table-hover">
<?php else: ?>
<table class="table table-striped">
<?php endif; ?>
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id_pemilik_kost</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id_kost</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">username</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">nama kost</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if (empty($pemilik_kost)): ?>
    <tr>
        <td class="text-center" colspan="6">Tidak ada data pemilik kost</td>
    </tr>
                                <?php else: ?>
                                    <?php foreach ($pemilik_kost as $pemilik): ?>
                                        <tr>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0"><?= $pemilik['id_pemilik_kost'] ?></p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0"><?= $pemilik['id_kost'] ? $pemilik['id_kost'] : '-' ?></p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0"><?= $pemilik['username'] ?></p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0"><?= $pemilik['email'] ?></p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0"><?= $pemilik['nama_kost'] ?? 'kost putra soekarno' ?></p>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url('admin/pemilik-kost/delete/' . $pemilik['id_pemilik_kost']) ?>" class="btn btn-sm btn-secondary rounded-pill">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Pagination -->
            
        </div>
    </div>
</div>

<!-- Flash messages -->
<?php if (session()->getFlashdata('message')): ?>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast show align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <?= session()->getFlashdata('message') ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast show align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <?= session()->getFlashdata('error') ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
<?php endif; ?>

<script>
    // Auto dismiss toasts after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        const toasts = document.querySelectorAll('.toast');
        toasts.forEach(function(toast) {
            setTimeout(function() {
                const bsToast = new bootstrap.Toast(toast);
                bsToast.hide();
            }, 5000);
        });
    });

</script>
<?php if (!empty($pemilik_kost)): ?>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Cari...",
                emptyTable: "Tidak ada data yang tersedia"
            }
        });
    });
</script>
<?php endif; ?>
<?= $this->endSection() ?>