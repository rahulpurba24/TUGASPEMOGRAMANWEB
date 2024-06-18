<?php
$value = 'joko';
$value2 = 'jokosusilo';
setcookie("username", $value);
setcookie("namalengkap", $value2, time() + 3600); // expires in 1 hour
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Ubah Cookie</title>
</head>
<body>
    <h1>Halaman Ubah Cookie</h1>
    <h2>Klik <a href='lihat_cookie.php'>di sini</a> untuk lihat cookie</h2>
</body>
</html>
