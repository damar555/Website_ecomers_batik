<?php
include "../lib/config.php";
include "../lib/koneksi.php";

$idPenjual = $_GET['id_penjual'];
$queryEdit = mysqli_query($koneksi, "SELECT * FROM tbl_penjual WHERE id_penjual='$idPenjual'");

$hasilQuery = mysqli_fetch_array($queryEdit);
$idPenjual = $hasilQuery['id_penjual'];
$namaPenjual = $hasilQuery['nama_penjual'];
$alamat = $hasilQuery['alamat_penjual'];
$nomerhp = $hasilQuery['nomerhp'];
$username = $hasilQuery['username'];
$Password = $hasilQuery['password'];


?>
    <!-- Main Content -->
    <div class="main-content">
            <section class="section">

            <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Manajemen Edit penjual</h4>
                    <div class="card-header-action">
                        <a href="adminweb.php?module=Data Penjual" class="btn btn-danger">Kembali ke data penjual<i class="fas fa-chevron-right"></i></a>
                    </div>
                    </div>
                    <div class="card-body">

                    <form action="../admin/module/datapenjual/aksiedit.php" method="POST">
                        <div class="form-group">
                        <label>Nama penjual</label>
                        <input type="hidden" name="id_penjual" value="<?= $idPenjual; ?>">
                        <input type="text" class="form-control" name="nama_penjual"  value="<?= $namaPenjual; ?>">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat_penjual"  value="<?= $alamat; ?>">
                        <label>Nomer Telepon</label>
                        <input type="text" class="form-control" name="nomerhp"  value="<?= $nomerhp; ?>">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username"  value="<?= $username; ?>">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password"  value="<?= $Password; ?>">
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