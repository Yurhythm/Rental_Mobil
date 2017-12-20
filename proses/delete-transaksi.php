<?php
include ('../koneksi.php');
$i=$_GET['i'];
$f=mysql_query("SELECT id_pelanggan FROM transaksi WHERE id_transaksi='$i'");
$g=mysql_fetch_assoc($f);
$pela=$g['id_pelanggan'];
$p=mysql_query("DELETE FROM pelanggan WHERE id_pelanggan='$pela'");
$o=mysql_query("DELETE FROM transaksi WHERE id_transaksi='$i'");
if ($o) {
  echo "wew";
}
echo $i;
