<link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
<?php
include ('../../koneksi.php');
$tgl=$_GET['tgl'];
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Detail</h3>
        </div>
        <div class="modal-body">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Pengeluaran</th>
                    <th>Harga Keluar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
<?php
$f=mysql_query("SELECT * FROM pengeluaran where tgl_pengeluaran='$tgl'");
while ($d=mysql_fetch_assoc($f)) {
?>

              <tr class='odd gradeX'>
                <td><?php echo $d['pengeluaran']; ?></td>
                <td><?php echo $d['harga_pengeluaran']; ?></td>
                <td><a class="btn btn-danger hapus" id="<?php echo $d['id_pengeluaran']; ?>"><i class="fa fa-trash-o"></i></a></td>
              </tr>



<?php
}
?>
            </tbody>
          </table>
        </div>
    </div>
</div>
<script type="text/javascript">
   $(document).ready(function () {
   $(".hapus").click(function(e) {
      var m = $(this).attr("id");
      var jawab = confirm("Yakin untuk menghapus!");
        if (jawab === true) {
     $.ajax({
          url: "proses/proses/keluar.php",
          type: "GET",
          data : {ii: m,},
          success: function (ajaxData){
            alert('Berhasil');
            location.reload();
           }
         });
        } else {
          return false;
        }
        });
      });
</script>
<?php
$i=$_GET['ii'];
mysql_query("DELETE FROM pengeluaran WHERE id_pengeluaran='$i'");
?>
<script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
<script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>
