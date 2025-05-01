<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h4>Tambah Pemilik Kost</h4>
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

                    <form action="<?= base_url('admin/pemilik-kost/store') ?>" method="post">
                        <?= csrf_field() ?>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="mb-3">Data Pemilik</h5>
                                
                                <div class="mb-3">
                                    <label for="nama_user" class="form-label">Nama Pemilik</label>
                                    <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?= old('nama_user') ?>" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="email_user" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email_user" name="email_user" value="<?= old('email_user') ?>" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="no_telepon_user" class="form-label">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="no_telepon_user" name="no_telepon_user" value="<?= old('no_telepon_user') ?>" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="kata_sandi_user" class="form-label">Kata Sandi</label>
                                    <input type="password" class="form-control" id="kata_sandi_user" name="kata_sandi_user" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="konfirmasi_kata_sandi" class="form-label">Konfirmasi Kata Sandi</label>
                                    <input type="password" class="form-control" id="konfirmasi_kata_sandi" name="konfirmasi_kata_sandi" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <h5 class="mb-3">Data Kost</h5>
                                
                                <div class="mb-3">
                                    <label for="nama_kost" class="form-label">Nama Kost</label>
                                    <input type="text" class="form-control" id="nama_kost" name="nama_kost" value="<?= old('nama_kost') ?>">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="alamat_kost" class="form-label">Alamat Kost</label>
                                    <textarea class="form-control" id="alamat_kost" name="alamat_kost" rows="3"><?= old('alamat_kost') ?></textarea>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="kontak" class="form-label">Kontak Kost</label>
                                    <input type="text" class="form-control" id="kontak" name="kontak" value="<?= old('kontak') ?>">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="harga_kost" class="form-label">Harga Kost</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" class="form-control" id="harga_kost" name="harga_kost" value="<?= old('harga_kost') ?>">
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="deskripsi_kost" class="form-label">Deskripsi Kost</label>
                                    <textarea class="form-control" id="deskripsi_kost" name="deskripsi_kost" rows="3"><?= old('deskripsi_kost') ?></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4 text-end">
                            <a href="<?= base_url('admin/pemilik-kost') ?>" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Form validation
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        form.addEventListener('submit', function(event) {
            const password = document.getElementById('kata_sandi_user').value;
            const confirmPassword = document.getElementById('konfirmasi_kata_sandi').value;
            
            if (password !== confirmPassword) {
                event.preventDefault();
                alert('Kata sandi dan konfirmasi kata sandi tidak cocok!');
            }
        });
    });
</script>

<?= $this->endSection() ?>