<?php
include ('../koneksi.php');
$nopol=$_GET['nopol'];
$delete=mysql_query("DELETE FROM mobil WHERE nopol='$nopol'");
if ($delete) {
?>
<script type="text/javascript">
  location.reload();
</script>
<?php
}else {
  ?>
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-body">
            <h1>Gagal Menghapus data</h1>
          </div>
    </div>
</div>
<?php
}
?>
