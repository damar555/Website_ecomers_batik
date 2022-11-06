<?php
session_start();
$sid = session_id();
include "lib/koneksi.php";
$id_pro = $_GET['id_produk'];
$sql = mysqli_query($koneksi, "DELETE FROM tbl_order WHERE id_produk ='$id_pro' AND id_session='$sid'");
header('location:keranjang.php');
?>
