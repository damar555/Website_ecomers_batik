<?php
session_start();
    include "lib/config.php";
    include "lib/koneksi.php";

    // $idPembeli = $_POST['id_pembeli'];
    $namaPembeli = $_POST['name'];
    $alamat = $_POST['alamat'];
    $nomerhp = $_POST['nomerhp'];
    $username = $_POST['username'];
    $Password = $_POST['password'];
    $newPassword = $_POST['Newpassword'];
    if ($namaPembeli == "") {
        echo "<script> alert('Data Pembeli harus diisi Dimasukkan'); window.location = '$base_url'+'myaccount.php';</script>";
    } else {
        $queryEdit = mysqli_query($koneksi, "UPDATE tbl_pembeli SET nama='$namaPembeli', alamat='$alamat', nomerhp='$nomerhp', password='$newPassword' WHERE username='$username'");

        if ($queryEdit) {
            $kueriPembeli = mysqli_query($koneksi, "SELECT * FROM tbl_pembeli WHERE username='$username' AND password = '$newPassword'");
            $r = mysqli_fetch_array($kueriPembeli);
            $_SESSION['username'] = $r['username'];
            $_SESSION['password'] = $r['password'];
            $_SESSION['idPembeli'] = $r['id_pembeli'];
            echo "<script> alert('Data Pembeli Berhasil Diubah'); window.location = '$base_url'+'myaccount.php';</script>";
        } else {
            echo "<script> alert('Data Pembeli Gagal Diubah'); window.location = '$base_url'+'myaccount.php';</script>";
        }
    }
?>
