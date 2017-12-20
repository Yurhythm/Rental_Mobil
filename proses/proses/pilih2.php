<form class="form-karyawan2"  method="post">
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
                      <label>Staff Bagian</label>
                      <select class="form-control" name="bagian">
                        <option>Sales</option>
                        <option>Service</option>
                        <option>Pencuci Mobil</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <!-- <input onclick="tambah()" type="submit" class="btn btn-primary" value=" Tambah"> -->
                      <a onclick="tambah2()" class="btn btn-primary">Tambah</a>
                      <button type="reset" class="btn btn-warning">Reset</button>
                  </div>
                </form>
