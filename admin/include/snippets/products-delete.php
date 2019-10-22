<?php

session_start();

if (!empty($_SESSION['admin'])) {

    include_once __DIR__ . '/../DatabaseConnection.php';
    include_once __DIR__ . '/../DatabaseFunctions.php';

    try {
        if (isset($_POST['deleteProductBtn'])) {
            //function to delete in both Products and productdetail tables
            deleteProduct($pdo, $_POST['deleteProduct']);
            $_SESSION['flashMessage'] = 'Product deleted';
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
