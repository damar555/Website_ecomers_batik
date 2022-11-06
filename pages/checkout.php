<?php

$sid = session_id();
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
            <li class="breadcrumb-item active">Checkout</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Checkout Start -->
<div class="cart-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-page-inner">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Gambar</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>jumlah</th>
                                    <th>Sub Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                <?php
                                $sql = mysqli_query($koneksi, "SELECT * FROM tbl_order,produk WHERE tbl_order.id_session='$sid' AND tbl_order.id_produk = produk.id_produk");
                                while ($r = mysqli_fetch_array($sql)) {
                                    $subtotal = $r['harga'] * $r['jumlah'];
                                ?>
                                    <tr>
                                        <td>
                                            <div>
                                                <a href="#"><img height="auto" width="50" src="upload/<?php echo $r['gambar']; ?>" alt="Image"></a>
                                            </div>
                                        </td>
                                        <td>
                                            <h3><a href=""><?php echo $r['nama_produk'] ?></a></h3>
                                        </td>
                                        <td>
                                            <p>Rp. <?php echo number_format($r['harga']); ?></p>
                                        </td>
                                        <td>
                                            <p><?php echo $r['jumlah']; ?></p>
                                        </td>
                                        <td>
                                            <p class="cart_total_price">Rp. <?php echo number_format($subtotal); ?></p>
                                        </td>
                                        <td>
                                            <a class="cart_quantity_delete" href="hapuschart.php?id_produk=<?php echo $r['id_produk']; ?>"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="checkout">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-inner">
                    <div class="billing-address">
                        <h2>Billing Address</h2>
                        <?php
                        $idPembeli = $_SESSION['idPembeli'];
                        $queryGetProfilmember = mysqli_query($koneksi, "SELECT * FROM tbl_Pembeli WHERE id_pembeli = '$idPembeli'");
                        $res = mysqli_fetch_array($queryGetProfilmember);
                        ?>

                        <div class="row">
                            <div class="col-md-6">
                                <label>First Name</label>
                                <input class="form-control" type="text" placeholder="First Name" name="name" value="<?php echo $res['nama']; ?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" placeholder="Mobile No" name="nomerhp" value="<?php echo $res['nomerhp']; ?>" disabled>
                            </div>
                            <div class="col-md-12">
                                <label>Address</label>
                                <input class="form-control" type="text" placeholder="Address" name="alamat" value="<?php echo $res['alamat']; ?>" disabled>
                            </div>
                            <div class="col-md-10">
                                <form action="pilihkurir.php" method="POST">
                                    <label>Pilih Kurir</label>
                                    <?php if (!empty($_SESSION['tempKurir'])) {
                                        $idkurir = $_SESSION['tempKurir'];
                                        $QueryKurir = mysqli_query($koneksi, "SELECT * FROM tbl_kurir WHERE id_kurir = '$idkurir'");
                                        $row = mysqli_fetch_assoc($QueryKurir); ?>
                                    <?php } ?>
                                    <select class="custom-select form-control" name="id_kurir">
                                        <option selected>--Pilih Kurir--</option>
                                        <?php
                                        include "lib/koneksi.php";
                                        $qKurir = mysqli_query($koneksi, "SELECT * FROM tbl_kurir");
                                        while ($kurir = mysqli_fetch_array($qKurir)) {
                                        ?>
                                            <option value="<?= $kurir['id_kurir'] ?>"><?= $kurir['nama_kurir'] ?></option>
                                        <?php } ?>
                                    </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-sm btn-primary" style="margin-top: 25px;margin-bottom: 5px; height: 45px; width: 130px;">Pilih</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="checkout-inner">
                <form action="aksicheckout.php" method="POST">
                    <div class="checkout-summary">
                        <h1>Total</h1>
                        <p class="sub-total">Sub Total<span>
                                <?php
                                $total = 0;
                                $sql = mysqli_query($koneksi, "SELECT * FROM tbl_order,produk WHERE tbl_order.id_session='$sid' AND tbl_order.id_produk = produk.id_produk");
                                while ($r = mysqli_fetch_array($sql)) {
                                    $subtotal = $r['harga'] * $r['jumlah'];
                                    $total = $total +  $subtotal;
                                ?>
                                <?php } ?>
                                Rp. <?php echo number_format($total); ?>
                            </span></p>
                        <p class="ship-cost">Biaya Kurir<span>
                                <?php
                                if (!empty($_SESSION['biaya_kirim'])) {
                                    echo "Rp. " . $_SESSION['biaya_kirim'];
                                } else {
                                    echo "belum memilih kurir / kurir ini tidak tersedia di kota anda";
                                }

                                ?>
                            </span></p>
                        <h2>Grand Total<span>
                                <?php if (!empty($_SESSION['tempKurir'])) { ?>
                                    <td><span>Rp. <?php $total_bayar = $total + $_SESSION['biaya_kirim'];
                                                    echo number_format($total_bayar); ?></span></td>
                                <?php } else { ?>
                                    <td>Rp 0</td>
                                <?php } ?>
                            </span></h2>
                    </div>
                    <input type="hidden" name="total" value="<?= $total_bayar ?>">
                    <input type="hidden" name="id_penjual" value="<?= $_SESSION['tempKurir'] ?>">
                    <div class="checkout-payment">
                        <div class="checkout-btn">
                            <button>Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Checkout End -->