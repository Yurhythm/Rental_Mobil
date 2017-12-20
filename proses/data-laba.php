
<?php
include ('../koneksi.php');

$tgl=$_GET['awal'];
$tl=$_GET['akhir'];
$angka=((abs(strtotime($tl)-strtotime($tgl)))/(60*60*24));
$angka=floor($angka);

if ($tgl=='') {
  $tgl=Date('Y-m-d');
  $new=strtotime("-59 day" , strtotime($tgl));
  $tgl=date('Y-m-d' , $new);

  $angka=59;
}



$hhh=mysql_query("SELECT tgl_pemasukan FROM pemasukan");
$ddd=mysql_fetch_assoc($hhh);
$tgla=$ddd['tgl_pemasukan'];

$vvv=mysql_query("SELECT tgl_pengeluaran FROM pengeluaran");
$ccc=mysql_fetch_assoc($vvv);
$tglaa=$ccc['tgl_pengeluaran'];

$hh=mysql_query("SELECT sum(harga_pemasukan) as mas FROM pemasukan WHERE tgl_pemasukan between '$tgla' and '$tgl'");
$dd=mysql_fetch_assoc($hh);

$qq=mysql_query("SELECT sum(harga_pengeluaran) as kel FROM pengeluaran WHERE tgl_pengeluaran between '$tglaa' and '$tgl'");
$pp=mysql_fetch_assoc($qq);


$laba=$dd['mas']-$pp['kel'];



$a=0;
$k=$angka+2;
while ($a <= $angka) {
  $k--;
  $aa="+$a day";
  $new=strtotime($aa , strtotime($tgl));
  $tgll=date('Y-m-d' , $new);
  $a++;

// $f=mysql_query("SELECT harga_pengeluaran FROM pengeluaran WHERE tgl_pengeluaran LIKE '%$tgll%'");
// $add=0;
// while ($g=mysql_fetch_assoc($f)) { $add=$add + $g['harga_pengeluaran']; }
//
// $b=mysql_query("SELECT harga_pemasukan FROM pemasukan WHERE tgl_pemasukan LIKE '%$tgll%'");
// $axx=0;
// while ($v=mysql_fetch_assoc($b)) { $axx=$axx + $v['harga_pemasukan']; }

$f=mysql_query("SELECT sum(harga_pengeluaran) as keluar FROM pengeluaran WHERE tgl_pengeluaran LIKE '%$tgll%'");
$l=mysql_fetch_assoc($f);
$add=$l['keluar'];

$b=mysql_query("SELECT sum(harga_pemasukan) as masuk FROM pemasukan WHERE tgl_pemasukan LIKE '%$tgll%'");
$v=mysql_fetch_assoc($b);
$axx=$v['masuk'];

$laba=$laba+$axx;
$laba=$laba-$add;
  echo "
  <tr class='odd gradeX'>
      <td>".$k."</td>
      <td>".$tgll."</td>
      <td>Rp.<a class='masuk' id='$tgll'>".$axx."</a></td>
      <td>Rp.<a class='keluar' id='$tgll'>".$add."</a></td>
      <td class='center'>Rp.".$laba."</td>
    </tr>
  ";
}

?>
<script src="assets/plugins/jquery-1.10.2.js"></script>
<script type="text/javascript">
   $(document).ready(function () {
   $(".masuk").click(function(e) {
      var m = $(this).attr("id");
     $.ajax({
          url: "proses/proses/masuk.php",
          type: "GET",
          data : {tgl: m,},
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
   $(".keluar").click(function(e) {
      var m = $(this).attr("id");
     $.ajax({
          url: "proses/proses/keluar.php",
          type: "GET",
          data : {tgl: m,},
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
