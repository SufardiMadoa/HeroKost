<?= $this->extend('layout/admin-layout'); ?>

<?= $this->section('content'); ?>
<style>
    body {
        background-color: #f5f5f5;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    /* Card Styling */
    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }
    
    .card-header {
        border-bottom: 1px solid rgba(0,0,0,0.05);
        padding: 1.25rem 1.5rem;
        border-radius: 12px 12px 0 0 !important;
    }
    
    /* Button Styling */
    .btn-primary {
        background: linear-gradient(135deg, #1a3253, #2a4a70);
        border: none;
        border-radius: 6px;
        padding: 8px 16px;
        transition: all 0.3s ease;
        font-weight: 500;
        box-shadow: 0 2px 5px rgba(26, 50, 83, 0.25);
    }
    
    .btn-primary:hover {
        background: linear-gradient(135deg, #15293f, #1a3253);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(26, 50, 83, 0.3);
    }
    
    /* DataTable Styling */
    #example {
        width: 100% !important;
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 8px;
        overflow: hidden;
    }
    
    #example thead th {
        background: linear-gradient(135deg, #1a3253, #2a4a70) !important;
        color: #fff !important;
        font-weight: 600;
        padding: 15px 10px;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        border: none;
        vertical-align: middle;
    }
    
    #example tbody tr {
        transition: all 0.2s ease;
        border-bottom: 1px solid #f0f0f0;
    }
    
    #example tbody tr:hover {
        background-color: #f8f9ff;
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }
    
    #example tbody td {
        padding: 12px 10px;
        vertical-align: middle;
        font-size: 0.9rem;
        color: #444;
        border: none;
        border-bottom: 1px solid #f0f0f0;
    }
    
    /* DataTable Controls */
    .dataTables_wrapper .dataTables_length {
        margin-bottom: 20px;
        color: #495057;
    }
    
    .dataTables_wrapper .dataTables_length select {
        border: 1px solid #ced4da;
        border-radius: 5px;
        padding: 6px 10px;
        background-color: #f8f9fa;
        margin: 0 5px;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    
    .dataTables_filter {
        text-align: right !important;
        margin-bottom: 20px;
    }
    
    .dataTables_filter input {
        border-radius: 6px;
        border: 1px solid #ced4da;
        padding: 8px 12px;
        background-color: #f8f9fa;
        outline: none;
        transition: all 0.3s ease;
        width: 250px !important;
    }
    
    .dataTables_filter input:focus {
        border-color: #1a3253;
        box-shadow: 0 0 0 0.2rem rgba(26, 50, 83, 0.15);
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        border-radius: 5px;
        margin: 0 3px;
        padding: 5px 12px;
        border: 1px solid #dee2e6;
        background-color: #fff;
        color: #495057 !important;
        transition: all 0.2s;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background-color: #e9ecef;
        border-color: #dee2e6;
        color: #495057 !important;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button.current, 
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        background: linear-gradient(135deg, #1a3253, #2a4a70);
        border-color: #1a3253;
        color: white !important;
    }
    
    .dataTables_wrapper .dataTables_info {
        color: #6c757d;
        font-size: 0.875rem;
        padding-top: 0.85em;
    }
    
    /* Badge Styling */
    .badge {
        padding: 6px 10px;
        border-radius: 30px;
        font-weight: 500;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
    }
    
    .bg-success {
        background-color: #28a745 !important;
        color: white;
    }
    
    /* Button Group */
    .btn-group .btn-sm {
        padding: 6px 10px;
        border-radius: 6px;
        margin-right: 5px;
        font-size: 0.75rem;
        transition: all 0.2s ease;
    }
    
    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #212529;
        box-shadow: 0 2px 4px rgba(255, 193, 7, 0.2);
    }
    
    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #d39e00;
        transform: translateY(-1px);
        box-shadow: 0 4px 6px rgba(255, 193, 7, 0.3);
    }
    
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        color: white;
        box-shadow: 0 2px 4px rgba(220, 53, 69, 0.2);
    }
    
    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
        transform: translateY(-1px);
        box-shadow: 0 4px 6px rgba(220, 53, 69, 0.3);
    }
    
    /* Alert Styling */
    .alert {
        border-radius: 8px;
        border: none;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-left: 4px solid #28a745;
    }
    
    /* Modal Styling */
    .modal-content {
        border: none;
        border-radius: 12px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    }
    
    .modal-header {
        border-bottom: 1px solid rgba(0,0,0,0.05);
        padding: 1.25rem 1.5rem;
        background-color: #f8f9fa;
        border-radius: 12px 12px 0 0;
    }
    
    .modal-footer {
        border-top: 1px solid rgba(0,0,0,0.05);
        padding: 1.25rem 1.5rem;
        background-color: #f8f9fa;
        border-radius: 0 0 12px 12px;
    }
    
    .modal-body {
        padding: 1.5rem;
        font-size: 0.95rem;
    }
