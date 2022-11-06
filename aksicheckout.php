<?php
session_start();
include "lib/koneksi.php";
include "lib/config.php";

date_default_timezone_set('Asia/Jakarta');

$total = $_POST['total'];
$id_penjual = $_POST['id_penjual'];
$id_session = session_id();

$QueryOrder = mysqli_query($koneksi, "SELECT id_order,jumlah FROM tbl_order WHERE id_session = '$id_session' AND status_order = 'P'");

$inv = rand(100, 10000);
while ($rowOrder = mysqli_fetch_assoc($QueryOrder)) {
    $id_order = $rowOrder['id_order'];
    $jumlah = $rowOrder['jumlah'];
    $pembeli = $_SESSION['idPembeli'];
    $tanggal = date('d/m/Y', time());
    $QuerySimpan = mysqli_query($koneksi, "INSERT INTO tbl_detail_order (id_order, id_penjual, invoice, jumlah, total, id_pembeli, tanggal) VALUES ('$id_order','$id_penjual', '$inv','$jumlah','$total','$pembeli','$tanggal')");
    if ($QuerySimpan) {
        echo "<script>alert('Checkout Berhasil'); window.location = '$base_url'+'index.php';</script>";
        unset($_SESSION['tempKurir']);
        $QueryUpdate = mysqli_query($koneksi, "UPDATE tbl_order SET status_order = 'P' WHERE id_order = '$id_order'");
    } else {
        echo "<script>alert('Checkout Tidak Berhasil'); window.location = '$base_url'+'index.php';</script>";
    }
}
