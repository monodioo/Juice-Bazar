<?php

session_start();

if (!empty($_SESSION['admin'])) {

    include_once __DIR__ . '/../include/DatabaseConnection.php';
    include_once __DIR__ . '/../include/DatabaseFunctions.php';

    try {
        if (isset($_POST['deleteProductBtn'])) {
            //function to delete in both Products and productdetail tables
            deleteProduct($pdo, $_POST['deleteProduct']);
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
