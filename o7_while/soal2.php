<?php

// Inisialisasi penghitung jumlah solusi
$jumlah_solusi = 0;

echo "<h1>Semua Pasangan (x, y, z) yang Memenuhi x + y + z = 25</h1>";
echo "<pre>"; // Menggunakan <pre> agar output konsisten (monospace)

// Loop Tingkat 1: Mencari nilai x (1 <= x <= 23)
for ($x = 1; $x <= 23; $x++) {

    // Loop Tingkat 2: Mencari nilai y (1 <= y <= 23)
    // Batasan atas untuk y harus diperbarui: y < 25 - x
    $y_max = 25 - $x - 1; 

    // Jika x sudah 23, maka y_max hanya 1 (karena z harus minimal 1)
    if ($y_max < 1) {
        // Optimasi: Jika x sudah terlalu besar, kita bisa break loop y
        break; 
    }

    for ($y = 1; $y <= $y_max; $y++) {

        // Loop Tingkat 3 (Disederhanakan): Menghitung nilai z
        // z = 25 - x - y
        $z = 25 - $x - $y;

        // Cek Kondisi (Pastikan z adalah bilangan asli)
        // Karena y_max sudah disesuaikan, kita hanya perlu cek z >= 1.
        // Sebenarnya, karena y_max = 25 - x - 1, maka z pasti >= 1.
        
        if ($z >= 1) {
            // Pasangan ditemukan
            echo "X = ".$x.", Y = ".$y.", Z = ".$z."\n";
            $jumlah_solusi++;
        }
    }
}

echo "</pre>";

// Menampilkan total jumlah solusi
echo "<h2>Jumlah penyelesaian : ".$jumlah_solusi."</h2>";

?>