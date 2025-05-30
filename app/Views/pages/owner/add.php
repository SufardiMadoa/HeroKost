<!-- Hero Section -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
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
                        <a href="<?= base_url('pemilik/kost'); ?>" class="btn btn-sm btn-light rounded-circle">
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

                    <form action="<?= base_url('pemilik/create'); ?>" method="post" enctype="multipart/form-data">
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
                                                        <input type="radio" class="btn-check" name="jenis" id="jenisPutra" value="Putra" <?= old('jenis') == 'putra' ? 'checked' : '' ?> required>
                                                        <label class="btn btn-outline-primary w-100" for="jenisPutra">
                                                            <i class="bi bi-gender-male me-2"></i>Putra
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 mb-2 mb-md-0">
                                                        <input type="radio" class="btn-check" name="jenis" id="jenisPutri" value="Putri" <?= old('jenis') == 'putri' ? 'checked' : '' ?>>
                                                        <label class="btn btn-outline-primary w-100" for="jenisPutri">
                                                            <i class="bi bi-gender-female me-2"></i>Putri
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="radio" class="btn-check" name="jenis" id="jenisCampur" value="Campur" <?= old('jenis') == 'campur' ? 'checked' : '' ?>>
                                                        <label class="btn btn-outline-primary w-100" for="jenisCampur">
                                                            <i class="bi bi-people me-2"></i>Campur
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Status Kost -->
                                        <div class="mb-4 row">
                                            <label for="status" class="col-lg-3 col-form-label fw-semibold">Status <span class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <div class="row">
                                                    <div class="col-md-4 mb-2 mb-md-0">
                                                        <input type="radio" class="btn-check" name="status" id="statusReady" value="ready" <?= old('status') == 'ready' ? 'checked' : '' ?> required>
                                                        <label class="btn btn-outline-success w-100" for="statusReady">
                                                            <i class="bi bi-check-circle me-2"></i>Ready
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 mb-2 mb-md-0">
                                                        <input type="radio" class="btn-check" name="status" id="statusBooked" value="booked" <?= old('status') == 'booked' ? 'checked' : '' ?>>
                                                        <label class="btn btn-outline-warning w-100" for="statusBooked">
                                                            <i class="bi bi-bookmark-fill me-2"></i>Booked
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="radio" class="btn-check" name="status" id="statusMaintenance" value="maintenance" <?= old('status') == 'maintenance' ? 'checked' : '' ?>>
                                                        <label class="btn btn-outline-secondary w-100" for="statusMaintenance">
                                                            <i class="bi bi-tools me-2"></i>Maintenance
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4 row">
                                            <label for="lokasi" class="col-lg-3 col-form-label fw-semibold">Lokasi <span class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <div class="input-group">
                                                    <span class="input-group-text bg-white"><i class="bi bi-geo-alt"></i></span>
                                                    <select class="form-select" id="lokasi" name="lokasi" required>
                                                        <option value="" selected disabled>Pilih lokasi kost</option>
                                                        <option value="SIGURA-GURA" <?= old('lokasi') == 'SIGURA-GURA' ? 'selected' : '' ?>>SIGURA-GURA</option>
                                                        <option value="SOEKARNO HATTA" <?= old('lokasi') == 'SOEKARNO HATTA' ? 'selected' : '' ?>>SOEKARNO HATTA</option>
                                                        <option value="MERJOSARI" <?= old('lokasi') == 'MERJOSARI' ? 'selected' : '' ?>>MERJOSARI</option>
                                                        <option value="LANDUNGSARI" <?= old('lokasi') == 'LANDUNGSARI' ? 'selected' : '' ?>>LANDUNGSARI</option>
                                                        <option value="SUDIMORO" <?= old('lokasi') == 'SUDIMORO' ? 'selected' : '' ?>>SUDIMORO</option>
                                                        <option value="SUMBERSARI" <?= old('lokasi') == 'SUMBERSARI' ? 'selected' : '' ?>>SUMBERSARI</option>
                                                        <option value="DIENG" <?= old('lokasi') == 'DIENG' ? 'selected' : '' ?>>DIENG</option>
                                                        <option value="TIDAR" <?= old('lokasi') == 'TIDAR' ? 'selected' : '' ?>>TIDAR</option>
                                                        <option value="CANDI" <?= old('lokasi') == 'CANDI' ? 'selected' : '' ?>>CANDI</option>
                                                        <option value="TIRTO" <?= old('lokasi') == 'TIRTO' ? 'selected' : '' ?>>TIRTO</option>
                                                        <option value="SAXOPHONE" <?= old('lokasi') == 'SAXOPHONE' ? 'selected' : '' ?>>SAXOPHONE</option>
                                                    </select>
                                                </div>
                                                <small class="text-muted"><i class="bi bi-info-circle me-1"></i>Pilih lokasi kost dari daftar</small>
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

                                        <!-- Detail Tambahan -->
                                        <div class="mb-4 row">
                                            <label class="col-lg-3 col-form-label fw-semibold">Detail Tambahan</label>
                                            <div class="col-lg-9">
                                                <div id="detail-container">
                                                    <div class="row mb-2 detail-row">
                                                        <div class="col-md-5">
                                                            <input type="text" name="detail_label[]" class="form-control" placeholder="Label (contoh: Jarak Dari Kampus A)">
                                                        </div>
                                                        <div class="col-md-5">
                                                            <input type="text" name="detail_deskripsi[]" class="form-control" placeholder="Deskripsi (contoh: 5 Km)">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button type="button" class="btn btn-success btn-sm add-detail w-100">
                                                                <i class="bi bi-plus-circle"></i> Tambah
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <small class="text-muted"><i class="bi bi-info-circle me-1"></i>Tambahkan informasi seperti jarak fasilitas umum/kampus, ukuran kamar, kapasitas listrik, daya air, dll.</small>
                                            </div>
                                        </div>
                                        
                                        <!-- Fasilitas -->
