<?php
include ('../koneksi.php');
$id=$_GET['id'];
$f=mysql_query("SELECT * FROM supir WHERE id_supir='$id'");
$d=mysql_fetch_assoc($f);
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Detail</h3>
        </div>
        <div class="modal-body">
          <label class="col-md-3 col-xs-1">Nama Supir</label><div><?php echo $d['nama_supir']; ?></div><br>
          <label class="col-md-3 col-xs-1">Alamat Supir</label><div><?php echo $d['alamat_supir']; ?></div><br>
          <label class="col-md-3 col-xs-1">Telp Supir</label><div><?php echo $d['telp_supir']; ?></div><br>
          <label class="col-md-3 col-xs-1">Status</label><div><?php echo $d['status']; ?></div><br>
        </div>
    </div>
</div>
