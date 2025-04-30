<!-- app/Views/kost/update.php -->
<?= $this->extend('layout/admin-layout'); ?>

<?= $this->section('content'); ?>
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Data Kost</h5>
                    <a href="<?= base_url('admin/kost'); ?>" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <?php if (session()->has('errors')): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php foreach (session('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif ?>

                <form action="<?= base_url('admin/kost/update/' . $kost['id_kost']); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    
                    <div class="mb-3">
                        <label for="nama_kost" class="form-label">Nama Kost</label>
                        <input type="text" class="form-control" id="nama_kost" name="nama_kost" value="<?= old('nama_kost', $kost['nama_kost']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="kontak" class="form-label">Kontak</label>
                        <input type="text" class="form-control" id="kontak" name="kontak" value="<?= old('kontak', $kost['kontak']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= old('lokasi', $kost['lokasi']); ?>" required>
                    </div>


                    <div class="mb-3">
                        <label for="alamat_kost" class="form-label">Alamat Kost</label>
                        <textarea class="form-control" id="alamat_kost" name="alamat_kost" rows="2" required><?= old('alamat_kost', $kost['alamat_kost']); ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="harga_kost" class="form-label">Harga Kost (Rp)</label>
                        <input type="number" class="form-control" id="harga_kost" name="harga_kost" value="<?= old('harga_kost', $kost['harga_kost']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi_kost" class="form-label">Deskripsi Kost</label>
                        <textarea class="form-control" id="deskripsi_kost" name="deskripsi_kost" rows="3" required><?= old('deskripsi_kost', $kost['deskripsi_kost']); ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fasilitas Kost <span class="text-danger">*</span></label>
                        <div class="row row-cols-1 row-cols-md-3 g-3">
                            <?php if (isset($fasilitas) && is_array($fasilitas)): ?>
                                <?php foreach ($fasilitas as $item): ?>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input fasilitas-checkbox" type="checkbox"
                                                name="fasilitas[]" value="<?= $item['id_fasilitas']; ?>"
                                                id="fasilitas-<?= $item['id_fasilitas']; ?>"
                                                <?= (is_array(old('fasilitas', $kost['fasilitas_selected'])) && in_array($item['id_fasilitas'], old('fasilitas', $kost['fasilitas_selected']))) ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="fasilitas-<?= $item['id_fasilitas']; ?>">
                                                <?= esc($item['nama_fasilitas']); ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="form-text mt-2">Pilih minimal satu fasilitas yang tersedia di kost ini.</div>
                    </div>

                    <div class="mb-3">
                        <label for="foto_kost" class="form-label">Ganti Foto Kost (Optional)</label>
                        <input type="file" class="form-control" id="foto_kost" name="foto_kost[]" accept="image/*" multiple>
                        <div class="form-text">Kosongkan jika tidak ingin mengganti foto.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto Kost Lama</label>
                        <div class="d-flex flex-wrap gap-2">
                            <?php if (!empty($kost['foto'])): ?>
                                <?php foreach ($kost['foto'] as $foto): ?>
                                    <img src="<?= base_url('uploads/kost/' . $foto); ?>" class="img-thumbnail" style="width:150px; height:150px; object-fit:cover;">
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="text-muted">Tidak ada foto lama.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?= base_url('admin/kost'); ?>" class="btn btn-outline-secondary">Batal</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
