<!-- CSS Styles -->
<style>
    .card-img-top {
      height: 200px;
      object-fit: cover;
      border-radius: 1rem 1rem 0 0;
    }
    .card {
      border-radius: 1rem;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .btn-detail {
      background-color: black;
      color: white;
      border-radius: 50px;
    }
    .btn-detail:hover {
      background-color: #333;
      color: white;
    }
    .testimonial-card {
      border-radius: 1rem;
      padding: 2rem;
      height: 100%;
      width: 100%;
      max-width: 487px;
    }
    .testimonial-dark {
      background-color: #0d1b2a;
      color: white;
    }
    .testimonial-light {
      background-color: white;
      color: black;
      border: 1px solid #dee2e6;
    }
    .testimonial-quote {
      font-size: 3rem;
    }
    .testimonial-stars {
      color: gold;
    }
    .testimonial-img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      object-fit: cover;
    }
    .hero-section {
      height: 90vh;
      background-size: cover;
      background-position: center;
      position: relative;
    }
    .hero-section::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.4);
    }
    .hero-section .container {
      position: relative;
      z-index: 1;
    }
    .about-section {
      padding: 5rem 0;
    }
    .about-text {
      color: #333;
      line-height: 1.7;
    }
    .carousel-control-prev-icon, .carousel-control-next-icon {
      filter: invert(1);
    }
</style>

<!-- Hero Section -->
<section class="hero-section d-flex align-items-center justify-content-center text-center" style="background-image: url('<?= base_url('image/beranda.jpg') ?>');">
  <div class="container text-white">
    <h1 class="display-4 fw-bold mb-3">
      Temukan kost rekomendasi terbaik dari<br>kami cepat, mudah, dan terpercaya!
    </h1>
    <p class="lead mb-4">
      HeroKost Rekomendasi Kost Worth It Kota Malang
    </p>
    <a href="#" class="btn btn-dark rounded-pill px-4 py-2">
      <i class="bi bi-search me-2"></i> Temukan Sekarang
    </a>
  </div>
</section>

<!-- About Section -->
<div class="container py-5 about-section">
    <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <img class="img-fluid rounded-4 shadow" style="width: 100%; height: auto; border-radius: 36px;" src="<?= base_url('image/beranda.jpg') ?>" alt="Tampilan Kost">
        </div>
        <div class="col-lg-6">
            <!-- Header Section -->
            <div class="header text-left mb-3">
                <h5 class="text-uppercase fw-bold text-primary">TENTANG KAMI</h5>
            </div>
            
            <!-- Main Content Section -->
            <div class="content-section">
                <h2 class="mb-4 fw-bold">Rekomendasi Kost Worth It di Malang dengan Mudah!</h2>
                <div class="about-text">
                    <p>
                        Mencari tempat tinggal yang nyaman dan terjangkau di Malang kini lebih mudah dengan Hero Kost. Kami menyediakan rekomendasi kost terbaik dengan mempertimbangkan berbagai faktor seperti lokasi strategis, lingkungan aman, dan harga terjangkau. Semua rekomendasi kami telah melalui seleksi ketat, sehingga kami dapat menjamin hunian yang nyaman dengan kualitas terbaik.
                    </p>
                    
                    <p>
                        Tak perlu repot survei satu per satu, kami telah menyiapkan berbagai pilihan kost yang telah diverifikasi dengan lokasi strategis. Dengan menggunakan layanan kami, Anda tidak perlu khawatir dengan kualitas dan fasilitas yang ditawarkan. Cepat, mudah, dan terpercaya!
                    </p>
                </div>
                
                <div class="mt-4">
                    <a href="#" class="btn btn-dark rounded-pill px-4 py-2">PELAJARI LEBIH LANJUT</a>
                </div>
            </div>
        </div>
    </div>
</div>
    
