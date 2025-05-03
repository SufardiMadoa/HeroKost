<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #343a40;
            --secondary-color: #f8f9fc;
            --accent-color: #212529;
            --dark-text: #212529;
            --light-text: #f8f9fc;
            --border-color: #495057;
        }
        body {
            background-color: #f8f9fc;
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
        }
        .custom-card {
            border-radius: 10px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            border: none;
            margin-bottom: 24px;
        }
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .btn-primary:hover {
            background-color: #1d2124;
            border-color: #1d2124;
        }
        .page-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #212529 100%);
            color: white;
            padding: 2rem 0;
            border-radius: 10px;
            margin-bottom: 2rem;
        }
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(33, 37, 41, 0.25);
        }
        .section-title {
            position: relative;
            padding-left: 15px;
            margin-bottom: 20px;
            font-weight: 700;
        }
        .section-title:before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background-color: var(--primary-color);
            border-radius: 2px;
        }
        .nav-pills .nav-link.active {
            background-color: var(--primary-color);
        }
        .nav-pills .nav-link {
            color: var(--primary-color);
            font-weight: 600;
        }
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .image-preview {
            position: relative;
            margin-bottom: 15px;
            border-radius: 10px;
            overflow: hidden;
        }
        .image-preview img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .image-preview .delete-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: rgba(220, 53, 69, 0.8);
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }
        .image-preview .delete-btn:hover {
            background-color: rgba(220, 53, 69, 1);
        }
        .detail-row {
            background-color: rgba(33, 37, 41, 0.05);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            position: relative;
        }
        .detail-row .remove-detail {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #dc3545;
            cursor: pointer;
            background: none;
            border: none;
        }
        .btn-floating {
            width: 50px;
            height: 50px;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .facility-checkbox label {
            padding: 10px 15px;
            border-radius: 10px;
            background-color: rgba(33, 37, 41, 0.05);
            transition: all 0.3s;
            cursor: pointer;
            border: 1px solid transparent;
        }
        .facility-checkbox input:checked + label {
            background-color: rgba(33, 37, 41, 0.2);
            border-color: var(--primary-color);
        }
        .text-primary {
            color: #343a40 !important;
        }
        .btn-outline-secondary {
            color: #343a40;
            border-color: #343a40;
        }
        .btn-outline-secondary:hover {
            background-color: #343a40;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container " style="padding-top: 80px;">
        <!-- Page Header -->
        <div class="page-header text-center text-md-start mb-4" style="padding: 40px 40px;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="fw-bold">Edit Kost</h1>
                        <p class="mb-0">Perbarui informasi kost Anda</p>
                    </div>
                    <div class="col-md-4 text-center text-md-end mt-3 mt-md-0">
                        <a href="<?= base_url('pemilik/kost'); ?>" class="btn btn-light"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Flash Messages -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Form Validation Errors -->
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($validation->getErrors() as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Edit Form -->
        <form action="<?= base_url('pemilik/kost/update/' . $kost['id_kost']); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            
            <div class="row">
                <div class="col-lg-8">
                    <!-- Main Kost Form Card -->
                    <div class="card custom-card">
                        <div class="card-body">
                            <h3 class="section-title">Informasi Utama</h3>
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="nama_kost" class="form-label">Nama Kost <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama_kost" name="nama_kost" value="<?= $kost['nama_kost']; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="harga_kost" class="form-label">Harga per Bulan (Rp) <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" class="form-control" id="harga_kost" name="harga_kost" value="<?= $kost['harga_kost']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="jenis" class="form-label">Jenis Kost <span class="text-danger">*</span></label>
                                    <select class="form-select" id="jenis" name="jenis" required>
                                        <option value="putra" <?= ($kost['jenis'] == 'putra') ? 'selected' : ''; ?>>Kost Putra</option>
                                        <option value="putri" <?= ($kost['jenis'] == 'putri') ? 'selected' : ''; ?>>Kost Putri</option>
                                        <option value="campur" <?= ($kost['jenis'] == 'campur') ? 'selected' : ''; ?>>Kost Campur</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="status" class="form-label">Status Kost <span class="text-danger">*</span></label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option value="ready" <?= ($kost['status'] == 'ready') ? 'selected' : ''; ?>>Tersedia</option>
                                        <option value="soldout" <?= ($kost['status'] == 'soldout') ? 'selected' : ''; ?>>Sudah Terisi</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="lokasi" class="form-label">Lokasi / Area <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $kost['lokasi']; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="kontak" class="form-label">Nomor Kontak <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        <input type="text" class="form-control" id="kontak" name="kontak" value="<?= $kost['kontak']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="alamat_kost" class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="alamat_kost" name="alamat_kost" rows="3" required><?= $kost['alamat_kost']; ?></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="deskripsi_kost" class="form-label">Deskripsi Kost <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="deskripsi_kost" name="deskripsi_kost" rows="5" required><?= $kost['deskripsi_kost']; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Facilities Card -->
                    <div class="card custom-card">
                        <div class="card-body">
                            <h3 class="section-title">Fasilitas Kost</h3>
                            <p class="text-muted mb-4">Pilih fasilitas yang tersedia di kost Anda</p>
                            
                            <div class="row g-3">
                                <?php foreach ($allFasilitas as $fasilitas): ?>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="facility-checkbox">
                                            <input type="checkbox" class="btn-check" id="fasilitas<?= $fasilitas['id_fasilitas']; ?>" name="fasilitas[]" value="<?= $fasilitas['id_fasilitas']; ?>" <?= in_array($fasilitas['id_fasilitas'], $selectedFasilitas) ? 'checked' : ''; ?>>
                                            <label class="d-flex align-items-center w-100" for="fasilitas<?= $fasilitas['id_fasilitas']; ?>">
                                                <i class="fas fa-check-circle me-2 <?= in_array($fasilitas['id_fasilitas'], $selectedFasilitas) ? 'text-primary' : 'text-muted'; ?>"></i>
                                                <?= $fasilitas['nama_fasilitas']; ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Detail Tambahan Card -->
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h3 class="section-title mb-0">Detail Tambahan</h3>
                                <button type="button" class="btn btn-primary btn-sm" id="addDetailBtn">
                                    <i class="fas fa-plus"></i> Tambah Detail
                                </button>
                            </div>
                            
                            <div id="detailContainer">
                                <?php if (empty($detailTambahan)): ?>
                                    <div class="detail-row">
                                        <button type="button" class="remove-detail"><i class="fas fa-times"></i></button>
                                        <div class="row g-3">
                                            <div class="col-md-5">
                                                <label class="form-label">Label</label>
                                                <input type="text" class="form-control" name="detail_label[]" placeholder="Contoh: Ukuran Kamar">
                                            </div>
                                            <div class="col-md-7">
                                                <label class="form-label">Deskripsi</label>
                                                <input type="text" class="form-control" name="detail_deskripsi[]" placeholder="Contoh: 3x4 meter">
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <?php foreach ($detailTambahan as $detail): ?>
                                        <div class="detail-row">
                                            <button type="button" class="remove-detail"><i class="fas fa-times"></i></button>
                                            <div class="row g-3">
                                                <div class="col-md-5">
                                                    <label class="form-label">Label</label>
                                                    <input type="text" class="form-control" name="detail_label[]" value="<?= $detail['label']; ?>">
                                                </div>
                                                <div class="col-md-7">
                                                    <label class="form-label">Deskripsi</label>
                                                    <input type="text" class="form-control" name="detail_deskripsi[]" value="<?= $detail['deskripsi']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Photo Gallery Card -->
                    <div class="card custom-card">
                        <div class="card-body">
                            <h3 class="section-title">Foto Kost</h3>
                            <p class="text-muted mb-4">Upload foto baru atau kelola foto yang sudah ada</p>
                            
                            <!-- Current Images -->
                            <?php if (!empty($gambar)): ?>
                                <h6 class="fw-bold mb-3">Foto Saat Ini</h6>
                                <div class="row g-2 mb-4">
                                    <?php foreach ($gambar as $img): ?>
                                        <div class="col-6">
                                            <div class="image-preview">
                                                <img src="<?= base_url($img['path_gambar']); ?>" alt="Foto Kost">
                                                <a href="<?= base_url('pemilik/kost/delete-image/' . $img['id_kost']); ?>" class="delete-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus gambar ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Upload New Images -->
                            <h6 class="fw-bold mb-3">Upload Foto Baru</h6>
                            <div class="mb-3">
                                <input class="form-control" type="file" id="foto_kost" name="foto_kost[]" multiple accept="image/*">
                                <div class="form-text">Upload maksimal 5 foto (JPG, JPEG, PNG, maks 2MB per foto)</div>
                            </div>
                            
                            <div id="imagePreviewContainer" class="row g-2 mt-3"></div>
                        </div>
                    </div>
                    
                    <!-- Submit Button Card -->
                    <div class="card custom-card">
                        <div class="card-body">
                            <h3 class="section-title">Simpan Perubahan</h3>
                            <p class="text-muted mb-4">Klik tombol di bawah untuk menyimpan perubahan data kost</p>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-save me-2"></i> Simpan Perubahan
                                </button>
                                <a href="<?= base_url('pemilik/kost/edit/' . $kost['id_kost']); ?>" class="btn btn-outline-secondary">
                                    <i class="fas fa-times me-2"></i> Batal
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
    
    <script>
        $(document).ready(function() {
            // Handle dynamic detail rows
            $('#addDetailBtn').click(function() {
                let newRow = `
                    <div class="detail-row">
                        <button type="button" class="remove-detail"><i class="fas fa-times"></i></button>
                        <div class="row g-3">
                            <div class="col-md-5">
                                <label class="form-label">Label</label>
                                <input type="text" class="form-control" name="detail_label[]" placeholder="Contoh: Ukuran Kamar">
                            </div>
                            <div class="col-md-7">
                                <label class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" name="detail_deskripsi[]" placeholder="Contoh: 3x4 meter">
                            </div>
                        </div>
                    </div>
                `;
                $('#detailContainer').append(newRow);
            });
            
            // Remove detail row
            $(document).on('click', '.remove-detail', function() {
                // Make sure at least one detail row remains
                if ($('.detail-row').length > 1) {
                    $(this).closest('.detail-row').remove();
                } else {
                    alert('Minimal harus ada satu detail!');
                }
            });
            
            // Image preview before upload
            $('#foto_kost').change(function() {
                $('#imagePreviewContainer').html('');
                
                if (this.files) {
                    for (let i = 0; i < this.files.length; i++) {
                        if (i >= 5) break; // Limit to 5 images
                        
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            $('#imagePreviewContainer').append(`
                                <div class="col-6 mb-2">
                                    <div class="image-preview">
                                        <img src="${e.target.result}" class="img-fluid" alt="Preview">
                                    </div>
                                </div>
                            `);
                        }
                        reader.readAsDataURL(this.files[i]);
                    }
                }
            });
            
            // Facility checkbox visual feedback
            $('.facility-checkbox input').change(function() {
                const icon = $(this).siblings('label').find('i');
                if ($(this).is(':checked')) {
                    icon.removeClass('text-muted').addClass('text-primary');
                } else {
                    icon.removeClass('text-primary').addClass('text-muted');
                }
            });
        });
    </script>