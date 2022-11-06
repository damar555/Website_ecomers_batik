<?php
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idPembeli = $_GET['id_pembeli'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_pembeli WHERE id_pembeli='$idPembeli'");

    if($queryHapus){
        echo "<script> alert('Data pembeli Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=Data Pembeli';</script>";

    } else {
        echo "<script> alert('Data pembeli Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=Data Pembeli';</script>"; 
    }
?>