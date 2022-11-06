<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $nama_file = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];

    $namaProduk = $_POST['nama_produk'];
    $idKategori = $_POST['idKategori'];
    $idPenjual = $_POST['idPenjual'];
    $hargaProduk = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $slide = $_POST['slide'];
    $path = "../../../upload/" . $nama_file;


    if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
        if ($ukuran_file <= 10000000) {
            if (move_uploaded_file($tmp_file, $path)) {
                if ($namaProduk == "") {
                    echo "<script> alert('Nama produk tidak boleh kosong!'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
                } else if ($namaProduk == " ") {
                    echo "<script> alert('Nama produk tidak boleh kosong!'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
                } else if ($deskripsi == "") {
                    echo "<script> alert('deskripsi produk tidak boleh kosong!'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
                } else if ($deskripsi == " ") {
                    echo "<script> alert('deskripsi produk tidak boleh kosong!'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
                } else if ($hargaProduk == "") {
                    echo "<script> alert('Harga Produk tidak boleh kosong!'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
                } else if ($hargaProduk == " ") {
                    echo "<script> alert('Harga Produk tidak boleh kosong!'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
                } else if (!is_numeric($hargaProduk)) {
                    echo "<script> alert('Harga produk harus berupa angka!'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
                } else if (empty($slide)) {
                    echo "<script> alert('Slide harus diisi!'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
                } else {
                    $querySimpan = mysqli_query($koneksi, "INSERT INTO produk(id_kategori, id_penjual, nama_produk, deskripsi, harga, gambar, slide) VALUES (
					'$idKategori','$idPenjual','$namaProduk','$deskripsi','$hargaProduk','$nama_file','$slide')");
                    if ($querySimpan) {
                        echo "<script> alert('Data Produk Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=Produk'; </script>";
                    } else {
                        echo "<script> alert('Data Produk Gagal Masuk'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
                    }
                }
            } else {
                echo "<script> alert('Data Gambar Produk Gagal Dimasukkan');  window.location = '$admin_url'+'adminweb.php?module=tambah_produk'; </script>";
            }
        } else {
            echo "<script> alert('Data Gambar Produk Gagal Dimasukkan Karena Ukuran Melebihi 1 MB'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk'; </script>";
        }
    } else {
        echo "<script> alert('Data Gambar Produk Gagal Dimasukkan Karena Tidak Berektensi JPG/JPEG/PNG'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk'; </script>";
    }
}
