<?php

session_start();

if (!empty($_SESSION['admin'])) {

    include_once __DIR__ . '/../DatabaseConnection.php';
    include_once __DIR__ . '/../DatabaseFunctions.php';

    try {
        if (isset($_POST['switchProductBtn'])) {

            $newStatus = ($_POST['switchProductStatus'] == 0) ? 1 : 0;
            switchStatus($pdo, 'product', 'ProductId', $_POST['switchProductId'], 'Status', $newStatus);

            $_SESSION['flashMessage'] = $newStatus == 1 ? 'Product enabled' : 'Product disabled';
            header('location: ../../public/admin-products.php');
        } else {
            header('location: ../../public/admin-products.php');
        }
    } catch (PDOException $e) {
        $title = 'An error has occurred';

        $output = 'Database error: ' . $e->getMessage() . ' in ' .
            $e->getFile() . ':' . $e->getLine();
    }
} else {

    header('location: ../../public/index.php');
}
