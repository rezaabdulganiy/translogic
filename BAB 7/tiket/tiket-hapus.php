<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM tb_tiket WHERE id = $id";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil dihapus!');window.location='tiket.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!');</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan!');window.location='tiket.php';</script>";
}
?>
