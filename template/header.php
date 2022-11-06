<?php
include "lib/koneksi.php";
if(!empty($_SESSION['idPembeli'])) {
$userName = $_SESSION['username'];
$password = $_SESSION['password'];
$kueriPembeli = mysqli_query($koneksi, "SELECT * FROM tbl_pembeli WHERE username='$userName' AND password = '$password'");
$Amd = mysqli_fetch_array($kueriPembeli);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E Store - eCommerce HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="eCommerce HTML Template Free Download" name="keywords">
    <meta content="eCommerce HTML Template Free Download" name="description">

    <!-- Favicon -->
    <link href="assetuser/img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="assetuser/lib/slick/slick.css" rel="stylesheet">
    <link href="assetuser/lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assetuser/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Top bar Start -->
    <div class="top-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <i class="fa fa-envelope"></i>
                    support@email.com
                </div>
                <div class="col-sm-6">
                    <i class="fa fa-phone-alt"></i>
                    +012-345-6789
                </div>
            </div>
        </div>
    </div>
    <!-- Top bar End -->

    <!-- Nav Bar Start -->
    <div class="nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <a href="#" class="navbar-brand">MENU</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="halamanproduklist.php" class="nav-item nav-link">Products</a>
                        <a href="keranjang.php" class="nav-item nav-link">Cart</a>
                        <a href="selesai.php" class="nav-item nav-link">Checkout</a>
                        <a href="myaccount.php" class="nav-item nav-link">My Account</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More Pages</a>
                            <div class="dropdown-menu">
                                <a href="wishlist.html" class="dropdown-item">Wishlist</a>
                                <a href="login.php" class="dropdown-item">Login</a>
                                <a href="regis.php" class="dropdown-item">Register</a>
                                <a href="contact.html" class="dropdown-item">Contact Us</a>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-nav ml-auto">
                    <?php if(empty($_SESSION['idPembeli'])) { ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                            <div class="dropdown-menu">
                                <a href="login.php" class="dropdown-item">Login</a>
                                <a href="regis.php" class="dropdown-item">Register</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Toko</a>
                            <div class="dropdown-menu">
                                <a href="penjual/index.php" class="dropdown-item">Login</a>
                                <a href="penjual/formregister.php" class="dropdown-item">Register</a>
                            </div>
                        </div>
                    <?php } else if (!empty($_SESSION['idPembeli'])) { ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?php echo $Amd['nama']; ?></a>
                            <div class="dropdown-menu">
                                <a href="login.php" class="dropdown-item">Profil</a>
                                <a href="logout.php" class="dropdown-item">Logout</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Toko</a>
                            <div class="dropdown-menu">
                                <a href="penjual/index.php" class="dropdown-item">Login</a>
                                <a href="penjual/formregister.php" class="dropdown-item">Register</a>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
<?php } else { ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E Store - eCommerce HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="eCommerce HTML Template Free Download" name="keywords">
    <meta content="eCommerce HTML Template Free Download" name="description">

    <!-- Favicon -->
    <link href="assetuser/img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="assetuser/lib/slick/slick.css" rel="stylesheet">
    <link href="assetuser/lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assetuser/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Top bar Start -->
    <div class="top-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <i class="fa fa-envelope"></i>
                    support@email.com
                </div>
                <div class="col-sm-6">
                    <i class="fa fa-phone-alt"></i>
                    +012-345-6789
                </div>
            </div>
        </div>
    </div>
    <!-- Top bar End -->

    <!-- Nav Bar Start -->
    <div class="nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <a href="#" class="navbar-brand">MENU</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="halamanproduklist.php" class="nav-item nav-link">Products</a>
                        <a href="keranjang.php" class="nav-item nav-link">Cart</a>
                        <a href="selesai.php" class="nav-item nav-link">Checkout</a>
                        <a href="myaccount.php" class="nav-item nav-link">My Account</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More Pages</a>
                            <div class="dropdown-menu">
                                <a href="wishlist.html" class="dropdown-item">Wishlist</a>
                                <a href="login.php" class="dropdown-item">Login</a>
                                <a href="regis.php" class="dropdown-item">Register</a>
                                <a href="contact.html" class="dropdown-item">Contact Us</a>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-nav ml-auto">
                    <?php if(empty($_SESSION['idPembeli'])) { ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                            <div class="dropdown-menu">
                                <a href="login.php" class="dropdown-item">Login</a>
                                <a href="regis.php" class="dropdown-item">Register</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Toko</a>
                            <div class="dropdown-menu">
                                <a href="penjual/index.php" class="dropdown-item">Login</a>
                                <a href="penjual/formregister.php" class="dropdown-item">Register</a>
                            </div>
                        </div>
                    <?php } else if (!empty($_SESSION['idPembeli'])) { ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?php echo $Amd['nama']; ?></a>
                            <div class="dropdown-menu">
                                <a href="login.php" class="dropdown-item">Profil</a>
                                <a href="logout.php" class="dropdown-item">Logout</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Toko</a>
                            <div class="dropdown-menu">
                                <a href="penjual/index.php" class="dropdown-item">Login</a>
                                <a href="penjual/formregister.php" class="dropdown-item">Register</a>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
<?php } ?>
    <!-- Nav Bar End -->