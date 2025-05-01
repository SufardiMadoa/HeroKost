<!-- Detail Kost View -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>

.custom-input-group {
    border: 1px solid #ccc;
    border-radius: 999px;
    display: flex;
    align-items: center;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .custom-input {
    border: none;
    padding: 10px 16px;
    flex: 1;
    font-size: 14px;
    outline: none;
  }

  .custom-button {
    background-color: #0d1b2a; /* dark navy */
    color: white;
    border: none;
    padding: 8px 20px;
    font-weight: 600;
    border-radius: 999px;
    margin-right: 4px;
    margin-top: 2px;
    margin-bottom: 2px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
  }

  .custom-button:hover {
    background-color: #091423;
  }

   .info-card {
    background-color: #ffffff;
    /* border-radius: 1rem; */
    border:none;
    shadow:none;
    
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
            <div class="col-lg-5 d-flex flex-column ">
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
</div>

<!-- Additional Info Section -->
<div class="container mb-5">
  <div class="row g-4 d-flex align-items-stretch">
    <!-- Kolom Kiri: Dua card disusun vertikal -->
    <div class="col-lg-8 d-flex flex-column justify-content-between">
      <div class="card shadow-sm mb-3 flex-fill rounded-3">
        <div class="card-body">
          <h5 class="card-title mb-3">Informasi Layanan</h5>
          <p>
            Untuk mengetahui detail informasi kost, pelanggan dikenai biaya layanan (jasa) sebesar Rp. 30.000<br>
            Informasi yang anda dapatkan nantinya meliputi:
            <ul>
              <li>Nama Pemilik Kost</li>
              <li>Nomor Handphone Pemilik Kost</li>
              <li>Detail Alamat dan Share Lokasi Kost</li>
              <li>Jaminan refund atau ganti info kost lain jika kost yang dipilih sudah penuh</li>
            </ul>
          </p>
        </div>
      </div>

      <div class="card shadow-sm flex-fill rounded-3">
        <div class="card-body ">
          <h5 class="card-title mb-3">Tata Cara Pembayaran</h5>
          <ol>
            <li>Pilih kost yang ingin anda pesan</li>
            <li>Transfer biaya layanan ke BCA 3510431678 a.n. Veronica Cantika Arta Gumelar</li>
            <li>Konfirmasi pembayaran melalui WhatsApp admin</li>
            <li>Admin akan memberikan detail informasi kost</li>
            <li>Jika kost penuh, admin akan menawarkan refund atau alternatif kost</li>
          </ol>
        </div>
      </div>
    </div>

    <!-- Kolom Kanan: Informasi Pemilik -->
    <div class="col-lg-4">
  <div class="card shadow-sm h-100 rounded-3">
    <div class="card-body d-flex flex-column justify-content-between">
      <div>
        <h5 class="card-title my-3">Preview Pemesanan Rekomendasi Kost</h5>
        <div class="d-flex align-items-center ">
          <?php if (!empty($gambarUtama)): ?>
            <img src="<?= base_url($gambarUtama['path_gambar']); ?>" class="card-img-top" alt="<?= $kost['nama_kost']; ?>" style="height: 200px; object-fit: cover;">
          <?php else: ?>
            <p class="text-muted">Tidak ada gambar</p>
          <?php endif; ?>
        </div>
        <h4 class="fw-bold text-center mt-3"><?= $kost['nama_kost']; ?></h4>
        <p><strong>CP:</strong> <?= substr($kost['kontak'], 0, 4) . str_repeat('*', 6); ?></p>
        <p><strong>Alamat:</strong> <?= preg_replace('/(?<=\bJl\.\s\w{3})\w+/', '***', $kost['alamat_kost']); ?></p>
        <p><strong>Harga:</strong> Rp <?= number_format($kost['harga_kost'], 0, ',', '.'); ?></p>

        <h6 class="mb-0"><?= isset($kost['nama_pemilik']) ? $kost['nama_pemilik'] : 'Pemilik Kost' ?></h6>
        <small class="text-muted">Pemilik Kost</small>
        
        <form method="POST" action="<?= base_url('/pembayaran') ?>" enctype="multipart/form-data">
          <!-- Hidden fields required by the controller -->
          <input type="hidden" name="id_kost" value="<?= $kost['id_kost']; ?>">
          <input type="hidden" name="jumlah_bayar" value="<?= $kost['harga_kost']; ?>">
          <input type="hidden" name="id_user" value="<?= session()->get('id_user'); ?>">
          
          <div class="mb-3 mt-3">
            <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
            <div class="custom-input-group">
              <input type="file" class="custom-input form-control" id="bukti_pembayaran" name="bukti_pembayaran" onchange="updateFileName()" required>
            </div>
            <small id="fileNamePreview" class="form-text text-muted mt-1">Belum ada file dipilih</small>
          </div>
          
          <button type="submit" class="btn btn-primary w-100">Kirim Bukti Pembayaran</button>
        </form>
        
        
      </div>
    </div>
  </div>
</div>
              <div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
          function updateFileName() {
            const input = document.getElementById('bukti_pembayaran');
            const preview = document.getElementById('fileNamePreview');
            preview.textContent = input.files[0] ? input.files[0].name : 'Belum ada file dipilih';
          }
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