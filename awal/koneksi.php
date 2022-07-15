<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbnm = "kopimi";
$connect = mysqli_connect($host, $user, $pass, $dbnm);

if (!$connect) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
echo "Nyambung gais";
mysqli_close($connect);
// if ($connect) {
//     $open = mysqli_select_db($dbnm);
//     if (!$open){
//         die("Database tidak dapat dibuka karena ".mysql_error());
//     }
// } 
// else {
//     die ("Server Mysql tidak terhubung karena ".mysql_error());
// }
?>