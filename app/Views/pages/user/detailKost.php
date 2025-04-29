
<!-- CSSnya -->
    <!-- Font Awesome -->
<style>
   .info-card {
    background-color: #ffffff; /* Warna background card */
    border-radius: 1rem; /* Membuat sudut card lebih tumpul */
    /* overflow: hidden; Memastikan konten tidak keluar dari border radius */
/* Optional: border tipis */
}


.custom-carousel-controls {
    /* Tidak perlu styling khusus di container ini jika hanya pakai flex */
}

.control-btn {
    background-color: #212529; /* Warna hitam seperti di gambar */
    color: white;
    border: none;
    border-radius: 50%; /* Membuat tombol bulat */
    width: 30px; /* Ukuran tombol */
    height: 30px; /* Ukuran tombol */
    display: flex;  
    align-items: center;
    justify-content: center;
    font-size: 0.8rem; /* Ukuran ikon */
    transition: background-color 0.2s ease;
}

.control-btn:hover {
    background-color: #495057; /* Warna hover */
}

/* Styling untuk indikator kustom */
.custom-indicators button {
    background-color: #cccccc; /* Warna indikator non-aktif */
    border: none;
    border-radius: 50%;
    width: 8px; /* Ukuran indikator */
    height: 8px;
    margin: 0 4px; /* Jarak antar indikator */
    padding: 0;
    transition: background-color 0.2s ease;
}

.custom-indicators button.active {
    background-color: #212529; /* Warna indikator aktif (hitam) */
    width: 10px; /* Sedikit lebih besar saat aktif */
    height: 10px;
}

/* Mengatur jarak antar list item */
.list-unstyled li {
    margin-bottom: 0.2rem; /* Sedikit jarak antar item fasilitas/kampus */
    line-height: 1.4;
}

/* Styling opsional untuk font */
body {
    font-family: sans-serif; /* Ganti dengan font yang lebih mirip jika perlu */
}

h6 {
    font-weight: bold;
    margin-bottom: 0.5rem;
}
.carousel-item img{
    width:1048px;
    height:508px;
}

/* Menjaga layout di layar kecil */
@media (max-width: 991.98px) {
    .info-card .row > div {
        /* Reset flex properties if needed or adjust alignment */
    }
     .mt-auto.text-end {
        text-align: start !important; /* Tombol kontak rata kiri di mobile */
        margin-top: 1rem !important; /* Beri jarak atas */
    }
}
  </style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
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
<div class="containe my-4">
        <div class="info-card p-3">
            <div class="row g-4"> <div class="col-lg-7">
                    <div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner rounded">
                            <div class="carousel-item active">
                                <img src="<?= base_url('image/beranda.jpg') ?>" class="d-block img-fluid" alt="Gambar Kamar 1">
                            </div>
                            <div class="carousel-item">
                                <img src="<?= base_url('image/beranda.jpg') ?>" class="d-block img-fluid" alt="Gambar Kamar 2">
                            </div>
                            <div class="carousel-item">
                                <img src="<?= base_url('image/beranda.jpg') ?>" class="d-block img-fluid" alt="Gambar Kamar 3">
                            </div>
                        </div>
                   
                    </div>
                    <div class="">

                        <div class="custom-carousel-controls mt-3 d-flex align-items-center justify-content-between">
                            
                        <div class="d-flex align-items-center">
                            <button class="control-btn prev-btn" type="button" data-bs-target="#imageSlider" data-bs-slide="prev">
                                <i class="fas fa-arrow-left"></i>
                            </button>
                            <div class="custom-indicators mx-2 d-flex align-items-center">
                                <button type="button" data-bs-target="#imageSlider" data-bs-slide-to="0" class="active" aria-current="true"></button>
                                <button type="button" data-bs-target="#imageSlider" data-bs-slide-to="1"></button>
                                <button type="button" data-bs-target="#imageSlider" data-bs-slide-to="2"></button>
                            </div>
                            <button class="control-btn next-btn" type="button" data-bs-target="#imageSlider" data-bs-slide="next">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                                <button class="btn btn-dark btn-sm rounded-pill px-3">Kontak</button>                        
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 d-flex flex-column">
                    <div>
                        <h6>Fasilitas:</h6>
                        <ul class="list-unstyled small mb-3">
                            <li>* Kasur + Bantal</li>
                            <li>* Meja Belajar</li>
                            <li>* Almari</li>
                            <li>* Kamar Mandi Dalam</li>
                            <li>* Free Listrik</li>
                            <li>* Jemuran</li>
                            <li>* Mesin Cuci</li>
                            <li>* Televisi</li>
                            <li>* Ruang Makan</li>
                            <li>* Parkiran Luas</li>
                            <li>* Akses 24jam</li>
                            <li>* Rak sepatu</li>
                            <li>* 1 Menit Tempat Makan</li>
                            <li>* 1 Menit Laundry</li>
                        </ul>

                        <h6>Kampus Terdekat:</h6>
                        <ul class="list-unstyled small mb-3">
                            <li>5 Menit dari UNISMA</li>
                            <li>6 Menit dari UIN Malang</li>
                            <li>4 Menit dari UB</li>
                            <li>2 Menit dari Polinema</li>
                            <li>5 Menit dari UM</li>
                        </ul>

                        <h6>Riview Penjaga Kost</h6>
                        <ul class="list-unstyled small mb-4">
                             <li>* Penjaga kost: Mahasiswa</li>
                             <li>* Humble, asik, baik</li>
                        </ul>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    const imageSliderElement = document.getElementById('imageSlider');
    const customIndicatorsContainer = document.querySelector('.custom-indicators');

    if (imageSliderElement && customIndicatorsContainer) {
        const customIndicators = customIndicatorsContainer.querySelectorAll('button');

        // Fungsi untuk update indikator aktif
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

        // Event listener saat slide berubah
        imageSliderElement.addEventListener('slid.bs.carousel', function (event) {
            // event.to adalah index dari slide yang aktif (setelah transisi selesai)
            updateCustomIndicators(event.to);
        });

        // Inisialisasi indikator saat halaman dimuat
        const carouselInstance = bootstrap.Carousel.getInstance(imageSliderElement);
        if (carouselInstance) {
           // Cari index item yg aktif saat ini
           const activeItem = imageSliderElement.querySelector('.carousel-item.active');
           const items = Array.from(imageSliderElement.querySelectorAll('.carousel-item'));
           const initialActiveIndex = items.indexOf(activeItem);
           if(initialActiveIndex !== -1) {
               updateCustomIndicators(initialActiveIndex);
           } else {
               updateCustomIndicators(0); // Default ke index 0 jika tidak ketemu
           }
        } else {
             updateCustomIndicators(0); // Default ke index 0 jika instance belum siap
        }
    }
});
    </script>