<?php
// Script to delete cookies
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    // Set the expiration date to one hour ago
    setcookie("username", "", time() - 3600);
    setcookie("namalengkap", "", time() - 3600);
    header("Location: hapus_cookie.php?deleted=true");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hapus Cookie</title>
    <script>
        function deleteCookies() {
            document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            document.cookie = "namalengkap=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            window.location.href = "hapus_cookie.php?deleted=true";
        }
    </script>
</head>
<body>
    <?php if (isset($_GET['deleted']) && $_GET['deleted'] == 'true'): ?>
        <h1>Cookie Berhasil Dihapus.</h1>
    <?php else: ?>
        <h1>Hapus Cookie</h1>
        <button onclick="deleteCookies()">Hapus Cookies</button>
    <?php endif; ?>
    <h2>Klik <a href='buat_cookie.php'>di sini</a> untuk buat cookies</h2>
    <h2>Klik <a href='lihat_cookie.php'>di sini</a> untuk melihat isi cookie</h2>
</body>
</html>
