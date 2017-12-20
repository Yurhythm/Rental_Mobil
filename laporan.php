<?php
include ('koneksi.php');
session_start();
if (!isset($_SESSION['nama_user']) AND !isset($_SESSION['sandi_user'])) {
  header('Location:login.php');
}
$id_transaksi=$_GET['id_transaksi'];
include "assets/pdf/class.ezpdf.php";
$pdf = new Cezpdf();

//Set margin dan font
$pdf->ezSetCmMargins(3, 3, 3, 3);
$pdf->selectFont('pdf/fonts/Courier.afm');

//Tampilkan gambar di dokumen PDF
$pdf->addJpegFromFile('proses/img/mobil.jpg',31,778,90);

//Teks di tengah atas untuk judul header
$pdf->addText(150, 800, 17,'<b>LAPORAN TRANSAKSI RENTAL MOBIL</b>');
$pdf->addText(190, 780, 15,'<b>PT.RENTAL MOBIL (Jl.Maju Jaya)</b>');

//Garis atas untuk header
$pdf->line(31, 770, 565, 770);

$p=mysql_query("SELECT * FROM transaksi INNER JOIN mobil ON transaksi.nopol=mobil.nopol INNER JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan INNER JOIN karyawan ON transaksi.id_karyawan=karyawan.id_karyawan WHERE id_transaksi='$id_transaksi'");
$da=mysql_fetch_assoc($p);
$id_supir=$da['id_supir'];
$d=mysql_query("SELECT nama_supir FROM supir WHERE id_supir='$id_supir'");
$dd=mysql_num_rows($d);
$do=mysql_fetch_assoc($d);
$id_fasilitas=$da['id_fasilitas'];
$g=mysql_query("SELECT nama_fasilitas FROM fasilitas WHERE id_fasilitas='$id_fasilitas'");
$ff=mysql_num_rows($g);
$du=mysql_fetch_assoc($g);

$pdf->addText(100, 700, 14,'Nomer Polisi Mobil      :        '.$da['nopol'].'');
$pdf->addText(100, 660, 14,'Nama Pelanggan        :        '.$da['nama_pelanggan'].'');
if ($dd) {
$pdf->addText(100, 620, 14,'Nama Supir                 :        '.$do['nama_supir'].'');
}else {
$pdf->addText(100, 620, 14,'Nama Supir                 :        -');
}

if ($ff) {
$pdf->addText(100, 580, 14,'Fasilitas                       :        '.$du['nama_fasilitas'].'');
}else {
$pdf->addText(100, 580, 14,'Fasilitas                       :        -');
}
$pdf->addText(100, 540, 14,'Tanggal Pinjam           :        '.$da['tanggal_pinjam'].'');
$pdf->addText(100, 500, 14,'Tanggal Kembali         :        '.$da['tanggal_kembali'].'');
$pdf->addText(100, 460, 14,'Harga Total                 :        Rp.'.$da['harga_total'].'');

$pdf->addText(120, 410, 13,'Detail Mobil');
$pdf->addText(140, 380, 13,'Jenis                             '.$da['jenis'].'');
$pdf->addText(140, 350, 13,'Merk                             '.$da['merk'].'');
$pdf->addText(140, 320, 13,'Warna                           '.$da['warna'].'');
$pdf->addText(140, 290, 13,'Nomer Rangka             '.$da['noka'].'');
$pdf->addText(140, 260, 13,'Nomer Mesin                '.$da['nosin'].'');
$pdf->addText(140, 230, 13,'Spesifikasi');
$pdf->addText(160, 200, 12,''.$da['spesifikasi'].'');



$pdf->addText(100, 70, 11,'Petugas      '.$da['nama_karyawan'].'');


//Garis bawah untuk footer
$pdf->line(31, 50, 565, 50);

//Teks kiri bawah
$pdf->addText(410,34,8,'Dicetak tgl:' . date( 'd-m-Y, H:i:s'));


//Tampilkan Dalam Bentuk Table
// $pdf->ezTable($data);

// Penomoran halaman
// $pdf->ezStartPageNumbers(564, 20, 8);
$pdf->ezStream();


?>
