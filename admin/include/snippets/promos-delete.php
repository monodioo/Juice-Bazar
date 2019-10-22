<?php

session_start();

if (!empty($_SESSION['admin'])) {

    include_once __DIR__ . '/../DatabaseConnection.php';
    include_once __DIR__ . '/../DatabaseFunctions.php';

    try {
        if (isset($_POST['deleteElementBtn'])) {
            deleteSimple($pdo, 'promotion', 'PromoId', $_POST['deleteElement']);
            $_SESSION['flashMessage'] = 'Promotion Code deleted';
            header('location: ../../public/admin-promotion.php');
        } else {
            header('location: ../../public/admin-promotion.php');
        }
    } catch (PDOException $e) {
        $title = 'An error has occurred';

        $output = 'Database error: ' . $e->getMessage() . ' in ' .
            $e->getFile() . ':' . $e->getLine();
    }
} else {

    header('location: ../../public/index.php');
}
