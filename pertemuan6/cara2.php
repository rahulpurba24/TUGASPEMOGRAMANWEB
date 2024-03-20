<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>menghitung Luas Segitiga - Cara 2</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }
    h2 {
        margin-bottom: 20px;
    }
    form {
        margin-bottom: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    table th, table td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    table th {
        background-color: #f2f2f2;
    }
</style>
</head>
<body>
    <h2>Luas Segitiga - Cara 2</h2>
    <form method="post" action="">
        <?php
        // Menampilkan form input untuk 5 segitiga
        for ($i = 1; $i <= 5; $i++) {
            echo "<h4>Segitiga ke-$i</h4>";
            echo "<label for='alas_$i'>Alas:</label>";
            echo "<input type='number' id='alas_$i' name='alas[]' required>";
            echo "<label for='tinggi_$i'>Tinggi:</label>";
            echo "<input type='number' id='tinggi_$i' name='tinggi[]' required><br><br>";
        }
        ?>
        <input type="submit" value="Hitung">
    </form>

    <?php
    // Memproses input dan menampilkan hasil perhitungan luas segitiga
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $alas = $_POST['alas'];
        $tinggi = $_POST['tinggi'];

        echo "<h3>Hasil Perhitungan</h3>";
        echo "<table>";
        echo "<tr><th>No</th><th>Alas</th><th>Tinggi</th><th>Luas</th></tr>";
        for ($i = 0; $i < count($alas); $i++) {
            $luas = 0.5 * $alas[$i] * $tinggi[$i];
            echo "<tr>";
            echo "<td>".($i+1)."</td>";
            echo "<td>{$alas[$i]}</td>";
            echo "<td>{$tinggi[$i]}</td>";
            echo "<td>$luas</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>
