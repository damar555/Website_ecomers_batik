<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Manajemen Kota</h4>
                        <div class="card-header-action">
                            <a href="adminweb.php?module=tambah_kota" class="btn btn-primary">Tambah Kota<i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>Id Kategori</th>
                                    <th>Nama Kategori</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                include "../lib/config.php";
                                include "../lib/koneksi.php";
                                $kueriKategori = mysqli_query($koneksi, "SELECT * FROM tbl_kota");
                                while ($Kota = mysqli_fetch_array($kueriKategori)) {
                                ?>
                                    <tr>
                                        <td><?= $Kota['id_kota']; ?></td>
                                        <td><?= $Kota['nama_kota']; ?></td>
                                        <td>
                                            <div class="btn-group">

                                                <a href="<?= $admin_url; ?>adminweb.php?module=edit_kota&id_kota=<?= $Kota['id_kota']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="<?= $admin_url; ?>module/biayakirim/kota/aksihapus.php?&id_kota=<?= $Kota['id_kota']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fa fa-power-off"></i></a>
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