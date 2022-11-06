<?php
    include "../../../../lib/config.php";
    include "../../../../lib/koneksi.php";

    $idKota = $_POST['id_kota'];
    $namaKota = $_POST['nama_kota'];
    if ($namaKota == "") {
        echo "<script> alert('Data Kota harus diisi Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=edit_kota&id_kota='+'$idKota';</script>";
    } else {
        $queryEdit = mysqli_query($koneksi, "UPDATE tbl_kota SET nama_kota='$namaKota' WHERE id_kota='$idKota'");

        if ($queryEdit) {
            echo "<script> alert('Data Kota Berhasil Diubah'); window.location = '$admin_url'+'adminweb.php?module=Kota';</script>";
        } else {
            echo "<script> alert('Data Kota Gagal Diubah'); window.location = '$admin_url'+'adminweb.php?module=edit_kota&id_kota='+'$idKota';</script>";
        }
    }
?>
