<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>Manajemen Penjual</h4>
                  <div class="card-header-action">
                    <a href="adminweb.php?module=tambah_penjual" class="btn btn-primary">Tambah Penjual<i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>Id Penjual</th>
                        <th>Nama Penjual</th>
                        <th>Alamat</th>
                        <th>Nomer Telepon</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Action</th>
                      </tr>
                      <?php
                      include "../lib/config.php";
                      include "../lib/koneksi.php";
                            $kueriPenjual = mysqli_query($koneksi, "SELECT * FROM tbl_penjual");
                            while($Pjl=mysqli_fetch_array($kueriPenjual)){
                      ?>
                      <tr>
                        <td><?= $Pjl['id_penjual']; ?></td>
                        <td><?= $Pjl['nama_penjual']; ?></td>
                        <td><?= $Pjl['alamat_penjual']; ?></td>
                        <td><?= $Pjl['nomerhp']; ?></td>
                        <td><?= $Pjl['username']; ?></td>
                        <td><?= $Pjl['password']; ?></td>
                        <td>
                        <div class="btn-group">

                          <a href="<?= $admin_url; ?>adminweb.php?module=edit_penjual&id_penjual=<?= $Pjl['id_penjual']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                          <a href="<?= $admin_url; ?>module/datapenjual/aksihapus.php?&id_penjual=<?= $Pjl['id_penjual']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fa fa-power-off"></i></a>
                        </div>
                        </td>
                      </tr>
                      <?php
                      }
                      ?>
                
                    </table>
                  </div>
                  </div>
                </div>
                </div>
              </div>
            </section>
            </div>