<?= $this->extend('layout/admin-layout'); ?>

<?= $this->section('content'); ?>
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">Daftar Fasilitas</h5>
                <a href="<?= base_url('/admin/fasilitas/create'); ?>" class="btn btn-primary">
                    Tambah Fasilitas
                </a>
            </div>
            <div class="card-body">
                <?php if (session()->has('success')): ?>
                    <div class="alert alert-success">
                        <?= session('success') ?>
                    </div>
                <?php endif; ?>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Fasilitas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($fasilitas as $fasilitas_item): ?>
                            <tr>
                                <td><?= esc($fasilitas_item['id_fasilitas']) ?></td>
                                <td><?= esc($fasilitas_item['nama_fasilitas']) ?></td>
                                <td>
                                    <a href="<?= base_url('fasilitas/edit/' . $fasilitas_item['id_fasilitas']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="<?= base_url('fasilitas/delete/' . $fasilitas_item['id_fasilitas']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
