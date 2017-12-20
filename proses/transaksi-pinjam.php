<?php
include ('../koneksi.php');
$nopol=$_GET['nopol'];
$f=mysql_query("SELECT * FROM mobil INNER JOIN karyawan on karyawan.id_karyawan=mobil.id_karyawan where nopol='$nopol'");
$d=mysql_fetch_assoc($f);

$v=mysql_query("SELECT * FROM fasilitas");
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Data Pelanggan</h3>
        </div>
        <div class="modal-body">
          <form action="../rentalmobil/pilih-supir.php" method="GET">
          <input type="hidden" name="nopol" value="<?php echo $nopol; ?>">
          <label class="col-md-5 col-xs-1">Nama Pelanggan</label><input required class="form-control" type="text" name="nama"><br>
          <label class="col-md-5 col-xs-1">Alamat Pelanggan</label><input required class="form-control" type="text" name="alamat" ><br>
          <label class="col-md-5 col-xs-1">Jenis Kelamain</label>
          <select class="form-control" name="kelam">
            <option>Laki-Laki</option>
            <option>Perempuan</option>
          </select>
          <label class="col-md-5 col-xs-1">No Telephone</label><input required class="form-control" type="number" name="telp" ><br><br>
          <label class="col-md-5 col-xs-1">Fasilitas</label>
          <select class="form-control" name="fasilitas">
                      <option>Tidak Menyewa Fasilitas</option>
            <?php
            while ($x=mysql_fetch_assoc($v)) {
              echo " <option value='".$x['id_fasilitas']."'>".$x['nama_fasilitas']."</option>";
            }
            ?>
          </select>
          <label class="col-md-5 col-xs-1">Taggal Pinjam</label>
          <input class="form-control" type="datetime-local" name="mulai">
          <label class="col-md-5 col-xs-1">Lama Sewa</label>
          <select class="form-control" name="lama">
                      <option value="0.5">12 Jam / 0.5 Hari</option>
                      <option value="1">24 Jam / 1 Hari</option>
                      <option value="1.5">36 Jam / 1.5 Hari</option>
                      <option value="2">48 Jam / 2 Hari</option>
                      <option value="2.5">24 Jam / 2.5 Hari</option>
                      <option value="3">24 Jam / 3 Hari</option>
                      <option value="3.5">24 Jam / 3.5 Hari</option>
                      <option value="4">24 Jam / 4 Hari</option>
                      <option value="4.5">24 Jam / 4.5 Hari</option>
                      <option value="5">24 Jam / 5 Hari</option>
                      <option value="5.5">24 Jam / 5.5 Hari</option>
                      <option value="6">24 Jam / 6 Hari</option>
                      <option value="6.5">24 Jam / 6.5 Hari</option>
                      <option value="7">24 Jam / 7 Hari</option>


          </select>
          <button class="btn" type="submit" >OK</button>
          </form>
    </div>
</div>
