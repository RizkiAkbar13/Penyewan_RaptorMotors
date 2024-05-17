<?php
// Koneksi ke database
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "rental_kendaraan";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Fungsi untuk membaca data
function getPemesanan($conn) {
    $sql = "SELECT * FROM pesanan_mobil";
    $result = $conn->query($sql);
    return $result;
}

// Fungsi untuk menambah data
if (isset($_POST['create'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $jenis_mobil = $_POST['jenis_mobil'];
    $tanggal_pesan = $_POST['tanggal_pesan'];

    $sql = "INSERT INTO pesanan_mobil (nama, email, telepon, jenis_mobil, tanggal_pesan) VALUES ('$nama', '$email', '$telepon', '$jenis_mobil', '$tanggal_pesan')";
    $conn->query($sql);
    header("Location: pre-order.php");
}

// Fungsi untuk mengupdate data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $jenis_mobil = $_POST['jenis_mobil'];
    $tanggal_pesan = $_POST['tanggal_pesan'];

    $sql = "UPDATE pesanan_mobil SET nama='$nama', email='$email', telepon='$telepon', jenis_mobil='$jenis_mobil', tanggal_pesan='$tanggal_pesan' WHERE id=$id";
    $conn->query($sql);
    header("Location: pre-order.php");
}

// Fungsi untuk menghapus data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM pesanan_mobil WHERE id=$id";
    $conn->query($sql);
    header("Location: pre-order.php");
}
?>
