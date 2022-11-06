<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Manajemen Kategori</h4>
                        <div class="card-header-action">
                            <a href="adminweb.php?module=tambah_kategori" class="btn btn-primary">Tambah Kategori<i class="fas fa-chevron-right"></i></a>
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
                                $kueriKategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                                while ($Ktg = mysqli_fetch_array($kueriKategori)) {
                                ?>
                                    <tr>
                                        <td><?= $Ktg['id_kategori']; ?></td>
                                        <td><?= $Ktg['nama_kategori']; ?></td>
                                        <td>
                                            <div class="btn-group">

                                                <a href="<?= $admin_url; ?>adminweb.php?module=edit_kategori&id_kategori=<?= $Ktg['id_kategori']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="<?= $admin_url; ?>module/kategori/aksihapus.php?&id_kategori=<?= $Ktg['id_kategori']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fa fa-power-off"></i></a>
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