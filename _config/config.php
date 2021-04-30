<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "ersura";

// untuk tulisan bercetak tebal silakan sesuaikan dengan detail database Anda
// membuat koneksi
$db = mysqli_connect($servername, $username, $password, $database);

// mengecek koneksi

// if (!$db) {
//     die("Koneksi gagal: " . mysqli_connect_error());
// }
// echo "Koneksi berhasil";
// mysqli_close($db);

?>