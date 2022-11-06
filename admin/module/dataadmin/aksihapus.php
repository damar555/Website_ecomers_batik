<?php
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idAdmin = $_GET['id_admin'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_admin WHERE id_admin='$idAdmin'");

    if($queryHapus){
        echo "<script> alert('Data Admin Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=Data Admin';</script>";

    } else {
        echo "<script> alert('Data Admin Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=Data Admin';</script>"; 
    }
?>