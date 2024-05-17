<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>
<body>
    <div style="font-family: Arial, sans-serif; margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div style="width: 300px; padding: 20px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">
            <img src="logocar/logo.png" alt="Logo Rental Mobil" style="width: 100px;">
            <h2 style="color: #333; margin-bottom: 20px;">Registrasi</h2>
            <form action="proses-registrasi.php" method="post">
                <label for="username" style="display: block; text-align: left; margin-bottom: 5px;">Username:</label>
                <input type="text" id="username" name="username" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 3px;">
                
                <label for="email" style="display: block; text-align: left; margin-bottom: 5px;">Email:</label>
                <input type="email" id="email" name="email" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 3px;">
                
                <label for="password" style="display: block; text-align: left; margin-bottom: 5px;">Password:</label>
                <input type="password" id="password" name="password" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 3px;">
            
                
                <button type="submit" style="background-color: #2980b9; color: #fff; padding: 10px 20px; border: none; border-radius: 3px; cursor: pointer; transition: background-color 0.3s ease;">Registrasi</button>
            </form>
            
            <p>Sudah punya akun? <a href="login.php" style="color: #2980b9;">Login di sini</a></p>
            
            <button onclick="window.location.href = 'login.php';" style="background-color: #ccc; color: #333; padding: 10px 20px; border: none; border-radius: 3px; cursor: pointer; transition: background-color 0.3s ease; margin-top: 20px;">Kembali ke Halaman Awal</button>
        </div>
    </div>
</body>
</html>
