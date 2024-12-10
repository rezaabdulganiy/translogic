<?php
$servername = "localhost";
$username = "root";
$password = ""; // Ganti dengan password MySQL jika ada
$database = "translogic";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