<!-- Fasilitas - Dynamic from database -->
                                    <div class="mb-0 row">
                                        <label class="col-lg-3 col-form-label fw-semibold">Fasilitas Kost <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <?php
                                            // Get old selected values as array
                                            $oldFasilitas = old('fasilitas') ? (is_array(old('fasilitas')) ? old('fasilitas') : [old('fasilitas')]) : [];
                                            ?>
                                            
                                            <div class="row g-2">
                                                <?php foreach ($fasilitas as $item): ?>
                                                <div class="col-md-6">
                                                    <div class="form-check custom-checkbox border rounded-3 p-3">
                                                        <input class="form-check-input" type="checkbox" name="fasilitas[]" 
                                                            value="<?= $item['id_fasilitas'] ?>" id="fasilitas<?= $item['id_fasilitas'] ?>"
                                                            <?= in_array((string) $item['id_fasilitas'], $oldFasilitas) ? 'checked' : '' ?>>
                                                        <label class="form-check-label w-100" for="fasilitas<?= $item['id_fasilitas'] ?>">
                                                            <i class="bi bi-check-circle me-2 text-primary"></i><?= $item['nama_fasilitas'] ?>
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
                                                <div class="upload-box bg-white rounded-3 p-4 mb-3 text-center border dashed-border position-relative" >
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

/* New styles for the image preview */
.preview-scroll-container {
    max-height: 300px;
    overflow-y: auto;
    scrollbar-width: thin;
    scrollbar-color: #6c757d #f8f9fa;
    border-radius: 0.375rem;
    background-color: #f8f9fa;
    margin-bottom: 1rem;
    padding: 10px;
}

.preview-scroll-container::-webkit-scrollbar {
    width: 6px;
}

.preview-scroll-container::-webkit-scrollbar-thumb {
    background-color: #6c757d;
    border-radius: 3px;
}

.preview-scroll-container::-webkit-scrollbar-track {
    background-color: #f8f9fa;
}

