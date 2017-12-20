<?php
include ('../koneksi.php');

$q=mysql_query("SELECT * FROM supir");

while ($w=mysql_fetch_assoc($q)) {

  $tr=$w['id_supir'];

    $k=mysql_query("SELECT nopol FROM transaksi WHERE id_supir='$tr' AND status='Terpinjam'");
    $p=mysql_fetch_assoc($k);
    $nopol=$p['nopol'];


  echo "
  <tr class='odd gradeX'>
      <td>".$w['nama_supir']."</td>
      <td width='25%'>".$w['alamat_supir']."</td>
      <td class='center'>".$w['status']."</td>
      <td><a  class='mobil' id=".$nopol.">".$nopol."</a></td>
  ";
  echo "
  <td width='15%'>
  <button class='btn btn-warning detail' id=".$w['id_supir']."><i class='fa fa-eye'></i></button>&nbsp
  <button class='btn btn-primary admin edit' id=".$w['id_supir']."><i class='fa fa-edit'></i></button>
  <button class='btn btn-danger admin hapus' id=".$w['id_supir']."><i class='fa fa-trash-o'></i></button>
  </td>
  </tr>
  ";
}

?>
<script src="assets/plugins/jquery-1.10.2.js"></script>
<script type="text/javascript">
   $(document).ready(function () {
   $(".detail").click(function(e) {
      var m = $(this).attr("id");
     $.ajax({
          url: "proses/detail-supir.php",
          type: "GET",
          data : {id: m,},
          success: function (ajaxData){
            $("#detail").html(ajaxData);
            $("#detail").modal('show',{backdrop: 'true'});
           }
         });
        });
      });
</script>
<script type="text/javascript">
   $(document).ready(function () {
   $(".edit").click(function(e) {
      var m = $(this).attr("id");
     $.ajax({
          url: "proses/edit-supir.php",
          type: "GET",
          data : {id: m,},
          success: function (ajaxData){
            $("#detail").html(ajaxData);
            $("#detail").modal('show',{backdrop: 'true'});
           }
         });
        });
      });
</script>
<script type="text/javascript">
   $(document).ready(function () {
   $(".hapus").click(function(e) {
      var m = $(this).attr("id");
      var jawab = confirm("Yakin untuk menghapus!");
        if (jawab === true) {
          $.ajax({
               url: "proses/delete-supir.php",
               type: "GET",
               data : {id: m,},
               success: function (ajaxData){
                 $("#detail").html(ajaxData);
                 $("#detail").modal('show',{backdrop: 'true'});
                }
              });
        } else {
            return false;
        }
        });
      });
</script>
<script type="text/javascript">
   $(document).ready(function () {
   $(".mobil").click(function(e) {
      var m = $(this).attr("id");
     $.ajax({
          url: "proses/detail-mobil.php",
          type: "GET",
          data : {nopol: m,},
          success: function (ajaxData){
            $("#detail").html(ajaxData);
            $("#detail").modal('show',{backdrop: 'true'});
           }
         });
        });
      });
</script>
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">

</div>
