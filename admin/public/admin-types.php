<?php

session_start();

if (!empty($_SESSION['admin'])) {
    include_once __DIR__ . '/../include/DatabaseConnection.php';
    include_once __DIR__ . '/../include/DatabaseFunctions.php';

    if (isset($_SESSION['flashMessage'])) {
        echo "<script>alert('$_SESSION[flashMessage]')</script>";
        unset($_SESSION['flashMessage']);
    }

    try {

        if (isset($_POST['NewTypeBtn']) || isset($_POST['EditTypeBtn'])) {

            if (isset($_POST['NewTypeBtn'])) {
                $trimmedNewName = trim($_POST['NewType']);
                $isDuplicated = !!findDuplicate($pdo, 'type', 'Type', $trimmedNewName);

                if ($isDuplicated) {
                    $_SESSION['flashMessage'] = 'This name has already existed';
                    header('location: admin-types.php');
                } else {
                    $type = [
                        'Type' => $trimmedNewName,
                        'TypeStatus' => $_POST['NewTypeStatus'],
                    ];
                    insertIntoTable($pdo, 'type', $type);
                    $_SESSION['flashMessage'] = 'New Category created';
                    header('location: admin-types.php');
                }
            }
            if (isset($_POST['EditTypeBtn'])) {
                if ($_POST['Existed'] > 0) {
                    $type = [
                        'TypeStatus' => $_POST['TypeStatus']
                    ];

                    updateTableSimple($pdo, 'type', $type, 'TypeId', $_POST['TypeId']);
                    $_SESSION['flashMessage'] = 'Category status changed';
                    header('location: admin-types.php');
                } else {
                    $trimmedName = trim($_POST['Type']);
                    $isSameName = $trimmedName == $_POST['OldName'] ? true : false;
                    $isDuplicated = findDuplicate($pdo, 'type', 'Type', $trimmedName);

                    if ($isDuplicated && !$isSameName) {
                        $_SESSION['flashMessage'] = 'This name has already existed';
                        header('location: admin-types.php');
                    } else {
                        $type = [
                            'Type' => $trimmedName,
                            'TypeStatus' => $_POST['TypeStatus']
                        ];
                        updateTableSimple($pdo, 'type', $type, 'TypeId', $_POST['TypeId']);
                        $_SESSION['flashMessage'] = 'Category info changed';
                        header('location: admin-types.php');
                    }
                }
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
