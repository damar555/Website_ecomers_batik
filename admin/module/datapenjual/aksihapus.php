<?php
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idPenjual = $_GET['id_penjual'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_penjual WHERE id_penjual='$idPenjual'");

    if($queryHapus){
        echo "<script> alert('Data penjual Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=Data Penjual';</script>";

    } else {
        echo "<script> alert('Data penjual Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=Data Penjual';</script>"; 
    }
?>