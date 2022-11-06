<?php
include "../lib/config.php";
include "../lib/koneksi.php";

$idPembeli = $_GET['id_pembeli'];
$queryEdit = mysqli_query($koneksi, "SELECT * FROM tbl_pembeli WHERE id_pembeli='$idPembeli'");

$hasilQuery = mysqli_fetch_array($queryEdit);
$idPembeli = $hasilQuery['id_pembeli'];
$namaPembeli = $hasilQuery['nama'];
$alamat = $hasilQuery['alamat'];
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
                    <h4>Manajemen Edit Admin</h4>
                    <div class="card-header-action">
                        <a href="adminweb.php?module=Data Pembeli" class="btn btn-danger">Kembali ke data Admin<i class="fas fa-chevron-right"></i></a>
                    </div>
                    </div>
                    <div class="card-body">

                    <form action="../admin/module/datapembeli/aksiedit.php" method="POST">
                        <div class="form-group">
                        <label>Nama Pembeli</label>
                        <input type="hidden" name="id_pembeli" value="<?= $idPembeli; ?>">
                        <input type="text" class="form-control" name="nama"  value="<?= $namaPembeli; ?>">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat"  value="<?= $alamat; ?>">
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