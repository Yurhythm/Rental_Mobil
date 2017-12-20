<?php
include ('../koneksi.php');

$q=mysql_query("SELECT * FROM karyawan");

while ($w=mysql_fetch_assoc($q)) {
  echo "
  <tr class='odd gradeX'>
      <td>".$w['username']."</td>
      <td>".$w['nama_karyawan']."</td>
      <td>".$w['alamat']."</td>
      <td class='center'>".$w['no_telp']."</td>
  ";
  if ($w['level']=='1') {
    echo "<td style='color:green;'>Administrator</td>";
  }elseif ($w['level']=='2') {
    echo "<td style='color:blue;'>Karyawan Biasa</td>";
  }elseif ($w['level']=='0') {
    echo "<td style='color:red;'>Super Administrator</td>";
  }
  echo "
  <td width='15%'>
  <button class='btn btn-warning detail' id=".$w['id_karyawan']."><i class='fa fa-eye'></i></button>
  <button class='btn btn-primary admin edit' id=".$w['id_karyawan']."><i class='fa fa-edit'></i></button>";
if (!$w['level']=='0') {
  echo "
  <button class='btn btn-danger admin hapus' id=".$w['id_karyawan']."><i class='fa fa-trash-o'></i></button>";
}
  echo "
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
          url: "proses/detail-karyawan.php",
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
          url: "proses/edit-karyawan.php",
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
               url: "proses/delete-karyawan.php",
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
