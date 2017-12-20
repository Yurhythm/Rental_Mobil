<?php
include ('../koneksi.php');

  $q=mysql_query("SELECT nopol, noka, nosin, jenis, merk, warna, harga, status, spesifikasi, karyawan.nama_karyawan FROM mobil INNER JOIN karyawan ON mobil.id_karyawan=karyawan.id_karyawan");

while ($w=mysql_fetch_assoc($q)) {
  echo "
  <tr class='odd gradeX'>
      <td>".$w['nopol']."</td>
      <td>".$w['jenis']."</td>
      <td>".$w['merk']."</td>
      <td>".$w['warna']."</td>";
  if ($w['status']=='Perbaikan') {
  echo "
      <td width='10%' style='color:red;' class='center'>".$w['status']."</td>";
  }else {
  echo "
      <td width='10%' class='center'>".$w['status']."</td>";
  }

  echo "
      <td width='20%'>
      ";

  echo "
      <button class='btn btn-warning detail' id=".$w['nopol']."><i class='fa fa-eye'></i></button>&nbsp";


    if ($w['status']=='Perbaikan') {
    echo "<button class='btn btn-danger ready admin' id=".$w['nopol']."><i class='fa fa-gear'></i></button>";
    }elseif ($w['status']=='ready') {
    echo "<button class='btn service admin' id=".$w['nopol']."><i class='fa fa-gear'></i></button>";
    }else {
    echo "<button style='color:#aaa;' class='btn admin'><i class='fa fa-gear'></i></button>";
    }

  echo "
        <button class='btn btn-primary admin edit' id=".$w['nopol']."><i class='fa fa-edit'></i></button>
        <button class='btn btn-danger admin hapus' id=".$w['nopol']."><i class='fa fa-trash-o'></i></button>
      </td>
    </tr>

  ";

}

?>
<script src="assets/plugins/jquery-1.10.2.js"></script>
<script type="text/javascript">
   $(document).ready(function () {
   $(".service").click(function(e) {
      var m = $(this).attr("id");
     $.ajax({
          url: "proses/proses/service.php",
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
<script type="text/javascript">
   $(document).ready(function () {
   $(".ready").click(function(e) {
      var m = $(this).attr("id");
      var jawab = confirm("Yakin untuk Memproses!");
        if (jawab === true) {
     $.ajax({
          url: "proses/data-mobil.php",
          type: "GET",
          data : {nopol: m,},
          success: function (ajaxData){
            location.reload();
           }
         });
       }
    });
  });
</script>
<script type="text/javascript">
   $(document).ready(function () {
   $(".detail").click(function(e) {
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
<script type="text/javascript">
   $(document).ready(function () {
   $(".edit").click(function(e) {
      var m = $(this).attr("id");
     $.ajax({
          url: "proses/edit-mobil.php",
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
<script type="text/javascript">
   $(document).ready(function () {
   $(".hapus").click(function(e) {
      var m = $(this).attr("id");
      var jawab = confirm("Yakin untuk menghapus!");
        if (jawab === true) {
          $.ajax({
               url: "proses/delete-mobil.php",
               type: "GET",
               data : {nopol: m,},
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
<?php
$npl=$_GET['nopol'];
mysql_query("UPDATE mobil SET status='ready' WHERE nopol='$npl'");
