<?php
include '../koneksi.php';
require_once("../dompdf/autoload.inc.php");

use Dompdf\Dompdf;

// Inisialisasi Dompdf
$dompdf = new Dompdf();

// Query untuk mengambil data dari database
$query = mysqli_query($koneksi, "SELECT * FROM tb_tiket");

// Awal pembuatan HTML
$html = '<center><h3>Daftar Tiket</h3></center><hr/><br>';
$html .= '<table border="1" width="100%" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Jenis Tiket</th>
                    <th>Kategori</th>
                    <th>Negara</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>';

while ($data = mysqli_fetch_assoc($query)) {
    $html .= "<tr>
                <td>" . htmlspecialchars($data['jenis_tiket']) . "</td>
                <td>" . htmlspecialchars($data['kategori_tiket']) . "</td>
                <td>" . htmlspecialchars($data['negara']) . "</td>
                <td>Rp " . number_format($data['harga'], 2, ',', '.') . "</td>
              </tr>";
}
$html .= "</tbody></table>";

// Memuat HTML ke Dompdf
$dompdf->loadHtml($html);

// Menentukan ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');

// Rendering dari HTML ke PDF
$dompdf->render();

// Output file PDF
$dompdf->stream('tiket_data.pdf', array("Attachment" => false)); // Untuk menampilkan PDF di browser
?>
