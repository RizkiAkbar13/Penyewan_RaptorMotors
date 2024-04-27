<?php
// Memulai sesi
session_start();

// Periksa apakah cookies sudah diatur
if (isset($_COOKIE['username'])) {
    // Pengguna sudah login, redirect ke halaman utama
    header('Location: index.php');
    exit;
}

// Memeriksa apakah parameter error ada
$error = $_GET['error'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div style="font-family: Arial, sans-serif; margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div style="width: 300px; padding: 20px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">
            <img src="logocar/logo.png" alt="Logo Rental Mobil" style="width: 100px;">
            <h2 style="color: #000000; margin-bottom: 20px;">Selamat Datang</h2>

            <!-- Menampilkan pesan kesalahan jika ada -->
            <?php
            if ($error === 'invalid') {
                echo '<p style="color: red;">Nama User atau password salah. Silakan coba lagi.</p>';
            }
            ?>
            
            <form action="proses-login.php" method="post">
                <label for="username" style="display: block; text-align: left; margin-bottom: 5px;">Username:</label>
                <input type="text" id="username" name="username" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 3px;">
                
                <label for="password" style="display: block; text-align: left; margin-bottom: 5px;">Password:</label>
                <input type="password" id="password" name="password" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 3px;">
                
                <button type="submit" style="background-color: #2980b9; color: #fff; padding: 10px 20px; border: none; border-radius: 3px; cursor: pointer; transition: background-color 0.3s ease;">Login</button>
            </form>
            
            <p>Belum punya akun? <a href="register.php" style="color: #2980b9;">Daftar di sini</a></p>
        
        </div>
    </div>
</body>

</html>
