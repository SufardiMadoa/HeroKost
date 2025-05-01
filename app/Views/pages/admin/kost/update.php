<?= $this->extend('layout/admin-layout'); ?>

<?= $this->section('content'); ?>
<style>
    body {
        background-color: #f5f5f5;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .preview-image-container {
        position: relative;
        margin-right: 10px;
        margin-bottom: 10px;
    }
    
    .delete-image-btn {
        position: absolute;
        top: -10px;
        right: -10px;
        background-color: #dc3545;
        color: white;
        border-radius: 50%;
        width: 25px;
        height: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 14px;
        border: 2px solid white;
    }
</style>

<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Data Kost</h5>
                    <a href="<?= base_url('admin/kost'); ?>" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <!-- Display validation errors if any -->
                <?php if (session()->has('errors')): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php foreach (session('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif ?>

                <!-- Success message if any -->
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('success'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('admin/kost/update/' . $kost['id_kost']); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id_kost" value="<?= $kost['id_kost']; ?>">
                    
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
                        <label for="jenis">Jenis Kost</label>
                        <select name="jenis" id="jenis" class="form-control" required>
                            <option value="">-- Pilih Jenis Kost --</option>
                            <option value="Laki-laki" <?= (old('jenis', $kost['jenis']) == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                            <option value="Perempuan" <?= (old('jenis', $kost['jenis']) == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                            <option value="Campur" <?= (old('jenis', $kost['jenis']) == 'Campur') ? 'selected' : ''; ?>>Campur</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="deskripsi_kost" class="form-label">Deskripsi Kost</label>
                        <textarea class="form-control" id="deskripsi_kost" name="deskripsi_kost" rows="3" required><?= old('deskripsi_kost', $kost['deskripsi_kost']); ?></textarea>
                    </div>

                    <!-- Bagian untuk memilih fasilitas -->
                    <div class="mb-3">
                        <label class="form-label">Fasilitas Kost <span class="text-danger">*</span></label>
                        <div class="row row-cols-1 row-cols-md-3 g-3">
                            <?php if (isset($fasilitas) && is_array($fasilitas) && count($fasilitas) > 0): ?>
                                <?php foreach ($fasilitas as $item): ?>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input fasilitas-checkbox" type="checkbox" 
                                                name="fasilitas[]" 
                                                value="<?= $item['id_fasilitas']; ?>" 
                                                id="fasilitas-<?= $item['id_fasilitas']; ?>"
                                                <?= (is_array(old('fasilitas')) && in_array($item['id_fasilitas'], old('fasilitas'))) ||
                                                    (isset($kost['fasilitas']) && in_array($item['id_fasilitas'], array_column($kost['fasilitas'], 'id_fasilitas'))) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="fasilitas-<?= $item['id_fasilitas']; ?>">
                                                <?= esc($item['nama_fasilitas']); ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <!-- Invisible required field that gets checked by JavaScript if any checkbox is selected -->
                                <input type="checkbox" id="fasilitas-validator" name="fasilitas_validator" style="display:none" required>
                            <?php else: ?>
                                <div class="col-12">
                                    <div class="alert alert-warning">
                                        Tidak ada data fasilitas. Silahkan tambahkan data fasilitas terlebih dahulu.
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-text mt-2">Pilih minimal satu fasilitas yang tersedia di kost ini.</div>
                    </div>
                    
                    <!-- Bagian untuk menampilkan gambar yang sudah ada -->
                    <div class="mb-4">
                        <label class="form-label">Foto Kost Saat Ini</label>
                        <div class="d-flex flex-wrap" id="existing-images">
                            <?php if (isset($kost['gambar']) && is_array($kost['gambar']) && count($kost['gambar']) > 0): ?>
                                <?php foreach ($kost['gambar'] as $gambar): ?>
                                    <div class="preview-image-container" id="image-container-<?= $gambar['id_gambar']; ?>">
                                        <img src="<?= base_url($gambar['path_gambar']); ?>" alt="Foto Kost" class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                                        <div class="delete-image-btn" onclick="confirmDeleteImage(<?= $gambar['id_gambar']; ?>)">
                                            <i class="bi bi-x"></i>
                                        </div>
                                        <div class="text-center small text-truncate mt-1" style="width: 150px;">
                                            <?= basename($gambar['path_gambar']); ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="text-muted">Tidak ada foto tersedia</div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Bagian untuk menambahkan gambar baru -->
                    <div class="mb-3">
                        <label for="foto_kost" class="form-label">Tambah Foto Baru</label>
                        <input type="file" class="form-control" id="foto_kost" name="foto_kost[]" accept="image/*" multiple>
                        <div class="form-text">Upload gambar maksimal 2MB (JPG, JPEG, PNG). Anda dapat memilih beberapa gambar sekaligus.</div>
                    </div>

                    <!-- Preview gambar baru -->
                    <div class="mb-3">
                        <label class="form-label">Preview Foto Baru</label>
                        <div id="preview-container" class="d-flex flex-wrap gap-2 mt-2">
                            <div id="empty-preview" class="text-muted">Belum ada foto baru dipilih</div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary" id="submit-button">Update Data</button>
                        <button type="reset" class="btn btn-outline-secondary" id="reset-btn">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus Gambar -->
<div class="modal fade" id="deleteImageModal" tabindex="-1" aria-labelledby="deleteImageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteImageModalLabel">Konfirmasi Hapus Gambar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus gambar ini?
            </div>
            <div class="modal-footer">
                <form id="deleteImageForm" action="" method="POST">
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
    // Fungsi untuk menangani preview multiple gambar dan validasi form
    document.addEventListener('DOMContentLoaded', function() {
        const inputFoto = document.getElementById('foto_kost');
        const previewContainer = document.getElementById('preview-container');
        const emptyPreview = document.getElementById('empty-preview');
        const resetBtn = document.getElementById('reset-btn');
        const form = document.querySelector('form');
        const facilityCheckboxes = document.querySelectorAll('.fasilitas-checkbox');
        const facilityValidator = document.getElementById('fasilitas-validator');
        const deleteImageModal = new bootstrap.Modal(document.getElementById('deleteImageModal'));
        
        // Function to update facility validator
        function updateFacilityValidator() {
            let anyChecked = false;
            facilityCheckboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    anyChecked = true;
                }
            });
            facilityValidator.checked = anyChecked;
        }
        
        // Add event listeners to all facility checkboxes
        facilityCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateFacilityValidator);
        });
        
        // Initial check on page load
        updateFacilityValidator();
        
        // Custom form validation before submit
        form.addEventListener('submit', function(event) {
            // Validate facilities are selected
            let facilitySelected = false;
            facilityCheckboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    facilitySelected = true;
                }
            });
            
            if (!facilitySelected) {
                alert('Pilih minimal satu fasilitas kost!');
                event.preventDefault();
                return false;
            }
            
            // For update form, we don't require new photos if there are existing ones
            const existingImages = document.getElementById('existing-images');
            const hasExistingImages = existingImages && existingImages.querySelector('.preview-image-container');
            
            if (!hasExistingImages && inputFoto.files.length === 0) {
                alert('Pilih minimal satu foto kost!');
                event.preventDefault();
                return false;
            }
            
            // All validations passed
            return true;
        });
        
        // Function to update preview
        function updatePreview() {
            // Clear previous previews
            while (previewContainer.firstChild && previewContainer.firstChild !== emptyPreview) {
                previewContainer.removeChild(previewContainer.firstChild);
            }
            
            const files = inputFoto.files;
            
            if (files.length > 0) {
                // Hide empty preview message
                emptyPreview.style.display = 'none';
                
                // Create preview for each file
                Array.from(files).forEach((file, index) => {
                    // Create preview container
                    const previewItem = document.createElement('div');
                    previewItem.className = 'position-relative';
                    previewItem.style.width = '150px';
                    previewItem.style.marginBottom = '10px';
                    previewItem.style.marginRight = '10px';
                    
                    // Create image preview
                    const img = document.createElement('img');
                    img.className = 'img-thumbnail';
                    img.style.width = '150px';
                    img.style.height = '150px';
                    img.style.objectFit = 'cover';
                    
                    // Create loading indicator
                    const loading = document.createElement('div');
                    loading.className = 'position-absolute top-50 start-50 translate-middle';
                    loading.innerHTML = '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>';
                    previewItem.appendChild(loading);
                    
                    // Create caption with file name
                    const caption = document.createElement('div');
                    caption.className = 'text-center small text-truncate mt-1';
                    caption.textContent = file.name;
                    
                    // Add image and caption to preview item
                    previewItem.appendChild(img);
                    previewItem.appendChild(caption);
                    
                    // Add preview item to container
                    previewContainer.appendChild(previewItem);
                    
                    // Create file reader to load image
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        img.src = e.target.result;
                        // Remove loading indicator when image is loaded
                        previewItem.removeChild(loading);
                    };
                    
                    reader.readAsDataURL(file);
                });
            } else {
                // Show empty preview message
                emptyPreview.style.display = 'block';
            }
        }
        
        // Update preview when files are selected
        inputFoto.addEventListener('change', updatePreview);
        
        // Reset preview when form is reset
        resetBtn.addEventListener('click', function() {
            setTimeout(function() {
                // Reset preview container
                while (previewContainer.firstChild && previewContainer.firstChild !== emptyPreview) {
                    previewContainer.removeChild(previewContainer.firstChild);
                }
                emptyPreview.style.display = 'block';
                
                // Reset facility validator
                updateFacilityValidator();
            }, 100);
        });
    });

    // Fungsi untuk konfirmasi hapus gambar
    function confirmDeleteImage(id_gambar) {
        const deleteImageForm = document.getElementById('deleteImageForm');
        deleteImageForm.setAttribute('action', '<?= base_url('admin/kost/delete-image'); ?>/' + id_gambar);
        
        const deleteImageModal = new bootstrap.Modal(document.getElementById('deleteImageModal'));
        deleteImageModal.show();
    }
</script>
<?= $this->endSection(); ?>