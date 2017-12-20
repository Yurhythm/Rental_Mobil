<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <div class="modal-body">
<?php
include ('../koneksi.php');

$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$notelp=$_POST['notelp'];
$bagian=$_POST['bagian'];

if ($nama=="" OR $alamat=="" OR $notelp=="" OR $bagian=="") {
echo "Data tidak boleh ada yang kosong";
}else {

$query=mysql_query("INSERT INTO karyawan_lain(nama_karyawan_lain, alamat_karyawan_lain, no_telp, staff_bagian) VALUES('$nama', '$alamat', '$notelp', '$bagian')");
if ($query) {
  echo "Data $nama berhasil ditambahkan";
}else {
  echo "Data $nama gagal ditambahkan";
}

}
?>
</div>
</div>
</div>
