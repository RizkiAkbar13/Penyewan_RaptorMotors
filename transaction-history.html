<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* Gaya untuk daftar transaksi */
        .transaction-history {
            background-color: #f7f7f7; /* Warna latar belakang */
            padding: 20px; /* Padding di sekitar daftar */
            border-radius: 8px; /* Border radius untuk sudut */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Bayangan untuk efek ketinggian */
        }

        /* Gaya untuk setiap item transaksi */
        .transaction-item {
            margin-bottom: 15px; /* Margin bawah antara setiap item */
            padding: 10px; /* Padding di dalam setiap item */
            background-color: #fff; /* Warna latar belakang setiap item */
            border-radius: 4px; /* Border radius untuk sudut item */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Bayangan untuk efek ketinggian item */
        }

        /* Gaya untuk teks dalam setiap item transaksi */
        .transaction-item p {
            margin: 5px 0; /* Margin di antara setiap paragraf */
        }

        /* Gaya untuk footer */
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: left; /* Teks rata kiri */
            background-color: #747171;
            color: #fff;
            padding: 10px 20px;
        }

        /* Gaya untuk sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #f0f0f0;
            overflow-y: auto;
            padding: 20px;
        }

        .sidebar h2 {
            margin-top: 0;
        }

        /* Gaya untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 9px solid #ddd;
        }

        th {
            background-color: #8bff0f70;
        }
    </style>
</head>
<body>
    <header>
        <h1>Transaction History</h1>
    </header>

    <div class="sidebar">
        <h2>Transaction History</h2>
        <ul id="sidebarTransactions">
            <!-- Riwayat transaksi akan ditampilkan di sini -->
        </ul>
    </div>

    <div class="container" style="margin-left: 250px;">
        
        <div class="transaction-history" id="transactionDetails">
            <!-- Detail transaksi akan ditampilkan di sini -->
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Raptor Motors. Copyright protected by akbar.</p>
    </footer>

    <script>
        // Ambil data transaksi dari sessionStorage
        const transactionData = JSON.parse(sessionStorage.getItem('transactionData'));

        // Cek apakah ada data transaksi
        if (transactionData) {
            const transactionDetails = document.getElementById('transactionDetails');

            // Buat elemen untuk setiap item transaksi
            for (const key in transactionData) {
                let label;
                switch (key) {
                    case 'carType':
                        label = 'Tipe Mobil';
                        break;
                    case 'carYear':
                        label = 'Tahun Mobil';
                        break;
                    case 'carBrand':
                        label = 'Merek Mobil';
                        break;
                    case 'startDate':
                        label = 'Tanggal Mulai';
                        break;
                    case 'duration':
                        label = 'Durasi';
                        break;
                    case 'passengers':
                        label = 'Jumlah Penumpang';
                        break;
                    case 'totalPrice':
                        label = 'Total Harga';
                        break;
                    case 'formattedPrice':
                        label = 'Total Harga (Format)';
                        break;
                    default:
                        label = key;
                        break;
                }
                const transactionItem = document.createElement('div');
                transactionItem.classList.add('transaction-item');
                transactionItem.innerHTML = `<p><strong>${label}:</strong> ${transactionData[key]}</p>`;
                transactionDetails.appendChild(transactionItem);
            }
        } else {
            // Jika tidak ada data transaksi, tampilkan pesan kosong
            const transactionDetails = document.getElementById('transactionDetails');
            transactionDetails.innerHTML = "<p>Tidak ada data transaksi yang tersedia</p>";
        }

        window.onload = function() {
            // Ambil data transaksi dari sessionStorage
            const transactionData = JSON.parse(sessionStorage.getItem('dataTransaksi'));

            // Cek apakah ada data transaksi
            if (transactionData) {
                const transactionDetails = document.getElementById('transactionDetails');

                // Buat elemen untuk menampilkan detail transaksi dalam tabel
                transactionDetails.innerHTML = `
                    <table>
                        <tr>
                            <th>Tipe Mobil</th>
                            <th>Tahun Mobil</th>
                            <th>Merek Mobil</th>
                            <th>Tanggal Mulai</th>
                            <th>Durasi</th>
                            <th>Jumlah Penumpang</th>
                            <th>Total Harga</th>
                        </tr>
                        <tr>
                            <td>${transactionData.tipeMobil}</td>
                            <td>${transactionData.tahunMobil}</td>
                            <td>${transactionData.merekMobil}</td>
                            <td>${transactionData.tanggalMulai}</td>
                            <td>${transactionData.durasi} hari</td>
                            <td>${transactionData.jumlahPenumpang}</td>
                            <td>${transactionData.totalHargaFormatted}</td>
                        </tr>
                    </table>
                `;

                // Tambahkan transaksi ke dalam sidebar
                const sidebarTransactions = document.getElementById('sidebarTransactions');
                const transactionListItem = document.createElement('li');
                transactionListItem.textContent = `Tipe Mobil: ${transactionData.tipeMobil}, Tahun Mobil: ${transactionData.tahunMobil}, Merek Mobil: ${transactionData.merekMobil}, Tanggal Mulai: ${transactionData.tanggalMulai}, Durasi: ${transactionData.durasi} hari, Jumlah Penumpang: ${transactionData.jumlahPenumpang}, Total Harga: ${transactionData.totalHargaFormatted}`;
                sidebarTransactions.appendChild(transactionListItem);
            } else {
                // Jika tidak ada data transaksi, tampilkan pesan kosong
                const transactionDetails = document.getElementById('transactionDetails');
                transactionDetails.innerHTML = "<p>Tidak ada data transaksi yang tersedia</p>";

                const sidebarTransactions = document.getElementById('sidebarTransactions');
                sidebarTransactions.innerHTML = "<li>Tidak ada data transaksi yang tersedia</li>";
            }
        };
    </script>
</body>
</html>
