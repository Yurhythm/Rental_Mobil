<?php
include ('../koneksi.php');

  $q=mysql_query("SELECT harga, nopol, jenis, merk, warna, gmbrmobil FROM mobil WHERE status='ready'");

while ($w=mysql_fetch_assoc($q)) {
  echo "
  <tr class='odd gradeX'>
  ";
  if ($w['gmbrmobil']=="") {
  ?>
  <td  width='30%'><center><img width="300px" src="proses/img/noImage.gif" /></center></td>
  <?php
  }else {
  ?>
  <td  width='30%'><center><img width="300px" src="proses/img/<?php echo $w['gmbrmobil'];?>" /></center></td>
  <?php
  }

echo "
      <td>".$w['jenis']."</td>
      <td>".$w['merk']."</td>
      <td>".$w['warna']."</td>
      <td>Rp.".$w['harga']."</td>
      <td width='15%'>
      <button class='btn btn-warning detail' id=".$w['nopol']."><i class='fa fa-eye'></i></button>
      <button class='btn btn-primary pinjam' id=".$w['nopol'].">Pinjam</button>
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
   $(".pinjam").click(function(e) {
      var m = $(this).attr("id");
     $.ajax({
          url: "proses/transaksi-pinjam.php",
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
