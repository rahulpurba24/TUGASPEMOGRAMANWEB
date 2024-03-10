<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
</head>
<body>
    <h2>Kalkulator Sederhana</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="number" name="angka1" placeholder="Masukkan angka pertama" required>
        <select name="operator" required>
            <option value="">Pilih operasi</option>
            <option value="tambah">+</option>
            <option value="kurang">-</option>
            <option value="kali">x</option>
            <option value="bagi">/</option>
        </select>
        <input type="number" name="angka2" placeholder="Masukkan angka kedua" required>
        <button type="submit">Hitung</button>
    </form>
    <hr>
    <?php
    // Menangani form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $angka1 = $_POST["angka1"];
        $angka2 = $_POST["angka2"];
        $operator = $_POST["operator"];

        // Melakukan operasi matematika berdasarkan operator yang dipilih menggunakan switch case
        switch ($operator) {
            case "tambah":
                $hasil = $angka1 + $angka2;
                echo "Hasil: $angka1 + $angka2 = $hasil";
                break;
            case "kurang":
                $hasil = $angka1 - $angka2;
                echo "Hasil: $angka1 - $angka2 = $hasil";
                break;
            case "kali":
                $hasil = $angka1 * $angka2;
                echo "Hasil: $angka1 x $angka2 = $hasil";
                break;
            case "bagi":
                if ($angka2 == 0) {
                    echo "Tidak bisa dibagi oleh 0!";
                } else {
                    $hasil = $angka1 / $angka2;
                    echo "Hasil: $angka1 / $angka2 = $hasil";
                }
                break;
            default:
                echo "Pilihan tidak valid";
        }
    }
    ?>
</body>
</html>
