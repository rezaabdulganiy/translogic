<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $jenis_tiket = mysqli_real_escape_string($koneksi, $_POST['jenis_tiket']);
    $kategori_tiket = mysqli_real_escape_string($koneksi, $_POST['kategori_tiket']);
    $negara = mysqli_real_escape_string($koneksi, $_POST['negara']);
    $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);

    $query = "INSERT INTO tb_tiket (jenis_tiket, kategori_tiket, negara, harga) 
              VALUES ('$jenis_tiket', '$kategori_tiket', '$negara', '$harga')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Tiket berhasil ditambahkan!');window.location='tiket.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan tiket!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tiket - ACCUTRACK</title>
    <link rel="stylesheet" href="tiket.css">
</head>
<body>
    <h3>Tambah Tiket</h3>
    <form action="" method="post">
        <label for="jenis_tiket">Jenis Tiket</label>
        <select name="jenis_tiket" required>
            <option value="Darat">Darat</option>
            <option value="Udara">Udara</option>
            <option value="Laut">Laut</option>
        </select>

        <label for="kategori_tiket">Kategori Tiket</label>
        <select name="kategori_tiket" required>
            <option value="Ekonomi">Ekonomi</option>
            <option value="Bisnis">Bisnis</option>
            <option value="VIP">VIP</option>
        </select>

        <label for="negara">Negara</label>
        <input type="text" name="negara" required />

        <label for="harga">Harga</label>
        <input type="number" name="harga" step="0.01" required />

        <button type="submit" name="simpan">Simpan</button>
    </form>
    <a href="tiket.php">Kembali</a>
</body>
</html>
