<?php
if (isset($_COOKIE['username'])) {
    echo "<h1>Cookie 'username' ada. Isinya: " . $_COOKIE['username'] . "</h1>";
} else {
    echo "<h1>Cookie 'username' TIDAK ada.</h1>";
}

if (isset($_COOKIE['namalengkap'])) {
    echo "<h1>Cookie 'namalengkap' ada. Isinya: " . $_COOKIE['namalengkap'] . "</h1>";
} else {
    echo "<h1>Cookie 'namalengkap' TIDAK ada.</h1>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lihat Cookie</title>
</head>
<body>
    <h2>Klik <a href='buat_cookie.php'>di sini</a> untuk penciptaan cookies</h2>
    <h2>Klik <a href='ubah_cookie.php'>di sini</a> untuk ubah cookies</h2>
    <h2>Klik <a href='hapus_cookie.php'>di sini</a> untuk penghapusan cookies</h2>
</body>
</html>
