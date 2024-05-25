<?php
include 'pemesanan_crud.php'; 

// Mengatur zona waktu
date_default_timezone_set('Asia/Jakarta');

// Mengambil data pre-order dari database
$pemesanan = getPemesanan($conn);

// Fungsi untuk menyandikan gambar ke base64
function imageToBase64($imagePath) {
    $imageData = file_get_contents($imagePath);
    $base64 = base64_encode($imageData);
    $mimeType = mime_content_type($imagePath);
    return 'data:' . $mimeType . ';base64,' . $base64;
}

$logoBase64 = imageToBase64('logocar/logo.png');

// Mulai output buffering agar kita dapat mengontrol output sebelum dicetak
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Pre-Order</title>
    <style>
        /* Gaya CSS untuk cetak */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #ACD793;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        /* Gaya CSS untuk header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 0 20px;
        }

        header img {
            width: 100px;
            height: auto;
        }

        header .title {
            flex-grow: 1;
            text-align: center;
        }

        header .date-time {
            text-align: right;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
    <!-- Header dengan logo -->
    <header>
        <img src="<?php echo $logoBase64; ?>" alt="Logo Rental Mobil">
        <div class="title">
            <h1>Data Pre-Order</h1>
        </div>
        <div class="date-time">
            <p>Tanggal Cetak: <?php echo date("d F Y"); ?></p>
            <p>Waktu Cetak: <?php echo date("H:i"); ?></p>
        </div>
    </header>

    <!-- Tabel Data Pre-Order -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Jenis Mobil</th>
                <th>Tanggal Pesan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($pemesanan->num_rows > 0) {
                while($row = $pemesanan->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row['id']."</td>
                            <td>".$row['nama']."</td>
                            <td>".$row['email']."</td>
                            <td>".$row['telepon']."</td>
                            <td>".$row['jenis_mobil']."</td>
                            <td>".$row['tanggal_pesan']."</td>
                        </tr>";
                }
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
// Simpan konten HTML yang telah dibuat dalam buffer
$content = ob_get_clean();

// Set header agar browser menganggap file ini sebagai file PDF
header("Content-Type: application/pdf");
header("Content-Disposition: attachment; filename=preorder_data.pdf");

// Konversi HTML ke PDF dan tampilkan
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($content);
$dompdf->setPaper('A4', 'landscape'); 
$dompdf->render();
$dompdf->stream();
?>
