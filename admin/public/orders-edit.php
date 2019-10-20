<?php

session_start();
$_SESSION['productCount'] = -1;

if (!empty($_SESSION['admin'])) {

    //If there is a POST request, meaning the edition is submitted >> Proceed to verify and save to DB.
    include_once __DIR__ . '/../include/DatabaseConnection.php';
    include_once __DIR__ . '/../include/DatabaseFunctions.php';

    try {
        if (isset($_POST['EditOrderBtn'])) {

            //get previous location to go back in case of error
            $previous = "javascript:history.go(-1)";
            if (isset($_SERVER['HTTP_REFERER'])) {
                $previous = $_SERVER['HTTP_REFERER'];
            }

            if ($_POST['DeliveryDate'] && strtotime($_POST['PurchaseDate']) > strtotime($_POST['DeliveryDate'])) {
                $title = 'Error';
                $output = "Sorry, DeliveryDate should be later than PurchaseDate. Please go &nbsp; <a href='. $previous . '>back</a> &nbsp; to edit. ";
            } else {
                $record =  [
                    'OrderId' => $_POST['OrderId'],
                    'DeliveryDate' => ($_POST['DeliveryDate'] ?? ''),
                    'NewProduct' => $_POST['newProduct'],
                    'PromoId' => $_POST['PromoId'] ?? "",
                    'Note' => $_POST['Note'],
                    'Status' => $_POST['Status'],
                    'OldStatus' => $_POST['oldStatus']
                ];

                // editOrder($pdo, $record);
                print_r($_POST);
                // header('location: orders-edit.php?id=' . $_POST['OrderId'] . '');
            }
        } else {
            if (!empty($_GET['id'])) {

                $title = "Juice Bazar - Admin - Order Edit";
                $sectionTitle = "Edit Order";

                //if id is not found then go to orders page
                if (!empty(getOrders($pdo, $_GET['id']))) {
                    $orders = getOrders($pdo, $_GET['id']);
                } else {
                    header('location: admin-orders.php');
                }
            } else {
                header('location: admin-orders.php');
            }
            ob_start();

            include __DIR__ . '/../templates/orders-edit.html.php';

            $output = ob_get_clean();
        }
    } catch (PDOException $e) {
        $title = 'An error has occurred';

        $output = 'Database error: ' . $e->getMessage() . ' in ' .
            $e->getFile() . ':' . $e->getLine();
    }
} else {
    header('location: index.php');
}


include __DIR__ . '/../templates/layout.html.php';
