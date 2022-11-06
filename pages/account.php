<?php
include "lib/koneksi.php";
if (!empty($_SESSION['idPembeli'])) {
    $userName = $_SESSION['username'];
    $password = $_SESSION['password'];
    $idPembeli = $_SESSION['idPembeli'];
    $kueriPembeli = mysqli_query($koneksi, "SELECT * FROM tbl_pembeli WHERE username='$userName' AND password = '$password'");
    $Amd = mysqli_fetch_array($kueriPembeli);
?>
    <!-- Bottom Bar Start -->
    <div class="bottom-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="index.html">
                            <img src="assetuser/img/logo.png" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="search">
                        <input type="text" placeholder="Search">
                        <button><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="user">
                        <a href="wishlist.html" class="btn wishlist">
                            <i class="fa fa-heart"></i>
                            <span>(0)</span>
                        </a>
                        <a href="cart.html" class="btn cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span>(0)</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom Bar End -->

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item active">My Account</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- My Account Start -->
    <div class="my-account">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Account Details</a>
                        <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Orders</a>
                        <a class="nav-link" href="logout.php"><i class="fa fa-sign-out-alt"></i>Logout</a>
                    </div>
                </div>
                <?php if (empty($_SESSION['idPembeli'])) { ?>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h4>Account Details</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="Nomer Hp">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder="Alamat">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder="Username">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn">Update Account</button>
                                        <br><br>
                                    </div>
                                </div>
                                <h4>Password change</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="password" placeholder="Current Password">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder="New Password">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Invoice</th>
                                                <th>Items</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            include "lib/koneksi.php";

                                            $QueryCart = mysqli_query(
                                            $koneksi,
                                            "SELECT DISTINCT dt.invoice AS invoice, dt.total AS total, dt.tanggal AS tanggal FROM tbl_detail_order dt, tbl_order o, tbl_pembeli p WHERE dt.id_order = o.id_order AND  o.id_pembeli = '$idPembeli'"
                                            );
                                            while ($row = mysqli_fetch_array($QueryCart)) {
                                                ?>
                                            <tr class="text-center">
                                                <td><a href="detail-pembelian.php?inv=<?= $row['invoice'] ?>">MyL-<?= $row['invoice'] ?></a></td>
                                                <td>
                                                <?php
                                                $invoice = $row['invoice'];
                                                $QueryItems = mysqli_query($koneksi, "SELECT * FROM tbl_detail_order do INNER JOIN tbl_order o ON do.id_order = o.id_order INNER JOIN produk p ON o.id_produk = p.id_produk WHERE do.invoice = '$invoice'");;
                                                while ($rowItems = mysqli_fetch_array($QueryItems)) {
                                                echo $rowItems['nama_produk'] . ' || ';
                                                } ?>
                                                </td>
                                                <td>Rp <?= number_format($row['total']) ?></td>
                                                <td>
                                                <?php
                                                    $invoice = $row['invoice'];
                                                    $QueryItems = mysqli_query($koneksi, "SELECT DISTINCT status_order FROM tbl_detail_order do INNER JOIN tbl_order o ON do.id_order = o.id_order INNER JOIN produk p ON o.id_produk = p.id_produk WHERE do.invoice = '$invoice'");;
                                                    $rowItems = mysqli_fetch_array($QueryItems);
                                                    if ($rowItems['status_order'] == 'P') {
                                                        $status = 'Proses';
                                                    } elseif ($rowItems['status_order'] == 'K') {
                                                        $status = 'Kirim';
                                                    } elseif ($rowItems['status_order'] == 'S') {
                                                        $status = 'Selesai';
                                                    }
                                                        echo $status;
                                                ?>
                                                </td>
                                                <td><?= $row['tanggal'] ?></td>
                                            
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else if (!empty($_SESSION['idPembeli'])) { ?>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                            <form action="aksieditprofil.php" method="POST">
                                <?php
                                $sid = session_id();
                                $idPembeli = $_SESSION['idPembeli'];
                                $queryGetProfilmember = mysqli_query($koneksi, "SELECT * FROM tbl_Pembeli WHERE id_pembeli = '$idPembeli'");
                                $res = mysqli_fetch_array($queryGetProfilmember);
                                ?>
                                <h4>Account Details</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="Nama" name="name" value="<?php echo $res['nama']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="Nomer Hp" name="nomerhp" value="<?php echo $res['nomerhp']; ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder="Alamat" name="alamat" value="<?php echo $res['alamat']; ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder="Username" name="username" value="<?php echo $res['username']; ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn" type="submit">Update Account</button>
                                        <br><br>
                                    </div>
                                </div>
                                <h4>Password change</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="password" placeholder="Current Password" name="password" value="<?php echo $res['password']; ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder="New Password" name="Newpassword">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn" type="submit">Save Changes</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            
                            <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Invoice</th>
                                                <th>Items</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            include "lib/koneksi.php";

                                            $QueryCart = mysqli_query($koneksi,"SELECT DISTINCT dt.invoice AS invoice, dt.total AS total, dt.tanggal AS tanggal FROM tbl_detail_order dt, tbl_order o, tbl_pembeli p WHERE dt.id_order = o.id_order AND o.id_pembeli = p.id_pembeli AND dt.id_pembeli = '$idPembeli'"
                                            );
                                            while ($row = mysqli_fetch_array($QueryCart)) {
                                                ?>
                                            <tr class="text-center">
                                                <td><a href="detail-pembelian.php?inv=<?= $row['invoice'] ?>">MyL-<?= $row['invoice'] ?></a></td>
                                                <td>
                                                <?php
                                                $invoice = $row['invoice'];
                                                $QueryItems = mysqli_query($koneksi, "SELECT * FROM tbl_detail_order do INNER JOIN tbl_order o ON do.id_order = o.id_order INNER JOIN produk p ON o.id_produk = p.id_produk WHERE do.invoice = '$invoice'");;
                                                while ($rowItems = mysqli_fetch_array($QueryItems)) {
                                                echo $rowItems['nama_produk'] . ' || ';
                                                } ?>
                                                </td>
                                                <td>Rp <?= number_format($row['total']) ?></td>
                                                <td>
                                                <?php
                                                    $invoice = $row['invoice'];
                                                    $QueryItems = mysqli_query($koneksi, "SELECT DISTINCT status_order FROM tbl_detail_order do INNER JOIN tbl_order o ON do.id_order = o.id_order INNER JOIN produk p ON o.id_produk = p.id_produk WHERE do.invoice = '$invoice'");;
                                                    $rowItems = mysqli_fetch_array($QueryItems);
                                                    if ($rowItems['status_order'] == 'P') {
                                                        $status = 'Proses';
                                                    } elseif ($rowItems['status_order'] == 'K') {
                                                        $status = 'Kirim';
                                                    } elseif ($rowItems['status_order'] == 'S') {
                                                        $status = 'Selesai';
                                                    }
                                                        echo $status;
                                                ?>
                                                </td>
                                                <td><?= $row['tanggal'] ?></td>
                                            
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- My Account End -->
<?php } else { ?>
    <!-- Bottom Bar Start -->
    <div class="bottom-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="index.html">
                            <img src="assetuser/img/logo.png" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="search">
                        <input type="text" placeholder="Search">
                        <button><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="user">
                        <a href="wishlist.html" class="btn wishlist">
                            <i class="fa fa-heart"></i>
                            <span>(0)</span>
                        </a>
                        <a href="cart.html" class="btn cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span>(0)</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom Bar End -->

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item active">My Account</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- My Account Start -->
    <div class="my-account">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Account Details </a>
                        <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Orders</a>
                    </div>
                </div>
                <?php if (empty($_SESSION['idPembeli'])) { ?>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h4>Account Details</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="Nomer Hp">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder="Alamat">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder="Username">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn">Update Account</button>
                                        <br><br>
                                    </div>
                                </div>
                                <h4>Password change</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="password" placeholder="Current Password">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder="New Password">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Product</th>
                                                <th>Date</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Product Name</td>
                                                <td>01 Jan 2020</td>
                                                <td>$99</td>
                                                <td>Approved</td>
                                                <td><button class="btn">View</button></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Product Name</td>
                                                <td>01 Jan 2020</td>
                                                <td>$99</td>
                                                <td>Approved</td>
                                                <td><button class="btn">View</button></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Product Name</td>
                                                <td>01 Jan 2020</td>
                                                <td>$99</td>
                                                <td>Approved</td>
                                                <td><button class="btn">View</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else if (!empty($_SESSION['idPembeli'])) { ?>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                            <form action="aksieditprofil.php" method="POST">
                                <?php
                                $sid = session_id();
                                $idPembeli = $_SESSION['idPembeli'];
                                $queryGetProfilmember = mysqli_query($koneksi, "SELECT * FROM tbl_Pembeli WHERE id_pembeli = '$idPembeli'");
                                $res = mysqli_fetch_array($queryGetProfilmember);
                                ?>
                                <h4>Account Details</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="Nama" name="name" value="<?php echo $res['nama']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="Nomer Hp" name="nomerhp" value="<?php echo $res['nomerhp']; ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder="Alamat" name="alamat" value="<?php echo $res['alamat']; ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder="Username" name="username" value="<?php echo $res['username']; ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn" type="submit">Update Account</button>
                                        <br><br>
                                    </div>
                                </div>
                                <h4>Password change</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="password" placeholder="Current Password" name="password" value="<?php echo $res['password']; ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder="New Password" name="Newpassword">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn" type="submit">Save Changes</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            
                            <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Product</th>
                                                <th>Date</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Product Name</td>
                                                <td>01 Jan 2020</td>
                                                <td>$99</td>
                                                <td>Approved</td>
                                                <td><button class="btn">View</button></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Product Name</td>
                                                <td>01 Jan 2020</td>
                                                <td>$99</td>
                                                <td>Approved</td>
                                                <td><button class="btn">View</button></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Product Name</td>
                                                <td>01 Jan 2020</td>
                                                <td>$99</td>
                                                <td>Approved</td>
                                                <td><button class="btn">View</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- My Account End -->
<?php } ?>