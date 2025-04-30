<!-- Detail Kost View -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
   .info-card {
    background-color: #ffffff;
    border-radius: 1rem;
   }

   .custom-carousel-controls {
       /* Container for carousel controls */
   }

   .control-btn {
       background-color: #212529;
       color: white;
       border: none;
       border-radius: 50%;
       width: 30px;
       height: 30px;
       display: flex;  
       align-items: center;
       justify-content: center;
       font-size: 0.8rem;
       transition: background-color 0.2s ease;
   }

   .control-btn:hover {
       background-color: #495057;
   }

   .custom-indicators button {
       background-color: #cccccc;
       border: none;
       border-radius: 50%;
       width: 8px;
       height: 8px;
       margin: 0 4px;
       padding: 0;
       transition: background-color 0.2s ease;
   }

   .custom-indicators button.active {
       background-color: #212529;
       width: 10px;
       height: 10px;
   }

   .list-unstyled li {
       margin-bottom: 0.2rem;
       line-height: 1.4;
   }

   h6 {
       font-weight: bold;
       margin-bottom: 0.5rem;
   }
   
   .carousel-item img {
       width: 100%;
       height: 508px;
       object-fit: cover;
   }

   @media (max-width: 991.98px) {
       .mt-auto.text-end {
           text-align: start !important;
           margin-top: 1rem !important;
       }
       
       .carousel-item img {
           height: auto;
       }
   }
</style>

<!-- Header Section -->
<section class="hero-section d-flex align-items-center justify-content-center text-center" style="height: 300px; background-image: url('<?= base_url('image/beranda.jpg') ?>'); background-size: cover; background-position: center;">
  <div class="container text-white">
    <h1 class="display-5 fw-bold mb-2"><?= $kost['nama_kost'] ?></h1>
    <p class="lead"><?= $kost['alamat_kost'] ?></p>
  </div>
</section>

