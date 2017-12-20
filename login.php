<?php
session_start();
include ('koneksi.php');
if (isset($_SESSION['nama_user']) AND isset($_SESSION['sandi_user'])) {
  header('Location:index.php');
}
if (isset($_POST['masuk'])) {
  $user=$_POST['user'];
  $pass=md5($_POST['pass']);

  $userr=mysql_real_escape_string($user);
  $passs=mysql_real_escape_string($pass);

  $query=mysql_query("SELECT * FROM karyawan WHERE username='$userr' AND password='$passs'");
  $cek=mysql_num_rows($query);
  $karyawan=mysql_fetch_assoc($query);

if ($cek) {
  if ($karyawan['level']==1) {
    $_SESSION['nama_user']=$user;
    $_SESSION['sandi_user']=$pass;
    $_SESSION['level']="admin";
    header('Location:index.php');
  }elseif ($karyawan['level']==2){
    $_SESSION['nama_user']=$user;
    $_SESSION['sandi_user']=$pass;
    $_SESSION['level']="karyawan";
    header('Location:index.php');
  }elseif ($karyawan['level']==0){
    $_SESSION['nama_user']=$user;
    $_SESSION['sandi_user']=$pass;
    $_SESSION['level']="superadmin";
    header('Location:index.php');
  }
}else {
?>
<script type="text/javascript">
  alert('Maaf Proses Login Gagal, Periksa Kembali Username dan password anda')
</script>
<?php
}



}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Rental Mobil</title>
    <!--REQUIRED STYLE SHEETS-->
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->


