<?php
require_once 'config.php'; // Koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Enkripsi password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Periksa apakah username atau email sudah digunakan
    $check_user = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($conn, $check_user);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username atau Email sudah terdaftar!');window.location='register.php';</script>";
    } else {
        // Simpan data ke database
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Registrasi berhasil! Silakan login.');window.location='login.php';</script>";
        } else {
            echo "<script>alert('Registrasi gagal! Coba lagi.');window.location='register.php';</script>";
        }
    }
} else {
    header("Location: register.php");
    exit();
}
?>
