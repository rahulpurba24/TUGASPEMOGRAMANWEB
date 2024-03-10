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
    // Fungsi untuk operasi matematika
    function tambah($x, $y) {
        return $x + $y;
    }

    function kurang($x, $y) {
        return $x - $y;
    }

    function kali($x, $y) {
        return $x * $y;
    }

    function bagi($x, $y) {
        if ($y == 0) {
            return "Tidak bisa dibagi oleh 0!";
        } else {
            return $x / $y;
        }
    }

    // Menangani form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $angka1 = $_POST["angka1"];
        $angka2 = $_POST["angka2"];
        $operator = $_POST["operator"];

        switch ($operator) {
            case "tambah":
                $hasil = tambah($angka1, $angka2);
                break;
            case "kurang":
                $hasil = kurang($angka1, $angka2);
                break;
            case "kali":
                $hasil = kali($angka1, $angka2);
                break;
            case "bagi":
                $hasil = bagi($angka1, $angka2);
                break;
            default:
                $hasil = "Pilihan tidak valid";
        }

        echo "Hasil: $angka1 $operator $angka2 = $hasil";
    }
    ?>
</body>
</html>
