<?php
include ('../koneksi.php');
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Tambah Pemasukan Lain</h3>
        </div>
        <div class="modal-body">
          <form action="proses/proses/keluar-masuk.php" method="post">
          <label class="col-md-4 col-xs-1">Pemasukan</label><input class="form-control" type="text" name="pemasukan"><br>
          <label class="col-md-4 col-xs-1">Biaya Masuk</label><input class="form-control" type="text" name="harga"><br>
          <input type="submit" class="btn btn-primary" name="ok" value="OK">
          </form>
    </div>
</div>
