<?php
include "lib/koneksi.php";

$userName = $_POST['username'];
$password = $_POST['password'];
// pastikakn username dan password adalahh berupa huruf atau angka.
if (empty($userName)) {
    echo "<center><script> alert('username kosong!')</script>";
    echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
            echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<b>username anda kosong!</b><br>";
            echo "silahkan klik dibawah ini untuk login kembali<br>";
            echo "<br>";echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
} else if (empty($password)){
            echo "<center><script> alert('password kosong!')</script>";
            echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
                    echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<b>password anda kosong!</b><br>";
                    echo "silahkan klik dibawah ini untuk login kembali<br>";
                    echo "<br>";echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
}else{
    if (!ctype_alnum($userName) OR !ctype_alnum($password)) {
    echo "<center><script> alert('LOGIN GAGAL!')</script>";
    echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
            echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<b>LOGIN GAGAL!</b><br>";
            echo "tampaknya data yang anda isikan tidak berupa huruf dann angka<br>";
            echo "silahkan klik dibawah ini untuk login kembali<br>";
            echo "<br>";echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
    }else{
        $login = mysqli_query($koneksi, "SELECT * FROM tbl_pembeli WHERE username='$userName' AND password = '$password'");
        $ketemu = mysqli_num_rows($login);
        $r = mysqli_fetch_array($login);

// apabila username dan password ditemukan 
if ($ketemu >0) {
    session_start();
    $_SESSION['username'] = $r['username'];
    $_SESSION['password'] = $r['password'];
    $_SESSION['idPembeli'] = $r['id_pembeli'];
    $_SESSION['level'] = $r['level']; 
    header('location:index.php');
}else{
    echo "<center><script> alert('LOGIN GAGAL!')</script>";
    echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
    echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<b>LOGIN GAGAL!</b><br>";
    echo "username dan password anda tidak ditemukan atau salah / akun anda telah dihapus / akun anda telah diblokir<br>";
    echo "silahkan klik dibawah ini untuk login kembali<br>";
    echo "<br>";echo "<a href=login.php.php><b>ULANGI LAGI</b></a></center>";

}
}
}


?>