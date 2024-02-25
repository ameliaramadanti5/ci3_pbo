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
        <h2 class="text-center">Data Blok Kavling</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah
</button>


<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Blok Kavling</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('Welcome/addDataBlok'); ?>" method="post">
          <div class="mb-3">
            <label for="kd_blok" class="form-label"></label>
            <input type="hidden" class="form-control" id="kd_blok" name="kd_blok" placeholder="Masukkan Kode Blok">
          </div>
          <div class="mb-3">
            <label for="nama_blok" class="form-label">Nama Blok</label>
            <input type="text" class="form-control" id="nama_blok" name="nama_blok" placeholder="Masukkan Nama Blok" required>
          </div>
          <div class="mb-3">
            <label for="no_blok" class="form-label">No Blok</label>
            <input type="text" class="form-control" id="no_blok" name="no_blok" placeholder="Masukkan Nomor Blok" required>
          </div>
          
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        <div id="pesan" class="alert" style="display: none;"></div>
      </div>
    </div>
  </div>
</div>


    <!-- tabel -->
    <div class="table-responsive">
  <table class="table">
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th scope="col">No</th>
            <!-- <th scope="col">Kode Blok</th> -->
            <th scope="col">Nama Blok</th>
            <th scope="col">Nomor Blok</th>
            <th scope="col">TOOLS</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($DataBlokKavling)) {
            $no = 1;
            foreach ($DataBlokKavling as $ReadDS) {
                ?>
                <tr>
                    <th scope="row"><?php echo $no; ?></th>
                    <!-- <td><?php echo $ReadDS->kd_blok; ?></td> -->
                    <td><?php echo $ReadDS->nama_blok; ?></td>
                    <td><?php echo $ReadDS->no_blok; ?></td>
                    <td>
                        <!-- Tombol Edit dengan atribut data-bs-target sesuai dengan ID modal yang unik -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $ReadDS->kd_blok; ?>">
                            Update
                        </button>
                    |
                    <a href="<?php echo site_url('Welcome/deleteDataBlok/'.$ReadDS->kd_blok)?>" class="btn btn-danger" onclick="return confirmDelete()">
    Delete
</a>


                        

                        <div class="modal fade" id="exampleModal_<?php echo $ReadDS->kd_blok; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <!-- Konten modal -->
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Blok Kavling</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= site_url('Welcome/updateDataBlok/' . $ReadDS->kd_blok) ?>" method="post">
                                            <div class="mb-3">
                                                <label for="kd_blok" class="form-label"></label>
                                                <input type="hidden" class="form-control" id="kd_blok" name="kd_blok" value="<?= $ReadDS->kd_blok; ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama_blok" class="form-label">Nama blok</label>
                                                <input type="text" class="form-control" id="nama_blok" name="nama_blok" value="<?= $ReadDS->nama_blok; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="no_blok" class="form-label">Nomor Blok</label>
                                                <input type="text" class="form-control" id="no_blok" name="no_blok" value="<?= $ReadDS->no_blok; ?>" required>
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
</table>
</div>



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





