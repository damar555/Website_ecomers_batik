<?php
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idKategori = $_POST['id_kategori'];
    $namaKategori = $_POST['nama_kategori'];
    if ($namaKategori == "") {
        echo "<script> alert('Data Kategori harus diisi Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=edit_kategori&id_kategori='+'$idKategori';</script>";
    } else {
        $queryEdit = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori='$namaKategori' WHERE id_kategori='$idKategori'");

        if ($queryEdit) {
            echo "<script> alert('Data Kategori Berhasil Diubah'); window.location = '$admin_url'+'adminweb.php?module=Kategori';</script>";
        } else {
            echo "<script> alert('Data Kategori Gagal Diubah'); window.location = '$admin_url'+'adminweb.php?module=edit_kategori&id_kategori='+'$idKategori';</script>";
        }
    }
?>
