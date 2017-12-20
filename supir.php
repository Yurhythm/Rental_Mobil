<?php
session_start();
include ('koneksi.php');
if (!isset($_SESSION['nama_user']) AND !isset($_SESSION['sandi_user'])) {
  header('Location:login.php');
}
$level=$_SESSION['level'];
if (isset($_GET['keluar'])) {
  session_destroy();
?>
<script type="text/javascript">
  location.reload();
</script>
<?php
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supir</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
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
                  <li class="active">
                      <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Supir<span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                        <?php
                        if (isset($_GET['tambah-supir'])) {
                        ?>
                        <li class="aktif admin">
                            <a href="supir.php?tambah-supir">Tambah Sopir</a>
                        </li>
                        <li>
                            <a href="supir.php?data-supir">Data Supir</a>
                        </li>
                        <?php
                        }elseif (isset($_GET['data-supir'])) {
                        ?>
                        <li class="admin">
                            <a href="supir.php?tambah-supir">Tambah Sopir</a>
                        </li>
                        <li class="aktif">
                            <a href="supir.php?data-supir">Data Supir</a>
                        </li>
                        <?php
                        }
                        ?>

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
          <?php
          if (isset($_GET['tambah-supir'])) {
            if ($level=="admin" OR $level=="superadmin") {
          ?>
          <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Karyawan</h1>
                </div>
                <!--end page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tambah Karyawan
                        </div>
                        <div class="panel-body">
                          <div class="row">
                                <div class="col-lg-6">
                                  <form class="form-supir"  method="post">
                                    <div class="form-group">
                                        <label>Nama Supir</label>
                                        <input required name="nama" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat karyawan</label>
                                        <input required name="alamat" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>No Telephone</label>
                                        <input required name="notelp" type="number" class="form-control">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label>Gambar</label>
                                        <input required name="image" type="file" class="form-control">
                                    </div> -->
                                    <div class="form-group">
                                        <!-- <input onclick="tambah()" type="submit" class="btn btn-primary" value=" Tambah"> -->
                                        <a onclick="tambah()" class="btn btn-primary">Tambah</a>
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                    </div>
                                  </form>
                                </div>
                          </div>
                        </div>
                    </div>
                    <div class="tampildata">

                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
            <script type="text/javascript">
              function tambah(){
                var data =$('.form-supir').serialize();
                $.ajax({
                  type:'POST',
                  url:"proses/tambah-supir.php?",
                  data: data,
                  success: function(ajaxData){
                         $("#detail").html(ajaxData);
                         $("#detail").modal('show',{backdrop: 'true'});
                  }
                });
              }

            </script>
            <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">

            </div>
          <?php
            }
          }elseif (isset($_GET['data-supir'])) {
          ?>
          <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Karyawan</h1>
                </div>
                <!--end page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Karyawan
                        </div>
                        <div class="panel-body">
                          <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                  <thead>
                                      <tr>
                                          <th>Nama Supir</th>
                                          <th>Alamat</th>
                                          <th>Status</th>
                                          <th>Sedang Menyupir</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php include ('proses/data-supir.php'); ?>
                                  </tbody>
                              </table>
                          </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
          <?php
          }
          ?>
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
