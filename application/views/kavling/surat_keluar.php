<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-...">
</script>

<link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>">


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <!-- judul (card) -->
    <div class="container mt-4">
        <h2 class="text-center">Data Penduduk</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah
</button>


<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Penduduk</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('Welcome/addDataSuratKeluar'); ?>" method="post">
          <div class="mb-3">
            <label for="kd_surat_keluar" class="form-label">Kode Surat Keluar</label>
            <input type="text" class="form-control" id="kd_surat_keluar" name="kd_surat_keluar">
          </div>
          <div class="mb-3">
			<label for="nik" class="form_select">NIK</label>
			<input type="text" class="form-control" id="nik" name="nik">
		  </div>
          <div class="mb-3">
            <label for="nomor_surat" class="form-label">Nomor Surat</label>
            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat">
          </div>
          <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
			<textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="10"></textarea>
          </div>
          <div class="mb-3">
            <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
            <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat">
          </div>
          
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        <div id="pesan" class="alert" style="display: none;"></div>
      </div>
    </div>
  </div>
</div>


    <!-- tabel -->
<table class="table table-bordered mt-3">
    <thead>
        <tr>
			<th scope="col">No</th>
			<th scope="col">Kode Surat Keluar</th>
			<th scope="col">NIK</th>
			<th scope="col">Nomor Surat</th>
			<th scope="col">Keterangan</th>
			<th scope="col">Tanggal Surat</th>
            <th scope="col">TOOLS</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($DataSuratKeluar)) {
            $no = 1;
            foreach ($DataSuratKeluar as $ReadDS) {
                ?>
                <tr>
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?php echo $ReadDS->kd_surat_keluar; ?></td>
					<td><?php echo $ReadDS->nik; ?></td>
					<td><?php echo $ReadDS->nomor_surat; ?></td>
					<td><?php echo $ReadDS->keterangan; ?></td>
					<td><?php echo $ReadDS->tanggal_surat; ?></td>
                    <td>
                        <!-- Tombol Edit dengan atribut data-bs-target sesuai dengan ID modal yang unik -->
                        <button type="button" class="btn btn-success" 
						data-bs-toggle="modal" 
						data-bs-target="#exampleModal_<?php echo $ReadDS->kd_surat_keluar; ?>"
						>
                            Update
                        </button>
                    |
                    <a href="<?php echo site_url('Welcome/deleteDataSuratKeluar/'.$ReadDS->kd_surat_keluar)?>" class="btn btn-danger" onclick="return confirmDelete()">Delete</a>


                        

                        <div class="modal fade" id="exampleModal_<?php echo $ReadDS->kd_surat_keluar; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <!-- Konten modal -->
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Penduduk</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
									<form action="<?= site_url('Welcome/updateDataSuratKeluar/' . $ReadDS->kd_surat_keluar) ?>" method="post">
                                            <div class="mb-3">
                                                <label for="kd_surat_keluar" class="form-label">Kode Surat Keluar</label>
                                                <input type="text" class="form-control" id="kd_surat_keluar" name="kd_surat_keluar" value="<?= $ReadDS->kd_surat_keluar; ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nik" class="form-label">NIK</label>
                                                <input type="text" class="form-control" id="nik" name="nik" value="<?= $ReadDS->nik; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nomor_surat" class="form-label">Nomor Surat</label>
                                                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="<?= $ReadDS->nomor_surat; ?>">
                                            </div>
											<div class="mb-3">
												<label for="keterangan" class="form-label">Keterangan</label>
												<textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="10"><?php echo $ReadDS->keterangan; ?></textarea>
											</div>
											<div class="mb-3">
												<label for="tanggal_surat" class="form-label">Tanggal Surat</label>
												<input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" value="<?= $ReadDS->tanggal_surat; ?>">
											</div>
                            
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                        <!-- Akhir formulir -->
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir konten modal -->
                           
                        </div>
                        <!-- Akhir Modal Edit -->
                    </td>
                </tr>
                <?php
                $no++;
            }
        }
        ?>
    </tbody>
</table>



    </div>

   
    <script>
    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus data ini?');
    }
</script>

<!-- Bootstrap core JavaScript-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

  </body>
</html>





