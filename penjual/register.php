<?php
include "../lib/config.php";
include "../lib/koneksi.php";

$namaPenjual = $_POST['namaPenjual'];
$alamat = $_POST['alamat'];
$nomerhp = $_POST['nomorhp'];
$username = $_POST['username'];
$Password = $_POST['Password'];
if ($namaPenjual=="") {
	echo "<script> alert('Data penjual harus Diisi'); window.location = 'formregister.php';</script>"; 
}else{
$querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_penjual (nama_penjual, alamat_penjual, nomerhp, username, password) VALUES('$namaPenjual', '$alamat', '$nomerhp', '$username', '$Password')");

if($querySimpan){
    echo "<script> alert('Data penjual Berhasil Masuk'); window.location = 'index.php';</script>";

} else {
    echo "<script> alert('Data penjual Gagal Dimasukkan'); window.location = 'formregister.php';</script>"; 
}	
}


?>