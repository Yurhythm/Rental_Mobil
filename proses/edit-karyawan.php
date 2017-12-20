<?php
include ('../koneksi.php');
session_start();
$level=$_SESSION['level'];
$id=$_GET['id'];
$f=mysql_query("SELECT * FROM karyawan where id_karyawan='$id'");
$d=mysql_fetch_assoc($f);
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Edit</h3>
        </div>
        <div class="modal-body">
        <form  action="proses/proses/edit-karyawan.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $id ; ?>">
          <label class="col-md-4 col-xs-1">Gambar</label><input class="form-control" type="file" name="image"><br>
          <label class="col-md-4 col-xs-1">Nama Karyawan</label><input required class="form-control" type="text" name="nama" value="<?php echo $d['nama_karyawan']; ?>"><br>
          <label class="col-md-4 col-xs-1">Alamat Karyawan</label><input required class="form-control" type="text" name="alamat" value="<?php echo $d['alamat']; ?>"><br>
          <label class="col-md-4 col-xs-1">No Telephone</label><input required class="form-control" type="number" name="telp" value="<?php echo $d['no_telp']; ?>"><br>

  <?php
  if ($level=='superadmin') {
  ?>
    <label class="col-md-4 col-xs-1">Level</label>
        <select class="form-control" name="level">
        <?php
        $level=$d['level'];
        if ($level=='0') {
        ?>
        <option selected value="0">Super Admin</option>
        <option value="1">Admin</option>
        <option value="2">Karyawan</option>
        <?php
        }elseif ($level=='1') {
        ?>
        <option value="0">Super Admin</option>
        <option selected value="1">Admin</option>
        <option value="2">Karyawan</option>
        <?php
        }elseif ($level=='2') {
        ?>
        <option value="0">Super Admin</option>
        <option value="1">Admin</option>
        <option selected value="2">Karyawan</option>
        <?php
        }
        ?>

        </select>
        <br>
  <?php
  }
  ?>
          <button class="btn btn-primary" type="submit">OK</button>
        </form>
    </div>
</div>
