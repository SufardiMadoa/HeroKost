<!-- CSSnya -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<style>
body {
  font-family: 'Poppins', sans-serif;
  color: #333;
  overflow-x: hidden;
}

/* Improved Search */
.search {
  position: absolute;
  top: 170%;
  left: 50%;
  -webkit-transform: translateX(-50%) translateY(-50%);
          transform: translateX(-50%) translateY(-50%);
  z-index: 10;
}
.search * {
  outline: none;
  box-sizing: border-box;
}
.search__wrapper {
  position: relative;
  filter: drop-shadow(0px 8px 20px rgba(0,0,0,0.15));
}
.search__field {
  width: 200px;
  height: 60px;
  color: transparent;
  font-family: 'Poppins', sans-serif;
  font-size: 1.35em;
  padding: 0.35em 60px 0.35em 1.5em;
  border: 1px solid transparent;
  border-radius: 50px;
  background-color: rgba(255,255,255,0.95);
  backdrop-filter: blur(5px);
  cursor: pointer;
  transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}
.search__field:focus {
  border-color: rgba(0,0,0,0.08);
  width: 55vw;
  color: #2b2b2b;
  cursor: text;
  box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}
.search__field:focus ~ .search__icon {
  background-color: #FF5722;
  cursor: pointer;
  pointer-events: auto;
  transform: scale(1.1);
}
.search__icon {
  position: absolute;
  top: 5px;
  right: 5px;
  background-color: #FF5722;
  width: 50px;
  height: 50px;
  font-size: 1.35em;
  color: white;
  line-height: 50px;
  text-align: center;
  border: none;
  border-radius: 50%;
  pointer-events: auto;
  display: inline-block;
  transition: all 0.3s ease;
  z-index: 10;
}
.search__icon:hover {
  transform: scale(1.1);
  background-color: #ff3c00;
}

/* Improved error animation */
.search__field.error {
  animation: shake 0.5s;
  border: 1px solid #dc3545 !important;
  box-shadow: 0 0 10px rgba(220, 53, 69, 0.3);
}

@keyframes shake {
  0%, 100% { transform: translateX(0); }
  10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
  20%, 40%, 60%, 80% { transform: translateX(5px); }
}

/* Hero Section Improvements */
.hero-section {
  position: relative;
  overflow: hidden;
}

.hero-section::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.7));
  z-index: 1;
}

.hero-section .container {
  position: relative;
  z-index: 2;
}

.hero-section h1 {
  font-weight: 700;
  text-shadow: 0 2px 10px rgba(0,0,0,0.3);
  letter-spacing: -0.5px;
  animation: fadeInDown 1s both;
}

.hero-section p {
  font-weight: 400;
  text-shadow: 0 2px 5px rgba(0,0,0,0.2);
  animation: fadeInUp 1s both 0.5s;
}

/* Card Improvements */
.card {
  border: none;
  border-radius: 16px;
  overflow: hidden;
  transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
  box-shadow: 0 15px 30px rgba(0,0,0,0.08);
  height: 100%;
  opacity: 0;
  transform: translateY(30px);
  animation: fadeInUp 0.8s forwards;
  animation-delay: calc(var(--card-index, 0) * 0.1s);
}

.card:hover {
  transform: translateY(-15px);
  box-shadow: 0 20px 40px rgba(0,0,0,0.12);
}

.card-img-top {
  height: 220px;
  object-fit: cover;
  transition: all 0.8s ease;
}

.card:hover .card-img-top {
  transform: scale(1.08);
}

.card-body {
  padding: 1.8rem;
}

.card-title {
  color: #222;
  font-size: 1.4rem;
  font-weight: 600;
  margin-bottom: 1rem;
  position: relative;
}

.card-title::after {
  content: '';
  position: absolute;
  bottom: -8px;
  left: 0;
  width: 40px;
  height: 3px;
  background-color: #FF5722;
  border-radius: 5px;
}

.card ul {
  list-style: none;
  padding-left: 0;
  margin-bottom: 1.5rem;
}

.card ul li {
  position: relative;
  padding-left: 30px;
  margin-bottom: 10px;
  color: #666;
  font-size: 0.95rem;
  display: flex;
  align-items: center;
}

