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
            <li class="breadcrumb-item active">Cart</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Cart Start -->
<div class="cart-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
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
            <div class="col-lg-4">
                <div class="cart-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="coupon">
                                <input type="text" placeholder="Coupon Code">
                                <button>Apply Code</button>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="cart-summary">
                                <div class="cart-content">
                                <form action="selesai.php" method="POST">
                                <h1>Total Belanja</h1>
                                <h2>Grand Total<span>
                                    <?php
                                    $total = 0;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_order,produk WHERE tbl_order.id_session='$sid' AND tbl_order.id_produk = produk.id_produk");
                                    while ($r = mysqli_fetch_array($sql)) {
                                        $subtotal = $r['harga'] * $r['jumlah'];
                                        $total = $total +  $subtotal;
                                    ?>
                                    <?php } ?>
                                    Rp. <?php echo number_format($total); ?>
                                    </span></h2>
                                    </div>
                                <div class="cart-btn">
                                    <button>Update Cart</button>
                                    <button type="submit">Checkout</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->