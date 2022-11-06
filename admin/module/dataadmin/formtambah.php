
    <!-- Main Content -->
    <div class="main-content">
            <section class="section">

            <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Manajemen Data Admin</h4>
                    <div class="card-header-action">
                        <a href="adminweb.php?module=Data Admin" class="btn btn-danger">Kembali ke data Admin<i class="fas fa-chevron-right"></i></a>
                    </div>
                    </div>
                    <div class="card-body">

                    <form action="../admin/module/dataadmin/aksisimpan.php" method="POST">
                        <div class="form-group">
                        <label>Nama admin</label>
                        <input type="text" class="form-control" name="nama">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username">
                        <label>Password</label>
                        <input type="text" class="form-control" name="Password">
                        <label>Level</label>
                        <input type="text" class="form-control" name="level">
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