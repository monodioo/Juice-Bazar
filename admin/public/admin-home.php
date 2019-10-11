<?php

session_start();

if (!empty($_SESSION['admin'])) {
    include_once __DIR__ . '/../include/DatabaseConnection.php';
    include_once __DIR__ . '/../include/DatabaseFunctions.php';

    $title = "Juice Bazar - Admin Home";

    ob_start();

    include __DIR__ . '/../templates/admin-home.html.php';

    $output = ob_get_clean();
}


include __DIR__ . '/../templates/layout.html.php';
