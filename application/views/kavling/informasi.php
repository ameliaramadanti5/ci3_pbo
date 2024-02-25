<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
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
        <h2 class="text-center">Data Informasi</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah
</button>


<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Informasi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('Welcome/addDataInformasi'); ?>" method="post">
          <div class="mb-3">
            <label for="kd_info" class="form-label"></label>
            <input type="hidden" class="form-control" id="kd_info" name="kd_info" placeholder="Masukkan Kode Informasi" required>
          </div>
          <div class="mb-3">
            <label for="judul_info" class="form-label">Judul Informasi</label>
            <input type="text" class="form-control" id="judul_info" name="judul_info" placeholder="Masukkan Judul Informasi" required>
          </div>
          <div class="mb-3">
            <label for="informasi" class="form-label">Informasi</label>
            <!-- <input type="text" class="form-control" id="informasi" name="informasi" placeholder="Masukkan Informasi"> -->
            <textarea cols="60" id="editor1" name="informasi" rows="6"></textarea>
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
            <label for="tgl_info" class="form-label">Tanggal Informasi</label>
            <input type="date" class="form-control" id="tgl_info" name="tgl_info" placeholder="Masukkan Tanggal">
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
            <!-- <th scope="col">Kode Info</th> -->
            <th scope="col">Judul Info</th>
            <th scope="col">Informasi</th>
            <th scope="col">Tanggal Informasi</th>
            <th scope="col">TOOLS</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($DataInformasi)) {
            $no = 1;
            foreach ($DataInformasi as $ReadDS) {
                ?>
                <tr>
                    <th scope="row"><?php echo $no; ?></th>
                    <!-- <td><?php echo $ReadDS->kd_info; ?></td> -->
                    <td><?php echo $ReadDS->judul_info; ?></td>
                    <td><?php echo $ReadDS->informasi; ?></td>
                    <td><?php echo $ReadDS->tgl_info; ?></td>
                    <td>
                        <!-- Tombol Edit dengan atribut data-bs-target sesuai dengan ID modal yang unik -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $ReadDS->kd_info; ?>">
                            Update
                        </button>
                    |
                    <a href="<?php echo site_url('Welcome/deleteDataInformasi/'.$ReadDS->kd_info)?>" class="btn btn-danger" onclick="return confirmDelete()">
    Delete
</a>


                        

                        <div class="modal fade" id="exampleModal_<?php echo $ReadDS->kd_info; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <!-- Konten modal -->
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Informasi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= site_url('Welcome/updateDataInformasi/' . $ReadDS->kd_info) ?>" method="post">
                                            <div class="mb-3">
                                                <label for="kd_info" class="form-label"></label>
                                                <input type="hidden" class="form-control" id="kd_info" name="kd_info" value="<?= $ReadDS->kd_info; ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="judul_info" class="form-label">Judul Informasi</label>
                                                <input type="text" class="form-control" id="judul_info" name="judul_info" value="<?= $ReadDS->judul_info; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="informasi" class="form-label">Informasi</label>
                                                <!-- <input type="text" class="form-control" id="informasi" name="informasi" value="<?= $ReadDS->informasi; ?>" required> -->
                                                <textarea cols="60" id="editor_<?= $no;?>" name="informasi" rows="10" required> <?= $ReadDS->informasi; ?> </textarea>
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
                                                <label for="tgl_info" class="form-label">Tanggal Informasi</label>
                                                <input type="date" class="form-control" id="tgl_info" name="tgl_info" value="<?= $ReadDS->tgl_info; ?>" required>
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





