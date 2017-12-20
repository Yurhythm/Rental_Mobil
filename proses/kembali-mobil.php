<?php
include ('../koneksi.php');

  $q=mysql_query("SELECT transaksi.id_transaksi, tanggal_pinjam, tanggal_kembali, id_supir, karyawan.id_karyawan, karyawan.nama_karyawan, pelanggan.id_pelanggan, pelanggan.nama_pelanggan, mobil.nopol, jenis, merk, warna, gmbrmobil FROM transaksi INNER JOIN karyawan ON transaksi.id_karyawan=karyawan.id_karyawan INNER JOIN mobil ON transaksi.nopol=mobil.nopol INNER JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan WHERE transaksi.status='Terpinjam' ORDER BY id_transaksi DESC");

  function datediff($tgl1, $tgl2){
  $tgl1 = strtotime($tgl1);
  $tgl2 = strtotime($tgl2);
  $diff_secs = abs($tgl1 - $tgl2);
  $base_year = min(date("Y", $tgl1), date("Y", $tgl2));
  $diff = mktime(0, 0, $diff_secs, 1, 1, $base_year);
  return array( "years" => date("Y", $diff) - $base_year, "months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1, "months" => date("n", $diff) - 1, "days_total" => floor($diff_secs / (3600 * 24)), "days" => date("j", $diff) - 1, "hours_total" => floor($diff_secs / 3600), "hours" => date("G", $diff), "minutes_total" => floor($diff_secs / 60), "minutes" => (int) date("i", $diff), "seconds_total" => $diff_secs, "seconds" => (int) date("s", $diff) );
  }

while ($w=mysql_fetch_assoc($q)) {
  $id_transaksi=$w['id_transaksi'];
  echo "
  <tr class='odd gradeX'>
  ";
  if ($w['gmbrmobil']=="") {
  ?>
  <td  width='10%'><center><img width="150px" src="proses/img/noImage.gif" /></center></td>
  <?php
  }else {
  ?>
  <td  width='10%'><center><img width="150px" src="proses/img/<?php echo $w['gmbrmobil'];?>" /></center></td>
  <?php
  }
  $supir=$w['id_supir'];
  $o=mysql_query("SELECT nama_supir FROM supir WHERE id_supir='$supir'");
  $b=mysql_fetch_assoc($o);
  $nama_supir=$b['nama_supir'];

$sekarang=Date('Y-m-d H:i:s');
if (strtotime($w["tanggal_kembali"]) < strtotime($sekarang) ) {

  date_default_timezone_set("Asia/Jakarta");

  $tgl1=$sekarang;
  $tgl2=$w['tanggal_kembali'];

  $denda= strtotime($tgl1)-strtotime($tgl2);

$denda=floor($denda / 3600);
$denda=$denda * 10000;

}else {
  $denda='';
}

echo "
      <td><a  class='detail' id=".$w['nopol'].">".$w['nopol']."</a></td>
      <td><a class='pelanggan' id=".$w['id_pelanggan'].">".$w['nama_pelanggan']."</a></td>
      ";
if ($nama_supir=="") {
echo "<td>Tidak Menyewa Supir</td>";
}else {
echo "<td><a  class='supir' id=".$w['id_supir'].">".$nama_supir."</a></td>";
}
echo "
      <td><a  class='karyawan' id=".$w['id_karyawan'].">".$w['nama_karyawan']."</a></td>
      <td>".$w['tanggal_pinjam']."<br>".$w['tanggal_kembali']."</td>
      ";
if ($denda=="") {
      echo "<td>-</td>";
}else {
      echo "<td style='color:red;'>Rp.".$denda."</td>";
}
echo "
      <td width='10%'>
      ";
      if ($denda=="") {
      echo "<a class='btn btn-primary kembali' id='".$denda.":".$id_transaksi."'>Kembali</a>";
      }else {

      echo "<a class='btn btn-danger kembali' id='".$denda.":".$id_transaksi."'>Kembali</a>";
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
   $(".pelanggan").click(function(e) {
      var m = $(this).attr("id");
     $.ajax({
          url: "proses/detail-pelanggan.php",
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
   $(".karyawan").click(function(e) {
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
   $(".supir").click(function(e) {
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
   $(".kembali").click(function(e) {
      var m = $(this).attr("id");
      var jawab = confirm("Apakah Anda yakin untuk memproses!");
        if (jawab === true) {
     $.ajax({
          url: "proses/transaksi-kembali.php",
          type: "GET",
          data : {dat: m,},
          success: function (ajaxData){
            $("#detail").html(ajaxData);
            $("#detail").modal('show',{backdrop: 'true'});
           }
         });
       }
        });
      });
</script>
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>
