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

// Query untuk mengambil semua destinasi
$sql = "SELECT * FROM destinasi";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Destinasi</title>
    <link rel="stylesheet" href="destinasi.css">
</head>
<body>
    <div class="container">
        <h1>Daftar Destinasi</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Negara</th>
                    <th>Provinsi</th>
                    <th>Kota</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Mengecek apakah ada data
                if (mysqli_num_rows($result) > 0) {
                    // Menampilkan data destinasi
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['negara'] . "</td>";
                        echo "<td>" . $row['provinsi'] . "</td>";
                        echo "<td>" . $row['kota'] . "</td>";
                        echo "<td><a href='edit-destinasi.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete-destinasi.php?id=" . $row['id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus?\")'>Hapus</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data destinasi</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="add-destinasi.php" class="button">Tambah Destinasi</a>
    </div>
</body>
</html>

<?php
// Menutup koneksi
mysqli_close($conn);
?>
