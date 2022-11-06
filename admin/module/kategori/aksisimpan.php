<?php
include "../../../lib/config.php";
include "../../../lib/koneksi.php";

$namaKategori = $_POST['nama_kategori'];
if ($namaKategori=="") {
	echo "<script> alert('Data Kategori harus Diisi'); window.location = '$admin_url'+'adminweb.php?module=tambah_kategori';</script>"; 
}else{
$querySimpan = mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori) VALUES('$namaKategori')");

if($querySimpan){
    echo "<script> alert('Data Kategori Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=Kategori';</script>";

} else {
    echo "<script> alert('Data Kategori Gagal Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=tambah_kategori';</script>"; 
}	
}


?>