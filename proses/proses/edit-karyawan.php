<?php
include ('../../koneksi.php');

  $id=$_POST['id'];
  $nama=$_POST['nama'];
  $alamat=$_POST['alamat'];
  $telp=$_POST['telp'];
  $level=$_POST['level'];


if ($_FILES["image"]["name"]=='') {

if ($level=='') {
  mysql_query("UPDATE karyawan SET nama_karyawan='$nama', alamat='$alamat', no_telp='$telp' where id_karyawan='$id'");
}else {
  mysql_query("UPDATE karyawan SET level='$level', nama_karyawan='$nama', alamat='$alamat', no_telp='$telp' where id_karyawan='$id'");
}
header('Location:../../karyawan.php?data-karyawan');

}else {

  $newfilename = $_FILES["image"]["name"].'.'.rand(1,99999).'.'.rand(1,99999).'.'.rand(1,99999) . '.' . end(explode(".",$_FILES["image"]["name"]));
  $file_tmp = $_FILES['image']['tmp_name'];
  $f_type=$_FILES['image']['type'];
  if ($f_type== "image/gif" OR $f_type== "image/png" OR $f_type== "image/jpeg" OR $f_type== "image/JPEG" OR $f_type== "image/PNG" OR $f_type== "image/GIF"){
    move_uploaded_file($file_tmp,"../img/".$newfilename);

if ($level=='') {
  mysql_query("UPDATE karyawan SET gambar='$newfilename', nama_karyawan='$nama', alamat='$alamat', no_telp='$telp' where id_karyawan='$id'");
}else {
  mysql_query("UPDATE karyawan SET level='$level', gambar='$newfilename', nama_karyawan='$nama', alamat='$alamat', no_telp='$telp' where id_karyawan='$id'");
}

    header('Location:../../karyawan.php?data-karyawan');
  }else {
    ?>
    <script type="text/javascript">
      alert('Harap pilih file jpeg / png / gif');
      window.location="../../karyawan.php?data-karyawan";
    </script>
    <?php
  }

}
