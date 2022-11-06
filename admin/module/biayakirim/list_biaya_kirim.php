<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Manajemen Biaya Kirirm</h4>
                        <div class="card-header-action">
                            <a href="adminweb.php?module=tambah_biaya_kirim" class="btn btn-primary">Tambah Biaya Kirirm<i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>Id Biaya Kirim</th>
                                    <th>Nama Kota</th>
                                    <th>Biaya</th>
                                    <th>Nama Kurir</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                include "../lib/config.php";
                                include "../lib/koneksi.php";
                                $kueriKategori = mysqli_query($koneksi, "SELECT bi.id_biaya_kirim AS biayaKirim, ko.nama_kota AS namaKota, bi.biaya AS biaya, ku.nama_kurir AS namaKurir FROM tbl_biaya_kirim bi, tbl_kota ko, tbl_kurir ku WHERE bi.id_biaya_kirim = bi.id_biaya_kirim AND ko.id_kota = bi.id_kota AND ku.id_kurir = bi.id_kurir");
                                while ($Byi = mysqli_fetch_array($kueriKategori)) {
                                ?>
                                    <tr>
                                        <td><?= $Byi['biayaKirim']; ?></td>
                                        <td><?= $Byi['namaKota']; ?></td>
                                        <td><?= $Byi['biaya']; ?></td>
                                        <td><?= $Byi['namaKurir']; ?></td>
                                        <td>
                                            <div class="btn-group">

                                                <a href="<?= $admin_url; ?>adminweb.php?module=edit_biaya_kirim&id_biaya_kirim=<?= $Byi['biayaKirim']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="<?= $admin_url; ?>module/biayakirim/kota/aksihapus.php?&id_kota=<?= $Byi['id_kota']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fa fa-power-off"></i></a>
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