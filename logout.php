<?php 
	session_start();
	session_destroy();
	echo "<script> alert('anda telah Keluar dari halaman');window.location = 'index.php'</script>";
?>