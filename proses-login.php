<?php
// Memulai sesi
session_start();

// Koneksi ke database
$servername = "localhost";
$username_db = "root"; // Ganti dengan username MySQL Anda
$password_db = ""; // Ganti dengan password MySQL Anda
$dbname = "rental_mobil";

// Membuat koneksi
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Ambil data dari formulir login
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Mengambil data pengguna dari database berdasarkan username
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Memeriksa apakah pengguna ditemukan dan password cocok
if ($user && password_verify($password, $user['password'])) {
    // Set session untuk pengguna yang berhasil login
    $_SESSION['username'] = $username;
    
    // Redirect ke halaman index
    header('Location: index.php');
    exit;
} else {
    // Jika login gagal, redirect kembali ke halaman login dengan parameter error
    header('Location: login.php?error=invalid');
    exit;
}

// Menutup pernyataan dan koneksi
$stmt->close();
$conn->close();
?>
