<?php
// Menghubungkan ke database
$servername = "localhost"; // atau host database Anda
$username = "root"; // ganti dengan username database Anda
$password = ""; // ganti dengan password database Anda, jika ada
$dbname = "tiket_db"; // ganti dengan nama database Anda

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mengecek apakah ada ID yang diterima untuk hapus
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data destinasi berdasarkan ID
    $sql = "DELETE FROM destinasi WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil dihapus.";
        header("Location: list-destinasi.php"); // Redirect ke halaman list destinasi setelah dihapus
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan.";
    exit();
}

// Menutup koneksi
mysqli_close($conn);
?>
