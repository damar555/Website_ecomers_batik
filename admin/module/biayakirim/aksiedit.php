<?php
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idBiayakirim = $_POST['id_biaya_kirim'];
    $idKota = $_POST['idKota'];
    $Biaya = $_POST['biaya'];
    $idKurir = $_POST['idKurir'];
    if ($Biaya == "") {
        echo "<script> alert('Data Biaya Kirim harus diisi Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=edit_biaya_kirim&id_biaya_kirim='+'$idBiayakirim';</script>";
    } else {
        $queryEdit = mysqli_query($koneksi, "UPDATE tbl_biaya_kirim SET id_kota='$idKota', biaya='$Biaya', id_kurir='$idKurir' WHERE id_biaya_kirim='$idBiayakirim'");

        if ($queryEdit) {
            echo "<script> alert('Data Biaya Kirim Berhasil Diubah'); window.location = '$admin_url'+'adminweb.php?module=Biaya Kirim';</script>";
        } else {
            echo "<script> alert('Data Biaya Kirim Gagal Diubah'); window.location = '$admin_url'+'adminweb.php?module=edit_biaya_kirim&id_biaya_kirim='+'$idBiayakirim';</script>";
        }
    }
?>
