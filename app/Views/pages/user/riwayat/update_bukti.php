<div class="container py-5">
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

    <!-- Back Button -->
    <div class="mb-4">
        <a href="<?= base_url('/riwayat-pembayaran/detail/' . $pembayaran['id_pembayaran']) ?>" class="text-decoration-none text-dark">
            <i class="bi bi-arrow-left me-2"></i> Kembali ke Detail Pembayaran
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h4 class="fw-bold text-dark mb-0">Update Bukti Pembayaran</h4>
                </div>
                <div class="card-body p-4">
                    <div class="alert alert-info mb-4" role="alert">
                        <div class="d-flex">
                            <div class="me-3">
                                <i class="bi bi-info-circle-fill fs-4"></i>
                            </div>
                            <div>
                                <h5 class="alert-heading mb-1">Pembayaran Ditolak</h5>
                                <p class="mb-0">Silakan unggah bukti pembayaran baru untuk melanjutkan proses pembayaran.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p class="text-muted mb-1">Kost</p>
                            <p class="fw-medium"><?= $pembayaran['nama_kost'] ?? 'Nama Kost' ?></p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-muted mb-1">Jumlah Pembayaran</p>
                            <p class="fw-medium">Rp <?= number_format($pembayaran['jumlah_bayar'], 0, ',', '.') ?></p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <h5 class="fw-bold mb-3">Bukti Pembayaran Sebelumnya</h5>
                            <div class="text-center p-3 bg-light rounded">
                                <img src="<?= base_url('uploads/bukti/' . $pembayaran['bukti_pembayaran']) ?>" 
                                     alt="Bukti Pembayaran Lama" 
                                     class="img-fluid rounded border" 
                                     style="max-height: 250px;">
                            </div>
                        </div>
                    </div>

                    <form action="<?= base_url('riwayat-pembayaran/update-bukti/' . $pembayaran['id_pembayaran']) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        
                        <div class="mb-4">
                            <label for="bukti_pembayaran" class="form-label fw-medium">Upload Bukti Pembayaran Baru</label>
                            <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" required accept="image/*">
                            <div class="form-text">Format yang diterima: JPG, JPEG, PNG. Maksimal 2MB.</div>
                        </div>
                        
                        <div class="preview-container mb-4 d-none">
                            <h6 class="fw-medium mb-2">Preview</h6>
                            <div class="text-center p-3 bg-light rounded">
                                <img id="preview" class="img-fluid rounded" style="max-height: 250px;">
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark py-2">Upload Bukti Pembayaran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('bukti_pembayaran');
    const preview = document.getElementById('preview');
    const previewContainer = document.querySelector('.preview-container');
    
    input.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.classList.remove('d-none');
            }
            
            reader.readAsDataURL(file);
        } else {
            previewContainer.classList.add('d-none');
        }
    });
});
</script>