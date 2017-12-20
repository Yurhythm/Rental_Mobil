<?php
$level=$_GET['data'];
?>
<form class="form-karyawan"  method="post">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input required name="username" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input required name="pass" type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Karyawan</label>
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
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select class="form-control" name="level">
                                        <?php
                                        if ($level=="superadmin") {
                                        ?>
                                        <option value="1">Admin</option>
                                        <option value="2">Karyawan</option>
                                        <?php
                                        }elseif ($level=="admin") {
                                        ?>
                                        <option value="2">Karyawan</option>
                                        <?php
                                        }
                                        ?>
                                        </select>
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
