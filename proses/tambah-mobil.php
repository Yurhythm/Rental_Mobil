<div id="popup">
    <div class="window">
      <a data-dismiss='modal' class="close-but" title="Close"><i class="fa fa-times"></i></a>
<?php
include ('../koneksi.php');
session_start();

$user=$_SESSION['nama_user'];

$q=mysql_query("SELECT id_karyawan FROM karyawan where username='$user'");
$o=mysql_fetch_assoc($q);
$id_karyawan=$o['id_karyawan'];

$nopol=$_POST['nopol'];
$noka=$_POST['noka'];
$nosin=$_POST['nosin'];
$jenis=$_POST['jenis'];
$merk=$_POST['merk'];

$warna=$_POST['warna'];
$harga=$_POST['harga'];
$status="ready";
$spesifikasi=$_POST['spesifikasi'];

if ($nopol=="" OR $noka=="" OR $nosin=="" OR $jenis=="" OR $merk=="" OR $warna=="" OR $harga=="" OR $status=="" OR $spesifikasi=="") {
  echo "Data $file_name tidak boleh ada yang kosong";
}else {

$query=mysql_query("INSERT INTO mobil(nopol, id_karyawan, noka, nosin, jenis, merk,  status, warna, harga, spesifikasi) VALUES('$nopol', '$id_karyawan', '$noka', '$nosin', '$jenis', '$merk', '$status', '$warna', '$harga', '$spesifikasi')");
if ($query) {
    echo "<h3>Data berhasil ditambahkan</h3><br><br>
          *Masukkan dalam data Pengeluaran<br><br>
          <a class='btn btn-primary ook' data-dismiss='modal' id=".$harga.">OK</a>&nbsp&nbsp<a data-dismiss='modal' class='btn btn-warning'>Tidak</a>
        ";
}else {
  echo "<h3>Data gagal ditambahkan, kemungkinan nopol sudah ada</h3><br><br>
        <a class='btn btn-primary' data-dismiss='modal'>OK</a>
  ";
}

}

?>
</div>
</div>

<script type="text/javascript">
   $(document).ready(function () {
   $(".ook").click(function(e) {
      var m = $(this).attr("id");
     $.ajax({
          url: "proses/proses/pengeluaran-mobil.php",
          type: "GET",
          data : {harga: m,},
          success: function (ajaxData){
            $("#d").load(ajaxData);
           }
         });
        });
      });
</script>
<div id="d">

</div>
