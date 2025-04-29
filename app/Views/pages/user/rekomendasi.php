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
      width : 487px;
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
    .swiper {
  width: 100%;
  padding-top: 20px;
  padding-bottom: 40px;
}

.swiper-slide {
  width: 300px; /* Sesuaikan lebar card */
  display: flex;
  justify-content: center;
}
  </style>


<section class="hero-section d-flex align-items-center justify-content-center text-center" style="height: 954px; background-image: url('<?= base_url('image/beranda.jpg') ?>'); background-size: cover; background-position: center;">
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

<div class="container py-5">
 

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
</div>