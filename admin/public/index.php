<?php
session_start();

if (!empty($_SESSION['admin'])) {
    header('location: admin-home.php');
}

include_once __DIR__ . '/../include/DatabaseConnection.php';
include_once __DIR__ . '/../include/DatabaseFunctions.php';

$title = "Juice Bazar - Admin Login";

if (isset($_POST['loginSubmit'])) {
    $adminName = $_POST['adminName'];
    $adminPass = $_POST['adminPass'];

    $result = adminLogin($pdo, $adminName, $adminPass);

    if ($result === 'userError') {

        echo "<script>alert('aha')</script>";
        ob_start();
        include __DIR__ . '/../templates/login.html.php';
        $output = ob_get_clean();
    } else if ($result === 'passError') {

        echo "<script>alert('Wrong Password')</script>";
        ob_start();
        include __DIR__ . '/../templates/login.html.php';
        $output = ob_get_clean();
    } else if ($result === 'ok') {
        $_SESSION['admin'] = $adminName;
        $_SESSION['logged_in'] = time();
        $_SESSION['flashMessage'] = 'Login successful!';
        header("location: admin-home.php");
    }
} else {
    ob_start();

    include __DIR__ . '/../templates/login.html.php';

    $output = ob_get_clean();
}


include __DIR__ . '/../templates/layout.html.php';
