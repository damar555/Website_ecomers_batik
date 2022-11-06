<?php
include "../lib/config.php";
include "../lib/koneksi.php";

$idKurir = $_GET['id_kurir'];
$queryEdit = mysqli_query($koneksi, "SELECT * FROM tbl_kurir WHERE id_kurir='$idKurir'");

$hasilQuery = mysqli_fetch_array($queryEdit);
$idKurir = $hasilQuery['id_kurir'];
$namaKurir = $hasilQuery['nama_kurir'];


?>
    <!-- Main Content -->
    <div class="main-content">
            <section class="section">

            <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Manajemen Edit Kurir</h4>
                    <div class="card-header-action">
                        <a href="adminweb.php?module=Kurir" class="btn btn-danger">Kembali ke data Kurir<i class="fas fa-chevron-right"></i></a>
                    </div>
                    </div>
                    <div class="card-body">

                    <form action="../admin/module/biayakirim/kurir/aksiedit.php" method="POST">
                        <div class="form-group">
                        <label>Nama kurir</label>
                        <input type="hidden" name="id_kurir" value="<?= $idKurir; ?>">
                        <input type="text" class="form-control" name="nama_kurir"  value="<?= $namaKurir; ?>">
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