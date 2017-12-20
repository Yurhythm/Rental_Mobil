<?php
include ('../../koneksi.php');

  $id=$_POST['id'];
  $nopol=$_POST['nopol'];
  $noka=$_POST['noka'];
  $nosin=$_POST['nosin'];
  $jenis=$_POST['jenis'];
  $merk=$_POST['merk'];
  $warna=$_POST['warna'];
  $spesifikasi=$_POST['spesifikasi'];
  $harga=$_POST['harga'];

  if ($_FILES["image"]["name"]=='') {

    mysql_query("UPDATE mobil SET nopol='$nopol', noka='$noka', nosin='$nosin', jenis='$jenis', merk='$merk', warna='$warna', spesifikasi='$spesifikasi', harga='$harga' where nopol='$id'");

    header('Location:../../mobil.php?data-mobil');

  }else {

    $newfilename = $_FILES["image"]["name"].'.'.rand(1,99999).'.'.rand(1,99999).'.'.rand(1,99999) . '.' . end(explode(".",$_FILES["image"]["name"]));
    $file_tmp = $_FILES['image']['tmp_name'];
    $f_type=$_FILES['image']['type'];
    if ($f_type== "image/gif" OR $f_type== "image/png" OR $f_type== "image/jpeg" OR $f_type== "image/JPEG" OR $f_type== "image/PNG" OR $f_type== "image/GIF"){
      move_uploaded_file($file_tmp,"../img/".$newfilename);

      mysql_query("UPDATE mobil SET nopol='$nopol', gmbrmobil='$newfilename', noka='$noka', nosin='$nosin', jenis='$jenis', merk='$merk', warna='$warna', spesifikasi='$spesifikasi', harga='$harga' where nopol='$id'");

      header('Location:../../mobil.php?data-mobil');
    }else {
      ?>
      <script type="text/javascript">
        alert('Harap pilih file jpeg / png / gif');
        window.location="../../karyawan.php?data-karyawan-lain";
      </script>
      <?php
    }

  }
