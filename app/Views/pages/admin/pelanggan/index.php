<?= $this->extend('layout/admin-layout'); ?>

<?= $this->section('content'); ?>
<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Poppins', sans-serif;
    }
    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        margin-bottom: 24px;
        transition: transform 0.2s;
    }
    .card-header {
        border-bottom: 1px solid rgba(0,0,0,0.05);
        padding: 15px 20px;
    }
    .table {
        margin-bottom: 0;
    }
    .table th {
        border-top: none;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        color: #6c757d;
    }
    .btn-detail {
        background-color: #6c5ce7;
        color: white;
        border-radius: 6px;
        font-size: 0.85rem;
        padding: 5px 12px;
        border: none;
        transition: all 0.3s;
    }
    .btn-detail:hover {
        background-color: #5649c0;
        transform: translateY(-2px);
    }
    .badge {
        font-weight: 500;
        padding: 6px 12px;
        border-radius: 6px;
    }
    .detail-container {
        padding: 20px;
    }
    .detail-item {
        margin-bottom: 15px;
    }
    .detail-label {
        font-size: 0.85rem;
        color: #6c757d;
        margin-bottom: 4px;
    }
    .detail-value {
        font-weight: 500;
        font-size: 1rem;
    }
    .img-preview {
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .action-buttons {
        margin-top: 20px;
    }
    .action-btn {
        padding: 8px 15px;
        border-radius: 6px;
        font-weight: 500;
        transition: all 0.3s;
    }
    .action-btn:hover {
        transform: translateY(-2px);
    }
    .empty-state {
        padding: 30px;
        text-align: center;
        color: #6c757d;
    }
    .table-wrapper {
        border-radius: 10px;
        overflow: hidden;
    }
</style>

<div class="container-fluid py-4">
    <div class="row">
        <!-- Tabel Data -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Kelola Pembayaran</h5>
                        <span class="badge bg-primary"><?= count($pembayaran) ?> Transaksi</span>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-wrapper">
                        <table class="table table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th class="px-3 py-3">ID</th>
                                    <th class="py-3">Nama Pelanggan</th>
                                    <th class="py-3">Nama Kost</th>
                                    <th class="py-3">Status</th>
                                    <th class="py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pembayaran as $p): ?>
                                    <tr>
                                        <td class="px-3 py-3">#<?= $p['id_user']; ?></td>
                                        <td class="py-3"><?= $p['nama_user']; ?></td>
                                        <td class="py-3"><?= $p['nama_kost']; ?></td>
                                        <td class="py-3">
                                            <?php
                                            $statusClass = '';
                                            $statusText  = '';

                                            switch ($p['status_pembayaran']) {
                                              case 'Pending':
                                                $statusClass = 'warning';
                                                $statusText  = 'Pending';
                                                break;
                                              case 'Sukses':
                                                $statusClass = 'success';
                                                $statusText  = 'Sukses';
                                                break;
                                              case 'Ditolak':
                                                $statusClass = 'danger';
                                                $statusText  = 'Ditolak';
                                                break;
                                            }
                                            ?>
                                            <span class="badge bg-<?= $statusClass ?>"><?= $statusText ?></span>
                                        </td>
                                        <td class="py-3 text-center">
                                            <button class="btn btn-detail" onclick="showDetail(
                                                '<?= $p['id_pembayaran']; ?>',
                                                '<?= $p['id_user']; ?>', 
                                                '<?= $p['nama_user']; ?>',
                                                '<?= $p['nama_kost']; ?>', 
                                                '<?= $p['jumlah_bayar']; ?>', 
                                                '<?= $p['tanggal_bayar']; ?>', 
                                                '<?= $p['status_pembayaran']; ?>', 
                                                '<?= empty($p['bukti_pembayaran']) ? '/api/placeholder/320/240' : base_url('uploads/bukti/' . $p['bukti_pembayaran']); ?>'
                                            )">
                                                <i class="fas fa-eye me-1"></i> Detail
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                
                                <?php if (empty($pembayaran)): ?>
                                    <tr>
                                        <td colspan="5" class="text-center py-4">
                                            <div class="empty-state">
                                                <i class="fas fa-file-invoice fa-3x mb-3 text-muted"></i>
                                                <h6>Tidak ada data pembayaran</h6>
                                                <p class="text-muted small">Data pembayaran akan muncul di sini</p>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detail Pembayaran -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Detail Pembayaran</h5>
                </div>
                <div class="card-body p-0" id="detailContainer">
                    <div class="empty-state">
                        <i class="fas fa-info-circle fa-3x mb-3 text-muted"></i>
                        <h6>Pilih Pembayaran</h6>
                        <p class="text-muted small">Klik tombol <strong>Detail</strong> untuk melihat informasi pembayaran</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  function showDetail(idPembayaran, idPelanggan, namaPelanggan, namaKost, jumlahBayar, tanggalBayar, status, buktiURL) {
    const container = document.getElementById('detailContainer');
    
    // Convert status from database to display format
    let statusDisplay = status;
    let statusClass = '';
    
    switch(status) {
      case 'Pending':
        statusDisplay = 'Pending';
        statusClass = 'warning';
        break;
      case 'Sukses':
        statusDisplay = 'Sukses';
        statusClass = 'success';
        break;
      case 'Ditolak':
        statusDisplay = 'Ditolak';
        statusClass = 'danger';
        break;
    }
    
    // Format date
    const formattedDate = new Date(tanggalBayar).toLocaleDateString('id-ID', {
      day: 'numeric',
      month: 'long',
      year: 'numeric'
    });
    
    // Format currency
    const formattedAmount = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0
    }).format(jumlahBayar);
    
    container.innerHTML = `
      <div class="detail-container">
        <div class="row">
            <div class="col-md-6">
                <div class="detail-item">
                    <div class="detail-label">ID Pelanggan</div>
                    <div class="detail-value">#${idPelanggan}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Nama Pelanggan</div>
                    <div class="detail-value">${namaPelanggan}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Nama Kost</div>
                    <div class="detail-value">${namaKost}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-item">
                    <div class="detail-label">Jumlah Pembayaran</div>
                    <div class="detail-value">${formattedAmount}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Tanggal Pembayaran</div>
                    <div class="detail-value">${formattedDate}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Status Pembayaran</div>
                    <div class="detail-value">
                        <span class="badge bg-${statusClass}">${statusDisplay}</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-4">
            <div class="detail-label">Bukti Pembayaran</div>
            <img src="${buktiURL}" alt="Bukti Pembayaran" class="img-thumbnail img-preview mt-2" style="max-width: 100%; height: auto;">
        </div>
        
        <div class="action-buttons d-flex gap-2">
            <button class="btn btn-success action-btn" onclick="updateStatus('${idPembayaran}', 'Sukses')">
                <i class="fas fa-check-circle me-1"></i> Terima Pembayaran
            </button>
            <button class="btn btn-danger action-btn" onclick="updateStatus('${idPembayaran}', 'Ditolak')">
                <i class="fas fa-times-circle me-1"></i> Tolak Pembayaran
            </button>
        </div>
      </div>
    `;
  }
  
  function updateStatus(idPembayaran, status) {
    // Create FormData object
    const formData = new FormData();
    formData.append('id_pembayaran', idPembayaran);
    formData.append('status_pembayaran', status);
    
    // Send AJAX request
    fetch('<?= base_url('admin/pembayaran/update_status'); ?>', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Show success toast notification
        alert(data.message);
        // Reload the page to refresh the data
        window.location.reload();
      } else {
        // Show error message
        alert(data.message || 'Gagal memperbarui status pembayaran');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Terjadi kesalahan saat memperbarui status pembayaran.');
    });
  }
</script>

<?= $this->endSection(); ?>