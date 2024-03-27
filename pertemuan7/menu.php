<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi Pemrograman PHP</title>
</head>
<body>
    <h2>Materi Pemrograman PHP</h2>
    <form method="get">
        <label for="menu">Pilih Materi yang ingin anda pelajari :</label><br>
        <select id="menu" name="menu">
            <option value="1">Penggunaan IF</option>
            <option value="2">Penggunaan SWITCH..CASE</option>
            <option value="3">Penggunaan Looping</option>
            <option value="4">Penggunaan Array</option>
        </select><br><br>
        <button type="submit">Submit</button>
    </form>

    <?php
    if (isset($_GET['menu'])) {
        $menu = $_GET['menu'];
        
        switch ($menu) {
            case 1:
                echo "<h3>Penggunaan IF</h3>";
                // Kode untuk penggunaan IF disini
                break;
            case 2:
                echo "<h3>Penggunaan SWITCH..CASE</h3>";
                // Kode untuk penggunaan SWITCH..CASE disini
                break;
            case 3:
                echo "<h3>Penggunaan Looping</h3>";
                // Kode untuk penggunaan Looping disini
                break;
            case 4:
                echo "<h3>Penggunaan Array</h3>";
                // Kode untuk penggunaan Array disini
                break;
            default:
                echo "<p>Pilihan tidak valid.</p>";
        }
    }
    ?>
</body>
</html>
