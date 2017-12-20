<?php
// includ dari pilih supir
$q=mysql_query("SELECT * FROM supir WHERE status='ready'");

while ($w=mysql_fetch_assoc($q)) {
  echo "
  <tr class='odd gradeX'>
      <td>".$w['nama_supir']."</td>
      <td>".$w['alamat_supir']."</td>
      <td class='center'>".$w['telp_supir']."</td>
  ";
  if ($w['level']=='1') {
    echo "<td>Admin</td>";
  }elseif ($w['level']=='2') {
    echo "<td>Karyawan</td>";
  }
?>
  <td width='15%'>
  <a class='btn btn-warning detail' id='<?php echo $w['id_supir']; ?>'><i class='fa fa-eye'></i></a>
<?php
  echo "<a class='btn btn-primary pilih' id='".$w['id_supir']."/".$karyawan."/".$nama."/".$kelam."/".$telp."/".$alamat."/".$fasilitas."/".$lama."/".$lamajam."/".$tgl."/".$tglkem."/".$nopol."/".$mulai."'>Pilih</a>";
?>
  </td>
  </tr>
<?php
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
   $(".pilih").click(function(e) {
      var m = $(this).attr("id");
     $.ajax({
          url: "proses/proses/pilih-supir.php",
          type: "GET",
          data : {data: m,},
          success: function (ajaxData){
            $("#det").html(ajaxData);
            $("#det").modal('show',{backdrop: 'true'});
           }
         });
        });
      });
</script>
<div id="det">

</div>
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>
