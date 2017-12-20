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

if ($nama=="" OR $alamat=="" OR $notelp=="") {
echo "Data tidak boleh ada yang kosong";
}else {

$query=mysql_query("INSERT INTO supir(nama_supir, alamat_supir, telp_supir, status) VALUES('$nama', '$alamat', '$notelp', 'ready')");
if ($query) {
  echo "Data $nama berhasil ditambahkan";
}else {
  echo "Data $nama gagal ditambahkan, kemungkinan username sudah digunakan";
}

}
?>
</div>
</div>
</div>
