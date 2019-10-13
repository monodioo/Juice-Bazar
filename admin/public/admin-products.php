<?php

session_start();

if (!empty($_SESSION['admin'])) {
    include_once __DIR__ . '/../include/DatabaseConnection.php';
    include_once __DIR__ . '/../include/DatabaseFunctions.php';

    $title = "Juice Bazar - Admin - Products";

    $products = getProducts($pdo);

    ob_start();

    include __DIR__ . '/../templates/admin-products.html.php';

    $output = ob_get_clean();
} else {
    header('location: index.php');
}


include __DIR__ . '/../templates/layout.html.php';
