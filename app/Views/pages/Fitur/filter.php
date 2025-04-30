<!-- Modal Filter Kost -->
<div class="modal fade" id="filterKostModal" tabindex="-1" aria-labelledby="filterKostModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header border-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h2 class="text-center fw-bold mb-2">Pilih kebutuhan kost impian kamu!</h2>
        <p class="text-center mb-4">Temukan kost impian kamu bersama hero kost.</p>
        
        <form id="filterKostForm" action="<?= base_url('kost/filter') ?>" method="GET">
          <!-- Lokasi -->
          <div class="mb-4">
            <h5 class="mb-3">Lokasi</h5>
            <div class="d-flex flex-wrap gap-2">
              <?php
              $locations = [
                'SIGURA-GURA', 'SOEKARNO HATTA', 'MERJOSARI', 
                'LANDUNGSARI', 'SUDIMIORO', 'SUMBERSARI',
                'DIENG', 'TIDAR', 'CANDI', 'TIRTO', 'SAXOPHONE'
              ];
              
              $selected_lokasi = isset($_GET['lokasi']) ? $_GET['lokasi'] : '';
              
              foreach ($locations as $location) {
                $locationId = preg_replace('/[^a-zA-Z0-9]/', '-', strtolower($location));
                echo '<div class="form-check">';
                echo '<input class="btn-check" type="radio" name="lokasi" id="lokasi-'.$locationId.'" value="'.$location.'"';
                if ($selected_lokasi == $location) echo ' checked';
                echo '>';
                echo '<label class="btn btn-outline-dark rounded-pill px-3 py-2" for="lokasi-'.$locationId.'">'.$location.'</label>';
                echo '</div>';
              }
              ?>
            </div>
          </div>
          
          <!-- Jenis Kost -->
          <div class="mb-4">
            <h5 class="mb-3">Jenis Kost</h5>
            <div class="d-flex gap-2">
              <?php
              $kostTypes = ['PUTRA', 'PUTRI'];
              
              $selected_jenis = isset($_GET['jenis_kost']) ? $_GET['jenis_kost'] : '';
              
              foreach ($kostTypes as $type) {
                $typeId = strtolower($type);
                echo '<div class="form-check">';
                echo '<input class="btn-check" type="radio" name="jenis_kost" id="jenis-'.$typeId.'" value="'.$type.'"';
                if ($selected_jenis == $type) echo ' checked';
                echo '>';
                echo '<label class="btn btn-outline-dark rounded-pill px-3 py-2" for="jenis-'.$typeId.'">'.$type.'</label>';
                echo '</div>';
              }
              ?>
            </div>
          </div>
          
          <!-- Harga -->
          <div class="mb-4">
            <h5 class="mb-3">Harga</h5>
            <div class="d-flex flex-wrap gap-2">
              <?php
              $prices = [
                '<Rp. 500.000,-', '<Rp. 750.000,-', 
                '<Rp. 1.000.000,-', '<Rp. 1.250.000,-'
              ];
              
              $selected_harga = isset($_GET['harga']) ? $_GET['harga'] : '';
              
              foreach ($prices as $price) {
                // Gunakan preg_replace untuk memastikan pembuatan ID yang aman
                $priceId = preg_replace('/[^a-zA-Z0-9]/', '', strtolower(str_replace(['<', 'rp', '.', ' ', ',-'], '', $price)));
                
                echo '<div class="form-check">';
                echo '<input class="btn-check" type="radio" name="harga" id="harga-'.$priceId.'" value="'.$price.'"';
                if ($selected_harga == $price) echo ' checked';
                echo '>';
                echo '<label class="btn btn-outline-dark rounded-pill px-3 py-2" for="harga-'.$priceId.'">'.$price.'</label>';
                echo '</div>';
                
                // Debug
                // echo "<!-- Debug: price=$price, priceId=$priceId -->";
              }
              ?>
            </div>
          </div>
          
          <!-- Fasilitas -->
          <div class="mb-4">
            <h5 class="mb-3">Fasilitas</h5>
            <div class="d-flex flex-wrap gap-2">
              <?php
              $facilities = [
                'KM Dalam', 'KM Luar', 'Parkiran', 'Dapur', 'Kulkas',
                'Jemuran', 'Mesin Cuci', 'AC', '24 jam', 'Water Heater', 'Ruang Tamu'
              ];
              
              $selected_fasilitas = isset($_GET['fasilitas']) ? $_GET['fasilitas'] : [];
              
              foreach ($facilities as $facility) {
                $facilityId = preg_replace('/[^a-zA-Z0-9]/', '', strtolower($facility));
                $checked = is_array($selected_fasilitas) && in_array($facility, $selected_fasilitas) ? ' checked' : '';
                
                echo '<div class="form-check">';
                echo '<input class="btn-check" type="checkbox" name="fasilitas[]" id="fasilitas-'.$facilityId.'" value="'.$facility.'"'.$checked.'>';
                echo '<label class="btn btn-outline-dark rounded-pill px-3 py-2" for="fasilitas-'.$facilityId.'">'.$facility.'</label>';
                echo '</div>';
              }
              ?>
            </div>
          </div>
          
          <!-- Sembunyikan parameter filter lama jika ada -->
          <?php if (isset($_GET['min_price'])): ?>
          <input type="hidden" name="min_price" value="<?= $_GET['min_price'] ?>">
          <?php endif; ?>
          
          <?php if (isset($_GET['max_price'])): ?>
          <input type="hidden" name="max_price" value="<?= $_GET['max_price'] ?>">
          <?php endif; ?>
          
          <div class="modal-footer border-0 justify-content-center">
            <button type="submit" class="btn btn-dark rounded-pill w-100 py-2">
              Terapkan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>