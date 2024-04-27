<?php
// Memulai sesi
session_start();

// Menghapus cookies
// Menghapus cookie 'username' dengan menetapkan waktu kedaluwarsa di masa lalu
setcookie('username', '', time() - 3600, '/');

// Jika ada cookie lain yang digunakan (misalnya, token autentikasi), hapus juga di sini
// setcookie('auth_token', '', time() - 3600, '/');

// Menghapus sesi
session_unset(); // Menghapus semua variabel sesi
session_destroy(); // Menghancurkan sesi

// Mengarahkan pengguna ke halaman login
header('Location: login.php');
exit;
?>
