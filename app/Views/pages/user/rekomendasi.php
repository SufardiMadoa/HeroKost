<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HeroKost - Kost Rekomendasi Malang</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.css">
  
  <style>
    :root {
      --primary-color: #00A19D;
      --secondary-color: #0F4C75;
      --accent-color: #FFB830;
      --dark-color: #1B262C;
      --light-color: #F8F9FA;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f9f9f9;
    }
    
    .hero-section {
      position: relative;
      height: 80vh;
      min-height: 600px;
      overflow: hidden;
      background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?= base_url('image/beranda.jpg') ?>');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }
    
    .hero-content {
      position: relative;
      z-index: 10;
    }
    
    .hero-section h1 {
      font-size: 3.5rem;
      font-weight: 800;
      text-shadow: 2px 2px 8px rgba(0,0,0,0.5);
      animation: fadeInDown 1s;
    }
    
    .hero-section p {
      font-size: 1.5rem;
      text-shadow: 1px 1px 4px rgba(0,0,0,0.5);
      animation: fadeInUp 1s;
    }
    
    .btn-filter {
      background-color: var(--accent-color);
      color: var(--dark-color);
      font-weight: 600;
      padding: 12px 30px;
      border-radius: 50px;
      border: none;
      box-shadow: 0 4px 15px rgba(255, 184, 48, 0.3);
      transition: all 0.3s ease;
      animation: pulse 1.5s infinite;
    }
    
    .btn-filter:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(255, 184, 48, 0.4);
      background-color: #FFA500;
    }
    
    .card {
      border: none;
      border-radius: 20px;
      overflow: hidden;
      transition: all 0.3s ease;
      box-shadow: 0 8px 30px rgba(0,0,0,0.1);
      height: 100%;
    }
    
    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    }
    
    .card-img-top {
      height: 220px;
      object-fit: cover;
      transition: all 0.5s ease;
    }
    
    .card:hover .card-img-top {
      transform: scale(1.05);
    }
    
    .card-body {
      padding: 1.5rem;
      display: flex;
      flex-direction: column;
    }
    
    .card-title {
      color: var(--secondary-color);
      font-size: 1.3rem;
      font-weight: 700;
      margin-bottom: 1rem;
    }
    
    .facility-list {
      list-style: none;
      padding-left: 0;
      margin-bottom: 1.5rem;
    }
    
    .facility-list li {
      margin-bottom: 8px;
      position: relative;
      padding-left: 30px;
      color: #555;
    }
    
    .facility-list li:before {
      content: "✓";
      position: absolute;
      left: 0;
      top: 0;
      color: var(--primary-color);
      font-weight: bold;
      background-color: rgba(0, 161, 157, 0.1);
      border-radius: 50%;
      width: 22px;
      height: 22px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;
    }
    
    .price-tag {
      font-size: 1.3rem;
      font-weight: 700;
      color: var(--primary-color);
    }
    
    .btn-detail {
      background-color: var(--dark-color);
      color: white;
      border-radius: 50px;
      padding: 8px 20px;
      font-weight: 600;
      transition: all 0.3s ease;
      border: none;
    }
    
    .btn-detail:hover {
      background-color: var(--secondary-color);
      transform: translateX(5px);
    }
    
    .badge-kost-type {
      position: absolute;
      top: 15px;
      left: 15px;
      background-color: var(--accent-color);
      color: var(--dark-color);
      font-weight: 600;
      padding: 6px 12px;
      border-radius: 8px;
      z-index: 10;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .badge-available {
      position: absolute;
      top: 15px;
      right: 15px;
      background-color: var(--primary-color);
      color: white;
      font-weight: 600;
      padding: 6px 12px;
      border-radius: 8px;
      z-index: 10;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .empty-state {
      text-align: center;
      padding: 3rem;
      background-color: #f8f9fa;
      border-radius: 20px;
      border: 2px dashed #dee2e6;
    }
    
    /* Filter modal styles */
    .modal-content {
      border-radius: 20px;
      border: none;
      box-shadow: 0 10px 40px rgba(0,0,0,0.2);
    }
    
    .modal-header {
      background-color: var(--secondary-color);
      color: white;
      border-radius: 20px 20px 0 0;
      padding: 1.5rem;
    }
    
    .modal-body {
      padding: 2rem;
    }
    
    .form-label {
      font-weight: 600;
      color: var(--dark-color);
      margin-bottom: 0.5rem;
    }
    
    .form-control, .form-select {
      border-radius: 10px;
      padding: 10px 15px;
      border: 1px solid #ced4da;
      transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
      box-shadow: 0 0 0 3px rgba(15, 76, 117, 0.2);
      border-color: var(--secondary-color);
    }
    
    .btn-apply {
      background-color: var(--primary-color);
      color: white;
      font-weight: 600;
      padding: 10px 25px;
      border-radius: 50px;
      border: none;
      box-shadow: 0 4px 15px rgba(0, 161, 157, 0.3);
      transition: all 0.3s ease;
    }
    
    .btn-apply:hover {
      background-color: var(--secondary-color);
    }
    
    /* Loading Animation */
    .loading-container {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 3rem 0;
    }
    
    .loading-animation {
      width: 50px;
      height: 50px;
      border: 5px solid #f3f3f3;
      border-top: 5px solid var(--primary-color);
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    
    @keyframes pulse {
      0% {
        box-shadow: 0 0 0 0 rgba(255, 184, 48, 0.4);
      }
      70% {
        box-shadow: 0 0 0 15px rgba(255, 184, 48, 0);
      }
      100% {
        box-shadow: 0 0 0 0 rgba(255, 184, 48, 0);
      }
    }
    
    /* Responsive adjustments */
    @media (max-width: 992px) {
      .hero-section h1 {
        font-size: 2.5rem;
      }
      
      .hero-section p {
        font-size: 1.2rem;
      }
    }
    
    @media (max-width: 768px) {
      .hero-section {
        height: 70vh;
      }
      
      .hero-section h1 {
        font-size: 2rem;
      }
      
      .hero-section p {
        font-size: 1rem;
      }
    }
    
    /* Additional styling for responsiveness */
    @media (max-width: 576px) {
      .card-img-top {
        height: 180px;
      }
    }
  </style>
</head>
<body>

<!-- Hero Section -->
<section class="hero-section d-flex align-items-center justify-content-center text-center">
  <div class="container text-white hero-content">
    <h1 class="mb-3 animate__animated animate__fadeInDown">
      Temukan kost rekomendasi terbaik dari<br>kami cepat, mudah, dan terpercaya!
    </h1>
    <p class="lead mb-4 animate__animated animate__fadeInUp">
      HeroKost Rekomendasi Kost Worth It Kota Malang
    </p>
    <div class="d-flex justify-content-center align-items-center mb-4 animate__animated animate__fadeInUp animate__delay-1s">
      <button class="btn btn-filter" data-bs-toggle="modal" data-bs-target="#filterKostModal">
        <i class="fas fa-filter me-2"></i> Filter Kost Sekarang
      </button>
    </div>
  </div>
</section>

<!-- Main Content -->
<div class="container py-5">
  
  <!-- Include filter component -->
  <?= $this->include('pages/Fitur/filter') ?>
  
  <!-- Kost Listings -->
  <div class="row g-4">
    <?php if (empty($kosts)): ?>
      <div class="col-12">
        <div class="empty-state">
          <i class="fas fa-home fa-4x mb-3 text-muted"></i>
          <h4 class="mb-3">Tidak ada kost ditemukan</h4>
          <p class="mb-0 text-muted">Coba ubah filter pencarian Anda untuk menemukan kost yang sesuai.</p>
        </div>
      </div>
    <?php else: ?>
      <?php foreach ($kosts as $kost): ?>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <!-- Badges for kost type and availability -->
            <span class="badge-kost-type">
              <?= $kost['jenis'] == '' ? 'Kost Putra' : ($kost['jenis'] == 'putri' ? 'Kost Putri' : 'Kost Campur') ?>
            </span>
          
            
            <!-- Kost Image -->
            <?php if (!empty($kost['gambar_utama'])): ?>
              <div style="overflow: hidden;">
                <img src="<?= base_url($kost['gambar_utama']['path_gambar']); ?>" class="card-img-top" alt="<?= $kost['nama_kost']; ?>">
              </div>
            <?php else: ?>
              <div class="bg-light text-center py-5">
                <i class="fas fa-home fa-3x text-muted"></i>
                <p class="text-muted">Tidak ada gambar</p>
              </div>
            <?php endif; ?>
            
            <!-- Kost Details -->
            <div class="card-body">
              <h5 class="card-title"><?= $kost['nama_kost']; ?></h5>
              
              <!-- Location -->
              <p class="text-muted mb-3">
                <i class="fas fa-map-marker-alt me-2 text-primary"></i>
                <?= $kost['alamat_kost']; ?>
              </p>
              
              <!-- Facilities -->
              <ul class="facility-list">
                <?php
                $facilityCount = 0;
                foreach ($kost['fasilitas'] as $fasilitas):
                  if ($facilityCount < 3):  // Only show top 3 facilities
                    ?>
                  <li><?= esc($fasilitas['nama_fasilitas']) ?></li>
                <?php
                    $facilityCount++;
                  endif;
                endforeach;

                if (count($kost['fasilitas']) > 3):
                  ?>
                  <li class="text-primary">+<?= count($kost['fasilitas']) - 3 ?> fasilitas lainnya</li>
                <?php endif; ?>
              </ul>

              <!-- Price and Details Button -->
              <div class="d-flex justify-content-between align-items-center mt-auto">
                <span class="price-tag">Rp <?= number_format($kost['harga_kost'], 0, ',', '.'); ?> / bulan</span>
                <a href="/kost/detail/<?= $kost['id_kost']; ?>" class="btn btn-detail">
                  Detail <i class="fas fa-arrow-right ms-1"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

<!-- Filter Modal -->
<div class="modal fade" id="filterKostModal" tabindex="-1" aria-labelledby="filterKostModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filterKostModalLabel">
          <i class="fas fa-filter me-2"></i> Filter Pencarian Kost
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/kost/filter" method="get">
          <div class="row g-3">
            <div class="col-md-6">
              <label for="jenis" class="form-label">Jenis Kost</label>
              <select class="form-select" id="jenis" name="jenis">
                <option value="">Semua Jenis</option>
                <option value="putra">Kost Putra</option>
                <option value="putri">Kost Putri</option>
                <option value="campur">Kost Campur</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="harga_min" class="form-label">Harga Minimum</label>
              <input type="number" class="form-control" id="harga_min" name="harga_min" placeholder="Rp 0">
            </div>
            <div class="col-md-6">
              <label for="harga_max" class="form-label">Harga Maksimum</label>
              <input type="number" class="form-control" id="harga_max" name="harga_max" placeholder="Rp 5.000.000">
            </div>
            <div class="col-md-6">
              <label for="area" class="form-label">Area/Lokasi</label>
              <select class="form-select" id="area" name="area">
                <option value="">Semua Area</option>
                <option value="lowokwaru">Lowokwaru</option>
                <option value="klojen">Klojen</option>
                <option value="blimbing">Blimbing</option>
                <option value="sukun">Sukun</option>
                <option value="kedungkandang">Kedungkandang</option>
              </select>
            </div>
            <div class="col-12">
              <label class="form-label">Fasilitas</label>
              <div class="row g-2">
                <div class="col-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="wifi" name="fasilitas[]" value="wifi">
                    <label class="form-check-label" for="wifi">
                      <i class="fas fa-wifi me-1 text-primary"></i> WiFi
                    </label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="ac" name="fasilitas[]" value="ac">
                    <label class="form-check-label" for="ac">
                      <i class="fas fa-snowflake me-1 text-primary"></i> AC
                    </label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="kamar_mandi_dalam" name="fasilitas[]" value="kamar_mandi_dalam">
                    <label class="form-check-label" for="kamar_mandi_dalam">
                      <i class="fas fa-bath me-1 text-primary"></i> K. Mandi Dalam
                    </label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="dapur" name="fasilitas[]" value="dapur">
                    <label class="form-check-label" for="dapur">
                      <i class="fas fa-utensils me-1 text-primary"></i> Dapur
                    </label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="parkir" name="fasilitas[]" value="parkir">
                    <label class="form-check-label" for="parkir">
                      <i class="fas fa-car me-1 text-primary"></i> Parkir
                    </label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="laundry" name="fasilitas[]" value="laundry">
                    <label class="form-check-label" for="laundry">
                      <i class="fas fa-tshirt me-1 text-primary"></i> Laundry
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="d-flex justify-content-between mt-4">
            <button type="reset" class="btn btn-outline-secondary">
              <i class="fas fa-redo me-1"></i> Reset
            </button>
            <button type="submit" class="btn btn-apply">
              <i class="fas fa-check me-1"></i> Terapkan Filter
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.js"></script>
<script>
  // Animation on scroll
  document.addEventListener('DOMContentLoaded', function() {
    // Add animation classes to cards when they become visible
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('animate__animated', 'animate__fadeInUp');
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.1
    });
    
    // Observe all cards
    document.querySelectorAll('.card').forEach(card => {
      observer.observe(card);
    });
  });
</script>

</body>
</html>