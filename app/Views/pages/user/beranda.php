
<!-- CSSnya -->

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
<div class="container py-4 d-flex gap-5" id="tentang">
    <div>
        <img style="width: 629px; height:464px; border-radius:36px;" src="<?= base_url('image/beranda.jpg') ?>" alt="" srcset="">
    </div>
    <div>

        <!-- Header Section -->
        <div class="header text-left mb-4">
            <h5 class="display- fw-bold">TENTANG KAMI</h5>
        </div>
        
        <!-- Main Content Section -->
        <div class="content-section">
            <h2 class="mb-4 fw-bold">Rekomendasi Kost Worth It di Malang dengan Mudah!</h2>
            <span style="color:#08080866;">
                
                <p >
                    Murdah tāngaht tīngai yang nyanha dan adalah babijut et Malang bin kush matah dengan Hino Kost. Lami mengkadaan rekomendasi kost tehsak dengan hino veheganga, trafika linguba, dan lama rytanga. Selma yok yang dari rekomendataan kain melalui sebagai kuru, sehingga kaimi kisa mengapatani hushai yang nyanha tānga kushat shuwant' salah kualtas.
                </p>
                
                <p>
                    Tak perlu kepot tarveli satu per satu, dalam kebital affar kerit yang telah dikazari dengan salah tempengat. Dengan tānga bu kanu kira mengana terenpat, tīngai tidak dengan egalet din tānga muk. Ceti, booling, dan phatah dengan tanang.
                </p>
            </span>
            
            <div class="divider"></div>
            
            <div class="footer">
                <p class="btn btn-dark rounded-pill px-4 py-2">KAMI CHUAN BAKING</p>
            </div>
        </div>
        </div>
    </div>
    
    <div class="container py-5">
  <?php if (empty($kosts)): ?>
            <div class="col-md-12">
                <div class="alert alert-info">
                    Belum ada data kost tersedia.
                </div>
            </div>
  <?php else: ?>
    <div class="row g-4">

    <?php foreach ($kosts as $kost): ?>
      
      <div class="col-md-4 mb-4">
        <div class="card ">
            <?php if (!empty($kost['gambar_utama'])): ?>
                <img src="<?= base_url($kost['gambar_utama']['path_gambar']); ?>" class="card-img-top" alt="<?= $kost['nama_kost']; ?>" style="height: 200px; object-fit: cover;">
            <?php else: ?>
                <div class="bg-light text-center py-5">
                    <i class="fa fa-home fa-3x text-muted"></i>
                    <p class="text-muted">Tidak ada gambar</p>
                </div>
            <?php endif; ?>
            <div class="card-body">
                <h5 class="card-title fw-bold"><?= $kost['nama_kost']; ?></h5>
                
                <!-- Daftar fasilitas (gunakan deskripsi atau array jika ada) -->
                <ul>
                  <?php foreach ($kost['fasilitas'] as $fasilitas): ?>
                    <li><?= esc($fasilitas['nama_fasilitas']) ?></li>
                  <?php endforeach; ?>
                </ul>

                <div class="d-flex justify-content-between align-items-center">
                    <span class="fw-bold text-primary">Rp <?= number_format($kost['harga_kost'], 0, ',', '.'); ?> / bulan</span>
                    <a href="/kost/detail/<?= $kost['id_kost']; ?>" class="btn btn-detail">Detail Kost</a>
                </div>
            </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>

        <?php endif; ?>

  
</div>

<div class="container py-5">
  <div class="row align-items-center mb-5">
    <div class="col-md-5">
      <h2 class="fw-bold mb-3">Apa Kata Mereka Tentang Hero Kost?</h2>
      <p>Menemukan kost yang nyaman, strategis, dan sesuai budget di Malang bukan lagi hal yang sulit! Banyak pengguna telah merasakan kemudahan mencari hunian melalui Hero Kost. Dengan rekomendasi terpercaya dan ulasan jujur, mereka bisa menemukan tempat tinggal yang benar-benar worth it tanpa ribet. Yuk, simak pengalaman mereka yang sudah menggunakan Hero Kost!</p>
      <div class="d-flex gap-2 mt-4">
        <button class="btn btn-outline-dark rounded-circle" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="btn btn-outline-dark rounded-circle" data-bs-target="#testimonialCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>

    <div class="col-md-7">
      <div id="testimonialCarousel" class="carousel slide " data-bs-ride="carousel">
        <div class="carousel-inner">

          <!-- Slide 1 -->
          <div class="carousel-item active">
            <div class="testimonial-card testimonial-dark">
                <span class="d-flex justify-content-between">

                    <div class="testimonial-quote mb-2">“</div>
                    <div class="testimonial-stars mb-3">
                        ★★★★★
                    </div>
                </span>
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
            <span class="d-flex justify-content-between">

<div class="testimonial-quote mb-2">“</div>
<div class="testimonial-stars mb-3">
    ★★★★★
</div>
</span>
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

          <!-- Tambah Slide Lagi di Sini kalau Mau -->

        </div>
      </div>
    </div>
  </div>
</div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    