<?php
include ('../../koneksi.php');

$id=$_POST['id'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$telp=$_POST['telp'];

mysql_query("UPDATE supir SET nama_supir='$nama', alamat_supir='$alamat', telp_supir='$telp' where id_supir='$id'");

header('Location:../../supir.php?data-supir');
