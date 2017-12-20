<?php
include ('../../koneksi.php');
$nopol=$_GET['nopol'];
// $delete=mysql_query("");
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Perbaikan</h3>
        </div>
        <div class="modal-body">
          <center><h3>Masukkan Biaya Perbaikan</h3></center>
          <center>*Masukkan jika perlu</center>
          <center>*Akan dihitung dalam pengeluaran laba</center>
          <form class="w" method="post">
          <input class="form-control" type="hidden" name="nopol" value="<?php echo $nopol; ?>"><br>
          <input class="form-control" type="number" name="biaya"><br>
          <a onclick="ok()" class="btn btn-primary">OK</a>
          </form>
        </div>
    </div>
</div>
<script type="text/javascript">
  function ok(){
    var data =$('.w').serialize();
    $.ajax({
      type:'POST',
      url:"proses/proses/service.php?",
      data: data,
      success: function(ajaxData){
        alert('Berhasil');
        location.reload();
      }
    });
  }
</script>
<?php
if (isset($_POST['nopol'])) {
  $npl=$_POST['nopol'];
  $biaya=$_POST['biaya'];
  mysql_query("UPDATE mobil SET status='Perbaikan' WHERE nopol='$npl'");
  if (!$biaya=='') {
    $tgl=Date('Y-m-d');
    mysql_query("INSERT INTO pengeluaran(pengeluaran, harga_pengeluaran, tgl_pengeluaran) VALUES('Perbaikan Mobil', '$biaya', '$tgl')");
  }
}
