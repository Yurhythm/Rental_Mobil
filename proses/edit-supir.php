<?php
include ('../koneksi.php');
$id=$_GET['id'];
$f=mysql_query("SELECT * FROM supir where id_supir='$id'");
$d=mysql_fetch_assoc($f);
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Edit</h3>
        </div>
        <div class="modal-body">
        <form  action="proses/proses/edit-supir.php" method="post">
          <input type="hidden" name="id" value="<?php echo $id ; ?>">
          <label class="col-md-4 col-xs-1">Nama Supir</label><input class="form-control" type="text" name="nama" value="<?php echo $d['nama_supir']; ?>"><br>
          <label class="col-md-4 col-xs-1">Alamat Supir</label><input class="form-control" type="text" name="alamat" value="<?php echo $d['alamat_supir']; ?>"><br>
          <label class="col-md-4 col-xs-1">No Telephone</label><input class="form-control" type="text" name="telp" value="<?php echo $d['telp_supir']; ?>"><br>
          <button class="btn btn-primary" type="submit">OK</button>
        </form>
    </div>
</div>
