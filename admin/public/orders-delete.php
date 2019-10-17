<?php

session_start();

if (!empty($_SESSION['admin'])) {

    include_once __DIR__ . '/../include/DatabaseConnection.php';
    include_once __DIR__ . '/../include/DatabaseFunctions.php';

    try {
        if (isset($_POST['deleteOrderBtn'])) {
            deleteOrder($pdo, $_POST['deleteOrder']);
            header('location: admin-orders.php');
        } else {
            header('location: admin-orders.php');
        }
    } catch (PDOException $e) {
        $title = 'An error has occurred';

        $output = 'Database error: ' . $e->getMessage() . ' in ' .
            $e->getFile() . ':' . $e->getLine();
    }
} else {

    header('location: index.php');
}
