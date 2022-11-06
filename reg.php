<?php
include "lib/config.php";
include "lib/koneksi.php";

$namaPembeli = $_POST['nama'];
$alamat = $_POST['alamat'];
$nomerhp = $_POST['nomerhp'];
$username = $_POST['username'];
$Password = $_POST['password'];
if ($namaPembeli=="" || $alamat=="" || $nomerhp=="") {
	echo "<script> alert('Data pembeli harus Diisi'); window.location = 'regis.php';</script>"; 
}else{
$querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_pembeli (nama, alamat, nomerhp, username, password) VALUES('$namaPembeli', '$alamat', '$nomerhp', '$username', '$Password')");

if($querySimpan){
    echo "<script> alert('Data pembeli Berhasil Masuk'); window.location = 'login.php';</script>";

} else {
    echo "<script> alert('Data pembeli Gagal Dimasukkan'); window.location = 'regis.php';</script>"; 
}	
}


?>