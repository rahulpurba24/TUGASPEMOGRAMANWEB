<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Nilai Akhir dan Keterangan Grade</title>
</head>
<body>
    <h2>Program Nilai Akhir dan Keterangan Grade</h2>
    <h2>Nama:Rahul Beget Pandapotan Purba</h2>
    <h2>Nim:211011401037</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br>
        
        <label for="nim">NIM:</label><br>
        <input type="text" id="nim" name="nim" required><br>
        
        <label for="matakuliah">Mata Kuliah:</label><br>
        <input type="text" id="matakuliah" name="matakuliah" required><br>
        
        <label for="jumlah_kehadiran">Jumlah Kehadiran:</label><br>
        <input type="number" id="jumlah_kehadiran" name="jumlah_kehadiran" required><br>
        
        <label for="nilai_tugas">Nilai Tugas:</label><br>
        <input type="number" id="nilai_tugas" name="nilai_tugas" required><br>
        
        <label for="uts">Nilai UTS:</label><br>
        <input type="number" id="uts" name="uts" required><br>
        
        <label for="uas">Nilai UAS:</label><br>
        <input type="number" id="uas" name="uas" required><br>
        
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
        echo "<h3>Hasil Perhitungan:</h3>";
        echo "Nama: $nama<br>";
        echo "NIM: $nim<br>";
        echo "Mata Kuliah: $matakuliah<br>";
        echo "Nilai Akhir: $nilai_akhir<br>";
        echo "Grade: $grade<br>";
    }
    ?>
</body>
</html>
