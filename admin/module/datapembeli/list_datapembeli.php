<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Manajemen Pembeli</h4>
                        <div class="card-header-action">
                            <a href="adminweb.php?module=tambah_pembeli" class="btn btn-primary">Tambah Pembeli<i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>Id Pembeli</th>
                                    <th>Nama Pembeli</th>
                                    <th>Alamat</th>
                                    <th>Nomer Telepon</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                include "../lib/config.php";
                                include "../lib/koneksi.php";
                                $kueriPembeli = mysqli_query($koneksi, "SELECT * FROM tbl_pembeli");
                                while ($Pbl = mysqli_fetch_array($kueriPembeli)) {
                                ?>
                                    <tr>
                                        <td><?= $Pbl['id_pembeli']; ?></td>
                                        <td><?= $Pbl['nama']; ?></td>
                                        <td><?= $Pbl['alamat']; ?></td>
                                        <td><?= $Pbl['nomerhp']; ?></td>
                                        <td><?= $Pbl['username']; ?></td>
                                        <td><?= $Pbl['password']; ?></td>
                                        <td>
                                            <div class="btn-group">

                                                <a href="<?= $admin_url; ?>adminweb.php?module=edit_pembeli&id_pembeli=<?= $Pbl['id_pembeli']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="<?= $admin_url; ?>module/datapembeli/aksihapus.php?&id_pembeli=<?= $Pbl['id_pembeli']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fa fa-power-off"></i></a>
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