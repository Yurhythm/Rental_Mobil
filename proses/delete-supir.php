<?php
include ('../koneksi.php');
$id=$_GET['id'];
$delete=mysql_query("DELETE FROM supir WHERE id_supir='$id' AND status='ready'");
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
            <h1>Gagal Menghapus data, Pastikan Supir Masih berstatus Ready</h1>
          </div>
    </div>
</div>
<?php
}
