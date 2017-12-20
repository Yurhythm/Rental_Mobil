<?php
include ('../koneksi.php');
$id=$_GET['id'];
$f=mysql_query("SELECT * FROM pelanggan where id_pelanggan='$id'");
$d=mysql_fetch_assoc($f);
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Detail Pelanggan</h3>
        </div>
        <div class="modal-body">
          <label class="col-md-4 col-xs-1">Nama Pelanggan</label><div><?php echo $d['nama_pelanggan']; ?></div><br>
          <label class="col-md-4 col-xs-1">Jenis Kelamin</label><div><?php echo $d['jenis_kelamin']; ?></div><br>
          <label class="col-md-4 col-xs-1">Alamat</label><div><?php echo $d['alamat_pelanggan']; ?></div><br>
          <label class="col-md-4 col-xs-1">Nomer Telephone</label><div><?php echo $d['no_telephone']; ?></div><br>
        </div>
    </div>
</div>
