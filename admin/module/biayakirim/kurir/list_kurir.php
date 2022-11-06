<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Manajemen Kurir</h4>
                        <div class="card-header-action">
                            <a href="adminweb.php?module=tambah_kurir" class="btn btn-primary">Tambah Kurir<i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>Id Kurir</th>
                                    <th>Nama Kurir</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                include "../lib/config.php";
                                include "../lib/koneksi.php";
                                $kueriKategori = mysqli_query($koneksi, "SELECT * FROM tbl_kurir");
                                while ($Kurir = mysqli_fetch_array($kueriKategori)) {
                                ?>
                                    <tr>
                                        <td><?= $Kurir['id_kurir']; ?></td>
                                        <td><?= $Kurir['nama_kurir']; ?></td>
                                        <td>
                                            <div class="btn-group">

                                                <a href="<?= $admin_url; ?>adminweb.php?module=edit_kurir&id_kurir=<?= $Kurir['id_kurir']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="<?= $admin_url; ?>module/biayakirim/kurir/aksihapus.php?&id_kurir=<?= $Kurir['id_kurir']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fa fa-power-off"></i></a>
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