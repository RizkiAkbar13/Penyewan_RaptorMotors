<?php
// Memulai sesi
session_start();

// Memeriksa apakah pengguna telah login
if (!isset($_SESSION['username'])) {
    // Jika belum, redirect ke halaman login
    header("Location: login.php");
    exit;
}

include 'pemesanan_crud.php';

// Jika sudah login, lanjutkan ke konten halaman pre-order
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pre-Order</title>
    <style>
        /* Gaya CSS untuk data pre-order */
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

        .action-buttons {
            display: flex;
            justify-content: space-between;
        }

        .action-buttons a {
            padding: 6px 12px;
            text-align: center;
            text-decoration: none;
            background-color: #FF0000;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .action-buttons a.edit-button {
            background-color: #008DDA; 
        }

        .action-buttons a.delete-button {
            background-color: #FF0000; 
        }

        .action-buttons a:hover {
            background-color: #F6F5F2;
        }

        .container {
            margin-top: 20px;
        }

        .form-container {
            margin-bottom: 20px;
        }

        .form-container form div {
            margin-bottom: 15px;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-container input {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-container button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        /* Warna untuk setiap baris pada tabel data pre-order */
        tr:nth-child(odd) {
            background-color: #f9f9f9; /* Warna latar belakang untuk baris ganjil */
        }

        /* Warna untuk tombol tambah */
        .form-container button[name="create"] {
            background-color: #28a745; /* Warna hijau */
        }

        .form-container button[name="create"]:hover {
            background-color: #218838; /* Warna hijau gelap saat tombol dihover */
        }

        /* Warna untuk tombol update */
        .form-container button[name="update"] {
            background-color: #ffc107; /* Warna kuning */
        }
        .print-button {
            display: inline-block;
            padding: 10px 20px;
            margin-bottom: 20px;
            background-color: #006769; /* Warna hijau */
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .form-container button[name="update"]:hover {
            background-color: #e0a800; /* Warna kuning gelap saat tombol dihover */
        }
    </style>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="sidebar.css">
</head>
<body>
    <div class="sidebar" id="sidebar">
        <a href="index.php" class="dashboard">Dashboard</a>
        <a href="#">Profile</a>
        <a href="categories.php">Categories</a>
        <a href="transaction-history.php">Transaction History</a>
        <a href="logout.php" style="color: red;">Logout</a>
    </div>
    <button class="openbtn" id="openbtn">☰</button>
    <header>
        <img src="logocar/logo.png" alt="Logo Rental Mobil" style="width: 300px;">
        <h1>Pre-Order sewa Mobil</h1>
    </header>

    <div class="container">
        <div class="form-container">
            <h2>Form Tambah Data Pre-Order</h2>
            <form action="pemesanan_crud.php" method="POST">
                <input type="hidden" name="id" id="id">
                <div>
                    <label for="nama">Nama:</label>
                    <input type="text" name="nama" id="nama" required>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div>
                    <label for="telepon">Telepon:</label>
                    <input type="text" name="telepon" id="telepon" required>
                </div>
                <div>
                    <label for="jenis_mobil">Jenis Mobil:</label>
                    <input type="text" name="jenis_mobil" id="jenis_mobil" required>
                </div>
                <div>
                    <label for="tanggal_pesan">Tanggal Pesan:</label>
                    <input type="date" name="tanggal_pesan" id="tanggal_pesan" required>
                </div>
                <div>
                    <button type="submit" name="create">Tambah</button>
                    <button type="submit" name="update">Update</button>
                </div>
            </form>
        </div>

        <div class="table-container">
            <h2>Data Pre-Order</h2>
            <a href="print_preorder.php" target="_blank" class="print-button">Cetak</a>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Jenis Mobil</th>
                        <th>Tanggal Pesan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $pemesanan = getPemesanan($conn);
                    if ($pemesanan->num_rows > 0) {
                        while($row = $pemesanan->fetch_assoc()) {
                            echo "<tr>
                                    <td>".$row['id']."</td>
                                    <td>".$row['nama']."</td>
                                    <td>".$row['email']."</td>
                                    <td>".$row['telepon']."</td>
                                    <td>".$row['jenis_mobil']."</td>
                                    <td>".$row['tanggal_pesan']."</td>
                                    <td class='action-buttons'>
                                        <a href='pre-order.php?edit=".$row['id']."' class='action-button edit-button'>Edit</a>
                                      <a href='pemesanan_crud.php?delete=".$row['id']."' class='action-button delete-button'>Hapus</a>
                                    </td>
                                  </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer>
    <script src="sidebar.js"></script>
    </footer>

    <?php
    // Fungsi untuk mengisi data form saat tombol edit diklik
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $result = $conn->query("SELECT * FROM pesanan_mobil WHERE id=$id") or die($conn->error);
        if ($result->num_rows > 0) {
            $row = $result->fetch_array();
            $nama = $row['nama'];
            $email = $row['email'];
            $telepon = $row['telepon'];
            $jenis_mobil = $row['jenis_mobil'];
            $tanggal_pesan = $row['tanggal_pesan'];
            echo "<script>
                    document.getElementById('id').value = '$id';
                    document.getElementById('nama').value = '$nama';
                    document.getElementById('email').value = '$email';
                    document.getElementById('telepon').value = '$telepon';
                    document.getElementById('jenis_mobil').value = '$jenis_mobil';
                    document.getElementById('tanggal_pesan').value = '$tanggal_pesan';
                  </script>";
        }
    }
    ?>
</body>
</html>