.card ul li:before {
  content: "✓";
  position: absolute;
  left: 0;
  color: #4CAF50;
  font-weight: bold;
  background: rgba(76, 175, 80, 0.1);
  width: 22px;
  height: 22px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  font-size: 0.8rem;
}

.btn-detail {
  background: linear-gradient(135deg, #222 0%, #424242 100%);
  color: white;
  border-radius: 50px;
  padding: 10px 20px;
  font-weight: 500;
  transition: all 0.3s ease;
  border: none;
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.btn-detail:hover {
  background: linear-gradient(135deg, #333 0%, #555 100%);
  color: white;
  transform: translateY(-3px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

/* About Section */
#tentang {
  padding: 5rem 0;
}

#tentang img {
  box-shadow: 0 20px 40px rgba(0,0,0,0.12);
  transition: all 0.5s ease;
}

#tentang img:hover {
  transform: translateY(-10px);
  box-shadow: 0 30px 50px rgba(0,0,0,0.18);
}

#tentang h5 {
  color: #FF5722;
  font-weight: 600;
  letter-spacing: 1px;
}

#tentang h2 {
  font-size: 2.5rem;
  line-height: 1.3;
  position: relative;
}

#tentang h2::after {
  content: '';
  position: absolute;
  bottom: -15px;
  left: 0;
  width: 80px;
  height: 4px;
  background: #FF5722;
  border-radius: 5px;
}

#tentang p {
  margin-top: 2rem;
  line-height: 1.8;
}

