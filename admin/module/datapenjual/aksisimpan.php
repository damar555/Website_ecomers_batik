<?php
include "../../../lib/config.php";
include "../../../lib/koneksi.php";

$namaPenjual = $_POST['nama_penjual'];
$alamat = $_POST['alamat_penjual'];
$nomerhp = $_POST['nomerhp'];
$username = $_POST['username'];
$Password = $_POST['password'];
if ($namaPenjual=="") {
	echo "<script> alert('Data penjual harus Diisi'); window.location = '$admin_url'+'adminweb.php?module=tambah_penjual';</script>"; 
}else{
$querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_penjual (nama_penjual, alamat_penjual, nomerhp, username, password) VALUES('$namaPenjual', '$alamat', '$nomerhp', '$username', '$Password')");

if($querySimpan){
    echo "<script> alert('Data penjual Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=Data Penjual';</script>";

} else {
    echo "<script> alert('Data penjual Gagal Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=tambah_penjual';</script>"; 
}	
}


?>