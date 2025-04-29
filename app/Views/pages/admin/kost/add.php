<!-- app/Views/kost/add.php -->
<?= $this->extend('layout/admin-layout'); ?>

<?= $this->section('content'); ?>
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Data Kost</h5>
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

                <!-- Debug Section -->
                <?php if (ENVIRONMENT === 'development'): ?>
                    <div class="alert alert-info mb-3">
                        <strong>Debug Info:</strong> Form action: <?= base_url('admin/kost/create'); ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('admin/kost'); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    
                    <div class="mb-3">
                        <label for="nama_kost" class="form-label">Nama Kost</label>
                        <input type="text" class="form-control" id="nama_kost" name="nama_kost" value="<?= old('nama_kost'); ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="alamat_kost" class="form-label">Alamat Kost</label>
                        <textarea class="form-control" id="alamat_kost" name="alamat_kost" rows="2" required><?= old('alamat_kost'); ?></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="harga_kost" class="form-label">Harga Kost (Rp)</label>
                        <input type="number" class="form-control" id="harga_kost" name="harga_kost" value="<?= old('harga_kost'); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis">Jenis Kost</label>
                        <select name="jenis" id="jenis" class="form-control" required>
                            <option value="">-- Pilih Jenis Kost --</option>
                            <option value="Laki-laki" <?= old('jenis') == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="Perempuan" <?= old('jenis') == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                            <option value="Campur" <?= old('jenis') == 'Campur' ? 'selected' : '' ?>>Campur</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_kost" class="form-label">Deskripsi Kost</label>
                        <textarea class="form-control" id="deskripsi_kost" name="deskripsi_kost" rows="3" required><?= old('deskripsi_kost'); ?></textarea>
                    </div>

                    <!-- Tambahkan bagian untuk memilih fasilitas -->
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
                                                   <?= is_array(old('fasilitas')) && in_array($item['id_fasilitas'], old('fasilitas')) ? 'checked' : '' ?>>
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
                    
                    <div class="mb-3">
                        <label for="foto_kost" class="form-label">Foto Kost <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="foto_kost" name="foto_kost[]" accept="image/*" multiple required>
                        <div class="form-text">Upload gambar maksimal 2MB (JPG, JPEG, PNG). Anda dapat memilih beberapa gambar sekaligus.</div>
                    </div>

                    <!-- Ini untuk preview gambar -->
                    <div class="mb-3">
                        <label class="form-label">Preview Foto</label>
                        <div id="preview-container" class="d-flex flex-wrap gap-2 mt-2">
                            <div id="empty-preview" class="text-muted">Belum ada foto dipilih</div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary" id="submit-button">Simpan</button>
                        <button type="reset" class="btn btn-outline-secondary" id="reset-btn">Reset</button>
                    </div>
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
            
            // Validate photos are selected
            if (inputFoto.files.length === 0) {
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
</script>
<?= $this->endSection(); ?>