
<!-- CSSnya -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">

<style>
.search {
  position: absolute;
  top: 80%;
  left: 50%;
  -webkit-transform: translateX(-50%) translateY(-50%);
          transform: translateX(-50%) translateY(-50%);
}
.search * {
  outline: none;
  box-sizing: border-box;
}
.search__wrapper {
  position: relative;
}
.search__field {
  width: 200px;
  height: 50px;
  color: transparent;
  font-family: Lato, sans-serif;
  font-size: 1.35em;
  padding: 0.35em 50px 0.35em 1em;
  border: 1px solid transparent;
  border-radius: 10px;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
}
.search__field:focus {
  border-bottom-color: #ccc;
  width: 50vw;
  color: #2b2b2b;
  cursor: default;
}
.search__field:focus ~ .search__icon {
  background-color: transparent;
  cursor: pointer;
  pointer-events: auto;
}
.search__icon {
  position: absolute;
  top: 0;
  right: 0;
  background-color: #e9f1f4;
  width: 50px;
  height: 50px;
  font-size: 1.35em;
  text-align: center;
  border-color: transparent;
  border-radius: 50%;
  pointer-events: auto; /* Diubah dari none menjadi auto */
  display: inline-block;
  transition: background-color 0.2s ease-in-out;
  z-index: 10;
}

/* Tambahkan style untuk tombol error */
.search__field.error {
  animation: shake 0.5s;
  border: 1px solid #dc3545 !important;
}

