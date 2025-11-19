<?php
function hitungSaldoAkhir($saldoAwal, $bulan) {
    // Biaya administrasi per bulan
    $biayaAdministrasi = 9000;
    
    // Menentukan bunga per tahun berdasarkan saldo awal
    if ($saldoAwal < 1100000) {
        $bungaTahunan = 0.03; // 3% per tahun
    } else {
        $bungaTahunan = 0.04; // 4% per tahun
    }

    // Menghitung bunga per bulan
    $bungaBulanan = $bungaTahunan / 12;

    // Proses perhitungan saldo akhir
    for ($i = 1; $i <= $bulan; $i++) {
        // Menghitung bunga bulan ini
        $bunga = $saldoAwal * $bungaBulanan;
        // Menghitung saldo setelah bunga dan biaya administrasi
        $saldoAwal = $saldoAwal + $bunga - $biayaAdministrasi;
    }

    return $saldoAwal;
}

// Form untuk menginput saldo awal dan jumlah bulan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $saldoAwal = $_POST['saldoAwal'];
    $bulan = $_POST['bulan'];

    // Memanggil fungsi untuk menghitung saldo akhir
    $saldoAkhir = hitungSaldoAkhir($saldoAwal, $bulan);
    echo "Saldo akhir setelah $bulan bulan adalah Rp " . number_format($saldoAkhir, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Saldo Bank</title>
</head>
<body>
    <h1>Form Perhitungan Saldo Akhir</h1>
    <form method="post">
        <label for="saldoAwal">Saldo Awal (Rp):</label>
        <input type="number" id="saldoAwal" name="saldoAwal" required><br><br>
        
        <label for="bulan">Jumlah Bulan:</label>
        <input type="number" id="bulan" name="bulan" required><br><br>

        <input type="submit" value="Hitung Saldo Akhir">
    </form>
</body>
</html>
