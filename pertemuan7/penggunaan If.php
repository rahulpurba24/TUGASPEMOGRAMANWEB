<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Nilai Akhir dan Keterangan Grade</title>
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
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"],
        input[type="number"],
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
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
        }
        .result h3 {
            margin-top: 0;
            color: #333;
        }
        .result p {
            margin-bottom: 5px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Program Nilai Akhir dan Keterangan Grade</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
            
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" required>
            
            <label for="matakuliah">Mata Kuliah:</label>
            <input type="text" id="matakuliah" name="matakuliah" required>
            
            <label for="jumlah_kehadiran">Jumlah Kehadiran:</label>
            <input type="number" id="jumlah_kehadiran" name="jumlah_kehadiran" required>
            
            <label for="nilai_tugas">Nilai Tugas:</label>
            <input type="number" id="nilai_tugas" name="nilai_tugas" required>
            
            <label for="uts">Nilai UTS:</label>
            <input type="number" id="uts" name="uts" required>
            
            <label for="uas">Nilai UAS:</label>
            <input type="number" id="uas" name="uas" required>
            
            <button type="submit">Hitung</button>
        </form>
        <hr>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Mengambil nilai dari form
            $nama = $_POST["nama"];
            $nim = $_POST["nim"];
            $matakuliah = $_POST["matakuliah"];
            $jumlah_kehadiran = $_POST["jumlah_kehadiran"];
            $nilai_tugas = $_POST["nilai_tugas"];
            $uts = $_POST["uts"];
            $uas = $_POST["uas"];

            // Menghitung nilai akhir
            $nilai_akhir = ($jumlah_kehadiran * 0.1) + ($nilai_tugas * 0.2) + ($uts * 0.3) + ($uas * 0.4);

            // Menentukan keterangan grade
            if ($nilai_akhir >= 80) {
                $grade = "A";
            } elseif ($nilai_akhir >= 70) {
                $grade = "B";
            } elseif ($nilai_akhir >= 60) {
                $grade = "C";
            } elseif ($nilai_akhir >= 50) {
                $grade = "D";
            } else {
                $grade = "E";
            }

            // Menampilkan hasil
            echo "<div class='result'>";
            echo "<h3>Hasil Perhitungan:</h3>";
            echo "<p>Nama: $nama</p>";
            echo "<p>NIM: $nim</p>";
            echo "<p>Mata Kuliah: $matakuliah</p>";
            echo "<p>Nilai Akhir: $nilai_akhir</p>";
            echo "<p>Grade: $grade</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
