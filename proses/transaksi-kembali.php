<?php
include ('../koneksi.php');
$dat=$_GET['dat'];
$data=explode(":", $dat);
$denda=$data[0];
$id=$data[1];
mysql_query("UPDATE transaksi SET status='Kembali' WHERE id_transaksi='$id'");
$o=mysql_query("SELECT * FROM transaksi where id_transaksi='$id'");
$gg=mysql_fetch_assoc($o);
$id_supir=$gg['id_supir'];
$nopol=$gg['nopol'];

$bbb=Date('Y-m-d');
mysql_query("INSERT INTO pemasukan(pemasukan, harga_pemasukan, tgl_pemasukan) VALUES('Penerimaan Denda', '$denda', '$bbb')");

mysql_query("UPDATE supir SET status='ready' WHERE id_supir='$id_supir'");
mysql_query("UPDATE mobil SET status='ready' WHERE nopol='$nopol'");


if ($denda=="") {
?>
    <div class="window">
        <a data-dismiss="modal" class="close-but" title="Close"><i class="fa fa-times"></i></a>
        <br><br>
        <h3>Berhasil</h3>
        Pengembalian Tepat Waktu<br><br>
        <a href="transaksi.php?kembali" class="btn btn-primary">OK</a>
    </div>
<?php
}else {
?>

    <div class="window">
        <a data-dismiss="modal" class="close-but" title="Close"><i class="fa fa-times"></i></a>
        <h3>Berhasil</h3>
        Denda Pengembalian
        <b><h3>Rp.<?php echo $denda; ?>,00</h3><b>
        <a href="transaksi.php?kembali" class="btn btn-primary">OK</a>
    </div>
<?php
}
?>
