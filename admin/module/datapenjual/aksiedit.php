<?php
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idPenjual = $_POST['id_penjual'];
    $namaPenjual = $_POST['nama_penjual'];
    $alamat = $_POST['alamat_penjual'];
    $nomerhp = $_POST['nomerhp'];
    $username = $_POST['username'];
    $Password = $_POST['password'];
    if ($namaPenjual == "") {
        echo "<script> alert('Data Penjual harus diisi Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=edit_penjual&id_penjual='+'$idPenjual';</script>";
    } else {
        $queryEdit = mysqli_query($koneksi, "UPDATE tbl_penjual SET nama_penjual='$namaPenjual', alamat_penjual='$alamat', nomerhp='$nomerhp', username='$username', password='$Password' WHERE id_penjual='$idPenjual'");

        if ($queryEdit) {
            echo "<script> alert('Data Penjual Berhasil Diubah'); window.location = '$admin_url'+'adminweb.php?module=Data Penjual';</script>";
        } else {
            echo "<script> alert('Data Penjual Gagal Diubah'); window.location = '$admin_url'+'adminweb.php?module=edit_penjual&id_penjual='+'$idPenjual';</script>";
        }
    }
?>
