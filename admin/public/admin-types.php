<?php

session_start();

if (!empty($_SESSION['admin'])) {
    include_once __DIR__ . '/../include/DatabaseConnection.php';
    include_once __DIR__ . '/../include/DatabaseFunctions.php';

    try {

        if (isset($_POST['NewTypeBtn']) || isset($_POST['EditTypeBtn'])) {

            if (isset($_POST['NewTypeBtn'])) {
                $type = [
                    'Type' => $_POST['NewType'],
                    'TypeStatus' => $_POST['NewTypeStatus'],
                ];
                addType($pdo, $type);
                header('location: admin-types.php');
            }
            if (isset($_POST['EditTypeBtn'])) {
                $type = [
                    'Type' => $_POST['Type'],
                    'TypeStatus' => $_POST['TypeStatus'],
                    'TypeId' => $_POST['TypeId'],
                ];
                editType($pdo, $type);
                header('location: admin-types.php');
            }
        } else {
            $title = 'Juice Bazar - Admin - Product Categories';
            $types = getTypes($pdo);
            ob_start();

            include __DIR__ . '/../templates/admin-types.html.php';

            $output = ob_get_clean();
        }

        // print_r($_POST);
    } catch (PDOException $e) {
        $title = 'An error has occurred';

        $output = 'Database error: ' . $e->getMessage() . ' in ' .
            $e->getFile() . ':' . $e->getLine();
    }
} else {
    header('location: index.php');
}


include __DIR__ . '/../templates/layout.html.php';
