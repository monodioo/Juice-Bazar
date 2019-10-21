<?php

session_start();

if (!empty($_SESSION['admin'])) {
    include_once __DIR__ . '/../include/DatabaseConnection.php';
    include_once __DIR__ . '/../include/DatabaseFunctions.php';

    $title = "Juice Bazar - Admin Home";

    ob_start();

    include __DIR__ . '/../templates/admin-home.html.php';

    $output = ob_get_clean();

    if (isset($_SESSION['flashMessage'])) {
        echo "<script>alert('$_SESSION[flashMessage]')</script>";
        unset($_SESSION['flashMessage']);
    }
} else {
    header('location: index.php');
}


include __DIR__ . '/../templates/layout.html.php';
