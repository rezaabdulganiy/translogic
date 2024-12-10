<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tb_tiket WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Data tidak ditemukan!');window.location='tiket.php';</script>";
        exit();
    }
}

if (isset($_POST['update'])) {
    $jenis_tiket = mysqli_real_escape_string($koneksi, $_POST['jenis_tiket']);
    $kategori_tiket = mysqli_real_escape_string($koneksi, $_POST['kategori_tiket']);
    $negara = mysqli_real_escape_string($koneksi, $_POST['negara']);
    $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);

    $query = "UPDATE tb_tiket SET jenis_tiket='$jenis_tiket', kategori_tiket='$kategori_tiket', negara='$negara', harga='$harga' WHERE id=$id";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil diperbarui!');window.location='tiket.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tiket - ACCUTRACK</title>
    <link rel="stylesheet" href="tiket.css">
</head>
<body>
    <h3>Edit Tiket</h3>
    <form action="" method="post">
        <label for="jenis_tiket">Jenis Tiket</label>
        <select name="jenis_tiket" required>
            <option value="Darat" <?php echo $data['jenis_tiket'] == 'Darat' ? 'selected' : ''; ?>>Darat</option>
            <option value="Udara" <?php echo $data['jenis_tiket'] == 'Udara' ? 'selected' : ''; ?>>Udara</option>
            <option value="Laut" <?php echo $data['jenis_tiket'] == 'Laut' ? 'selected' : ''; ?>>Laut</option>
        </select>

        <label for="kategori_tiket">Kategori Tiket</label>
        <select name="kategori_tiket" required>
            <option value="Ekonomi" <?php echo $data['kategori_tiket'] == 'Ekonomi' ? 'selected' : ''; ?>>Ekonomi</option>
            <option value="Bisnis" <?php echo $data['kategori_tiket'] == 'Bisnis' ? 'selected' : ''; ?>>Bisnis</option>
            <option value="VIP" <?php echo $data['kategori_tiket'] == 'VIP' ? 'selected' : ''; ?>>VIP</option>
        </select>

        <label for="negara">Negara</label>
        <input type="text" name="negara" value="<?php echo $data['negara']; ?>" required />

        <label for="harga">Harga</label>
        <input type="number" name="harga" step="0.01" value="<?php echo $data['harga']; ?>" required />

        <button type="submit" name="update">Perbarui</button>
    </form>
    <a href="tiket.php">Kembali</a>
</body>
</html>
