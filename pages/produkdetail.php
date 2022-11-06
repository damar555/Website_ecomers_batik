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
                    <li class="breadcrumb-item active">Product Detail</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Product Detail Start -->
        <div class="product-detail">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <?php
                        $id_pro = $_GET['id_produk'];
                        $q = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk ='$id_pro' ");
                        while ($r = mysqli_fetch_array($q)) {
                        ?>
                            <div class="product-detail-top">
                                <div class="row align-items-center">
                                    <div class="col-md-5">
                                        <div class="product-slider-single normal-slider">
                                            <img src="upload/<?php echo $r['gambar'] ?> " alt="" style="height: 500px; " />
                                            <img src="upload/<?php echo $r['gambar'] ?> " alt="" style="height: 500px; " />
                                            <img src="upload/<?php echo $r['gambar'] ?> " alt="" style="height: 500px; " />
                                            <img src="upload/<?php echo $r['gambar'] ?> " alt="" style="height: 500px; " />
                                            <img src="upload/<?php echo $r['gambar'] ?> " alt="" style="height: 500px; " />
                                            <img src="upload/<?php echo $r['gambar'] ?> " alt="" style="height: 500px; " />
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="product-content">
                                            <div class="title">
                                                <h2><?php echo $r['nama_produk'] ?></h2>
                                            </div>
                                            <div class="price">
                                                <h4>Harga:</h4>
                                                <p>Rp.<?php echo number_format($r['harga']) ?>,-</p>
                                            </div>
                                            <div class="quantity">
                                                <h4>Quantity:</h4>
                                                <div class="qty">
                                                    <input type="text" value="1">
                                                </div>
                                            </div>
                                            <div class="action">
                                                <a class="btn" href="aksikeranjang.php?id_produk=<?php echo $r['id_produk']; ?>&harga=<?php echo $r['harga'];?>"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php } ?>

                        <?php
                        $id_pro = $_GET['id_produk'];
                        $q = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk ='$id_pro' ");
                        while ($r = mysqli_fetch_array($q)) {
                        ?>
                            <div class="row product-detail-bottom">
                                <div class="col-lg-12">
                                    <ul class="nav nav-pills nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#specification">Specification</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#reviews">Reviews (1)</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="description" class="container tab-pane active">
                                            <h4>Product description</h4>
                                            <p>
                                            <?php echo $r['deskripsi'] ?> 
                                            </p>
                                        </div>
                                        <div id="specification" class="container tab-pane fade">
                                            <h4>Product specification</h4>
                                            <ul>
                                                <li>Lorem ipsum dolor sit amet</li>
                                                <li>Lorem ipsum dolor sit amet</li>
                                                <li>Lorem ipsum dolor sit amet</li>
                                                <li>Lorem ipsum dolor sit amet</li>
                                                <li>Lorem ipsum dolor sit amet</li>
                                            </ul>
                                        </div>
                                        <div id="reviews" class="container tab-pane fade">
                                            <div class="reviews-submitted">
                                                <div class="reviewer">Phasellus Gravida - <span>01 Jan 2020</span></div>
                                                <div class="ratting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p>
                                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
                                                </p>
                                            </div>
                                            <div class="reviews-submit">
                                                <h4>Give your Review:</h4>
                                                <div class="ratting">
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="row form">
                                                    <div class="col-sm-6">
                                                        <input type="text" placeholder="Name">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="email" placeholder="Email">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <textarea placeholder="Review"></textarea>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <button>Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="product">
                            <div class="section-header">
                                <h1>Related Products</h1>
                            </div>

                            <div class="row align-items-center product-slider product-slider-3">
                                <?php
                                $q = mysqli_query($koneksi, "SELECT * from produk WHERE slide = 'Y' ORDER BY id_produk DESC LIMIT 5  ");
                                while ($r = mysqli_fetch_array($q)) {
                                ?>
                                    <div class="col-lg-3">
                                        <div class="product-item">
                                            <div class="product-title">
                                                <a><?php echo $r['nama_produk'] ?></a>
                                            </div>
                                            <div class="product-image">
                                                <a href="product-detail.html">
                                                    <img src="upload/<?php echo $r['gambar'] ?> " alt="" style="height: 300px; " />
                                                </a>
                                                <div class="product-action">
                                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                    <a href="#"><i class="fa fa-heart"></i></a>
                                                    <a href="#"><i class="fa fa-search"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-price">
                                                <h3><span>Rp.</span><?php echo number_format($r['harga']) ?></h3>
                                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                            <h2 class="title">Category</h2>
                            <nav class="navbar bg-light">
                                <ul class="navbar-nav">
                                    <?php
                                    $q = mysqli_query($koneksi, "select * from kategori");
                                    while ($r = mysqli_fetch_array($q)) {
                                    ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="produk_by_kategori.php?id_kategori=<?php echo $r['id_kategori'] ?>"><i class="fa fa-shopping-bag"></i><?php echo $r['nama_kategori'] ?></href=></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>

                        <div class="sidebar-widget widget-slider">
                            <div class="sidebar-slider normal-slider">
                                <?php
                                $q = mysqli_query($koneksi, "select * from produk ORDER BY id_produk DESC LIMIT 5  ");
                                while ($r = mysqli_fetch_array($q)) {
                                ?>
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a><?php echo $r['nama_produk'] ?></a>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html">
                                                <img src="upload/<?php echo $r['gambar'] ?> " alt="" style="height: 500px; " />
                                            </a>
                                            <div class="product-action">
                                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>Rp.</span><?php echo number_format($r['harga']) ?></h3>
                                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <!-- Product Detail End -->