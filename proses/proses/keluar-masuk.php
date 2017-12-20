<?php
include ('../../koneksi.php');

if (isset($_POST['ok'])) {
  $pemasukan=$_POST['pemasukan'];
  $harga=$_POST['harga'];
  $tgl=Date('Y-m-d');
  mysql_query("INSERT INTO pemasukan(pemasukan, harga_pemasukan, tgl_pemasukan) VALUES('$pemasukan', '$harga', '$tgl')");

header('Location:../../laba.php');

}
if (isset($_POST['oke'])) {
  $pengeluaran=$_POST['pengeluaran'];
  $harga=$_POST['harga'];
  $tgl=Date('Y-m-d');
  mysql_query("INSERT INTO pengeluaran(pengeluaran, harga_pengeluaran, tgl_pengeluaran) VALUES('$pengeluaran', '$harga', '$tgl')");

header('Location:../../laba.php');

}
