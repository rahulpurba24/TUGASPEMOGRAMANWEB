<?php
// Start session
session_start();

// Destroy session
session_destroy();

// Check and clear the login cookie if it exists
if (isset($_COOKIE['login'])) {
    setcookie("login", "", time() - 3600);
}

// Redirect to login page
header('Location: ./login.php');
exit();
?>
