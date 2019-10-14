<?php

session_start();

if (!empty($_SESSION['admin'])) {

    include_once __DIR__ . '/../include/DatabaseConnection.php';
    include_once __DIR__ . '/../include/DatabaseFunctions.php';

    try {
        if (isset($_POST['switchProductBtn'])) {

            $newStatus = ($_POST['switchProductStatus'] == 0) ? 1 : 0;
            switchProductStatus($pdo, 'product', 'ProductId', $_POST['switchProductId'], 'Status', $newStatus);

            header('location: admin-products.php');
        } else {
            header('location: admin-products.php');
        }
    } catch (PDOException $e) {
        $title = 'An error has occurred';

        $output = 'Database error: ' . $e->getMessage() . ' in ' .
            $e->getFile() . ':' . $e->getLine();
    }
} else {

    header('location: index.php');
}
