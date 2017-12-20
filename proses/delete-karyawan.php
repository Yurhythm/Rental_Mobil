<?php
include ('../koneksi.php');
$id=$_GET['id'];
$delete=mysql_query("DELETE FROM karyawan WHERE id_karyawan='$id'");
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
