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
        border-radius: 15px;
        box-shadow: 0 8px 15px rgba(0,0,0,0.05);
        margin-bottom: 24px;
        transition: all 0.3s ease;
        overflow: hidden;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 20px rgba(0,0,0,0.08);
    }
    .card-header {
        border-bottom: 1px solid rgba(0,0,0,0.05);
        padding: 18px 24px;
        background: linear-gradient(to right, #f8f9fa, #ffffff);
    }
    .card-title {
        font-weight: 600;
        margin-bottom: 0;
        color: #344767;
        letter-spacing: 0.2px;
    }
    .transaction-badge {
        background: #e7f2ff;
        color: #2c7be5;
        font-weight: 600;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 0.8rem;
    }
    .table {
        margin-bottom: 0;
    }
    .table th {
        border-top: none;
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        color: #8392ab;
        letter-spacing: 0.7px;
        padding: 16px 24px;
        background-color: #f9fafc;
    }
    .table td {
        padding: 16px 24px;
        vertical-align: middle;
        font-size: 0.9rem;
        color: #344767;
        border-color: #f1f3f9;
    }
    .table tr:hover {
        background-color: #f9fafc;
    }
    .btn-detail {
        background: linear-gradient(45deg, #6c5ce7, #8075e5);
        color: white;
        border-radius: 8px;
        font-size: 0.8rem;
        padding: 8px 16px;
        border: none;
        transition: all 0.3s;
        box-shadow: 0 4px 10px rgba(108, 92, 231, 0.2);
    }
    .btn-detail:hover {
        background: linear-gradient(45deg, #5649c0, #6c5ce7);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(108, 92, 231, 0.3);
    }
    .badge {
        font-weight: 500;
        padding: 6px 12px;
        border-radius: 6px;
        letter-spacing: 0.3px;
        font-size: 0.75rem;
    }
    .badge-pending {
        background-color: #fff6e0;
        color: #ffc107;
    }
    .badge-success {
        background-color: #e6f8f0;
        color: #10b981;
    }
    .badge-rejected {
        background-color: #fee2e2;
        color: #ef4444;
    }
    .detail-container {
        padding: 24px;
    }
    .detail-item {
        margin-bottom: 18px;
    }
    .detail-label {
        font-size: 0.8rem;
        color: #8392ab;
        margin-bottom: 6px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 500;
    }
    .detail-value {
        font-weight: 500;
        font-size: 1rem;
        color: #344767;
    }
    .img-preview {
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.08);
        width: 100%;
        transition: all 0.3s ease;
    }
    .img-preview:hover {
        transform: scale(1.02);
    }
    .action-buttons {
        margin-top: 24px;
        display: flex;
        gap: 12px;
    }
    .action-btn {
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s;
        letter-spacing: 0.3px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex: 1;
    }
    .btn-accept {
        background: linear-gradient(45deg, #10b981, #059669);
        border: none;
        color: white;
        box-shadow: 0 4px 10px rgba(16, 185, 129, 0.2);
    }
    .btn-accept:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(16, 185, 129, 0.3);
    }
    .btn-reject {
        background: linear-gradient(45deg, #ef4444, #dc2626);
        border: none;
        color: white;
        box-shadow: 0 4px 10px rgba(239, 68, 68, 0.2);
    }
    .btn-reject:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(239, 68, 68, 0.3);
    }
    .empty-state {
        padding: 40px;
        text-align: center;
        color: #8392ab;
    }
    .empty-icon {
        font-size: 3rem;
        margin-bottom: 16px;
        color: #c3cad8;
    }
    .table-wrapper {
        border-radius: 15px;
        overflow: hidden;
    }
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
        padding: 16px 24px;
    }
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate {
        padding: 16px 24px;
    }
    .dataTables_wrapper .dataTables_filter input {
        border-radius: 8px;
        border: 1px solid #e9ecef;
        padding: 8px 12px;
    }
    .dataTables_wrapper .dataTables_length select {
        border-radius: 8px;
        border: 1px solid #e9ecef;
        padding: 6px 12px;
    }
    .detail-section {
        background-color: #f9fafc;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 24px;
    }
    .detail-header {
        display: flex;
        align-items: center;
        margin-bottom: 16px;
    }
    .detail-icon {
        background: linear-gradient(45deg, #6c5ce7, #8075e5);
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        margin-right: 16px;
        color: white;
    }
    .customer-info {
        background: linear-gradient(to right, #f8f9fa, #ffffff);
        border-radius: 10px;
        padding: 16px;
        margin-bottom: 16px;
    }
</style>

<div class="container-fluid py-4">
    <div class="row">
        <!-- Tabel Data -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-wallet me-2 text-primary"></i>
                            Kelola Pembayaran
                        </h5>
                        <span class="transaction-badge">
                            <i class="fas fa-receipt me-1"></i>
                            <?= count($pembayaran) ?> Transaksi
                        </span>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-wrapper">
                    <table id="example" class="display compact table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Pelanggan</th>
                                    <th>Kost</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pembayaran as $p): ?>
                                    <tr>
                                        <td>#<?= $p['id_user']; ?></td>
                                        <td><?= $p['nama_user']; ?></td>
                                        <td><?= $p['nama_kost']; ?></td>
                                        <td>
                                            <?php
                                            $statusClass = '';
                                            $statusText  = '';

                                            switch ($p['status_pembayaran']) {
                                                case 'Pending':
                                                    $statusClass = 'pending';
                                                    $statusText  = 'Pending';
                                                    break;
                                                case 'Sukses':
                                                    $statusClass = 'success';
                                                    $statusText  = 'Sukses';
                                                    break;
                                                case 'Ditolak':
                                                    $statusClass = 'rejected';
                                                    $statusText  = 'Ditolak';
                                                    break;
                                            }
                                            ?>
                                            <span class="badge badge-<?= $statusClass ?>">
                                                <?php if ($statusClass == 'pending'): ?>
                                                    <i class="fas fa-clock me-1"></i>
                                                <?php elseif ($statusClass == 'success'): ?>
                                                    <i class="fas fa-check me-1"></i>
                                                <?php elseif ($statusClass == 'rejected'): ?>
                                                    <i class="fas fa-times me-1"></i>
                                                <?php endif; ?>
                                                <?= $statusText ?>
                                            </span>
                                        </td>
                                        <td class="text-center">
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
                                                <i class="fas fa-file-invoice empty-icon"></i>
                                                <h6 class="mt-3">Tidak ada data pembayaran</h6>
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
                    <h5 class="card-title mb-0">
                        <i class="fas fa-info-circle me-2 text-primary"></i>
                        Detail Pembayaran
                    </h5>
                </div>
                <div class="card-body p-0" id="detailContainer">
                    <div class="empty-state">
                        <i class="fas fa-info-circle empty-icon"></i>
                        <h6 class="mt-3">Pilih Pembayaran</h6>
                        <p class="text-muted small">Klik tombol <span class="badge bg-primary"><i class="fas fa-eye me-1"></i> Detail</span> untuk melihat informasi pembayaran</p>
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
    let statusIcon = '';
    
    switch(status) {
      case 'Pending':
        statusDisplay = 'Pending';
        statusClass = 'pending';
        statusIcon = 'clock';
        break;
      case 'Sukses':
        statusDisplay = 'Sukses';
        statusClass = 'success';
        statusIcon = 'check';
        break;
      case 'Ditolak':
        statusDisplay = 'Ditolak';
        statusClass = 'rejected';
        statusIcon = 'times';
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
        <div class="detail-section">
          <div class="detail-header">
            <div class="detail-icon">
              <i class="fas fa-user"></i>
            </div>
            <div>
              <h6 class="mb-0">Informasi Pelanggan</h6>
              <p class="text-muted mb-0 small">Detail informasi pelanggan</p>
            </div>
          </div>
          
          <div class="row g-3">
            <div class="col-md-6">
              <div class="detail-item">
                <div class="detail-label">ID Pelanggan</div>
                <div class="detail-value">#${idPelanggan}</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="detail-item">
                <div class="detail-label">Nama Pelanggan</div>
                <div class="detail-value">${namaPelanggan}</div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="detail-section">
          <div class="detail-header">
            <div class="detail-icon">
              <i class="fas fa-home"></i>
            </div>
            <div>
              <h6 class="mb-0">Informasi Pembayaran</h6>
              <p class="text-muted mb-0 small">Detail transaksi pembayaran</p>
            </div>
          </div>
          
          <div class="row g-3">
            <div class="col-md-6">
              <div class="detail-item">
                <div class="detail-label">Nama Kost</div>
                <div class="detail-value">${namaKost}</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="detail-item">
                <div class="detail-label">Jumlah Pembayaran</div>
                <div class="detail-value fw-bold">${formattedAmount}</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="detail-item">
                <div class="detail-label">Tanggal Pembayaran</div>
                <div class="detail-value">
                  <i class="far fa-calendar-alt me-1 text-primary"></i>
                  ${formattedDate}
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="detail-item">
                <div class="detail-label">Status Pembayaran</div>
                <div class="detail-value">
                  <span class="badge badge-${statusClass}">
                    <i class="fas fa-${statusIcon} me-1"></i>
                    ${statusDisplay}
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="detail-section">
          <div class="detail-header">
            <div class="detail-icon">
              <i class="fas fa-receipt"></i>
            </div>
            <div>
              <h6 class="mb-0">Bukti Pembayaran</h6>
              <p class="text-muted mb-0 small">Dokumen bukti pembayaran</p>
            </div>
          </div>
          
          <div class="text-center">
            <img src="${buktiURL}" alt="Bukti Pembayaran" class="img-preview mt-2" style="max-width: 100%; height: auto;">
          </div>
        </div>
        
        <div class="action-buttons">
          <button class="btn btn-accept action-btn" onclick="updateStatus('${idPembayaran}', 'Sukses')">
            <i class="fas fa-check-circle me-2"></i> Terima Pembayaran
          </button>
          <button class="btn btn-reject action-btn" onclick="updateStatus('${idPembayaran}', 'Ditolak')">
            <i class="fas fa-times-circle me-2"></i> Tolak Pembayaran
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
    
    // Show confirmation using SweetAlert2
    Swal.fire({
      title: status === 'Sukses' ? 'Terima Pembayaran?' : 'Tolak Pembayaran?',
      text: status === 'Sukses' ? 'Pembayaran akan diterima dan dikonfirmasi ke pelanggan' : 'Pembayaran akan ditolak dan pelanggan akan diberitahu',
      icon: status === 'Sukses' ? 'question' : 'warning',
      showCancelButton: true,
      confirmButtonText: status === 'Sukses' ? 'Ya, Terima' : 'Ya, Tolak',
      cancelButtonText: 'Batal',
      confirmButtonColor: status === 'Sukses' ? '#10b981' : '#ef4444',
      cancelButtonColor: '#6c757d',
    }).then((result) => {
      if (result.isConfirmed) {
        // Send AJAX request
        fetch('<?= base_url('admin/pembayaran/update_status'); ?>', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            // Show success notification
            Swal.fire({
              title: 'Berhasil!',
              text: data.message,
              icon: 'success',
              timer: 2000,
              timerProgressBar: true,
              showConfirmButton: false
            }).then(() => {
              // Reload the page to refresh the data
              window.location.reload();
            });
          } else {
            // Show error message
            Swal.fire({
              title: 'Gagal!',
              text: data.message || 'Gagal memperbarui status pembayaran',
              icon: 'error'
            });
          }
        })
        .catch(error => {
          console.error('Error:', error);
          Swal.fire({
            title: 'Error!',
            text: 'Terjadi kesalahan saat memperbarui status pembayaran.',
            icon: 'error'
          });
        });
      }
    });
  }

  // Initialize DataTable with custom options
  new DataTable('#example', {
    language: {
      search: "<i class='fas fa-search'></i>",
      searchPlaceholder: "Cari pembayaran...",
      lengthMenu: "Tampilkan _MENU_ data",
      info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
      infoEmpty: "Menampilkan 0 data",
      infoFiltered: "(difilter dari _MAX_ total data)",
      zeroRecords: "Tidak ada data yang ditemukan",
      paginate: {
        first: "<i class='fas fa-angle-double-left'></i>",
        last: "<i class='fas fa-angle-double-right'></i>",
        next: "<i class='fas fa-angle-right'></i>",
        previous: "<i class='fas fa-angle-left'></i>"
      }
    },
    responsive: true
  });
</script>

<?= $this->endSection(); ?>