</style>

<!-- DataTables CSS -->

<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="bi bi-list-ul me-2"></i>Kelola Daftar Kost</h5>
                <div>
                    <a href="<?= base_url('/admin/kost/new'); ?>" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Kost
                    </a>
                </div>
            </div>
            
            <!-- Flash Messages -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show mx-3 mt-3" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i><?= session()->getFlashdata('success'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display compact table table-striped table-hover">
                        <thead>
                            <tr class="bg-dark">
                                <th>No</th>
                                <th>Nama Kost</th>
                                <th>Detail Kost</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Kontak</th>
                                <th>Kontak</th>
                                <th>Kontak</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kosts as $index => $kost): ?>
                                <tr>
                                    <td><?= $index + 1; ?></td>
                                    <td><?= $kost['nama_kost']; ?></td>
                                    <td><?= $kost['deskripsi_kost']; ?></td>
                                    
                                    <td>Rp. <?= number_format($kost['harga_kost'], 0, ',', '.'); ?></td>
                                    <td><?= $kost['jenis']; ?></td>
                                    <td><?= $kost['lokasi']; ?></td>
                                    <td><?= $kost['kontak']; ?></td>
                                    <td>
                                        <span class="badge bg-success">Ready</span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= base_url('admin/kost/edit/' . $kost['id_kost']); ?>" class="btn btn-sm btn-warning me-1">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger btn-hapus" data-id="<?= $kost['id_kost']; ?>">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel"><i class="bi bi-exclamation-triangle me-2 text-danger"></i>Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data kost ini?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" action="" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash me-1"></i>Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
// Tunggu seluruh dokumen termuat
document.addEventListener('DOMContentLoaded', function () {
    // Inisialisasi DataTable
    if ($.fn.DataTable) {
        $('#kostTable').DataTable({
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Indonesian.json'
            }
        });
    }

    // Setup delete confirmation
    const deleteButtons = document.querySelectorAll('.btn-hapus');
    const deleteForm = document.getElementById('deleteForm');
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));

    deleteButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            deleteForm.setAttribute('action', '<?= base_url('admin/kost'); ?>/' + id);
            deleteModal.show();
        });
    });
});

new DataTable('#example', {
    language: {
        search: "<i class='bi bi-search me-1'></i> Cari:",
        lengthMenu: "Tampilkan _MENU_ data per halaman",
        zeroRecords: "Tidak ada data yang ditemukan",
        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        infoEmpty: "Tidak ada data yang tersedia",
        infoFiltered: "(difilter dari _MAX_ total data)",
        paginate: {
            first: "<i class='bi bi-chevron-double-left'></i>",
            last: "<i class='bi bi-chevron-double-right'></i>",
            next: "<i class='bi bi-chevron-right'></i>",
            previous: "<i class='bi bi-chevron-left'></i>"
        }
    },
    responsive: true,
    columnDefs: [
        { className: "align-middle", targets: "_all" }
    ]
});
</script>
<?= $this->endSection(); ?>