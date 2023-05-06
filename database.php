<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gptpunya";

// Membuat koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
?>
