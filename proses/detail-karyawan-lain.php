<?php
include ('../koneksi.php');
$id=$_GET['id'];
$f=mysql_query("SELECT * FROM karyawan_lain where id_karyawan_lain='$id'");
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
          if ($d['gambar']=="") {
          ?>
          <center><img width="300px" src="proses/img/noImage.gif" /></center><br><br>
          <?php
          }else {
          ?>
          <center><img width="300px" src="proses/img/<?php echo $d['gambar'];?>" /></center><br><br>
          <?php
          }
          ?>

          <label class="col-md-4 col-xs-1">Nama Karyawan</label><div><?php echo $d['nama_karyawan_lain']; ?></div><br>
          <label class="col-md-4 col-xs-1">Alamat</label><div><?php echo $d['alamat_karyawan_lain']; ?></div><br>
          <label class="col-md-4 col-xs-1">Nomer Telephone</label><div><?php echo $d['no_telp']; ?></div><br>
          <label class="col-md-4 col-xs-1">Nomer Telephone</label><div><?php echo $d['staff_bagian']; ?></div><br>

        </div>
    </div>
</div>
