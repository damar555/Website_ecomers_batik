<?php
    include "../../../../lib/config.php";
    include "../../../../lib/koneksi.php";

    $idKota = $_GET['id_kota'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_kota WHERE id_kota='$idKota'");

    if($queryHapus){
        echo "<script> alert('Data Kota Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=Kota';</script>";

    } else {
        echo "<script> alert('Data Kota Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=Kota';</script>"; 
    }
?>