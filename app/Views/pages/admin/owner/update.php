<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h4>Edit Pemilik Kost</h4>
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

                    <form action="<?= base_url('admin/pemilik-kost/update/' . $user['id_user']) ?>" method="post">
                        <?= csrf_field() ?>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="mb-3">Data Pemilik</h5>
                                
                                <div class="mb-3">
                                    <label for="nama_user" class="form-label">Nama Pemilik</label>
                                    <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?= old('nama_user', $user['nama_user']) ?>" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="email_user" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email_user" name="email_user" value="<?= old('email_user', $user['email_user']) ?>" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="no_telepon_user" class="form-label">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="no_telepon_user" name="no_telepon_user" value="<?= old('no_telepon_user', $user['no_telepon_user']) ?>" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="kata_sandi_user" class="form-label">Kata Sandi (Kosongkan jika tidak ingin mengubah)</label>
                                    <input type="password" class="form-control" id="kata_sandi_user" name="kata_sandi_user">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="konfirmasi_kata_sandi" class="form-label">Konfirmasi Kata Sandi</label>
                                    <input type="password" class="form-control" id="konfirmasi_kata_sandi" name="konfirmasi_kata_sandi">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <h5 class="mb-3">Kost yang Dimiliki</h5>
                                
                                <?php if (empty($kost)): ?>
                                    <div class="alert alert-info">
                                        Pemilik ini belum memiliki kost.
                                        <a href="<?= base_url('admin/kost/create/' . $user['id_user']) ?>" class="alert-link">Tambahkan kost baru</a>
                                    </div>
                                <?php else: ?>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama Kost</th>
                                                    <th>Alamat</th>
                                                    <th>Harga</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($kost as $k): ?>
                                                    <tr>
                                                        <td><?= $k['nama_kost'] ?></td>
                                                        <td><?= $k['alamat_kost'] ?></td>
                                                        <td>Rp <?= number_format($k['harga_kost'], 0, ',', '.') ?></td>
                                                        <td>
                                                            <a href="<?= base_url('admin/kost/edit/' . $k['id_kost']) ?>" class="btn btn-sm btn-primary">Edit</a>
                                                            <a href="<?= base_url('admin/kost/view/' . $k['id_kost']) ?>" class="btn btn-sm btn-info">Lihat</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-3">
                                        <a href="<?= base_url('admin/kost/create/' . $user['id_user']) ?>" class="btn btn-sm btn-success">Tambah Kost Baru</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="mt-4 text-end">
                            <a href="<?= base_url('admin/pemilik-kost') ?>" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
            
            if (password !== '' && password !== confirmPassword) {
                event.preventDefault();
                alert('Kata sandi dan konfirmasi kata sandi tidak cocok!');
            }
        });
    });
</script>

<?= $this->endSection() ?>