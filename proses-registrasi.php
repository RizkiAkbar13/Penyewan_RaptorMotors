<?php
// Memulai sesi
session_start();

// Koneksi ke database
$servername = "localhost";
$username = "root"; // Ganti dengan username MySQL Anda
$password = ''; // Ganti dengan password MySQL Anda
$dbname = "rental_mobil";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Ambil data dari formulir registrasi
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Hash password sebelum menyimpannya di database
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Menyiapkan pernyataan SQL INSERT
$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $email, $hashed_password);

// Menjalankan pernyataan SQL
if ($stmt->execute()) {
    // Menutup pernyataan dan koneksi
    $stmt->close();
    $conn->close();
    
    // Tampilan pesan sukses dengan tombol OK
    echo '<div style="text-align: center; padding: 20px;">';
    echo '<h2>Pengguna berhasil ditambahkan!</h2>';
    echo '<p>Silakan klik tombol di bawah untuk login.</p>';
    echo '<form action="login.php" method="get">';
    echo '<button type="submit" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">Login</button>';
    echo '</form>';
    echo '</div>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    // Menutup pernyataan dan koneksi
    $stmt->close();
    $conn->close();
}
?>
