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

    $adminLogin = adminLogin($pdo, $adminName, $adminPass);
    // $output = print_r($adminLogin);
    if ($adminLogin) {
        header("location: admin-home.php");
    } else {
        $output = "Please check login details.";
    }
} else {
    ob_start();

    include __DIR__ . '/../templates/login.html.php';

    $output = ob_get_clean();
}


include __DIR__ . '/../templates/layout.html.php';
