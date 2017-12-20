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
            <h3>Edit</h3>
        </div>
        <div class="modal-body">
        <form  action="proses/proses/edit-karyawan-lain.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $id ; ?>">
          <label class="col-md-4 col-xs-1">Gambar</label><input class="form-control" type="file" name="image"><br>
          <label class="col-md-4 col-xs-1">Nama Karyawan</label><input required class="form-control" type="text" name="nama" value="<?php echo $d['nama_karyawan_lain']; ?>"><br>
          <label class="col-md-4 col-xs-1">Alamat Karyawan</label><input required class="form-control" type="text" name="alamat" value="<?php echo $d['alamat_karyawan_lain']; ?>"><br>
          <label class="col-md-4 col-xs-1">No Telephone</label><input required class="form-control" type="text" name="telp" value="<?php echo $d['no_telp']; ?>"><br>
          <label class="col-md-4 col-xs-1">Staff Bagian</label>
              <select class="form-control" name="staff">
                <?php
                $staff=$d['staff_bagian'];
                if ($staff=='Sales') {
                ?>
                <option selected="">Sales</option>
                <option>Service</option>
                <option>Pencuci Mobil</option>
                <?php
                }elseif ($staff=='Service') {
                ?>
                <option>Sales</option>
                <option selected="">Service</option>
                <option>Pencuci Mobil</option>
                <?php
                }elseif ($staff=='Pencuci Mobil') {
                ?>
                <option>Sales</option>
                <option>Service</option>
                <option selected="">Pencuci Mobil</option>
                <?php
                }
                ?>

              </select>
              <br>
          <button class="btn btn-primary" type="submit">OK</button>
        </form>
    </div>
</div>