<!-- Featured Kost Section -->
<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Temukan Kost Impian Kamu</h2>
    <button class="btn btn-dark rounded-pill">Filter</button>
  </div>

  <div class="row g-4">
    <!-- Card 1 -->
    <div class="col-md-4">
      <div class="card h-100">
        <img src="<?= base_url('image/beranda.jpg') ?>" class="card-img-top" alt="Kost 1">
        <div class="card-body">
          <h5 class="card-title fw-bold">Kost Putra Soekarno Hatta</h5>
          <ul class="list-unstyled small mb-3">
            <li>• Kamar Mandi Dalam</li>
            <li>• Akses 24 Jam</li>
            <li>• Full Fasilitas</li>
            <li>• Parkiran mobil dan motor</li>
          </ul>
          <div class="d-flex justify-content-between align-items-center">
            <span class="fw-bold">Rp. 850.000/bulan</span>
            <a href="#" class="btn btn-detail">Detail Kost</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-md-4">
      <div class="card h-100">
        <img src="<?= base_url('image/beranda.jpg') ?>" class="card-img-top" alt="Kost 2">
        <div class="card-body">
          <h5 class="card-title fw-bold">Kost Putra Soekarno Hatta</h5>
          <ul class="list-unstyled small mb-3">
            <li>• Kamar Mandi Dalam</li>
            <li>• Akses 24 Jam</li>
            <li>• Full Fasilitas</li>
            <li>• Parkiran mobil dan motor</li>
          </ul>
          <div class="d-flex justify-content-between align-items-center">
            <span class="fw-bold">Rp. 850.000/bulan</span>
            <a href="#" class="btn btn-detail">Detail Kost</a>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Card 3 -->
    <div class="col-md-4">
      <div class="card h-100">
        <img src="<?= base_url('image/beranda.jpg') ?>" class="card-img-top" alt="Kost 3">
        <div class="card-body">
          <h5 class="card-title fw-bold">Kost Putra Soekarno Hatta</h5>
          <ul class="list-unstyled small mb-3">
            <li>• Kamar Mandi Dalam</li>
            <li>• Akses 24 Jam</li>
            <li>• Full Fasilitas</li>
            <li>• Parkiran mobil dan motor</li>
          </ul>
          <div class="d-flex justify-content-between align-items-center">
            <span class="fw-bold">Rp. 850.000/bulan</span>
            <a href="#" class="btn btn-detail">Detail Kost</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="text-center mt-4">
    <a href="#" class="btn btn-outline-dark rounded-pill px-4 py-2">Lihat Semua Kost</a>
  </div>
</div>

<!-- Testimonials Section -->
<div class="container py-5">
  <div class="row align-items-center mb-5">
    <div class="col-md-5">
      <h2 class="fw-bold mb-3">Apa Kata Mereka Tentang Hero Kost?</h2>
      <p>Menemukan kost yang nyaman, strategis, dan sesuai budget di Malang bukan lagi hal yang sulit! Banyak pengguna telah merasakan kemudahan mencari hunian melalui Hero Kost. Dengan rekomendasi terpercaya dan ulasan jujur, mereka bisa menemukan tempat tinggal yang benar-benar worth it tanpa ribet. Yuk, simak pengalaman mereka yang sudah menggunakan Hero Kost!</p>
      <div class="d-flex gap-2 mt-4">
        <button class="btn btn-outline-dark rounded-circle" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
          <i class="bi bi-chevron-left"></i>
        </button>
        <button class="btn btn-outline-dark rounded-circle" data-bs-target="#testimonialCarousel" data-bs-slide="next">
          <i class="bi bi-chevron-right"></i>
        </button>
      </div>
    </div>

    <div class="col-md-7">
      <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

          <!-- Slide 1 -->
          <div class="carousel-item active">
            <div class="testimonial-card testimonial-dark">
                <div class="d-flex justify-content-between">
                    <div class="testimonial-quote mb-2">"</div>
                    <div class="testimonial-stars mb-3">
                        ★★★★★
                    </div>
                </div>
              <p>"Cari kost di Malang jadi super gampang berkat Hero Kost! Aku bisa nemuin tempat yang strategis, fasilitasnya lengkap, dan harganya sesuai budget. Gak perlu survei jauh-jauh, semua infonya udah jelas di sini!"</p>
              
              <div class="d-flex align-items-center mt-3">
                <img src="https://via.placeholder.com/50" alt="Bagus Pratama" class="testimonial-img me-3">
                <div>
                  <div class="fw-bold">Bagus Pratama</div>
                  <div class="small">Mahasiswa</div>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item">
            <div class="testimonial-card testimonial-light">
              <div class="d-flex justify-content-between">
                <div class="testimonial-quote mb-2">"</div>
                <div class="testimonial-stars mb-3">
                    ★★★★★
                </div>
              </div>
              <p>"Dulu susah banget cari kost, tapi sejak pakai Hero Kost dapet rekomendasi terbaik. Enak banget! Benar-benar membantu."</p>
              
              <div class="d-flex align-items-center mt-3">
                <img src="https://via.placeholder.com/50" alt="Annisa Fitri" class="testimonial-img me-3">
                <div>
                  <div class="fw-bold">Annisa Fitri</div>
                  <div class="small">Pekerja Kantoran</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

