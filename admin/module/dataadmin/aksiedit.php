<?php
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idAdmin = $_POST['id_admin'];
    $namaAdmin = $_POST['nama'];
    $username = $_POST['username'];
    $Password = $_POST['password'];
    $level = $_POST['level'];
    if ($namaAdmin == "") {
        echo "<script> alert('Data Admin harus diisi Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=edit_admin&id_admin='+'$idAdmin';</script>";
    } else {
        $queryEdit = mysqli_query($koneksi, "UPDATE tbl_admin SET nama='$namaAdmin', username='$username', password='$Password', level='$level' WHERE id_admin='$idAdmin'");

        if ($queryEdit) {
            echo "<script> alert('Data Admin Berhasil Diubah'); window.location = '$admin_url'+'adminweb.php?module=Data Admin';</script>";
        } else {
            echo "<script> alert('Data Admin Gagal Diubah'); window.location = '$admin_url'+'adminweb.php?module=edit_admin&id_admin='+'$id_admin';</script>";
        }
    }
?>
