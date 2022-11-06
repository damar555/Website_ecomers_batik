<?php
include "../lib/config.php";
include "../lib/koneksi.php";

$biayaKirim = $_GET['id_biaya_kirim'];
$queryEdit = mysqli_query($koneksi, "SELECT * FROM tbl_biaya_kirim WHERE id_biaya_kirim='$biayaKirim'");

$hasilQuery = mysqli_fetch_array($queryEdit);
$biayaKirim = $hasilQuery['id_biaya_kirim'];
$idKota = $hasilQuery['id_kota'];
$idKurir = $hasilQuery['id_kurir'];
$Biaya = $hasilQuery['biaya'];

?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Manajemen Edit Biaya Kirim</h4>
                        <div class="card-header-action">
                            <a href="adminweb.php?module=Biaya Kirim" class="btn btn-danger">Kembali ke data Biaya Kirim<i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="../admin/module/biayakirim/aksiedit.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_biaya_kirim" value="<?= $biayaKirim; ?>">
                            <div class="form-group">
                                <label>Nama Kota</label>
                                <div class="col-md-12">
                                    <select class="form-control" name="idKota">
                                        <?php
                                        include "../lib/koneksi.php";
                                        $kueriKota = mysqli_query($koneksi, "SELECT * FROM tbl_kota");
                                        while ($kot = mysqli_fetch_array($kueriKota)) {
                                            if ($idKota==$kot['id_kota']) {
                                                $select = "selected";
                                            } else {
                                                $select = "";
                                            }
                                        ?>
                                        <option value="<?php echo $kot['id_kota'];?>"<?php echo $select; ?>><?php echo $kot['nama_kota'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Biaya</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="biaya" value="<?= $Biaya;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Kurir</label>
                                <div class="col-md-12">
                                    <select class="form-control" name="idKurir">
                                        <?php
                                        include "../lib/koneksi.php";
                                        $kueriKurir = mysqli_query($koneksi, "SELECT * FROM tbl_kurir");
                                        while ($kur = mysqli_fetch_array($kueriKurir)) {
                                            if ($idKurir==$kur['id_kurir']) {
                                                $select = "selected";
                                            } else {
                                                $select = "";
                                            }
                                        ?>
                                            <option value="<?php echo $kur['id_kurir']; ?>"<?php echo $select; ?>><?php echo $kur['nama_kurir']; ?></option>
                                        <?php } ?>
                                    </select>
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