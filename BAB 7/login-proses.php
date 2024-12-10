<?php
require_once 'config.php'; // Koneksi ke database
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            // Simpan session user
            $_SESSION['username'] = $user['username'];
            echo "<script>alert('Login berhasil!');window.location='dashboard.php';</script>";
        } else {
            echo "<script>alert('Password salah!');window.location='login.php';</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!');window.location='login.php';</script>";
    }
} else {
    header("Location: login.php");
    exit();
}
?>
