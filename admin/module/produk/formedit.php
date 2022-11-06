<?php
include "../lib/config.php";
include "../lib/koneksi.php";

$idProduk = $_GET['id_produk'];
$queryEdit = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$idProduk'");

$hasilQuery = mysqli_fetch_array($queryEdit);
$idProduk = $hasilQuery['id_produk'];
$idKategori = $hasilQuery['id_kategori'];
$idPenjual = $hasilQuery['id_penjual'];
$namaProduk = $hasilQuery['nama_produk'];
$Deskripsi = $hasilQuery['deskripsi'];
$hargaProduk = $hasilQuery['harga'];
$Gambar = $hasilQuery['gambar'];
$Slide = $hasilQuery['slide'];


?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Manajemen Edit Produk</h4>
                        <div class="card-header-action">
                            <a href="adminweb.php?module=Produk" class="btn btn-danger">Kembali ke data Produk<i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="../admin/module/produk/aksiedit.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_produk" value="<?= $idProduk; ?>">
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="nama_produk" value="<?= $namaProduk;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <div class="col-md-12">
                                    <select class="form-control" name="idKategori">
                                        <?php
                                        include "../lib/koneksi.php";
                                        $kueriKategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                                        while ($kat = mysqli_fetch_array($kueriKategori)) {
                                            if ($idKategori==$kat['id_kategori']) {
                                                $select = "selected";
                                            } else {
                                                $select = "";
                                            }
                                        ?>
                                        <option value="<?php echo $kat['id_kategori'];?>"<?php echo $select; ?>><?php echo $kat['nama_kategori'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Penjual</label>
                                <div class="col-md-12">
                                    <select class="form-control" name="idPenjual">
                                        <?php
                                        include "../lib/koneksi.php";
                                        $kueriPenjual = mysqli_query($koneksi, "SELECT * FROM tbl_penjual");
                                        while ($pen = mysqli_fetch_array($kueriPenjual)) {
                                            if ($idPenjual==$pen['id_penjual']) {
                                                $select = "selected";
                                            } else {
                                                $select = "";
                                            }
                                        ?>
                                            <option value="<?php echo $pen['id_penjual']; ?>"<?php echo $select; ?>><?php echo $pen['nama_penjual']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <div class="col-md-12">
                                    <input type="file" id="gambar" name="gambar" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="harga" value="<?= $hargaProduk;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="deskripsi" value="<?= $Deskripsi;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Slide</label>
                                <div class="col-md-12">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="slide" id="slide" value="Y"<?php echo ($Slide== 'Y') ?  "checked" : "" ;  ?>>
                                            Ya
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="slide" id="slide" value="N" <?php echo ($Slide== 'N') ?  "checked" : "" ;  ?>>
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
</div>