.btn-dark {
  background: linear-gradient(135deg, #222 0%, #424242 100%);
  border: none;
  padding: 12px 30px;
  font-weight: 500;
  letter-spacing: 0.5px;
  transition: all 0.3s ease;
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.btn-dark:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

/* Testimonial Improvements */
.testimonial-card {
  border-radius: 20px;
  padding: 2.5rem;
  height: 100%;
  width: 100%;
  box-shadow: 0 20px 40px rgba(0,0,0,0.08);
  transition: all 0.5s ease;
  opacity: 0;
  transform: translateY(30px);
  animation: fadeInUp 0.8s forwards;
}

.testimonial-dark {
  background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
  color: white;
}

.testimonial-light {
  background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
  color: #333;
  border: none;
}

.testimonial-quote {
  font-size: 3.5rem;
  color: #FF5722;
  opacity: 0.8;
  font-weight: 700;
}

.testimonial-stars {
  color: #FFD700;
  letter-spacing: 3px;
  font-size: 1.2rem;
}

.testimonial-card p {
  font-size: 1.1rem;
  line-height: 1.8;
  font-weight: 300;
}

.testimonial-img {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  object-fit: cover;
  border: 3px solid #FF5722;
}

.btn-outline-dark {
  border: 2px solid #333;
  width: 45px;
  height: 45px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
}

.btn-outline-dark:hover {
  background-color: #333;
  color: white;
  transform: scale(1.1);
}

/* Animation Keyframes */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeInDown {
  from {
    opacity: 0;
    transform: translateY(-30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Pricing Section */
.pricing-section {
  background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
  padding: 5rem 0;
  position: relative;
}

.pricing-section h2 {
  position: relative;
  display: inline-block;
}

.pricing-section h2::after {
  content: '';
  position: absolute;
  bottom: -15px;
  left: 50%;
  transform: translateX(-50%);
  width: 80px;
  height: 4px;
  background: #FF5722;
  border-radius: 5px;
}

.text-primary {
  color: #FF5722 !important;
}

/* Additional animations */
.fade-in {
  animation: fadeIn 1s ease forwards;
}

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

/* Responsive Adjustments */
@media (max-width: 768px) {
  .search__field:focus {
    width: 90vw;
  }
  
  #tentang {
    flex-direction: column;
  }
  
  #tentang img {
    width: 100% !important;
    height: auto !important;
    margin-bottom: 2rem;
  }
  
  .testimonial-card {
    width: 100%;
  }
}
</style>

<section class="hero-section d-flex align-items-center justify-content-center text-center" style="height: 100vh; background-image: url('<?= base_url('image/beranda.jpg') ?>'); background-size: cover; background-position: center;">
  <div class="container text-white">
    <h1 class="display-8 fw-bold mb-4">
      Temukan kost rekomendasi terbaik dari<br>kami cepat, mudah, dan terpercaya!
    </h1>
    

    <div class="d-flex mt-12">
      <form class="search" action="<?= base_url('kost/search') ?>" method="get">
        <div class="search__wrapper">
          <input type="text" name="keyword" placeholder="Cari Kost Impianmu..." class="search__field">
          <button type="submit" class="fa fa-search search__icon"></button>
        </div>
      </form>
    </div>
  </div>
</section>

<div class="container py-5 d-flex gap-5" id="tentang">
  <div>
    <img style="width: 629px; height:464px; border-radius:36px;" src="<?= base_url('image/beranda.jpg') ?>" alt="Hero Kost" srcset="">
  </div>
  <div>
    <!-- Header Section -->
    <div class="header text-left mb-4">
      <h5 class="display- fw-bold">TENTANG KAMI</h5>
    </div>
    
    <!-- Main Content Section -->
    <div class="content-section">
      <h2 class="mb-5 fw-bold">Rekomendasi Kost Worth It di Malang dengan Mudah!</h2>
      <span style="color:#404040;">
        <p>
          Mencari tempat tinggal yang nyaman dan sesuai budget di Malang kini lebih mudah dengan Hero Kost. Kami menyediakan rekomendasi kost terbaik dengan harga terjangkau, fasilitas lengkap, dan lokasi strategis. Setiap kost yang kami rekomendasikan telah melalui seleksi ketat, sehingga kamu bisa mendapatkan hunian yang nyaman tanpa harus khawatir soal kualitas.
        </p>
        
        <p>
          Tak perlu repot survei satu per satu, cukup jelajahi daftar kost yang telah dikurasi dengan ulasan terpercaya. Dengan Hero Kost, kamu bisa menemukan tempat tinggal ideal dengan cepat dan tanpa ribet. Cari, booking, dan pindah dengan tenang!
        </p>
      </span>
      
      <div class="divider"></div>
      
      <div class="footer mt-4">
        <a href="#" class="btn btn-dark rounded-pill px-4 py-2">Mulai Cari Kost Sekarang</a>
      </div>
    </div>
  </div>
</div>
    
<div class="pricing-section py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold mb-4">Rekomendasi Kost Terbaik</h2>
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
        <?php foreach ($kosts as $index => $kost): ?>
          <div class="col-md-4 mb-4">
            <div class="card h-100" style="--card-index: <?= $index ?>">
              <?php if (!empty($kost['gambar_utama'])): ?>
                <img src="<?= base_url($kost['gambar_utama']['path_gambar']); ?>" class="card-img-top" alt="<?= $kost['nama_kost']; ?>">
              <?php else: ?>
                <div class="bg-light text-center py-5">
                  <i class="fas fa-home fa-3x text-muted"></i>
                  <p class="text-muted">Tidak ada gambar</p>
                </div>
              <?php endif; ?>
              <div class="card-body">
                <h5 class="card-title"><?= $kost['nama_kost']; ?></h5>
                
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
</div>

<!-- Testimonials section with improved design -->
<div class="container py-5" id="testimoni">
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
                <div class="testimonial-quote">"</div>
                <div class="testimonial-stars mb-3">
                  ★★★★★
                </div>
              </span>
              <p class="mb-4">"Cari kost di Malang jadi super gampang berkat Hero Kost! Aku bisa nemuin tempat yang strategis, fasilitasnya lengkap, dan harganya sesuai budget. Gak perlu survei jauh-jauh, semua infonya udah jelas di sini!"</p>
              
              <div class="d-flex align-items-center mt-4">
                <img src="<?= base_url('image/cowok.jpeg') ?>" alt="Bagus Pratama" class="testimonial-img me-3">
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
                <div class="testimonial-quote">"</div>
                <div class="testimonial-stars mb-3">
                  ★★★★★
                </div>
              </span>
              <p class="mb-4">"Dulu susah banget cari kost, tapi sejak pakai Hero Kost dapet rekomendasi terbaik. Enak banget! Benar-benar membantu."</p>
              
              <div class="d-flex align-items-center mt-4">
                <img src="<?= base_url('image/cewek.jpeg') ?>" alt="Annisa Fitri" class="testimonial-img me-3">
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
    
    // Add card index for staggered animations
    document.querySelectorAll('.card').forEach((card, index) => {
      card.style.setProperty('--card-index', index);
    });
  });
</script>