<?php
include "../../../../lib/config.php";
include "../../../../lib/koneksi.php";

$namaKota = $_POST['nama_kota'];
if ($namaKota=="") {
	echo "<script> alert('Data Kota harus Diisi'); window.location = '$admin_url'+'adminweb.php?module=tambah_kota';</script>"; 
}else{
$querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_kota (nama_kota) VALUES('$namaKota')");

if($querySimpan){
    echo "<script> alert('Data Kota Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=Kota';</script>";

} else {
    echo "<script> alert('Data Kota Gagal Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=tambah_kota';</script>"; 
}	
}


?>