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

// Mengecek apakah ada ID yang diterima untuk edit
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data destinasi berdasarkan ID
    $sql = "SELECT * FROM destinasi WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $negara = $row['negara'];
        $provinsi = $row['provinsi'];
        $kota = $row['kota'];
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
} else {
    echo "ID tidak ditemukan.";
    exit();
}

// Jika form di-submit, update data destinasi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $negara = $_POST['negara'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];

    // Query untuk update data destinasi
    $update_sql = "UPDATE destinasi SET negara = '$negara', provinsi = '$provinsi', kota = '$kota' WHERE id = $id";
    
    if (mysqli_query($conn, $update_sql)) {
        echo "Data berhasil diperbarui.";
        header("Location: list-destinasi.php"); // Redirect ke halaman list destinasi setelah update
        exit();
    } else {
        echo "Error: " . $update_sql . "<br>" . mysqli_error($conn);
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
    <title>Edit Destinasi</title>
    <link rel="stylesheet" href="destinasi.css">
</head>
<body>
    <div class="container">
        <h1>Edit Destinasi</h1>
        <form action="edit-destinasi.php?id=<?php echo $id; ?>" method="POST">
            <label for="negara">Negara:</label>
            <input type="text" name="negara" value="<?php echo $negara; ?>" required>
            <br><br>
            <label for="provinsi">Provinsi:</label>
            <input type="text" name="provinsi" value="<?php echo $provinsi; ?>" required>
            <br><br>
            <label for="kota">Kota:</label>
            <input type="text" name="kota" value="<?php echo $kota; ?>" required>
            <br><br>
            <button type="submit">Perbarui</button>
        </form>
    </div>
</body>
</html>
