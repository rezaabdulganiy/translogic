<?php
include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Tiket - ACCUTRACK</title>
    <link rel="stylesheet" href="tiket.css">
</head>
<body>
    <h3>Kelola Tiket</h3>
    <button><a href="tiket-entry.php">Tambah Tiket</a></button>
    <table>
        <thead>
            <tr>
                <th>Jenis Tiket</th>
                <th>Kategori</th>
                <th>Negara</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM tb_tiket ORDER BY created_at DESC";
            $result = mysqli_query($koneksi, $query);

            if (mysqli_num_rows($result) == 0) {
                echo "<tr><td colspan='5' align='center'>Data Kosong</td></tr>";
            }

            while ($data = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$data['jenis_tiket']}</td>
                        <td>{$data['kategori_tiket']}</td>
                        <td>{$data['negara']}</td>
                        <td>Rp " . number_format($data['harga'], 2, ',', '.') . "</td>
                        <td>
                            <a href='tiket-edit.php?id={$data['id']}'>Edit</a> |
                            <a href='tiket-hapus.php?id={$data['id']}'>Hapus</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
