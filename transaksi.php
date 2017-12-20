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
  <title>Trasaksi</title>
  <!-- Core CSS - Include with every page -->
  <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
  <link href="assets/css/main-style.css" rel="stylesheet" />
  <link href="style.css" rel="stylesheet" />

  <!-- Page-Level CSS -->
  <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
  <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                                  <center><strong>EDIT PROFIL</strong></center>
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
              <ul class="nav" id="side-menu">
                  <li>
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
                  <li class="active">
                      <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Transaksi<span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                        <?php
                        if (isset($_GET['transaksi'])) {
                        ?>
                          <li class="aktif">
                              <a href="transaksi.php?transaksi">Data Transaksi</a>
                          </li>
                          <li>
                              <a href="transaksi.php?pinjam">Pinjam</a>
                          </li>
                          <li>
                              <a href="transaksi.php?kembali">Kembali</a>
                          </li>
                        <?php
                        }elseif (isset($_GET['pinjam'])) {
                        ?>
                        <li>
                            <a href="transaksi.php?transaksi">Data Transaksi</a>
                        </li>
                        <li class="aktif">
                            <a href="transaksi.php?pinjam">Pinjam</a>
                        </li>
                        <li>
                            <a href="transaksi.php?kembali">Kembali</a>
                        </li>
                        <?php
                        }elseif (isset($_GET['kembali'])) {
                        ?>
                        <li>
                            <a href="transaksi.php?transaksi">Data Transaksi</a>
                        </li>
                        <li>
                            <a href="transaksi.php?pinjam">Pinjam</a>
                        </li>
                        <li class="aktif">
                            <a href="transaksi.php?kembali">Kembali</a>
                        </li>
                        <?php
                        }
                        ?>
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
                      <a href="laba.php"><i class="fa fa-dashboard fa-fw"></i>Laba</a>
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
                    <h1 class="page-header">Transaksi</h1>
                </div>
                <!--end page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                      <?php
                      if (isset($_GET['transaksi'])) {
                        $d=mysql_query("SELECT * FROM mobil");
                      ?>
                        <div class="panel-heading">
                            Data Transaksi
                        </div>
                        <div class="panel-body">
                          <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                  <thead>
                                      <tr>
                                        <th>Gambar</th>
                                        <th>Nopol</th>
                                        <th>Peminjam</th>
                                        <th>Harga total</th>
                                        <th>Nama Supir</th>
                                        <th>Penginput</th>
                                        <th width="15%">tanggal Pinjam-Kembali</th>
                                        <th>Status</th>
                                        <th>Denda</th>
                                        <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php include ('proses/data-transaksi.php'); ?>
                                  </tbody>
                              </table>
                          </div>
                        </div>
                      <?php
                      }elseif (isset($_GET['pinjam'])) {
                        $d=mysql_query("SELECT * FROM mobil");
                      ?>
                        <div class="panel-heading">
                            Pinjam
                        </div>
                        <div class="panel-body">
                          <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                  <thead>
                                      <tr>
                                          <th>Gambar</th>
                                          <th>Jenis</th>
                                          <th>Merk</th>
                                          <th>Warna</th>
                                          <th width="10%">Harga</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php include ('proses/pinjam-mobil.php'); ?>
                                  </tbody>
                              </table>
                          </div>
                        </div>
                      <?php
                      }elseif (isset($_GET['kembali'])) {
                      ?>
                      <div class="panel-heading">
                          Kembali
                      </div>
                      <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Gambar</th>
                                        <th>Nopol</th>
                                        <th>Peminjam</th>
                                        <th>Nama Supir</th>
                                        <th>Penginput</th>
                                        <th>Tanggal Pinjam-Kembali</th>
                                        <th>Denda</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include ('proses/kembali-mobil.php'); ?>
                                </tbody>
                            </table>
                        </div>
                      </div>
                      <?php
                      }
                      ?>
                    </div>
                     <!-- End Form Elements -->
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
    <!-- <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script> -->
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>


</body>

</html>
