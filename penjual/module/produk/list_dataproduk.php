<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Manajemen Produk</h4>
                        <div class="card-header-action">
                            <a href="penjualweb.php?module=tambah_produk" class="btn btn-primary">Tambah Produk<i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>Id Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori</th>
                                    <th>Nama Penjual</th>
                                    <th>Gambar</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                include "../lib/config.php";
                                include "../lib/koneksi.php";
                                $idPenjual = $_SESSION['idPenjual'];
                                $kueriProduk = mysqli_query($koneksi, "SELECT DISTINCT p.id_produk AS idProduk, p.nama_produk AS namaProduk, k.nama_kategori AS namaKategori, j.nama_penjual AS namaPenjual, p.gambar AS Gambar, p.harga AS Harga, p.deskripsi AS deskripsi, p.slide AS slide FROM produk p, kategori k, tbl_penjual j WHERE p.id_produk = p.id_produk AND k.id_kategori = p.id_kategori AND p.id_penjual = '$idPenjual' AND j.id_penjual = '$idPenjual' ");
                                while ($pro = mysqli_fetch_array($kueriProduk)) {
                                ?>
                                    <tr>
                                        <td><?= $pro['idProduk']; ?></td>
                                        <td><?= $pro['namaProduk']; ?></td>
                                        <td><?= $pro['namaKategori']; ?></td>
                                        <td><?= $pro['namaPenjual']; ?></td>
                                        <td><img src="../upload/<?php echo $pro['Gambar']; ?>" height="80" width="120"></td>
                                        <td>Rp.<?= number_format($pro['Harga']); ?>,-</td>
                                        <td><?= $pro['deskripsi']; ?></td>
                                        <td>
                                            <div class="btn-group">

                                                <a href="<?= $admin_url; ?>adminweb.php?module=edit_produk&id_produk=<?= $pro['idProduk']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="<?= $admin_url; ?>module/produk/aksihapus.php?&id_produk=<?= $pro['idProduk']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fa fa-power-off"></i></a>
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