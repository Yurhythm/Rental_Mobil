<?php
include ('../koneksi.php');
$nopol=$_GET['nopol'];
$f=mysql_query("SELECT * FROM mobil INNER JOIN karyawan on karyawan.id_karyawan=mobil.id_karyawan where nopol='$nopol'");
$d=mysql_fetch_assoc($f);
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Edit</h3>
        </div>
        <div class="modal-body">
          <form action="proses/proses/edit-mobil.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $nopol ; ?>">
          <label class="col-md-3 col-xs-1">Gambar</label><input class="form-control" type="file" name="image"><br>
          <label class="col-md-3 col-xs-1">Nopol</label><input class="form-control" type="text" name="nopol" value="<?php echo $d['nopol']; ?>"><br>
          <label class="col-md-3 col-xs-1">Noka</label><input class="form-control" type="text" name="noka" value="<?php echo $d['noka']; ?>"><br>
          <label class="col-md-3 col-xs-1">Nosin</label><input class="form-control" type="text" name="nosin" value="<?php echo $d['nosin']; ?>"><br>
          <label class="col-md-3 col-xs-1">Jenis</label><input class="form-control" type="text" name="jenis" value="<?php echo $d['jenis']; ?>"><br>
          <label class="col-md-3 col-xs-1">Merk</label><input class="form-control" type="text" name="merk" value="<?php echo $d['merk']; ?>"><br>
          <label class="col-md-3 col-xs-1">Warna</label><input class="form-control" type="text" name="warna" value="<?php echo $d['warna']; ?>"><br>
          <label class="col-md-3 col-xs-1">spesifikasi</label><textarea name="spesifikasi" style="resize:none;" rows="10" cols="50" class="form-control"><?php echo $d['spesifikasi']; ?></textarea><br>
          <label class="col-md-3 col-xs-1">Harga</label><input class="form-control" type="text" name="harga" value="<?php echo $d['harga']; ?>"><br>
          <button class="btn btn-primary" type="submit">OK</button>
          </form>
    </div>
</div>
