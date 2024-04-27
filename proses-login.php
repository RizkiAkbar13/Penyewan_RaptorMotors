<?php
// Memulai sesi
session_start();

// Ambil data dari formulir login
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Logika autentikasi pengguna
$authenticated = false; // Anda harus mengganti ini dengan logika autentikasi yang benar

// Contoh sederhana autentikasi pengguna (harus diganti dengan logika yang tepat)
if ($username === 'Akbar' && $password === '1234') {
    $authenticated = true;
}

// Jika autentikasi berhasil, atur cookies
if ($authenticated) {
    // Menyimpan data pengguna dalam cookies
    setcookie('username', $username, time() + (86400 * 30), '/'); // Cookie berlaku selama 30 hari
    
    // Redirect ke halaman utama atau halaman tujuan lain
    header('Location: index.php');
    exit;
} else {
    // Jika login gagal, redirect kembali ke halaman login dengan parameter error
    header('Location: login.php?error=invalid');
    exit;
}
?>
