<?php
session_start(); // Mulai sesi untuk menyimpan data transaksi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $nama = $_POST['nama'];
    $nomor_hp = $_POST['nomor_hp'];
    $bank = $_POST['bank'];
    $no_rekening = $_POST['no_rekening'];
    $jumlah_uang = $_POST['jumlah_uang'];
    $pin_atm = $_POST['pin_atm'];

    // Simpan data transaksi ke dalam array
    $transaksi = array(
        'nama' => $nama,
        'nomor_hp' => $nomor_hp,
        'bank' => $bank,
        'no_rekening' => $no_rekening,
        'jumlah_uang' => $jumlah_uang,
        'status' => 'terbayar' // Set status menjadi "terbayar"
    );

    // Tambahkan data transaksi ke dalam array $_SESSION['transaksi']
    if (!isset($_SESSION['transaksi'])) {
        $_SESSION['transaksi'] = array();
    }
    array_push($_SESSION['transaksi'], $transaksi);

    // Redirect ke halaman history transaksi dengan pesan sukses
    $_SESSION['pesan'] = "Pembayaran telah diterima.";
    header("Location: history.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            text-align: center;
            padding: 50px;
        }
        .confirmation-message {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form {
            display: inline-block;
            text-align: left;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            margin-top: 20px;
            background-color: #00A9FF;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #007bbd;
        }
        .notification {
            display: none;
            margin-top: 20px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
        }
    </style>
    <script>
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        function formatNoRekening(input) {
            var value = input.value.replace(/\D/g, '').substring(0, 12);
            var formatted = value.match(/.{1,4}/g);
            if (formatted) {
                input.value = formatted.join('-');
            } else {
                input.value = value;
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            var jumlahUangInput = document.getElementById('jumlah_uang');
            var noRekeningInput = document.getElementById('no_rekening');
            var form = document.querySelector('form');
            var notification = document.querySelector('.notification');

            jumlahUangInput.addEventListener('input', function (e) {
                jumlahUangInput.value = formatRupiah(this.value, 'Rp. ');
            });

            noRekeningInput.addEventListener('input', function (e) {
                formatNoRekening(this);
            });

            form.addEventListener('submit', function (e) {
                e.preventDefault();
                notification.style.display = 'block';
                setTimeout(function () {
                    form.submit();
                }, 2000); // Menampilkan pesan selama 2 detik sebelum mengarahkan ke history.php
            });
        });
    </script>
</head>
<body>
    <div class="confirmation-message">
        <h1>Konfirmasi Pembayaran</h1>
        <form method="POST" action="">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
            
            <label for="nomor_hp">Nomor HP:</label>
            <input type="text" id="nomor_hp" name="nomor_hp" required>
            
            <label for="bank">Bank:</label>
            <select id="bank" name="bank" required>
                <option value="bri">BRI</option>
                <option value="bca">BCA</option>
                <option value="mandiri">Mandiri</option>
                <option value="bni">BNI</option>
            </select>
            
            <label for="no_rekening">Nomor Rekening:</label>
            <input type="text" id="no_rekening" name="no_rekening" required>
            
            <label for="jumlah_uang">Jumlah Uang:</label>
            <input type="text" id="jumlah_uang" name="jumlah_uang" required>
            
            <label for="pin_atm">PIN ATM:</label>
            <input type="password" id="pin_atm" name="pin_atm" required>
            
            <input type="submit" value="Submit">
        </form>
        <div class="notification">Pembayaran telah berhasil!</div>
    </div>
</body>
</html>
