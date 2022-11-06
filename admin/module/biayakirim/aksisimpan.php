<?php
include "../../../lib/config.php";
include "../../../lib/koneksi.php";

$idKota = $_POST['idKota'];
$Biaya = $_POST['biaya'];
$idKurir = $_POST['idKurir'];
if ($Biaya=="") {
	echo "<script> alert('Data Biaya Kirim harus Diisi'); window.location = '$admin_url'+'adminweb.php?module=tambah_biaya_kirim';</script>"; 
}else{
$querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_biaya_kirim (id_kota, biaya, id_kurir) VALUES('$idKota', '$Biaya', '$idKurir')");

if($querySimpan){
    echo "<script> alert('Data Biaya Kirim Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=Biaya Kirim';</script>";

} else {
    echo "<script> alert('Data Biaya Kirim Gagal Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=tambah_biaya_kirim';</script>"; 
}	
}


?>