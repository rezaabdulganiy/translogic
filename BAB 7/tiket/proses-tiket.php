<?php
include 'koneksi.php'; // Sertakan koneksi database

// Proses tambah data jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jenis_tiket = mysqli_real_escape_string($koneksi, $_POST['jenis_tiket']);
    $kategori_tiket = mysqli_real_escape_string($koneksi, $_POST['kategori_tiket']);
    $negara = mysqli_real_escape_string($koneksi, $_POST['negara']);
    $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);

    // Query untuk insert data ke dalam tabel tb_tiket
    $query = "INSERT INTO tb_tiket (jenis_tiket, kategori_tiket, negara, harga) 
              VALUES ('$jenis_tiket', '$kategori_tiket', '$negara', '$harga')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data tiket berhasil ditambahkan!');window.location='tiket.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan tiket!');</script>";
    }
}
?>
