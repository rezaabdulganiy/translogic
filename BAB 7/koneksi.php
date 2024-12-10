<?php
$host = 'localhost';
$user = 'root'; // Sesuaikan dengan pengaturan username DB Anda
$password = ''; // Sesuaikan dengan pengaturan password DB Anda
$database = 'tiket_db'; // Nama database yang Anda gunakan

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die('Koneksi gagal: ' . mysqli_connect_error());
}
?>
