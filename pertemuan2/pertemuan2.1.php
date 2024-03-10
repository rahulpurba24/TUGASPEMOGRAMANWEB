<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Nilai Mahasiswa</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Input Nilai Mahasiswa</h1>

    <?php
    // Fungsi untuk menghitung nilai akhir
    function hitungNilaiAkhir($nilaiTugas, $nilaiUTS, $nilaiUAS) {
        return (0.3 * $nilaiTugas) + (0.3 * $nilaiUTS) + (0.4 * $nilaiUAS);
    }

    // Array untuk menyimpan data mahasiswa
    $dataMahasiswa = array();

    // Memproses form ketika dikirimkan
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil data dari form
        $nama       = $_POST["nama"];
        $jurusan    = $_POST["jurusan"];
        $nilaiTugas = $_POST["nilai_tugas"];
        $nilaiUTS   = $_POST["nilai_uts"];
        $nilaiUAS   = $_POST["nilai_uas"];

        // Memastikan nilai-nilai adalah numerik
        if (is_numeric($nilaiTugas) && is_numeric($nilaiUTS) && is_numeric($nilaiUAS)) {
            // Menghitung nilai akhir
            $nilaiAkhir = hitungNilaiAkhir($nilaiTugas, $nilaiUTS, $nilaiUAS);

            // Menambahkan data ke array
            $dataMahasiswa[] = array(
                'Nama'        => $nama,
                'Jurusan'     => $jurusan,
                'Nilai Tugas' => $nilaiTugas,
                'Nilai UTS'   => $nilaiUTS,
                'Nilai UAS'   => $nilaiUAS,
                'Nilai Akhir' => $nilaiAkhir
            );

            // Menampilkan hasil perhitungan terkini
            echo "<h2>Hasil:</h2>";
            echo "<p>Nama           : $nama</p>";
            echo "<p>Jurusan        : $jurusan</p>";
            echo "<p>Nilai Tugas    : $nilaiTugas</p>";
            echo "<p>Nilai UTS      : $nilaiUTS</p>";
            echo "<p>Nilai UAS      : $nilaiUAS</p>";
            echo "<p>Nilai Akhir    : $nilaiAkhir</p>";
        } else {
            echo "<p style='color: red;'>Masukkan nilai numerik untuk Tugas, UTS, dan UAS.</p>";
        }
    }

    // Menampilkan tabel dengan data semua mahasiswa
    if (!empty($dataMahasiswa)) {
        echo "<h2>Rata-rata Nilai Mahasiswa:</h2>";
        echo "<table>";
        echo "<tr>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Nilai Tugas</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>Nilai Akhir</th>
              </tr>";

        $totalNilaiAkhir = 0;

        foreach ($dataMahasiswa as $mahasiswa) {
            echo "<tr>";
            echo "<td>{$mahasiswa['Nama']}</td>";
            echo "<td>{$mahasiswa['Jurusan']}</td>";
            echo "<td>{$mahasiswa['Nilai Tugas']}</td>";
            echo "<td>{$mahasiswa['Nilai UTS']}</td>";
            echo "<td>{$mahasiswa['Nilai UAS']}</td>";
            echo "<td>{$mahasiswa['Nilai Akhir']}</td>";
            echo "</tr>";

            // Menambahkan nilai akhir untuk perhitungan rata-rata
            $totalNilaiAkhir += $mahasiswa['Nilai Akhir'];
        }

        $rataRata = count($dataMahasiswa) > 0 ? $totalNilaiAkhir / count($dataMahasiswa) : 0;

        echo "</table>";
        echo "<p>Rata-rata Nilai Akhir: $rataRata</p>";
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br>

        <label for="jurusan">Jurusan:</label>
        <input type="text" name="jurusan" required><br>

        <label for="nilai_tugas">Nilai Tugas:</label>
        <input type="text" name="nilai_tugas" required><br>

        <label for="nilai_uts">Nilai UTS:</label>
        <input type="text" name="nilai_uts" required><br>

        <label for="nilai_uas">Nilai UAS:</label>
        <input type="text" name="nilai_uas" required><br>

        <input type="submit" value="Hitung Nilai">
    </form>
</body>
</html>
