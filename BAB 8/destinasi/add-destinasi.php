<?php
// Menghubungkan ke database
$servername = "localhost"; // ganti dengan host database Anda
$username = "root"; // ganti dengan username database Anda
$password = ""; // ganti dengan password database Anda, jika ada
$dbname = "tiket_db"; // ganti dengan nama database Anda

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mengecek apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $negara = $_POST['negara'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];

    // Query untuk menambah data destinasi
    $sql = "INSERT INTO destinasi (negara, provinsi, kota) VALUES ('$negara', '$provinsi', '$kota')";

    // Menjalankan query dan mengecek hasilnya
    if (mysqli_query($conn, $sql)) {
        echo "Destinasi berhasil ditambahkan!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Menutup koneksi
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Destinasi</title>
  <link rel="stylesheet" href="destinasi.css">
</head>
<body>
  <div class="container">
    <h2>Tambah Destinasi</h2>
    <form method="POST" action="add-destinasi.php">
      <label for="negara">Negara:</label>
      <input type="text" id="negara" name="negara" required><br><br>
      
      <label for="provinsi">Provinsi:</label>
      <input type="text" id="provinsi" name="provinsi" required><br><br>

      <label for="kota">Kota:</label>
      <input type="text" id="kota" name="kota" required><br><br>

      <button type="submit">Tambah Destinasi</button>
    </form>
  </div>
</body>
</html>
