<?= $this->extend('layout/admin-layout'); ?>

<?= $this->section('content'); ?>
<style>
     body {
            background-color: #f5f5f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    
</style>
<div class="row">
  <!-- Tabel Data -->
  <div class="col-md-6">
    <div class="card">
      <div class="card-header bg-white">
        <h5 class="mb-0">Kelola Pelanggan</h5>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>Id_Pelanggan</th>
              <th>Id_Kost</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>p02</td>
              <td>p01</td>
              <td>
                <button class="btn btn-detail" onclick="showDetail('p02', 'p01', '1200000', '2023-05-01', 'Pending', '/api/placeholder/320/240')">
                  <i class="fas fa-eye me-1"></i> Detail
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Detail Pembayaran -->
  <div class="col-md-6">
    <div class="card">
      <div class="card-header bg-white">
        <h5 class="mb-0">Preview Pemesanan Rekomendasi Kost</h5>
      </div>
      <div class="card-body" id="detailContainer">
        <p class="text-muted">Klik tombol <strong>Detail</strong> untuk melihat informasi.</p>
      </div>
    </div>
  </div>
</div>
<script>
  function showDetail(idPelanggan, idKost, jumlahBayar, tanggalBayar, status, buktiURL) {
    const container = document.getElementById('detailContainer');
    container.innerHTML = `
      <div>
        <p><strong>ID Pelanggan:</strong> ${idPelanggan}</p>
        <p><strong>ID Kost:</strong> ${idKost}</p>
        <p><strong>Jumlah Bayar:</strong> Rp ${Number(jumlahBayar).toLocaleString()}</p>
        <p><strong>Tanggal Bayar:</strong> ${tanggalBayar}</p>
        <p><strong>Status Pembayaran:</strong> 
          <span class="badge bg-${status === 'Pending' ? 'warning' : (status === 'Diterima' ? 'success' : 'danger')}">${status}</span>
        </p>
        <p><strong>Bukti Pembayaran:</strong></p>
        <img src="${buktiURL}" alt="Bukti Pembayaran" class="img-thumbnail" style="max-width: 200px;">
        <div class="mt-3 d-flex gap-2">
          <button class="btn btn-success"><i class="fas fa-check me-1"></i> Terima</button>
          <button class="btn btn-danger"><i class="fas fa-times me-1"></i> Tolak</button>
        </div>
      </div>
    `;
  }
</script>

  

<?= $this->endSection(); ?>

