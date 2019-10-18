<?php

session_start();

if (!empty($_SESSION['admin'])) {

    include_once __DIR__ . '/../include/DatabaseConnection.php';
    include_once __DIR__ . '/../include/DatabaseFunctions.php';

    try {
        if (isset($_POST['OrderStatusBtn'])) {

            // $oldStatus = ($_POST['oldStatus']);
            // $newStatus = ($_POST['newStatus']);

            // //If order status from Shipping > Cancelled : Return shipment to stock
            // if ($oldStatus == 2 && $newStatus == 4) {
            //     changeStock($pdo, $_POST['OrderId'], true, $newStatus);
            // }

            // //If order status from not processed / processing > shipping / successful: Remove shipment from stock
            // if (($oldStatus == 1 || $oldStatus == 0) && ($newStatus == 2 || $newStatus == 3)) {
            //     changeStock($pdo, $_POST['OrderId'], false, $newStatus);
            // }

            // switchStatus($pdo, 'orders', 'OrderId', $_POST['OrderId'], 'Status', $newStatus);
            // header('location: admin-orders.php');
            print_r($_POST);
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
