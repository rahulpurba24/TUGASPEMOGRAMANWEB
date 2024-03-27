<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            text-align: center;
        }
        input[type="number"],
        select {
            width: calc(100% - 10px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: none;
            border-top: 1px solid #ccc;
        }
        .result {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            text-align: center;
        }
        .result h3 {
            margin-top: 0;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Kalkulator Sederhana</h2>
        <h2>Nama: Rahul Beget Pandapotan Purba</h2>
        <h2>NIM: 211011401037</h2>
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
                    echo "<div class='result'><h3>Hasil: $angka1 + $angka2 = $hasil</h3></div>";
                    break;
                case "kurang":
                    $hasil = $angka1 - $angka2;
                    echo "<div class='result'><h3>Hasil: $angka1 - $angka2 = $hasil</h3></div>";
                    break;
                case "kali":
                    $hasil = $angka1 * $angka2;
                    echo "<div class='result'><h3>Hasil: $angka1 x $angka2 = $hasil</h3></div>";
                    break;
                case "bagi":
                    if ($angka2 == 0) {
                        echo "<div class='result'><h3>Tidak bisa dibagi oleh 0!</h3></div>";
                    } else {
                        $hasil = $angka1 / $angka2;
                        echo "<div class='result'><h3>Hasil: $angka1 / $angka2 = $hasil</h3></div>";
                    }
                    break;
                default:
                    echo "<div class='result'><h3>Pilihan tidak valid</h3></div>";
            }
        }
        ?>
    </div>
</body>
</html>
