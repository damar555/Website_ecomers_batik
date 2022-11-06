<!-- Main Content -->
<div class="main-content">
    <section class="section">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Manajemen Biaya Kirim</h4>
                        <div class="card-header-action">
                            <a href="adminweb.php?module=Biaya Kirim" class="btn btn-danger">Kembali ke data biaya kirim<i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="../admin/module/biayakirim/aksisimpan.php" method="POST">
                            <div class="form-group">
                                <label>Nama Kota</label>
                                <div class="col-md-12">
                                    <select class="form-control" name="idKota">
                                        <?php
                                        include "../lib/koneksi.php";
                                        $kueriKota = mysqli_query($koneksi, "SELECT * FROM tbl_kota");
                                        while ($kot = mysqli_fetch_array($kueriKota)) {
                                        ?>
                                            <option value="<?php echo $kot['id_kota']; ?>"><?php echo $kot['nama_kota']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Biaya kirim</label>
                                <div class="col-md-12">
                                <input type="text" class="form-control" name="biaya">
                            </div>
                            <div class="form-group">
                                <label>Nama Kurir</label>
                                <div class="col-md-12">
                                    <select class="form-control" name="idKurir">
                                        <?php
                                        include "../lib/koneksi.php";
                                        $kueriKurir = mysqli_query($koneksi, "SELECT * FROM tbl_kurir");
                                        while ($kur = mysqli_fetch_array($kueriKurir)) {
                                        ?>
                                            <option value="<?php echo $kur['id_kurir']; ?>"><?php echo $kur['nama_kurir']; ?></option>
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