<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "kopimi";

$koneksi = mysqli_connect($server, $user, $password, $nama_database);

if( !$konkesi ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>
