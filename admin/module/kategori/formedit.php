<?php
include "../lib/config.php";
include "../lib/koneksi.php";

$idKategori = $_GET['id_kategori'];
$queryEdit = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$idKategori'");

$hasilQuery = mysqli_fetch_array($queryEdit);
$idKategori = $hasilQuery['id_kategori'];
$namaKategori = $hasilQuery['nama_kategori'];


?>
    <!-- Main Content -->
    <div class="main-content">
            <section class="section">

            <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Manajemen Edit Kategori</h4>
                    <div class="card-header-action">
                        <a href="adminweb.php?module=Kategori" class="btn btn-danger">Kembali ke data Kategori<i class="fas fa-chevron-right"></i></a>
                    </div>
                    </div>
                    <div class="card-body">

                    <form action="../admin/module/kategori/aksiedit.php" method="POST">
                        <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="hidden" name="id_kategori" value="<?= $idKategori; ?>">
                        <input type="text" class="form-control" name="nama_kategori"  value="<?= $namaKategori; ?>">
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