<!-- Detail Kost Section -->
<div class="container my-4">
    <div class="info-card p-3 shadow-sm">
        <div class="row g-4">
            <!-- Image Carousel -->
            <div class="col-lg-7">
                <div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner rounded">
                        <?php $i = 0;
                        foreach ($gambarKost as $gambar): ?>
                            <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                                <img src="<?= base_url($gambar['path_gambar']) ?>" class="d-block img-fluid" alt="Gambar Kamar <?= $i + 1 ?>">
                            </div>
                        <?php $i++;
                        endforeach; ?>
                        
                        <?php if (empty($gambarKost)): ?>
                            <div class="carousel-item active">
                                <img src="<?= base_url('image/default-kost.jpg') ?>" class="d-block img-fluid" alt="Default Image">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="">
                    <div class="custom-carousel-controls mt-3 d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <button class="control-btn prev-btn" type="button" data-bs-target="#imageSlider" data-bs-slide="prev">
                                <i class="fas fa-arrow-left"></i>
                            </button>
                            <div class="custom-indicators mx-2 d-flex align-items-center">
                                <?php for ($i = 0; $i < count($gambarKost); $i++): ?>
                                    <button type="button" data-bs-target="#imageSlider" data-bs-slide-to="<?= $i ?>" class="<?= $i == 0 ? 'active' : '' ?>" <?= $i == 0 ? 'aria-current="true"' : '' ?>></button>
                                <?php endfor; ?>
                                
                                <?php if (empty($gambarKost)): ?>
                                    <button type="button" data-bs-target="#imageSlider" data-bs-slide-to="0" class="active" aria-current="true"></button>
                                <?php endif; ?>
                            </div>
                            <button class="control-btn next-btn" type="button" data-bs-target="#imageSlider" data-bs-slide="next">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                        <?php $admin_phone = isset($kost['no_hp']) ? $kost['no_hp'] : '6281234567890'; ?>
                        <a href="https://wa.me/<?= $admin_phone ?>" class="btn btn-dark btn-sm rounded-pill px-3">Kontak</a>
                    </div>
                </div>
            </div>
            
            <!-- Information Section -->
            <div class="col-lg-5 d-flex flex-column">
                <!-- Kost Information -->
                <div class="mb-4">
                    <h4><?= $kost['nama_kost'] ?></h4>
                    <p class="text-muted mb-2"><?= $kost['alamat_kost'] ?></p>
                    <div class="d-flex flex-wrap gap-2 mb-3">
                        <span class="badge bg-success">Rp. <?= number_format($kost['harga_kost'], 0, ',', '.') ?>/bulan</span>
                    </div>
                    <p><?= $kost['deskripsi_kost'] ?></p>
                </div>
                
                <!-- Facilities -->
                <div>
                    <h6>Fasilitas:</h6>
                    <ul class="list-unstyled small mb-3">
                        <?php foreach ($fasilitasKost as $fasilitas): ?>
                            <li>* <?= $fasilitas['nama_fasilitas'] ?></li>
                        <?php endforeach; ?>
                    </ul>

                    <h6>Kampus Terdekat:</h6>
                    <ul class="list-unstyled small mb-3">
                        <?php
                        // Check if there's a kampus_terdekat field or parse it from description
                        if (isset($kost['kampus_terdekat']) && !empty($kost['kampus_terdekat'])) {
                            $kampus_list = explode(',', $kost['kampus_terdekat']);
                            foreach ($kampus_list as $kampus) {
                                echo '<li>' . trim($kampus) . '</li>';
                            }
                        } else {
                            // Default list if not available in database
                            ?>
                            <li>5 Menit dari UNISMA</li>
                            <li>6 Menit dari UIN Malang</li>
                            <li>4 Menit dari UB</li>
                            <li>2 Menit dari Polinema</li>
                            <li>5 Menit dari UM</li>
                        <?php } ?>
                    </ul>

                    <?php if (isset($kost['penjaga_kost']) && !empty($kost['penjaga_kost'])): ?>
                    <h6>Review Penjaga Kost</h6>
                    <ul class="list-unstyled small mb-4">
                        <li>* Penjaga kost: <?= $kost['penjaga_kost'] ?></li>
                        <?php if (isset($kost['review_penjaga']) && !empty($kost['review_penjaga'])): ?>
                            <li>* <?= $kost['review_penjaga'] ?></li>
                        <?php else: ?>
                            <li>* Humble, asik, baik</li>
                        <?php endif; ?>
                    </ul>
                    <?php endif; ?>
                </div>
                
                <!-- Contact Button (for mobile) -->
                <div class="mt-3 d-lg-none">
                    <?php $admin_phone = isset($kost['no_hp']) ? $kost['no_hp'] : '6281234567890'; ?>
                    <a href="https://wa.me/<?= $admin_phone ?>" class="btn btn-dark w-100 rounded-pill">
                        <i class="fab fa-whatsapp me-2"></i> Hubungi Pemilik
                    </a>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Kost</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            border: 1px solid #dee2e6;
        }
        .preview-img {
            border-radius: 10px;
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .submit-btn {
            background-color: #1a2e44;
            color: white;
            border-radius: 25px;
            padding: 8px 25px;
        }
        .upload-btn {
            border-radius: 25px;
            border: 1px solid #dee2e6;
            padding: 8px 15px;
            background-color: #fff;
            flex-grow: 1;
            text-align: left;
        }
        .btn-container {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }




        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            border: 1px solid #dee2e6;
        }
        .preview-img {
            border-radius: 10px;
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .submit-btn {
            background-color: #1a2e44;
            color: white;
            border-radius: 25px;
            padding: 8px 25px;
        }
        .upload-btn {
            border-radius: 25px;
            border: 1px solid #dee2e6;
            padding: 8px 15px;
            background-color: #fff;
            flex-grow: 1;
            text-align: left;
        }
        .btn-container {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <!-- Left Column: Information Cards -->
            <div class="col-lg-12 col-md-6 mb-4">
                <!-- Service Information Card -->
                <div class="card p-4 mb-4">
                    <h5 class="fw-bold">Informasi Layanan</h5>
                    <p>Untuk mengetahui detail informasi kost, pelanggan dikenai biaya layanan (jasa) sebesar Rp. 30.000</p>
                    <p>Informasi yang anda dapatkan nantinya meliputi :</p>
                    <ol>
                        <li>Nama Pemilik Kost</li>
                        <li>Nomor Handphone Pemilik Kost</li>
                        <li>Detail Alamat dan Share Lokasi Kost</li>
                    </ol>
                    <p>Jaminan refund atau ganti info kost lain jika kost yang dipilih sudah penuh</p>
                </div>
                
                <!-- Payment Method Card -->
                <div class="card p-4">
                    <h5 class="fw-bold">Tata Cara Pembayaran</h5>
                    <ol>
                        <li>Pilih kost yang Kamu minati</li>
                        <li>Transfer Biaya Layanan ke BCA 3151013676 : Kresna Candra Arta Gumelar atau jenis pembayaran lainnya sesuai dengan informasi di bawah</li>
                        <li>Pilih Lanjutkan Upload Bukti Transfer</li>
                        <li>Anda akan diarahkan ke WhatsApp admin dan silakan upload bukti transfer di room chat WhatsApp admin</li>
                    </ol>
                    <p>Informasi lengkap mengenai kost yang anda inginkan akan kami kirimkan melalui Whatsapp</p>
                </div>
            </div>
            <!-- Right Column: Preview and Form -->
            <div class="col-lg-6 col-md-6">
                <div class="card p-4">
                    <h5 class="fw-bold mb-3">Preview Pemesanan Rekomendasi Kost</h5>
                    
                    <!-- Room Image -->
                    <img src="/api/placeholder/400/320" alt="Preview Kost" class="preview-img mb-4">
                    <!-- Kost Information -->
                    <h5 class="fw-bold">Kost Putra Soekarno Hatta</h5>
                    <p class="mb-1">CP: 0822********</p>
                    <p class="mb-1">Jl. Bung*** L*** No.**</p>
                    <p class="mb-4">Link Maps</p>
                    
                    <!-- Form Buttons -->
                    <div class="btn-container">
                        <button class="upload-btn">Unggah bukti pembayaran</button>
                        <button class="submit-btn">Kirim</button>
                    </div>
=======
</div>

<!-- Additional Info Section -->
<div class="container mb-5">
    <div class="row g-4">
        <!-- Kost Location Map (if you have maps integration) -->
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-3">Lokasi Kost</h5>
                    <?php if (isset($kost['maps_embed']) && !empty($kost['maps_embed'])): ?>
                        <div class="ratio ratio-16x9">
                            <?= $kost['maps_embed'] ?>
                        </div>
                    <?php else: ?>
                        <div class="bg-light p-5 text-center rounded">
                            <p class="text-muted">Lokasi: <?= $kost['alamat_kost'] ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <!-- Owner Information -->
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-3">Informasi Pemilik</h5>
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div>
                            <h6 class="mb-0"><?= isset($kost['nama_pemilik']) ? $kost['nama_pemilik'] : 'Pemilik Kost' ?></h6>
                            <small class="text-muted">Pemilik Kost</small>
                        </div>
                    </div>
                    <?php $admin_phone = isset($kost['no_hp']) ? $kost['no_hp'] : '6281234567890'; ?>
                    <a href="https://wa.me/<?= $admin_phone ?>" class="btn btn-success w-100">
                        <i class="fab fa-whatsapp me-2"></i> Hubungi via WhatsApp
                    </a>
>>>>>>> 08781cdce4234e468c267e6cfd4e3a1b614dcb2d
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD

    <script>
=======
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
>>>>>>> 08781cdce4234e468c267e6cfd4e3a1b614dcb2d
document.addEventListener('DOMContentLoaded', function () {
    const imageSliderElement = document.getElementById('imageSlider');
    const customIndicatorsContainer = document.querySelector('.custom-indicators');

    if (imageSliderElement && customIndicatorsContainer) {
        const customIndicators = customIndicatorsContainer.querySelectorAll('button');

        // Function to update active indicators
        const updateCustomIndicators = (activeIndex) => {
            customIndicators.forEach((indicator, index) => {
                if (index === activeIndex) {
                    indicator.classList.add('active');
                    indicator.setAttribute('aria-current', 'true');
                } else {
                    indicator.classList.remove('active');
                    indicator.removeAttribute('aria-current');
                }
            });
        };

        // Event listener when slide changes
        imageSliderElement.addEventListener('slid.bs.carousel', function (event) {
            updateCustomIndicators(event.to);
        });

        // Initialize indicators when page loads
        const carouselInstance = bootstrap.Carousel.getInstance(imageSliderElement);
        if (carouselInstance) {
           const activeItem = imageSliderElement.querySelector('.carousel-item.active');
           const items = Array.from(imageSliderElement.querySelectorAll('.carousel-item'));
           const initialActiveIndex = items.indexOf(activeItem);
           if(initialActiveIndex !== -1) {
               updateCustomIndicators(initialActiveIndex);
           } else {
               updateCustomIndicators(0); 
           }
        } else {
             updateCustomIndicators(0);
        }
    }
});
</script>