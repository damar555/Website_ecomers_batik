<?php
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idPembeli = $_POST['id_pembeli'];
    $namaPembeli = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nomerhp = $_POST['nomerhp'];
    $username = $_POST['username'];
    $Password = $_POST['password'];
    if ($namaPembeli == "") {
        echo "<script> alert('Data Pembeli harus diisi Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=edit_pembeli&id_pembeli='+'$idPembeli';</script>";
    } else {
        $queryEdit = mysqli_query($koneksi, "UPDATE tbl_pembeli SET nama='$namaPembeli', alamat='$alamat', nomerhp='$nomerhp', username='$username', password='$Password' WHERE id_pembeli='$idPembeli'");

        if ($queryEdit) {
            echo "<script> alert('Data Pembeli Berhasil Diubah'); window.location = '$admin_url'+'adminweb.php?module=Data Pembeli';</script>";
        } else {
            echo "<script> alert('Data Pembeli Gagal Diubah'); window.location = '$admin_url'+'adminweb.php?module=edit_pembeli&id_pembeli='+'$idPembeli';</script>";
        }
    }
?>
