<?php
include "../lib/config.php";
include "../lib/koneksi.php";

$idKota = $_GET['id_kota'];
$queryEdit = mysqli_query($koneksi, "SELECT * FROM tbl_kota WHERE id_kota='$idKota'");

$hasilQuery = mysqli_fetch_array($queryEdit);
$idKota = $hasilQuery['id_kota'];
$namaKota = $hasilQuery['nama_kota'];


?>
    <!-- Main Content -->
    <div class="main-content">
            <section class="section">

            <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Manajemen Edit Kota</h4>
                    <div class="card-header-action">
                        <a href="adminweb.php?module=Kota" class="btn btn-danger">Kembali ke data Kota<i class="fas fa-chevron-right"></i></a>
                    </div>
                    </div>
                    <div class="card-body">

                    <form action="../admin/module/biayakirim/kota/aksiedit.php" method="POST">
                        <div class="form-group">
                        <label>Nama Kota</label>
                        <input type="hidden" name="id_kota" value="<?= $idKota; ?>">
                        <input type="text" class="form-control" name="nama_kota"  value="<?= $namaKota; ?>">
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