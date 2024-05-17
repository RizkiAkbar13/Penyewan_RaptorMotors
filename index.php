<?php
// Memulai sesi
session_start();

// Memeriksa apakah pengguna telah login
if (!isset($_SESSION['username'])) {
    // Jika belum, redirect ke halaman login
    header("Location: login.php");
    exit;
}

// Jika sudah login, lanjutkan ke konten halaman index
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raptor Motors</title>
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Menambahkan tautan ke file CSS -->
    <link rel="stylesheet" type="text/css" href="sidebar.css"> <!-- Menambahkan tautan ke file CSS sidebar -->
    <link rel="stylesheet" type="text/js" href="popup_box.js">
  

<body>
    <div class="sidebar" id="sidebar">
        <a href="#" class="dashboard">Dashboard</a>
        <a href="#">Profile</a>
        <a href="categories.php">Order</a> <!-- Tautan ke halaman Categories -->
        <a href="pre-order.php">Pre-Order</a>
        <a href="transaction-history.php">Transaction History</a>
        <a href="logout.php" style="color: red;">Logout</a>
        <a href="login.php" class="login-btn">Login</a> <!-- Tombol login dipindahkan ke sidebar -->
    </div>

    <button class="openbtn" id="openbtn">☰</button>

    <header>
        <img src="logocar/logo.png" alt="Logo Rental Mobil" style="width: 300px;">
     
        <div class="home-content">
            <h1>Selamat Datang di Raptor Motors</h1> <!-- Penambahan h1 dengan ucapan selamat datang -->
            <h4>
                <p id="harijam"></p> <!-- Penambahan elemen untuk menampilkan hari dan jam -->
            </h4>
            <p>Sewa mobil impian Anda dengan mudah dan cepat yang pasti murah dari pada yang lain</p> 
            <p>Buruan Sewa Sekarang! Promo terbatas ...!!!</p>
        </div>
    </header>

    <div class="container">
        <h2>Pilihan Mobil</h2>
        <div class="pilihan-mobil">
            <div class="mobil">
                <a href="#" id="cityCarLink">
                    <img src="logocar/1.jpg" alt="Mobil City Car">
                    <h4>City Car</h4>
                    <p>Mulai dari Rp. 400.000/hari</p>
                    <p>Tahun: 2022</p>
                    <p>Kapasitas Penumpang: 4</p>
                </a>
            </div>
            <div class="mobil">
                <a href="#" id="suvLink">
                    <img src="logocar/2.jpg" alt="Mobil SUV">
                    <h4>SUV</h4>
                    <p>Mulai dari Rp. 700.000/hari</p>
                    <p>Tahun: 2023</p>
                    <p>Kapasitas Penumpang: 5</p>
                </a>
            </div>
            <div class="mobil">
                <a href="#" id="mpvLink">
                    <img src="logocar/3.jpg" alt="Mobil MPV">
                    <h4>MPV</h4>
                    <p>Mulai dari Rp. 1.250.000/hari</p>
                    <p>Tahun: 2021</p>
                    <p>Kapasitas Penumpang: 7</p>
                </a>
            </div>
        </div>
    </div>
    <footer>
    </footer>
    <script src="sidebar.js"></script> <!-- Menambahkan tautan ke file JavaScript -->
    <script src="script.js"></script> <!-- Menambahkan tautan ke file JavaScript -->
    <script src="popup_box.js"></script> 

    <script>
        const hariJamElement = document.getElementById('harijam');

        function updateHariJam() {
            const currentDate = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric' };
            const currentHariJam = currentDate.toLocaleString('en-US', options);
            hariJamElement.textContent = currentHariJam;
        }

        updateHariJam(); // Panggil sekali agar hari dan jam ditampilkan 
        setInterval(updateHariJam, 1000);
    </script>
</body>
</html>
