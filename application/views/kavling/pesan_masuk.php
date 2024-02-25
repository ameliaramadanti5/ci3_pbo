<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-..."></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

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
        <h2 class="text-center">Data Pesan Masuk</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah
</button>


<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pesan Masuk</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('Welcome/addDataPesan'); ?>" method="post">
          <div class="mb-3">
            <label for="kd_pesan" class="form-label"></label>
            <input type="hidden" class="form-control" id="kd_pesan" name="kd_pesan" placeholder="Masukkan Kode Pesan">
          </div>
          <div class="mb-3">
            <label for="nik" class="form-label">Nomor Induk Kependudukan</label>
            <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" required>
          </div>
          <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <!-- <input type="text" class="form-control" id="pesan" name="pesan" placeholder="Masukkan Pesan" required> -->
            <textarea cols="60" id="editor1" name="pesan" rows="6"></textarea> 
            <script data-sample="1">
                CKEDITOR.replace( 'editor1',
                {
                    filebrowserBrowseUrl :'<?php echo base_url(); ?>js/ckeditor_full/filemanager/browser/default/browser.html?Connector=<?php echo base_url(); ?>js/ckeditor_full/filemanager/connectors/php/connector.php',
                    filebrowserImageBrowseUrl : '<?php echo base_url(); ?>js/ckeditor_full/filemanager/browser/default/browser.html?Type=Image&Connector=<?php echo base_url(); ?>js/ckeditor_full/filemanager/connectors/php/connector.php',
                    filebrowserFlashBrowseUrl :'<?php echo base_url(); ?>js/ckeditor_full/filemanager/browser/default/browser.html?Type=Flash&Connector=<?php echo base_url(); ?>js/ckeditor_full/filemanager/connectors/php/connector.php',
                    filebrowserUploadUrl  :'<?php echo base_url(); ?>js/ckeditor_full/filemanager/connectors/php/upload.php?Type=File',
                    filebrowserImageUploadUrl  :'<?php echo base_url(); ?>js/ckeditor_full/filemanager/connectors/php/upload.php?Type=Image',
                    filebrowserFlashUploadUrl  :'<?php echo base_url(); ?>js/ckeditor_full/filemanager/connectors/php/upload.php?Type=Flash'
                });
			</script> 
          </div>
          <div class="mb-3">
            <label for="tgl_pesan" class="form-label">Tanggal Pesan</label>
            <input type="date" class="form-control" id="tgl_pesan" name="tgl_pesan" placeholder="Masukkan Tanggal" required>
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
            <th scope="col">NIK</th>
            <th scope="col">Pesan</th>
            <th scope="col">Tanggal Pesan</th>
            <th scope="col">TOOLS</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($DataPesan)) {
            $no = 1;
            foreach ($DataPesan as $ReadDS) {
                ?>
                <tr>
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?php echo $ReadDS->nik; ?></td>
                    <td><?php echo $ReadDS->pesan; ?></td>
                    <td><?php echo $ReadDS->tgl_pesan; ?></td>
                    <td>
                        <!-- Tombol Edit dengan atribut data-bs-target sesuai dengan ID modal yang unik -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $ReadDS->kd_pesan; ?>">
                            Update
                        </button>
                    |
                    <a href="<?php echo site_url('Welcome/deleteDataPesan/'.$ReadDS->kd_pesan)?>" class="btn btn-danger" onclick="return confirmDelete()">
    Delete
</a>


                        

                        <div class="modal fade" id="exampleModal_<?php echo $ReadDS->kd_pesan; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <!-- Konten modal -->
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pesan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= site_url('Welcome/updateDataPesan/' . $ReadDS->kd_pesan) ?>" method="post">
                                            <div class="mb-3">
                                                <label for="kd_pesan" class="form-label"></label>
                                                <input type="hidden" class="form-control" id="kd_pesan" name="kd_pesan" value="<?= $ReadDS->kd_pesan; ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nik" class="form-label">NIK</label>
                                                <input type="text" class="form-control" id="nik" name="nik" value="<?= $ReadDS->nik; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pesan" class="form-label">Pesan</label>
                                                <!-- <input type="text" class="form-control" id="pesan" name="pesan" value="<?= $ReadDS->pesan; ?>" required> -->
                                                <textarea cols="60" id="editor_<?= $no;?>" name="pesan" rows="10" required> <?= $ReadDS->pesan; ?> </textarea> 
                                                <script data-sample="2">
                                                    CKEDITOR.replace( 'editor_<?= $no; ?>',
                                                    {
                                                        filebrowserBrowseUrl :'<?= base_url(); ?>js/ckeditor_full/filemanager/browser/default/browser.html?Connector=<?= base_url(); ?>js/ckeditor_full/filemanager/connectors/php/connector.php',
                                                        filebrowserImageBrowseUrl : '<?= base_url(); ?>js/ckeditor_full/filemanager/browser/default/browser.html?Type=Image&Connector=<?= base_url(); ?>js/ckeditor_full/filemanager/connectors/php/connector.php',
                                                        filebrowserFlashBrowseUrl :'<?= base_url(); ?>js/ckeditor_full/filemanager/browser/default/browser.html?Type=Flash&Connector=<?= base_url(); ?>js/ckeditor_full/filemanager/connectors/php/connector.php',
                                                        filebrowserUploadUrl  :'<?= base_url(); ?>js/ckeditor_full/filemanager/connectors/php/upload.php?Type=File',
                                                        filebrowserImageUploadUrl  :'<?= base_url(); ?>js/ckeditor_full/filemanager/connectors/php/upload.php?Type=Image',
                                                        filebrowserFlashUploadUrl  :'<?= base_url(); ?>js/ckeditor_full/filemanager/connectors/php/upload.php?Type=Flash'
                                                    });
                                                </script>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tgl_pesan" class="form-label">Tanggal Pesan</label>
                                                <input type="date" class="form-control" id="tgl_pesan" name="tgl_pesan" value="<?= $ReadDS->tgl_pesan; ?>" required>
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
  </body>
</html>