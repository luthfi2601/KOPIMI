<?php

include("koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['register'])){

    // ambil data dari formulir
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    // buat query
    $sql = "INSERT INTO user (username, password) VALUE ('$username', '$password')";
    $query = mysqli_query($koneksi, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: home.php');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: register.php');
    }


} else {
    die("Akses dilarang...");
}

?>