<?php
include ('../koneksi.php');
$id=$_GET['id'];
$f=mysql_query("SELECT * FROM karyawan where id_karyawan='$id'");
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

          <label class="col-md-4 col-xs-1">Username</label><div><?php echo $d['username']; ?></div><br>
          <label class="col-md-4 col-xs-1">Nama Karyawan</label><div><?php echo $d['nama_karyawan']; ?></div><br>
          <label class="col-md-4 col-xs-1">Alamat</label><div><?php echo $d['alamat']; ?></div><br>
          <label class="col-md-4 col-xs-1">Nomer Telephone</label><div><?php echo $d['no_telp']; ?></div><br>
          <?php
          $level=$d['level'];
          if ($level=="1") {
            echo "<label class='col-md-4 col-xs-1'>Level</label><div style='color:green;'>Administrator</div><br>";
          }elseif ($level=="2") {
            echo "<label class='col-md-4 col-xs-1'>Level</label><div style='color:blue;'>Karyawan Biasa</div><br>";
          }elseif ($level=="0") {
            echo "<label class='col-md-4 col-xs-1'>Level</label><div style='color:red;'>Super Administrator</div><br>";
          }
          ?>
        </div>
    </div>
</div>