</head>
<body>
    <!-- Navigation -->
     <header>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="htttp://www.binarytheme.com">RENTAL MOBIL</a>
            </div>
            <!-- Collect the nav links for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#home">HOME</a>
                    </li>
                    <li><a href="#services">SERVICES</a>
                    </li>

                    <li><a href="#price-sec">PRICING</a>
                    </li>

                    <li><a href="#contact-sec">CONTACT</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
          </header>
    <!--End Navigation -->




    <!--Header section  -->
    <div id="home">
    <div class="container" >
        <div class="row ">
            <div class="col-md-9 col-sm-9">
                <h1 class="head-main">Rental Mobil</h1>
                <span class="head-sub-main">Rental Mobil</span>
                <div class="head-last">

                    Lorem ipsum dolorLorem ipsum dolorLorem ipsum dolor
                </div>

            </div>
               <div class="col-md-3 col-sm-3">
                   <div class="div-trans text-center">
                       <br>
                       <h3>Masuk </h3>
                        <form method="post">
                            <br>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input  style="color:#fff;" name="user" type="text" class="form-control" required="required" placeholder="Username">
                                </div>
                            </div>
                            <br><br><br>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input  style="color:#fff;" name="pass" type="password" class="form-control" required="required" placeholder="Password">
                                </div>
                            </div>
                            <br><br><br>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <button type="submit" name="masuk" class="btn btn-primary">Login </button>
                                </div>
                            </div>

                    </form>
                   </div>

            </div>

        </div>
    </div>
          </div>
    <!--End Header section  -->

    <!--Services Section-->
    <section  id="services">
        <div class="container">

            <div class="row text-center">
                <div class="col-md-8 col-md-offset-2">
                    <h2>Our Services</h2>

                </div>

            </div>

            <div class="row text-center space-pad">
                <div class="col-md-3 col-sm-3">

                    <div >

                        <i class="fa fa-camera fa-4x main-color"></i>


                        <h3>Responsive </h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                         Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                        </p>

                    </div>

                </div>
                <div class="col-md-3 col-sm-3">

                    <div >

                        <i class="fa fa-briefcase fa-4x main-color"></i>


                        <h3>100% Free </h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                         Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                        </p>

                    </div>

                </div>
                <div class="col-md-3 col-sm-3">

                    <div >

                        <i class="fa fa-desktop fa-4x main-color"></i>


                        <h3>Clean Code </h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                         Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                        </p>

                    </div>

                </div>
                <div class="col-md-3 col-sm-3">

                    <div>

                        <i class="fa fa-folder fa-4x main-color"></i>


                        <h3>Read to Use </h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                         Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                        </p>

                    </div>

                </div>
            </div>
            <div class="row ">
                <div class="col-md-6 col-sm-6">
                    <h3>Lorem ipsum dolor sit amet</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                         Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                         Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.

                    </p>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <ul class="nav nav-pills" style="background-color: #ECECEC;">
                                <li class="active"><a href="#home-pills" data-toggle="tab">Home</a>
                                </li>
                                <li class=""><a href="#profile-pills" data-toggle="tab">Profile</a>
                                </li>
                                <li class=""><a href="#messages-pills" data-toggle="tab">Messages</a>
                                </li>
                                <li class=""><a href="#settings-pills" data-toggle="tab">Settings</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade  active in" id="home-pills">
                                    <h4>Home Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,  officia deserunt mollit anim id est laborum.</p>
                                </div>
                                <div class="tab-pane fade" id="profile-pills">
                                    <h4>Profile Tab</h4>
                                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,  officia deserunt mollit anim id est laborum.</p>

                                </div>
                                <div class="tab-pane fade" id="messages-pills">
                                    <h4>Messages Tab</h4>
                                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,  officia deserunt mollit anim id est laborum.</p>
                                </div>
                                <div class="tab-pane fade" id="settings-pills">
                                    <h4>Settings Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,  officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>


    </section>
     <!--End Services Section-->
    <!--parallax one-->
      <section  id="Parallax-one">
    <div class="container">

            <div class="row text-center">
                <div class="col-md-8 col-md-offset-2 ">
                    <h2><i class="fa fa-desktop fa-3x"></i>&nbsp;Just Space </h2>
                    <h4>
                        <strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                         Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                        </strong>
                    </h4>
                </div>

            </div>


        </div>
          </section>
    <!--./parallax one-->
        <!-- Pricing Section -->
    <section  id="price-sec">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-8 col-md-offset-2">

                    <h2>Pricing Options</h2>
                    <h4>
                        <strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                         Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                        </strong>
                    </h4>
                </div>

            </div>
            <div class="row text-center">

                <div class="col-md-12 ">



                    <div class="col-md-3 col-sm-6">
                        <ul class="plan ">
                            <li class="plan-head">BASIC PLAN</li>
                            <li class="main-price">$99 only</li>
                            <li><strong>120 </strong>Users</li>
                            <li><strong>10 </strong>Emails</li>
                            <li><strong>12GB </strong>Spacce</li>
                            <li class="bottom">
                                <a href="#contact-sec" class="btn btn-warning">SIGNUP HERE</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <ul class="plan plan-active">
                            <li class="plan-head head-active ">SIMPLE PLAN</li>
                            <li class="main-price">$199 only</li>
                          <li><strong>120 </strong>Users</li>
                            <li><strong>10 </strong>Emails</li>
                            <li><strong>12GB </strong>Spacce</li>
                            <li class="bottom">
                                <a href="#contact-sec" class="btn btn-primary">SIGNUP HERE</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <ul class="plan">
                            <li class="plan-head">VALUE PLAN</li>
                            <li class="main-price">$299 only</li>
                           <li><strong>120 </strong>Users</li>
                            <li><strong>10 </strong>Emails</li>
                            <li><strong>12GB </strong>Spacce</li>
                            <li class="bottom">
                                <a href="#contact-sec" class="btn btn-danger">SIGNUP HERE</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <ul class="plan">
                            <li class="plan-head">ADVANCE PLAN</li>
                            <li class="main-price">$399 only</li>
                            <li><strong>120 </strong>Users</li>
                            <li><strong>10 </strong>Emails</li>
                            <li><strong>12GB </strong>Spacce</li>
                            <li class="bottom">
                                <a href="#contact-sec" class="btn btn-success">SIGNUP HERE</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>


        </div>
    </section>
    <!--End Pricing Section -->
    <!--parallax two-->
    <section  id="Parallax-two">
        <div class="container">

            <div class="row text-center">
                <div class="col-md-8 col-md-offset-2 ">
                     <h2><i class="fa fa-briefcase fa-3x"></i>&nbsp;Just Space </h2>
                    <h4>
                        <strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                         Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                        </strong>
                    </h4>
                </div>

            </div>


        </div>
    </section>
    <!--./parallax two-->


    <!-- Contact Section -->
    <section  id="contact-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div id="social-icon">
                          <strong> Address:</strong> 124/56 , Your Street Lane, USA.
                        <a href="#"><i class="fa fa-facebook fa-2x"></i></a>
                        <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
                        <a href="#"><i class="fa fa-linkedin fa-2x"></i></a>
                        <a href="#"><i class="fa fa-google-plus fa-2x"></i></a>
                        <a href="#"><i class="fa fa-pinterest fa-2x"></i></a>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <!--End Contact Section -->
    <!--footer Section -->
    <div class="for-full-back " id="footer">
        2014 www.yourdomain.com | All Right Reserved

    </div>
    <!--End footer Section -->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP CORE SCRIPT   -->
    <script src="assets/plugins/bootstrap/bootstrap.js"></script>
    <!-- PARALLAX SCRIPT   -->
    <script src="assets/plugins/jquery.parallax-1.1.3.js"></script>
    <!-- CUSTOM SCRIPT   -->
    <script src="assets/scripts/custom.js"></script>
</body>
</html>
