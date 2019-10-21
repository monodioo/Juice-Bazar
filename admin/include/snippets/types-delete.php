<?php

session_start();

if (!empty($_SESSION['admin'])) {

    include_once __DIR__ . '/../DatabaseConnection.php';
    include_once __DIR__ . '/../DatabaseFunctions.php';

    try {
        if (isset($_POST['deleteCategoryBtn'])) {
            deleteType($pdo, $_POST['deleteCategory']);
            header('location: ../../public/admin-types.php');
        } else {
            header('location: ../../public/admin-types.php');
        }
    } catch (PDOException $e) {
        $title = 'An error has occurred';

        $output = 'Database error: ' . $e->getMessage() . ' in ' .
            $e->getFile() . ':' . $e->getLine();
    }
} else {

    header('location: ../../public/index.php');
}
