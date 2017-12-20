<?php
include ('../koneksi.php');

$q=mysql_query("SELECT * FROM karyawan_lain");

while ($w=mysql_fetch_assoc($q)) {
  echo "
  <tr class='odd gradeX'>
      <td>".$w['nama_karyawan_lain']."</td>
      <td>".$w['alamat_karyawan_lain']."</td>
      <td class='center'>".$w['no_telp']."</td>
      <td class='center'>".$w['staff_bagian']."</td>
  ";
  echo "
  <td width='15%'>
  <button class='btn btn-warning detail' id=".$w['id_karyawan_lain']."><i class='fa fa-eye'></i></button>
  <button class='btn btn-primary admin edit' id=".$w['id_karyawan_lain']."><i class='fa fa-edit'></i></button>
  <button class='btn btn-danger admin hapus' id=".$w['id_karyawan_lain']."><i class='fa fa-trash-o'></i></button>
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
          url: "proses/detail-karyawan-lain.php",
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
          url: "proses/edit-karyawan-lain.php",
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
               url: "proses/delete-karyawan-lain.php",
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
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">

</div>
