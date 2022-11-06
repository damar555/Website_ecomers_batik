<?php
include "lib/koneksi.php";

$id_kurir = $_POST['id_kurir'];


session_start();
$id_member = $_SESSION['idPembeli'];

$querygetkota = mysqli_query($koneksi, "SELECT * FROM tbl_pembeli where id_pembeli='$id_member'");
$res = mysqli_fetch_array($querygetkota);
$idKota = $res['id_kota'];


$querygetbiaya = mysqli_query($koneksi, "SELECT * FROM tbl_biaya_kirim where id_kurir='$id_kurir'");
$result = mysqli_fetch_array($querygetbiaya);
$biaya = $result['biaya'];


$_SESSION['biaya_kirim'] = $biaya;
$_SESSION['tempKurir'] = $id_kurir;


header("location:selesai.php");
