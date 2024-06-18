<?php
// Static variables
$user = 'admin';
$pass = md5('admin');

// Start session
session_start();

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check login credentials
    if ($username == $user && md5($password) == $pass) {
        // Set session
        $_SESSION['login'] = TRUE;

        // Check remember me
        if (isset($_POST['remember'])) {
            // Set current time
            $time = time();

            // Set cookie
            setcookie('login', $user, $time + 3600);
        }

        // Redirect to home page
        header('Location: ./home.php');
        exit();
    } else {
        // Redirect to login page if credentials are incorrect
        header('Location: ./login.php');
        exit();
    }
} else {
    // Redirect to login page if the request method is not POST
    header('Location: ./login.php');
    exit();
}
?>
