
<!-- Hero Section -->
<section class="hero-section d-flex align-items-center justify-content-center text-center" style="height: 500px; background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('<?= base_url('image/beranda.jpg') ?>'); background-size: cover; background-position: center; background-attachment: fixed;">
  <div class="container text-white">
    <h1 class="display-4 fw-bold mb-3">
      Tambahkan Kost Rekomendasi Baru
    </h1>
    <p class="lead mb-4">
      Isi informasi lengkap untuk membantu calon penghuni menemukan kost ideal mereka
    </p>
  </div>
</section>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow border-0 rounded-4 overflow-hidden">
                <div class="card-header bg-dark text-white p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="fw-bold fs-4 mb-0">Form Tambah Data Kost</h2>
                        <a href="<?= base_url('admin/kost'); ?>" class="btn btn-sm btn-light rounded-circle">
                            <i class="bi bi-x-lg"></i>
                        </a>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <div class="row mb-4">
                        <div class="col-md-2 text-center mb-3 mb-md-0">
                            <div class="rounded-circle bg-dark bg-opacity-10 d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <i class="bi bi-house-add fs-1 text-primary"></i>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <h3 class="fs-5 fw-bold mb-2">Informasi Kost</h3>
                            <p class="text-muted mb-0">Isi data lengkap kost yang akan ditambahkan ke database Hero Kost. Data yang lengkap akan membantu calon penghuni membuat keputusan yang tepat.</p>
                        </div>
                    </div>
                    
                    <!-- Display validation errors if any -->
                    <?php if (session()->has('errors')): ?>
                        <div class="alert alert-danger border-0 shadow-sm rounded-3">
                            <h6 class="alert-heading fw-bold"><i class="bi bi-exclamation-triangle-fill me-2"></i>Mohon perbaiki kesalahan berikut:</h6>
                            <hr>
                            <ul class="mb-0 ps-3">
                                <?php foreach (session('errors') as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php endif ?>

                    <form action="<?= base_url('admin/kost'); ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        
                        <div class="row g-4">
                            <div class="col-md-12">
                                <div class="card bg-light border-0 rounded-3">
                                    <div class="card-body p-4">
                                        <h4 class="card-title fs-5 mb-3">Informasi Dasar</h4>
                                        
                                        <!-- Nama Kost -->
                                        <div class="mb-4 row">
                                            <label for="nama_kost" class="col-lg-3 col-form-label fw-semibold">Nama Kost <span class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <div class="input-group">
                                                    <span class="input-group-text bg-white"><i class="bi bi-bookmark-star"></i></span>
                                                    <input type="text" class="form-control" id="nama_kost" name="nama_kost" 
                                                        value="<?= old('nama_kost'); ?>" placeholder="Masukkan nama kost" required>
                                                </div>
                                                <small class="text-muted"><i class="bi bi-info-circle me-1"></i>Minimal 3 karakter</small>
                                            </div>
                                        </div>
                                        
                                        <!-- Jenis Kost -->
                                        <div class="mb-4 row">
                                            <label for="jenis" class="col-lg-3 col-form-label fw-semibold">Jenis Kost <span class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <div class="row">
                                                    <div class="col-md-4 mb-2 mb-md-0">
                                                        <input type="radio" class="btn-check" name="jenis" id="jenisPutra" value="putra" <?= old('jenis') == 'putra' ? 'checked' : '' ?> required>
                                                        <label class="btn btn-outline-primary w-100" for="jenisPutra">
                                                            <i class="bi bi-gender-male me-2"></i>Putra
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 mb-2 mb-md-0">
                                                        <input type="radio" class="btn-check" name="jenis" id="jenisPutri" value="putri" <?= old('jenis') == 'putri' ? 'checked' : '' ?>>
                                                        <label class="btn btn-outline-primary w-100" for="jenisPutri">
                                                            <i class="bi bi-gender-female me-2"></i>Putri
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="radio" class="btn-check" name="jenis" id="jenisCampur" value="campur" <?= old('jenis') == 'campur' ? 'checked' : '' ?>>
                                                        <label class="btn btn-outline-primary w-100" for="jenisCampur">
                                                            <i class="bi bi-people me-2"></i>Campur
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-0 row">
                                            <label for="lokasi" class="col-lg-3 col-form-label fw-semibold">Lokasi <span class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <div class="input-group">
                                                <span class="input-group-text bg-white"><i class="bi bi-geo-alt"></i></span>
                                                    <input type="text" class="form-control" id="lokasi" name="lokasi" 
                                                        value="<?= old('lokasi'); ?>" placeholder="Masukan Lokasi Kost Anda" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Alamat Kost -->
                                        <div class="mb-4 row">
                                            <label for="alamat_kost" class="col-lg-3 col-form-label fw-semibold">Alamat Kost <span class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <div class="input-group">
                                                    <span class="input-group-text bg-white"><i class="bi bi-geo-alt"></i></span>
                                                    <textarea class="form-control" id="alamat_kost" name="alamat_kost" rows="2" placeholder="Masukkan alamat lengkap kost" required><?= old('alamat_kost'); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Harga Kost -->
                                        <div class="mb-4 row">
                                            <label for="harga_kost" class="col-lg-3 col-form-label fw-semibold">Harga <span class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <div class="input-group">
                                                    <span class="input-group-text bg-white">Rp</span>
                                                    <input type="number" class="form-control" id="harga_kost" name="harga_kost" 
                                                        value="<?= old('harga_kost'); ?>" placeholder="Masukkan harga per bulan" required>
                                                    <span class="input-group-text bg-white">/bulan</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Kontak -->
                                        <div class="mb-0 row">
                                            <label for="kontak" class="col-lg-3 col-form-label fw-semibold">Kontak <span class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <div class="input-group">
                                                    <span class="input-group-text bg-white"><i class="bi bi-telephone"></i></span>
                                                    <input type="text" class="form-control" id="kontak" name="kontak" 
                                                        value="<?= old('kontak'); ?>" placeholder="Nomor telepon / WhatsApp" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="card bg-light border-0 rounded-3">
                                    <div class="card-body p-4">
                                        <h4 class="card-title fs-5 mb-3">Deskripsi & Fasilitas</h4>
                                        
                                        <!-- Deskripsi Kost -->
                                        <div class="mb-4 row">
                                            <label for="deskripsi_kost" class="col-lg-3 col-form-label fw-semibold">Deskripsi <span class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <textarea class="form-control" id="deskripsi_kost" name="deskripsi_kost" rows="4" 
                                                    placeholder="Jelaskan detail tentang kost (ukuran kamar, lokasi strategis, peraturan, dll)" required><?= old('deskripsi_kost'); ?></textarea>
                                                <small class="text-muted"><i class="bi bi-lightbulb me-1"></i>Tip: Deskripsi yang detail akan membantu calon penghuni mendapatkan informasi yang mereka butuhkan</small>
                                            </div>
                                        </div>
                                        
                                        <!-- Fasilitas -->
                                        <div class="mb-0 row">
                                            <label class="col-lg-3 col-form-label fw-semibold">Fasilitas Kost <span class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <?php
                                                // Assuming you have a list of facilities from your controller
                                                $facilities = [
                                                    1  => ['Kamar Mandi Dalam', 'bi-droplet'],
                                                    2  => ['AC', 'bi-snow'],
                                                    3  => ['WiFi', 'bi-wifi'],
                                                    4  => ['Kasur', 'bi-laptop'],
                                                    5  => ['Lemari', 'bi-cabinet'],
                                                    6  => ['Meja Belajar', 'bi-lamp-desk'],
                                                    7  => ['Parkir Motor', 'bi-bicycle'],
                                                    8  => ['Parkir Mobil', 'bi-truck'],
                                                    9  => ['Dapur Bersama', 'bi-fire'],
                                                    10 => ['Ruang Tamu', 'bi-house-door']
                                                ];

                                                // Get old selected values as array
                                                $oldFasilitas = old('fasilitas') ? (is_array(old('fasilitas')) ? old('fasilitas') : [old('fasilitas')]) : [];
                                                ?>
                                                
                                                <div class="row g-2">
                                                    <?php foreach ($facilities as $id => $info): ?>
                                                    <div class="col-md-6">
                                                        <div class="form-check custom-checkbox border rounded-3 p-3">
                                                            <input class="form-check-input" type="checkbox" name="fasilitas[]" 
                                                                   value="<?= $id ?>" id="fasilitas<?= $id ?>"
                                                                   <?= in_array((string) $id, $oldFasilitas) ? 'checked' : '' ?>>
                                                            <label class="form-check-label w-100" for="fasilitas<?= $id ?>">
                                                                <i class="bi <?= $info[1] ?> me-2 text-primary"></i><?= $info[0] ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; ?>
                                                </div>
                                                <small class="text-muted mt-2 d-block"><i class="bi bi-info-circle me-1"></i>Pilih minimal satu fasilitas</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="card bg-light border-0 rounded-3">
                                    <div class="card-body p-4">
                                        <h4 class="card-title fs-5 mb-3">Foto Kost</h4>
                                        
                                        <!-- File Upload - Multiple -->
                                        <div class="row mb-0">
                                            <label class="col-lg-3 col-form-label fw-semibold">Foto Kost <span class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <div class="upload-box bg-white rounded-3 p-4 mb-3 text-center border dashed-border position-relative">
                                                    <div class="upload-icon mb-3">
                                                        <i class="bi bi-cloud-arrow-up-fill text-primary" style="font-size: 3rem;"></i>
                                                    </div>
                                                    <h5 class="mb-2">Pilih atau seret foto kost</h5>
                                                    <p class="text-muted mb-3">Format: JPG, JPEG, PNG (maks. 2MB)</p>
                                                    <input type="file" id="foto_kost" name="foto_kost[]" class="form-control" accept=".jpg,.jpeg,.png" multiple required>
                                                    <small class="d-block text-primary mt-2">
                                                        <i class="bi bi-info-circle-fill me-1"></i>
                                                        Tips: Unggah foto dengan pencahayaan yang baik dari berbagai sudut kamar dan fasilitas
                                                    </small>
                                                </div>
                                                
                                                <div id="preview-container" class="d-flex flex-wrap gap-2 mt-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Action buttons -->
                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <a href="<?= base_url('admin/kost'); ?>" class="btn btn-outline-secondary px-4 py-2">
                                <i class="bi bi-x-circle me-2"></i>Batal
                            </a>
                            <button type="submit" class="btn btn-dark px-4 py-2">
                                <i class="bi bi-check-circle me-2"></i>Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Support section -->
            <div class="text-center mt-4">
                <p class="text-muted">
                    <i class="bi bi-question-circle me-1"></i>
                    Butuh bantuan? <a href="#" class="text-decoration-none">Hubungi tim support</a>
                </p>
            </div>
        </div>
    </div>
</div>

<style>
    .dashed-border {
        border-style: dashed !important;
        border-width: 2px !important;
        transition: all 0.3s ease;
    }
    
    .dashed-border:hover {
        border-color: #0d6efd !important;
        background-color: rgba(13, 110, 253, 0.05) !important;
    }
    
    .custom-checkbox:hover {
        background-color: rgba(13, 110, 253, 0.05);
        transition: all 0.2s ease;
    }
    
    .custom-checkbox input:checked + label {
        font-weight: 600;
    }
    
    .form-control:focus, .form-select:focus, .btn-check:focus + .btn-outline-primary {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
</style>

<script>
    // Display preview of selected images with enhanced preview
    document.addEventListener('DOMContentLoaded', function() {
        const inputFoto = document.getElementById('foto_kost');
        const previewContainer = document.getElementById('preview-container');
        const uploadBox = inputFoto.closest('.upload-box');
        
        // Add drag and drop functionality
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadBox.addEventListener(eventName, preventDefaults, false);
        });
        
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        ['dragenter', 'dragover'].forEach(eventName => {
            uploadBox.addEventListener(eventName, highlight, false);
        });
        
        ['dragleave', 'drop'].forEach(eventName => {
            uploadBox.addEventListener(eventName, unhighlight, false);
        });
        
        function highlight() {
            uploadBox.classList.add('border-primary');
            uploadBox.style.backgroundColor = 'rgba(13, 110, 253, 0.05)';
        }
        
        function unhighlight() {
            uploadBox.classList.remove('border-primary');
            uploadBox.style.backgroundColor = '';
        }
        
        uploadBox.addEventListener('drop', handleDrop, false);
        
        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            inputFoto.files = files;
            
            // Trigger change event
            const event = new Event('change');
            inputFoto.dispatchEvent(event);
        }
        
        inputFoto.addEventListener('change', function() {
            // Clear previous previews
            previewContainer.innerHTML = '';
            
            if (this.files && this.files.length > 0) {
                // Create a header for preview section
                const previewHeader = document.createElement('div');
                previewHeader.className = 'col-12 mb-3';
                previewHeader.innerHTML = `
                    <h6 class="fw-bold mb-3">
                        <i class="bi bi-images me-2"></i>
                        Preview Foto (${this.files.length} foto dipilih)
                    </h6>
                `;
                previewContainer.appendChild(previewHeader);
                
                // Create a row for thumbnails
                const thumbnailRow = document.createElement('div');
                thumbnailRow.className = 'row g-2';
                previewContainer.appendChild(thumbnailRow);
                
                Array.from(this.files).forEach((file, index) => {
                    if (index < 8) { // Limit preview to 8 images
                        const reader = new FileReader();
                        
                        reader.onload = function(e) {
                            const col = document.createElement('div');
                            col.className = 'col-md-3 col-6';
                            
                            const previewCard = document.createElement('div');
                            previewCard.className = 'card h-100 border-0 shadow-sm';
                            
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.className = 'card-img-top';
                            img.style.height = '120px';
                            img.style.objectFit = 'cover';
                            
                            const cardBody = document.createElement('div');
                            cardBody.className = 'card-body p-2 bg-light';
                            cardBody.innerHTML = `
                                <p class="card-text small text-muted mb-0 text-truncate">
                                    ${file.name}
                                </p>
                                <small class="text-primary">${(file.size / (1024*1024)).toFixed(2)} MB</small>
                            `;
                            
                            previewCard.appendChild(img);
                            previewCard.appendChild(cardBody);
                            col.appendChild(previewCard);
                            thumbnailRow.appendChild(col);
                        }
                        
                        reader.readAsDataURL(file);
                    }
                });
                
                if (this.files.length > 8) {
                    const moreCol = document.createElement('div');
                    moreCol.className = 'col-12 mt-2';
                    moreCol.innerHTML = `
                        <div class="alert alert-info py-2 mb-0">
                            <small><i class="bi bi-info-circle-fill me-1"></i> +${this.files.length - 8} foto lainnya tidak ditampilkan pada preview</small>
                        </div>
                    `;
                    thumbnailRow.appendChild(moreCol);
                }
            }
        });
    });
</script>