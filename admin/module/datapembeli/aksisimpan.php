<?php
include "../../../lib/config.php";
include "../../../lib/koneksi.php";

$namaPembeli = $_POST['nama'];
$alamat = $_POST['alamat'];
$nomerhp = $_POST['nomerhp'];
$username = $_POST['username'];
$Password = $_POST['password'];
if ($namaPembeli=="") {
	echo "<script> alert('Data pembeli harus Diisi'); window.location = '$admin_url'+'adminweb.php?module=tambah_pembeli';</script>"; 
}else{
$querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_pembeli (nama, alamat, nomerhp, username, password) VALUES('$namaPembeli', '$alamat', '$nomerhp', '$username', '$Password')");

if($querySimpan){
    echo "<script> alert('Data pembeli Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=Data Pembeli';</script>";

} else {
    echo "<script> alert('Data pembeli Gagal Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=tambah_pembeli';</script>"; 
}	
}


?>