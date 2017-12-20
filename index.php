<?php
session_start();
include ('koneksi.php');
if (!isset($_SESSION['nama_user']) AND !isset($_SESSION['sandi_user'])) {
  header('Location:login.php');
}
$level=$_SESSION['level'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <?php
    if ($level=="karyawan") {
    ?>
    <script type="text/javascript">
      function admin() {
        $('.admin').css('display', 'none');
      }
    </script>
    <?php
    }
    ?>
   </head>
<body onload="admin()">
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav style="background:#555; border-color:#555;" class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                  <font style="position:absolute; left:5%; font-size:30px; color:#fff;">RENTAL MOBIL</font>
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown-messages -->
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="?profil">
                              <div style="color:#000;">
                                  <center><strong>EDIT PROFIL<br></strong></center>
                              </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="?keluar">
                                <div style="color:#000;">
                                    <center><strong>KELUAR</strong></center>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- end dropdown-messages -->
                </li>


            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul  class="nav" id="side-menu">
                  <li>
                      <!-- user image section-->
                      <!-- <div class="user-section">
                          <div class="user-section-inner">
                              <img src="assets/img/user.jpg" alt="">
                          </div>
                          <div class="user-info">
                              <div>Jonny <strong>Deen</strong></div>
                              <div class="user-text-online">
                                  <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                              </div>
                          </div>
                      </div> -->
                      <!--end user image section-->
                  </li>
                    <!-- <li style="margin-top:;1000px" class="sidebar-search"> -->
                        <!-- search section-->
                        <!-- <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div> -->
                        <!--end search section-->
                    <!-- </li> -->
                    <li class="aktif">
                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user"></i> Karyawan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="admin">
                                <a href="karyawan.php?tambah-karyawan">Tambah Karyawan</a>
                            </li>
                            <li>
                                <a href="karyawan.php?data-karyawan">Data Karyawan</a>
                            </li>
                            <li>
                                <a href="karyawan.php?data-karyawan-lain">Data Karyawan Lain</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user"></i> Mobil<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="admin">
                                <a href="mobil.php?tambah-mobil">Tambah Mobil</a>
                            </li>
                            <li>
                                <a href="mobil.php?data-mobil">Data Mobil</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Transaksi<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="transaksi.php?transaksi">Data Transaksi</a>
                            </li>
                            <li>
                                <a href="transaksi.php?pinjam">Pinjam</a>
                            </li>
                            <li>
                                <a href="transaksi.php?kembali">Kembali</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Supir<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="admin">
                                <a href="supir.php?tambah-supir">Tambah Sopir</a>
                            </li>
                            <li>
                                <a href="supir.php?data-supir">Data Supir</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="laba.php"><i class="fa fa-dashboard fa-fw"></i> Laba</a>
                    </li>


                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">
          <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">SELAMAT DATANG DI RENTAL MOBIL</h1>
                </div>
                <!--end page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Peraturan Penyewaan Mobil
                        </div>
                        <div class="panel-body">
                          <div class="row">
                                <div class="col-lg-6">


1. SMS ke Nomor 08XXXXXXX
Format SMS Pakai SOPIR :
*SOPIR#JENIS MOBIL#ID KASKUS(Bila Ada)#NAMASESUAIKTP#NOKTP#ALAMAT JEMPUT#TGL(JAM) BERANGKAT - TGL&JAM MAX KEMBALI#RUTE/TUJUAN..
- Pemesanan dilakukan max 3 hari sebelum hari H..<br>

2. Tunggu SMS Balasan dari kami..<br>

4. Konfirmasi anda setuju dan lakukan Pembayaran DP..<br>

5. Simpan SMS Bukti Booking dan tunggu di alamat yang disepakati..<br>

6. Tunjukkan KTP kepada sopir dan lakukan pelunasan paling lambat pada hari pertama sewa mobil..<br>

7. Bila selesai mohon SMS jika sopir telah anda suruh kembali..<br>

ATURAN BAGI PENYEWA :
- Pastikan mobil kembali tepat waktu ditempat kami..
- Pastikan BBM Awal = BBM Akhir..
- Dilarang merokok di dalam mobil, Kami akan memperingati anda dan telah menganjurkan sopir menegur jika anda merokok didalam mobil..
- Menjaga kebersihan didalam mobil, tidak menumpahkan cairan dan bertanggung jawab jika mobil dalam keadaan sangat kotor atau dirusak oleh tangan penyewa/bagian dari penyewa..

KETENTUAN PENGGUNAAN SOPIR :
- Pastikan anda memberi makan/Uang Makan kepada sopir..
- Pastikan untuk memperhatikan kondisi Sopir demi keselamatan bersama. Mobil tidak dijalankan diatas 8 jam terus menerus..
- Sopir tidur/beristirahat di jam 23:30 - 06:30, Penggunaan melebihi itu penyewa terkena charge 100ribu..
- Tidak memaksa dan memberi perintah kepada sopir untuk mengebut atau menaikkan kecepatan..
- sopir dapat tidur dimobil dan tidak ada biaya penginapan atau bila di jakarta anda bisa mempersilahkan sopir kembali ke rumahnya..

DENDA :
Antrian kami termasuk padat, keterlambatan anda akan sangat merugikan kami dan penyewa lainnya..
Denda kami Rp 500.000 + harga tambahan /jam. jadi mohon benar-benar perhitungkan waktunya dan tidak terlambat.
tidak ada toleransi dengan alasan macet atau apapun..

MOBIL MOGOK :
- Jika sewa dengan Sopir, anda akan kami berikan mobil pengganti secepatnya dan anda mendapat GRATIS 1x24 Jam..
atau jika tidak ada mobil pengganti, kami akan membayar 2x Lipat senilai sewa anda..

KETERLAMBATAN :
- Anda tidak dapat sengaja menterlambatkan diri. Bila dengan sopir maka sopir akan kami perintahkan kembali jika telah melewati waktu sewa..
- Keterlambatan yg diakibatkan kelalaian Kami karena tidak berangkat tepat waktu sesuai kesepakatan anda akan mendapatkan sewa 1 hari gratis..

Keterlambatan dari pihak kami tidak berlaku jika :
- Jalan memang macet utk menuju ke tempat anda..
- Pencarian alamat yang membingungkan ataupun salah alamat..

KAMI TIDAK BERTANGGUNG JAWAB MENGENAI KECELAKAAN DAN ASURANSI PIHAK KETIGA, SEMUA KERUGIAN YANG TERJADI DI TANGGUNG MASING-MASING..
*Mohon segera sms jika sopir mengemudi dengan membahayakan keselamatan anda..
          </div>
          </div>
          </div>
          </div>
          </div>
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>

</body>

</html>
<?php
if (isset($_GET['keluar'])) {
  session_destroy();
?>
<script type="text/javascript">
  location.reload();
</script>
<?php
}
?>
