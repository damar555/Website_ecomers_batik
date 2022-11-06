<?php
include "../../../lib/config.php";
include "../../../lib/koneksi.php";

$namaAdmin = $_POST['nama'];
$username = $_POST['username'];
$Password = $_POST['Password'];
$level = $_POST['level'];
if ($namaAdmin=="") {
	echo "<script> alert('Data Admin harus Diisi'); window.location = '$admin_url'+'adminweb.php?module=tambah_admin';</script>"; 
}else{
$querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_admin (nama, username, password, level) VALUES('$namaAdmin', '$username', '$Password', '$level')");

if($querySimpan){
    echo "<script> alert('Data Admin Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=Data Admin';</script>";

} else {
    echo "<script> alert('Data Admin Gagal Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=tambah_admin';</script>"; 
}	
}


?>