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
            <h3>Detail</h3>
        </div>
        <div class="modal-body">
          <?php
          if ($d['gmbrmobil']=="") {
          ?>
          <center><img width="300px" src="proses/img/noImage.gif" /></center><br><br>
          <?php
          }else {
          ?>
          <center><img width="300px" src="proses/img/<?php echo $d['gmbrmobil'];?>" /></center><br><br>
          <?php
          }
          ?>

          <label class="col-md-3 col-xs-1">Nopol</label><div><?php echo $d['nopol']; ?></div><br>
          <label class="col-md-3 col-xs-1">Noka</label><div><?php echo $d['noka']; ?></div><br>
          <label class="col-md-3 col-xs-1">Nosin</label><div><?php echo $d['nosin']; ?></div><br>
          <label class="col-md-3 col-xs-1">Jenis</label><div><?php echo $d['jenis']; ?></div><br>
          <label class="col-md-3 col-xs-1">Merk</label><div><?php echo $d['merk']; ?></div><br>
          <label class="col-md-3 col-xs-1">Warna</label><div><?php echo $d['warna']; ?></div><br>
          <label class="col-md-3 col-xs-1">spesifikasi</label><textarea disabled style="resize:none;" rows="10" cols="50" class="form-control"><?php echo $d['spesifikasi']; ?></textarea><br>
          <label class="col-md-3 col-xs-1">Harga</label><div style="color:#467;">Rp.<?php echo $d['harga']; ?></div><br>
          <label class="col-md-3 col-xs-1">Status</label><div><?php echo $d['status']; ?></div><br>
          <label class="col-md-3 col-xs-1">Penginput</label><div><?php echo $d['nama_karyawan']; ?></div><br>
        </div>
    </div>
</div>
