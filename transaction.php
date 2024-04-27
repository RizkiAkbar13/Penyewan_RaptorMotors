<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="transaction.css">
</head>
<body>
    <header>
        <h1>Transaksi</h1>
    </header>

    <div class="container">
        <h2>Detail Transaksi</h2>
        <div class="transaction-details" id="transactionDetails">
            <!-- Detail transaksi akan ditampilkan di sini -->
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Raptor Motors. Copyright protected by akbar.</p>
    </footer>

    <button onclick="handleOkButtonClick()">OK</button>

    <script>
        function handleOkButtonClick() {
            // Simpan data transaksi ke sessionStorage
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const tipeMobil = urlParams.get('carType');
            const tahunMobil = urlParams.get('carYear');
            const merekMobil = urlParams.get('carBrand');
            const tanggalMulai = urlParams.get('startDate');
            const durasi = urlParams.get('duration');
            const jumlahPenumpang = urlParams.get('passengers');

            let hargaSewaPerHari;
            if (tipeMobil === 'city') {
                hargaSewaPerHari = 400000;
            } else if (tipeMobil === 'suv') {
                hargaSewaPerHari = 700000;
            } else if (tipeMobil === 'mpv') {
                hargaSewaPerHari = 1250000;
            } else {
                hargaSewaPerHari = 0;
            }

            const totalHarga = hargaSewaPerHari * durasi;
            const totalHargaFormatted = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalHarga);

            const dataTransaksi = {
                tipeMobil: tipeMobil,
                tahunMobil: tahunMobil,
                merekMobil: merekMobil,
                tanggalMulai: tanggalMulai,
                durasi: durasi,
                jumlahPenumpang: jumlahPenumpang,
                totalHarga: totalHarga,
                totalHargaFormatted: totalHargaFormatted
            };
            sessionStorage.setItem('dataTransaksi', JSON.stringify(dataTransaksi));

            // Redirect to Transaction History page
            window.location.href = "transaction-history.php";
        }

        window.onload = function() {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const tipeMobil = urlParams.get('carType');
            const tahunMobil = urlParams.get('carYear');
            const merekMobil = urlParams.get('carBrand');
            const tanggalMulai = urlParams.get('startDate');
            const durasi = urlParams.get('duration');
            const jumlahPenumpang = urlParams.get('passengers');

            let hargaSewaPerHari;
            if (tipeMobil === 'city') {
                hargaSewaPerHari = 400000;
            } else if (tipeMobil === 'suv') {
                hargaSewaPerHari = 700000;
            } else if (tipeMobil === 'mpv') {
                hargaSewaPerHari = 1250000;
            } else {
                hargaSewaPerHari = 0;
            }

            const totalHarga = hargaSewaPerHari * durasi;
            const totalHargaFormatted = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalHarga);

            const transactionDetails = document.getElementById('transactionDetails');
            transactionDetails.innerHTML = `
                <p><strong>Tipe Mobil:</strong> ${tipeMobil}</p>
                <p><strong>Tahun Mobil:</strong> ${tahunMobil}</p>
                <p><strong>Merek Mobil:</strong> ${merekMobil}</p>
                <p><strong>Tanggal Mulai:</strong> ${tanggalMulai}</p>
                <p><strong>Durasi:</strong> ${durasi} hari</p>
                <p><strong>Jumlah Penumpang:</strong> ${jumlahPenumpang}</p>
                <p><strong>Total Harga:</strong> ${totalHargaFormatted}</p>
            `;
        };
    </script>
</body>
