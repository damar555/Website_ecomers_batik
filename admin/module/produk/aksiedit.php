<?php

session_start();
if (!isset($_SESSION['username']) and !isset($_SESSION['password'])) {
    echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
} else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $nama_file = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    $path = "../../../upload/" . $nama_file;

    $idProduk = $_POST['id_produk'];
    $idKategori = $_POST['idKategori'];
    $idPenjual = $_POST['idPenjual'];
    $namaProduk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $hargaProduk = $_POST['harga'];
    $slide = $_POST['slide'];

    if ($tipe_file == "image/jpeg" || $tipe_file = "image/png") {
        if ($ukuran_file <= 10000000) {
            if (move_uploaded_file($tmp_file, $path)) {
                if ($namaProduk == "") {
                    echo "<script> alert('Nama produk tidak boleh kosong!'); window.location='$admin_url'+'adminweb.php?module=edit_produk&id_produk='+'$idProduk';</script>";
                } else if ($namaProduk == " ") {
                    echo "<script> alert('Nama produk tidak boleh kosong!'); window.location='$admin_url'+'adminweb.php?module=edit_produk&id_produk='+'$idProduk';</script>";
                } else if ($deskripsi == "") {
                    echo "<script> alert('deskripsi produk tidak boleh kosong!'); window.location='$admin_url'+'adminweb.php?module=edit_produk&id_produk='+'$idProduk';</script>";
                } else if ($deskripsi == " ") {
                    echo "<script> alert('deskripsi produk tidak boleh kosong!'); window.location='$admin_url'+'adminweb.php?module=edit_produk&id_produk='+'$idProduk';</script>";
                } else if ($hargaProduk == "") {
                    echo "<script> alert('Harga Produk tidak boleh kosong!'); window.location='$admin_url'+'adminweb.php?module=edit_produk&id_produk='+'$idProduk';</script>";
                } else if ($hargaProduk == " ") {
                    echo "<script> alert('Harga produk tidak boleh kosong!'); window.location='$admin_url'+'adminweb.php?module=edit_produk&id_produk='+'$idProduk';</script>";
                } else if (!is_numeric($hargaProduk)) {
                    echo "<script> alert('Harga produk harus berupa angka!'); window.location='$admin_url'+'adminweb.php?module=edit_produk&id_produk='+'$idProduk';</script>";
                } else if (empty($slide)) {
                    echo "<script> alert('Slide harus diisi!'); window.location = '$admin_url'+'adminweb.php?module=edit_produk';</script>";
                } else {
                    $queryEdit = mysqli_query($koneksi, "UPDATE produk SET id_kategori = '$idKategori' , id_penjual = '$idPenjual' , nama_produk='$namaProduk' , deskripsi ='$deskripsi' , harga ='$hargaProduk' , gambar ='$nama_file' , slide ='$slide' WHERE id_produk='$idProduk'");

                    if ($queryEdit) {
                        echo "<script>alert('Data Produk Berhasil Diubah');window.location='$admin_url'+'adminweb.php?module=Produk';</script>";
                    } else {
                        echo "<script>alert('Data gagal diubah');window.location='$admin_url'+'adminweb.php?module=Produk';</script>";
                    }
                }
            } else {
                echo "<script>alert('Data gambar gagal');die;window.location = '$admin_url'+'adminweb.php?module=Produk';</script>";
            }
        } else {
            echo "<script>alert('Data gambar terlalu besar');window.location = '$admin_url'+'adminweb.php?module=Produk';</script>";
        }
    } else {
        echo "<script>alert('Type gambar salah');window.location = '$admin_url'+'adminweb.php?module=Produk';</script>";
    }
}
