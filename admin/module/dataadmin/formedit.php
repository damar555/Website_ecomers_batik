<?php
include "../lib/config.php";
include "../lib/koneksi.php";

$idAdmin = $_GET['id_admin'];
$queryEdit = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE id_admin='$idAdmin'");

$hasilQuery = mysqli_fetch_array($queryEdit);
$idAdmin = $hasilQuery['id_admin'];
$namaAdmin = $hasilQuery['nama'];
$username = $hasilQuery['username'];
$Password = $hasilQuery['password'];
$level = $hasilQuery['level'];


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
                        <a href="adminweb.php?module=Data Admin" class="btn btn-danger">Kembali ke data Admin<i class="fas fa-chevron-right"></i></a>
                    </div>
                    </div>
                    <div class="card-body">

                    <form action="../admin/module/dataadmin/aksiedit.php" method="POST">
                        <div class="form-group">
                        <label>Nama Admin</label>
                        <input type="hidden" name="id_admin" value="<?= $idAdmin; ?>">
                        <input type="text" class="form-control" name="nama"  value="<?= $namaAdmin; ?>">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username"  value="<?= $username; ?>">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password"  value="<?= $Password; ?>">
                        <label>Level</label>
                        <input type="text" class="form-control" name="level"  value="<?= $level; ?>">
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