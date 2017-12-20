<?php
include ('../../koneksi.php');
$dat=$_GET['data'];
$data=explode("/", $dat);


$id_supir=$data[0];
$karyawan=$data[1];
$nama=$data[2];
$kelam=$data[3];
$telp=$data[4];
$alamat=$data[5];
$fasilitas=$data[6];
$lama=$data[7];
$lamajam=$data[8];
$tgl=$data[9];
$tglkem=$data[10];
$nopol=$data[11];
$mulai=$data[12];



  mysql_query("INSERT INTO pelanggan(nama_pelanggan, jenis_kelamin, alamat_pelanggan, no_telephone) VALUES('$nama', '$kelam', '$alamat', '$telp')");
    $o=mysql_query("SELECT id_pelanggan FROM pelanggan where nama_pelanggan='$nama' AND jenis_kelamin='$kelam' AND alamat_pelanggan='$alamat' AND no_telephone='$telp'");
    $l=mysql_fetch_assoc($o);
    $id=$l['id_pelanggan'];

  $gg=mysql_query("SELECT harga_fasilitas FROM fasilitas WHERE id_fasilitas='$fasilitas'");
  $ff=mysql_fetch_assoc($gg);
  $harfas=$ff['harga_fasilitas'];

  $fg=mysql_query("SELECT harga FROM mobil WHERE nopol='$nopol'");
  $gf=mysql_fetch_assoc($fg);
  $harmob=$gf['harga'];

if ($id_supir=="") {
  $harga=($harfas + $harmob) * $lama;
}else {
  $harga=($harfas + $harmob + 100000) * $lama;
}
$bbb=Date('Y-m-d');
mysql_query("INSERT INTO pemasukan(pemasukan, harga_pemasukan, tgl_pemasukan) VALUES('Peminjaman Mobil', '$harga', '$bbb')");

  mysql_query("UPDATE mobil SET status='Terpinjam' WHERE nopol='$nopol'");
  mysql_query("INSERT INTO transaksi(id_karyawan, id_supir, id_fasilitas, id_pelanggan, nopol, tanggal_pinjam, tanggal_kembali, status, harga_total) VALUES('$karyawan', '$id_supir', '$fasilitas', '$id', '$nopol', '$tgl', '$tglkem', 'Terpinjam', '$harga')");
  $t=mysql_query("SELECT id_transaksi FROM transaksi WHERE nopol='$nopol' AND tanggal_pinjam='$tgl'");
  $c=mysql_fetch_assoc($t);
  $id_tr=$c['id_transaksi'];
  mysql_query("UPDATE supir SET status='keluar', id_transaksi='$id_tr' WHERE id_supir='$id_supir'");

?>
<div id="popup">
    <div class="window">
        <a href="transaksi.php?transaksi" class="close-but" title="Close"><i class="fa fa-times"></i></a>
        <h3>Berhasil</h3>
        Total Harga Penyewaan
        <b><h3>Rp.<?php echo $harga; ?></h3><b>
        <a href="transaksi.php?transaksi" class="btn btn-primary">OK</a>
    </div>
</div>
