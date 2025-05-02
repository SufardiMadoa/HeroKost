<!-- Detail Kost View - With Detail Tambahan -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
  :root {
    --primary-color: #0d1b2a;
    --accent-color: #1b263b;
    --light-accent: #415a77;
    --text-color: #212529;
    --light-bg: #f8f9fa;
    --card-shadow: 0 10px 20px rgba(0,0,0,0.05);
    --border-radius: 12px;
  }

  body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
    background-color: var(--light-bg);
    color: var(--text-color);
  }

  .hero-section {
    position: relative;
    height: 350px;
    overflow: hidden;
    border-radius: 0 0 var(--border-radius) var(--border-radius);
  }

  .hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(13, 27, 42, 0.3), rgba(13, 27, 42, 0.8));
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 0 1rem;
  }

  .hero-text {
    max-width: 800px;
  }

  .custom-input-group {
    border: 1px solid #dee2e6;
    border-radius: 12px;
    display: flex;
    align-items: center;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    background-color: white;
    transition: all 0.3s ease;
  }

  .custom-input-group:focus-within {
    box-shadow: 0 4px 10px rgba(13, 27, 42, 0.15);
    border-color: #adb5bd;
  }

  .custom-input {
    border: none;
    padding: 12px 16px;
    flex: 1;
    font-size: 14px;
    outline: none;
  }

  .custom-button {
    background-color: var(--primary-color);
    color: white;
    border: none;
    padding: 10px 24px;
    font-weight: 600;
    border-radius: 10px;
    margin: 4px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    transition: all 0.2s ease;
  }

  .custom-button:hover {
    background-color: var(--accent-color);
    transform: translateY(-1px);
  }

  .info-card {
    background-color: #ffffff;
    border-radius: var(--border-radius);
    border: none;
    box-shadow: var(--card-shadow);
    overflow: hidden;
  }

  .control-btn {
    background-color: rgba(255, 255, 255, 0.9);
    color: var(--primary-color);
    border: none;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;  
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
    transition: all 0.2s ease;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
  }

  .control-btn:hover {
    background-color: var(--primary-color);
    color: white;
    transform: scale(1.05);
  }

  .custom-indicators {
    background-color: rgba(255, 255, 255, 0.8);
    border-radius: 20px;
    padding: 4px 10px;
  }

  .custom-indicators button {
    background-color: #dee2e6;
    border: none;
    border-radius: 50%;
    width: 8px;
    height: 8px;
    margin: 0 4px;
    padding: 0;
    transition: all 0.2s ease;
  }

  .custom-indicators button.active {
    background-color: var(--primary-color);
    width: 20px;
    border-radius: 10px;
  }

  .list-unstyled li {
    margin-bottom: 0.5rem;
    line-height: 1.5;
    display: flex;
    align-items: center;
  }

  .list-unstyled li i {
    color: var(--light-accent);
    margin-right: 8px;
    font-size: 14px;
  }

  .facility-badge {
    background-color: #f8f9fa;
    border: 1px solid #e9ecef;
    color: var(--text-color);
    border-radius: 8px;
    padding: 6px 12px;
    margin-right: 8px;
    margin-bottom: 8px;
    font-size: 13px;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
  }
  
  .facility-badge i {
    margin-right: 6px;
    color: var(--light-accent);
  }

  h6 {
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--accent-color);
    border-bottom: 2px solid #f1f3f5;
    padding-bottom: 0.5rem;
    position: relative;
  }

  h6::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 40px;
    height: 2px;
    background-color: var(--light-accent);
  }
   
  .carousel-item img {
    width: 100%;
    height: 450px;
    object-fit: cover;
    border-radius: var(--border-radius);
  }

  .image-slider-container {
    position: relative;
  }

  .carousel-controls-overlay {
    position: absolute;
    bottom: 20px;
    left: 0;
    width: 100%;
    z-index: 10;
    padding: 0 20px;
  }

  .price-badge {
    background-color: var(--primary-color);
    color: white;
    border-radius: 8px;
    padding: 8px 16px;
    font-weight: 600;
    font-size: 1rem;
    display: inline-flex;
    align-items: center;
  }

  .price-badge i {
    margin-right: 6px;
  }

  .contact-btn {
    background-color: #25D366;
    color: white;
    border: none;
    border-radius: 10px;
    padding: 10px 20px;
    font-weight: 600;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .contact-btn:hover {
    background-color: #128C7E;
    color: white;
    transform: translateY(-2px);
  }

  .contact-btn i {
    margin-right: 8px;
    font-size: 1.2rem;
  }

  .step-card {
    position: relative;
    padding-left: 50px;
    margin-bottom: 1rem;
  }

  .step-number {
    position: absolute;
    left: 0;
    top: 0;
    width: 35px;
    height: 35px;
    background-color: var(--light-accent);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 1rem;
  }

  .payment-steps h5 {
    color: var(--primary-color);
    font-weight: 600;
    margin-bottom: 1.5rem;
  }

  .service-info ul li, .payment-steps ol li {
    margin-bottom: 0.7rem;
  }

  .card {
    border: none;
    box-shadow: var(--card-shadow);
    border-radius: var(--border-radius);
    overflow: hidden;
  }

  .preview-card {
    background-color: white;
    height: 100%;
  }

  .preview-card .card-header {
    background-color: var(--primary-color);
    color: white;
    padding: 1rem;
    border-radius: var(--border-radius) var(--border-radius) 0 0;
  }

  .preview-img {
    height: 180px;
    width: 100%;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 1rem;
  }

  .preview-info {
    padding: 0.5rem 0;
  }

  .preview-info p {
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
  }

  .preview-info p strong {
    color: var(--accent-color);
    min-width: 80px;
    display: inline-block;
  }

  @media (max-width: 991.98px) {
    .mt-auto.text-end {
      text-align: start !important;
      margin-top: 1rem !important;
    }
    
    .carousel-item img {
      height: 350px;
    }
    
    .hero-section {
      height: 250px;
    }
  }
</style>

<!-- Header Section -->
<section class="hero-section d-flex align-items-center justify-content-center text-center" style="background-image: url('<?= base_url('image/beranda.jpg') ?>'); background-size: cover; background-position: center;">
  <div class="hero-overlay">
    <div class="hero-text">
      <h1 class="display-5 fw-bold mb-2 text-white"><?= $kost['nama_kost'] ?></h1>
      <p class="lead text-white opacity-90"><?= $kost['alamat_kost'] ?></p>
    </div>
  </div>
</section>

<!-- Detail Kost Section -->
<div class="container my-5">
    <div class="info-card p-0 overflow-hidden">
        <div class="row g-0">
            <!-- Image Carousel -->
            <div class="col-lg-7 image-slider-container">
                <div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php $i = 0;
                        foreach ($gambar as $gambarItem): ?>
                            <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                                <img src="<?= base_url($gambarItem['path_gambar']) ?>" class="d-block" alt="Gambar Kamar <?= $i + 1 ?>">
                            </div>
                        <?php $i++;
                        endforeach; ?>
                        
                        <?php if (empty($gambar)): ?>
                            <div class="carousel-item active">
                                <img src="<?= base_url('image/default-kost.jpg') ?>" class="d-block" alt="Default Image">
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="carousel-controls-overlay">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <button class="control-btn me-2" type="button" data-bs-target="#imageSlider" data-bs-slide="prev">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <div class="custom-indicators d-flex align-items-center">
                                    <?php for ($i = 0; $i < count($gambar); $i++): ?>
                                        <button type="button" data-bs-target="#imageSlider" data-bs-slide-to="<?= $i ?>" class="<?= $i == 0 ? 'active' : '' ?>" <?= $i == 0 ? 'aria-current="true"' : '' ?>></button>
                                    <?php endfor; ?>
                                    
                                    <?php if (empty($gambar)): ?>
                                        <button type="button" data-bs-target="#imageSlider" data-bs-slide-to="0" class="active" aria-current="true"></button>
                                    <?php endif; ?>
                                </div>
                                <button class="control-btn ms-2" type="button" data-bs-target="#imageSlider" data-bs-slide="next">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Information Section -->
            <div class="col-lg-5 d-flex flex-column p-4">
                <!-- Kost Information -->
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h4 class="fw-bold mb-0"><?= $kost['nama_kost'] ?></h4>
                        <span class="price-badge">
                            <i class="fas fa-tag"></i>
                            Rp. <?= number_format($kost['harga_kost'], 0, ',', '.') ?>/bulan
                        </span>
                    </div>
                    
                    <p class="text-muted mb-3">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        <?= $kost['alamat_kost'] ?>
                    </p>
                    
                    <p class="mb-4"><?= $kost['deskripsi_kost'] ?></p>
                    
                    <!-- Contact Button -->
                    <?php $admin_phone = isset($kost['no_hp']) ? $kost['no_hp'] : '6281234567890'; ?>
                    <a href="https://wa.me/<?= $admin_phone ?>" class="contact-btn w-100 mb-4">
                        <i class="fab fa-whatsapp"></i> 
                        Hubungi Pemilik
                    </a>
                </div>
                
                <!-- Facilities -->
                <div>
                    <h6>Fasilitas</h6>
                    <div class="d-flex flex-wrap mb-4">
                        <?php foreach ($fasilitas as $fasilitasItem): ?>
                            <span class="facility-badge">
                                <i class="fas fa-check-circle"></i>
                                <?= $fasilitasItem['nama_fasilitas'] ?>
                            </span>
                        <?php endforeach; ?>
                    </div>

                    <!-- Detail Tambahan Section -->
                    <h6>Detail Tambahan</h6>
                    <ul class="list-unstyled small mb-4">
                        <?php if (!empty($detailTambahan)): ?>
                            <?php foreach ($detailTambahan as $detail): ?>
                                <li>
                                    <i class="fas fa-info-circle"></i>
                                    <span><?= $detail['label'] ?>: <?= $detail['deskripsi'] ?></span>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li><i class="fas fa-info-circle"></i> Tidak ada detail tambahan</li>
                        <?php endif; ?>
                    </ul>

                    <?php if (isset($kost['penjaga_kost']) && !empty($kost['penjaga_kost'])): ?>
                    <h6>Review Penjaga Kost</h6>
                    <ul class="list-unstyled small mb-4">
                        <li><i class="fas fa-user"></i> Penjaga kost: <?= $kost['penjaga_kost'] ?></li>
                        <?php if (isset($kost['review_penjaga']) && !empty($kost['review_penjaga'])): ?>
                            <li><i class="fas fa-comment"></i> <?= $kost['review_penjaga'] ?></li>
                        <?php else: ?>
                            <li><i class="fas fa-comment"></i> Humble, asik, baik</li>
                        <?php endif; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Additional Info Section -->
<div class="container mb-5">
  <div class="row g-4">
    <!-- Kolom Kiri: Dua card disusun vertikal -->
    <div class="col-lg-8">
      <div class="card mb-4 service-info">
        <div class="card-body p-4">
          <h5 class="fw-bold mb-3">Informasi Layanan</h5>
          <div class="d-flex align-items-center mb-3">
            <div class="bg-light p-3 rounded-circle me-3">
              <i class="fas fa-info-circle text-primary fa-2x"></i>
            </div>
            <p class="mb-0">Untuk mengetahui detail informasi kost, pelanggan dikenai biaya layanan (jasa) sebesar <strong>Rp. 30.000</strong></p>
          </div>
          
          <p class="fw-semibold mb-2">Informasi yang anda dapatkan nantinya meliputi:</p>
          <ul class="mb-0">
            <li>Nama Pemilik Kost</li>
            <li>Nomor Handphone Pemilik Kost</li>
            <li>Detail Alamat dan Share Lokasi Kost</li>
            <li>Jaminan refund atau ganti info kost lain jika kost yang dipilih sudah penuh</li>
          </ul>
        </div>
      </div>

      <div class="card payment-steps">
        <div class="card-body p-4">
          <h5 class="fw-bold mb-3">Tata Cara Pembayaran</h5>
          
          <div class="step-card">
            <div class="step-number">1</div>
            <p class="mb-0">Pilih kost yang ingin anda pesan</p>
          </div>
          
          <div class="step-card">
            <div class="step-number">2</div>
            <p class="mb-0">Transfer biaya layanan ke BCA 3510431678 a.n. Veronica Cantika Arta Gumelar</p>
          </div>
          
          <div class="step-card">
            <div class="step-number">3</div>
            <p class="mb-0">Konfirmasi pembayaran melalui WhatsApp admin</p>
          </div>
          
          <div class="step-card">
            <div class="step-number">4</div>
            <p class="mb-0">Admin akan memberikan detail informasi kost</p>
          </div>
          
          <div class="step-card">
            <div class="step-number">5</div>
            <p class="mb-0">Jika kost penuh, admin akan menawarkan refund atau alternatif kost</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Kolom Kanan: Preview Pemesanan -->
    <div class="col-lg-4">
      <div class="card preview-card">
        <div class="card-header">
          <h5 class="fw-bold mb-0">Preview Pemesanan Rekomendasi Kost</h5>
        </div>
        <div class="card-body p-4">
          <?php
          $gambarUtama = !empty($gambar) ? $gambar[0] : null;
          if (!empty($gambarUtama)):
            ?>
            <img src="<?= base_url($gambarUtama['path_gambar']); ?>" class="preview-img" alt="<?= $kost['nama_kost']; ?>">
          <?php else: ?>
            <div class="bg-light p-5 text-center rounded mb-3">
              <i class="fas fa-home fa-3x text-muted"></i>
              <p class="text-muted mt-2">Tidak ada gambar</p>
            </div>
          <?php endif; ?>
          
          <h4 class="fw-bold text-center mb-3"><?= $kost['nama_kost']; ?></h4>
          
          <div class="preview-info">
            <p><strong>CP:</strong> <?= isset($kost['kontak']) ? substr($kost['kontak'], 0, 4) . str_repeat('*', 6) : 'Tersedia'; ?></p>
            <p><strong>Alamat:</strong> <?= preg_replace('/(?<=\bJl\.\s\w{3})\w+/', '***', $kost['alamat_kost']); ?></p>
            <p><strong>Harga:</strong> Rp <?= number_format($kost['harga_kost'], 0, ',', '.'); ?></p>
            <p class="mb-3"><strong>Pemilik:</strong> <?= isset($kost['nama_pemilik']) ? $kost['nama_pemilik'] : 'Pemilik Kost' ?></p>
          </div>
          
          <form method="POST" action="<?= base_url('/pembayaran') ?>" enctype="multipart/form-data">
            <!-- Hidden fields required by the controller -->
            <input type="hidden" name="id_kost" value="<?= $kost['id_kost']; ?>">
            <input type="hidden" name="jumlah_bayar" value="<?= $kost['harga_kost']; ?>">
            <input type="hidden" name="id_user" value="<?= session()->get('id_user'); ?>">
            
            <div class="mb-3">
              <label for="bukti_pembayaran" class="form-label fw-semibold">Bukti Pembayaran</label>
              <div class="custom-input-group">
                <input type="file" class="custom-input form-control" id="bukti_pembayaran" name="bukti_pembayaran" onchange="updateFileName()" required>
              </div>
              <small id="fileNamePreview" class="form-text text-muted mt-1">Belum ada file dipilih</small>
            </div>
            
            <button type="submit" class="btn custom-button w-100">Kirim Bukti Pembayaran</button>
          </form>
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