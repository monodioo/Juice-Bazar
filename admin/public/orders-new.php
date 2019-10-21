<?php

session_start();
$_SESSION['productCount'] = -1;

if (!empty($_SESSION['admin'])) {


    include_once __DIR__ . '/../include/DatabaseConnection.php';
    include_once __DIR__ . '/../include/DatabaseFunctions.php';

    try {
        if (isset($_POST['EditOrderBtn'])) {

            //get previous location to go back in case of error
            $previous = "javascript:history.go(-1)";
            if (isset($_SERVER['HTTP_REFERER'])) {
                $previous = $_SERVER['HTTP_REFERER'];
            }

            if (!isset($_POST['newProduct']) || empty($_POST['newProduct'])) {
                $title = 'Error';
                $output = "Sorry, No item in order. Please go back to edit. ";
            } else if ($_POST['DeliveryDate'] && strtotime($_POST['PurchaseDate']) > strtotime($_POST['DeliveryDate'])) {
                $title = 'Error';
                $output = "Sorry, DeliveryDate should be later than PurchaseDate. Please go back to edit. ";
            } else {
                $record =  [
                    'MemberId' => $_POST['MemberId'],
                    'PurchaseDate' => ($_POST['PurchaseDate'] ?? ''),
                    'DeliveryDate' => ($_POST['DeliveryDate'] ?? ''),
                    'NewProduct' => $_POST['newProduct'],
                    'PromoId' => $_POST['PromoId'] ?? 0,
                    'Note' => $_POST['Note'],
                    'Status' => $_POST['Status'],
                ];

                saveOrder($pdo, $record);
                $_SESSION['orderAddMsg'] = 'Order created';
                header('location: admin-orders.php');
            }
        } else {
            $title = "Juice Bazar - Admin - Order";
            $sectionTitle = "New Order";

            $members = getTable($pdo, 'member', 'Status', true);
            $promos = getTable($pdo, 'promotion', 'PromoStatus', true);

            ob_start();

            include __DIR__ . '/../templates/orders-new.html.php';

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
