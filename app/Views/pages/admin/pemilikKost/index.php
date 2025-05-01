<?= $this->extend('layout/admin-layout'); ?>

<?= $this->section('content'); ?>
<style>
     body {
            background-color: #f5f5f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .table th {
            background-color: #1a3253;
            color: white;
        }
</style>
<!-- <div class="row"> -->
  <!-- Tabel Data -->
  <div class="col-md-12">
    <div class="card">
      <div class="card-header bg-white">
        <h5 class="mb-0">Kelola Pelanggan</h5>
      </div>
      <div class="card-body table-responsive">
      <table id="example"  class="display compact table table-striped table-hove">
          <thead>
            <tr>
              <th>Id_Pemilik_kost</th>
              <th>Id_Kost</th>
              <th>Username</th>
              <th>Email</th>
              <th>Nama Kost</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>p02</td>
              <td>p01</td>
              <td>Username</td>
              <td>Email</td>
              <td>nama Kost</td>
              <td>
              <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
  <i class="fas fa-trash-alt me-1"></i> Hapus
</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  <!-- </div> -->
  <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-white" style="background-color: #1c1c1c;">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="confirmDeleteLabel">Konfirmasi Penghapusan</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <form action="" method="POST">
          <?= csrf_field(); ?>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
      </div>
    </div>
  </div>
  </div>
  <!-- Detail Pembayaran -->

  <script>
  function confirmHapus() {
    return confirm("Apakah Anda yakin ingin menghapus data ini?");
  }

  new DataTable('#example');
</script>
  

<?= $this->endSection(); ?>

