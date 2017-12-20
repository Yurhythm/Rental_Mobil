<?php
include ('../../koneksi.php');
  $harga=$_GET['harga'];
  $tgl=Date('Y-m-d');
  mysql_query("INSERT INTO pengeluaran(pengeluaran, harga_pengeluaran, tgl_pengeluaran) VALUES('Pembelian Mobil', '$harga', '$tgl')");
?>
