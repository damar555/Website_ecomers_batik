<?php
    include "../../../../lib/config.php";
    include "../../../../lib/koneksi.php";

    $idKurir = $_POST['id_kurir'];
    $namaKurir = $_POST['nama_kurir'];
    if ($namaKurir == "") {
        echo "<script> alert('Data Kurir harus diisi Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=edit_kurir&id_kurir='+'$idKurir';</script>";
    } else {
        $queryEdit = mysqli_query($koneksi, "UPDATE tbl_kurir SET nama_kurir='$namaKurir' WHERE id_kurir='$idKurir'");

        if ($queryEdit) {
            echo "<script> alert('Data Kurir Berhasil Diubah'); window.location = '$admin_url'+'adminweb.php?module=Kurir';</script>";
        } else {
            echo "<script> alert('Data Kurir Gagal Diubah'); window.location = '$admin_url'+'adminweb.php?module=edit_kurir&id_kurir='+'$idKurir';</script>";
        }
    }
?>