@keyframes shake {
  0%, 100% { transform: translateX(0); }
  10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
  20%, 40%, 60%, 80% { transform: translateX(5px); }
}



    .card-img-top {
      height: 200px;
      object-fit: cover;
      border-radius: 1rem 1rem 0 0;
    }
    .card {
      border-radius: 1rem;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .card {
    border: none;
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 10px 20px rgba(0,0,0,0.05);
    height: 100%;
  }
  
  .card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
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
  }
  
  .card-title {
    color: #333;
    font-size: 1.25rem;
    margin-bottom: 1rem;
  }
  
  .card ul {
    list-style: none;
    padding-left: 0;
    margin-bottom: 1.5rem;
  }
  
  .card ul li {
    position: relative;
    padding-left: 25px;
    margin-bottom: 8px;
    color: #666;
  }
  
  .card ul li:before {
    content: "✓";
    position: absolute;
    left: 0;
    color: #4CAF50;
    font-weight: bold;
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

<div class="d-flex mt-12">

<form class="search" action="<?= base_url('kost/search') ?>" method="get">
  <div class="search__wrapper">
    <input type="text" name="keyword" placeholder="Search for..." class="search__field">
    <button type="submit" class="fa fa-search search__icon"></button>
  </div>
</form>
</div>

</label>
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
    
    <div class="container py-5" style="background-color: #f9f9f9;">
  <div class="text-center mb-5">
    <h2 class="fw-bold">Rekomendasi Kost Terbaik</h2>
    <p class="text-muted">Temukan hunian nyaman yang sesuai dengan kebutuhanmu</p>
  </div>
  
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
          <div class="card h-100">
            <?php if (!empty($kost['gambar_utama'])): ?>
              <img src="<?= base_url($kost['gambar_utama']['path_gambar']); ?>" class="card-img-top" alt="<?= $kost['nama_kost']; ?>">
            <?php else: ?>
              <div class="bg-light text-center py-5">
                <i class="fas fa-home fa-3x text-muted"></i>
                <p class="text-muted">Tidak ada gambar</p>
              </div>
            <?php endif; ?>
            <div class="card-body">
              <h5 class="card-title fw-bold"><?= $kost['nama_kost']; ?></h5>
              
              <!-- Daftar fasilitas dengan icon -->
              <ul>
                <?php foreach ($kost['fasilitas'] as $fasilitas): ?>
                  <li><?= esc($fasilitas['nama_fasilitas']) ?></li>
                <?php endforeach; ?>
              </ul>

              <div class="d-flex justify-content-between align-items-center mt-auto">
                <span class="fw-bold text-primary">Rp <?= number_format($kost['harga_kost'], 0, ',', '.'); ?> / bulan</span>
                <a href="/kost/detail/<?= $kost['id_kost']; ?>" class="btn btn-detail">
                  <i class="fas fa-arrow-right mr-1"></i> Detail
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>

<!-- Testimonials section with improved design -->
<div class="container py-5">
  <div class="row align-items-center mb-5">
    <div class="col-md-5">
      <h5 class="fw-bold mb-2" style="color: #FF5722;">TESTIMONI</h5>
      <h2 class="fw-bold mb-4">Apa Kata Mereka Tentang Hero Kost?</h2>
      <p class="text-muted">Menemukan kost yang nyaman, strategis, dan sesuai budget di Malang bukan lagi hal yang sulit! Banyak pengguna telah merasakan kemudahan mencari hunian melalui Hero Kost. Dengan rekomendasi terpercaya dan ulasan jujur, mereka bisa menemukan tempat tinggal yang benar-benar worth it tanpa ribet.</p>
      <div class="d-flex gap-2 mt-4">
        <button class="btn btn-outline-dark rounded-circle" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
          <i class="fas fa-chevron-left"></i>
        </button>
        <button class="btn btn-outline-dark rounded-circle" data-bs-target="#testimonialCarousel" data-bs-slide="next">
          <i class="fas fa-chevron-right"></i>
        </button>
      </div>
    </div>

    <div class="col-md-7">
      <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <!-- Slide 1 -->
          <div class="carousel-item active">
            <div class="testimonial-card testimonial-dark">
              <span class="d-flex justify-content-between">
                <div class="testimonial-quote mb-2">"</div>
                <div class="testimonial-stars mb-3">
                  ★★★★★
                </div>
              </span>
              <p class="mb-4">"Cari kost di Malang jadi super gampang berkat Hero Kost! Aku bisa nemuin tempat yang strategis, fasilitasnya lengkap, dan harganya sesuai budget. Gak perlu survei jauh-jauh, semua infonya udah jelas di sini!"</p>
              
              <div class="d-flex align-items-center mt-4">
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
                <div class="testimonial-quote mb-2">"</div>
                <div class="testimonial-stars mb-3">
                  ★★★★★
                </div>
              </span>
              <p class="mb-4">"Dulu susah banget cari kost, tapi sejak pakai Hero Kost dapet rekomendasi terbaik. Enak banget! Benar-benar membantu."</p>
              
              <div class="d-flex align-items-center mt-4">
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


<script>
  document.querySelector('.stick').addEventListener('click',()=>{
  document.querySelector('.four').value = '';
});

document.addEventListener('DOMContentLoaded', function() {
    // Handle search form
    const searchForm = document.querySelector('.search');
    const searchField = document.querySelector('.search__field');
    const searchIcon = document.querySelector('.search__icon');

    if (searchForm) {
      // Prevent form from returning input field to small size when clicking search button
      searchIcon.addEventListener('click', function(e) {
        e.preventDefault(); // Prevent default submit
        
        const keyword = searchField.value.trim();
        
        if (keyword !== '') {
          // Manually submit form
          searchForm.submit();
        } else {
          // If keyword is empty, add error class for animation
          searchField.classList.add('error');
          setTimeout(function() {
            searchField.classList.remove('error');
          }, 500);
        }
      });

      // Handle form submit with enter
      searchForm.addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent default form submit
        
        const keyword = searchField.value.trim();
        
        if (keyword !== '') {
          // Redirect to search page with keyword
          window.location.href = '<?= base_url('kost/search') ?>?keyword=' + encodeURIComponent(keyword);
        } else {
          // If keyword is empty, add error class for animation
          searchField.classList.add('error');
          setTimeout(function() {
            searchField.classList.remove('error');
          }, 500);
        }
      });
    }
    
    // Add animation classes on scroll
    const animateOnScroll = function() {
      const elements = document.querySelectorAll('.card, .testimonial-card');
      
      elements.forEach(element => {
        const elementPosition = element.getBoundingClientRect().top;
        const screenPosition = window.innerHeight / 1.2;
        
        if(elementPosition < screenPosition) {
          element.classList.add('fade-in');
        }
      });
    };
    
    window.addEventListener('scroll', animateOnScroll);
    animateOnScroll(); // Run once on load
  });
</script>
    <!-- Bootstrap 5 JS Bundle with Popper -->
    