.image-preview-card {
    transition: all 0.2s ease;
    position: relative;
}

.image-preview-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1) !important;
}

.preview-section {
    margin-top: 15px;
    margin-bottom: 25px;
    border-radius: 0.375rem;
    overflow: hidden;
}

/* Fix for the upload section */
.upload-box {
    min-height: 200px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
</style>


<script>
    // Display preview of selected images with enhanced preview
    // Handle file upload preview
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
            // Create a preview section with fixed height and scrollable content
            const previewSection = document.createElement('div');
            previewSection.className = 'preview-section mb-4';
            
            // Create a header for preview section
            const previewHeader = document.createElement('div');
            previewHeader.className = 'mb-2';
            previewHeader.innerHTML = `
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="fw-bold mb-0">
                        <i class="bi bi-images me-2"></i>
                        Preview Foto (${this.files.length} foto dipilih)
                    </h6>
                    <button type="button" class="btn btn-sm btn-outline-danger clear-preview">
                        <i class="bi bi-x-circle me-1"></i>Hapus Semua
                    </button>
                </div>
            `;
            previewSection.appendChild(previewHeader);
            
            // Create a scrollable container for thumbnails
            const scrollContainer = document.createElement('div');
            scrollContainer.className = 'preview-scroll-container';
            scrollContainer.style.maxHeight = '300px';
            scrollContainer.style.overflowY = 'auto';
            scrollContainer.style.padding = '10px';
            scrollContainer.style.border = '1px solid #dee2e6';
            scrollContainer.style.borderRadius = '0.375rem';
            
            // Create a row for thumbnails
            const thumbnailRow = document.createElement('div');
            thumbnailRow.className = 'row g-3';
            scrollContainer.appendChild(thumbnailRow);
            previewSection.appendChild(scrollContainer);
            
            // Append the whole preview section to the preview container
            previewContainer.appendChild(previewSection);
            
            // Add event listener to clear button
            previewSection.querySelector('.clear-preview').addEventListener('click', function() {
                inputFoto.value = '';
                previewContainer.innerHTML = '';
            });
            
            // Process each file and create preview
            Array.from(this.files).forEach((file, index) => {
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
                    
                    const fileNameContainer = document.createElement('div');
                    fileNameContainer.className = 'text-truncate mb-1';
                    fileNameContainer.title = file.name;
                    fileNameContainer.innerText = file.name;
                    
                    const fileSize = document.createElement('small');
                    fileSize.className = 'text-primary';
                    fileSize.innerText = `${(file.size / (1024*1024)).toFixed(2)} MB`;
                    
                    cardBody.appendChild(fileNameContainer);
                    cardBody.appendChild(fileSize);
                    
                    previewCard.appendChild(img);
                    previewCard.appendChild(cardBody);
                    col.appendChild(previewCard);
                    thumbnailRow.appendChild(col);
                }
                
                reader.readAsDataURL(file);
            });
        }
    });

    // Handle detail tambahan
    const addDetailBtn = document.querySelector('.add-detail');
    const detailContainer = document.getElementById('detail-container');
    
    addDetailBtn.addEventListener('click', function() {
        const newRow = document.createElement('div');
        newRow.className = 'row mb-2 detail-row';
        newRow.innerHTML = `
            <div class="col-md-5">
                <input type="text" name="detail_label[]" class="form-control" placeholder="Label (contoh: Ukuran Kamar)">
            </div>
            <div class="col-md-5">
                <input type="text" name="detail_deskripsi[]" class="form-control" placeholder="Deskripsi (contoh: 3x4 meter)">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger btn-sm remove-detail w-100">
                    <i class="bi bi-trash"></i> Hapus
                </button>
            </div>
        `;
        detailContainer.appendChild(newRow);
        
        // Add event listener to the new remove button
        newRow.querySelector('.remove-detail').addEventListener('click', function() {
            detailContainer.removeChild(newRow);
        });
    });
});
</script>
<script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>s