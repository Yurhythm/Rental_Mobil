<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <div class="modal-body">
<?php
include ('../koneksi.php');

$user=$_POST['username'];
$pass=$_POST['pass'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$notelp=$_POST['notelp'];
$level=$_POST['level'];

if ($user=="" OR $pass=="" OR $nama=="" OR $alamat=="" OR $notelp=="" OR $level=="") {
echo "Data tidak boleh ada yang kosong";
}else {

$query=mysql_query("INSERT INTO karyawan(username, password, nama_karyawan, alamat, no_telp, level) VALUES('$user', '$pass', '$nama', '$alamat', '$notelp', '$level')");
if ($query) {
  echo "Data $user berhasil ditambahkan";
}else {
  echo "Data $user gagal ditambahkan, kemungkinan username sudah digunakan";
}

}
?>
</div>
</div>
</div>
