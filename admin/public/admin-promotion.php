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

        if (isset($_POST['NewPromoBtn']) || isset($_POST['EditPromoBtn'])) {

            if (isset($_POST['NewPromoBtn'])) {
                $trimmedNewName = trim($_POST['NewName']);
                $isDuplicated = !!findDuplicate($pdo, 'promotion', 'PromoName', $trimmedNewName);

                if ($isDuplicated) {
                    $_SESSION['flashMessage'] = 'This name has already existed';
                    header('location: admin-promotion.php');
                } else {
                    $promo = [
                        'PromoName' => $trimmedNewName,
                        'PromoValue' => $_POST['NewValue'],
                        'PromoStatus' => $_POST['NewStatus'] / 100,
                    ];
                    insertIntoTable($pdo, 'promotion', $promo);
                    header('location: admin-promotion.php');
                }
            }

            if (isset($_POST['EditPromoBtn'])) {

                if ($_POST['Existed'] > 0) {
                    $promo = [
                        'PromoStatus' => $_POST['PromoStatus'],
                    ];
                    updateTableSimple($pdo, 'promotion', $promo, 'PromoId', $_POST['PromoId']);
                    header('location: admin-promotion.php');
                } else {
                    $trimmedName = trim($_POST['PromoName']);
                    $isDuplicated = findDuplicate($pdo, 'promotion', 'PromoName', $trimmedName);
                    if ($isDuplicated) {
                        $_SESSION['flashMessage'] = 'This name has already existed';
                        header('location: admin-promotion.php');
                    } else {
                        $promo = [
                            // 'PromoId' => $_POST['PromoId'],
                            'PromoName' => $trimmedName,
                            'PromoValue' => $_POST['PromoValue'] / 100,
                            'PromoStatus' => $_POST['PromoStatus'],
                        ];
                        updateTableSimple($pdo, 'promotion', $promo, 'PromoId', $_POST['PromoId']);
                        header('location: admin-promotion.php');
                    }
                }
            }
        } else {
            $title = 'Juice Bazar - Admin - Promotions';
            $promos = getPromos($pdo);
            ob_start();

            include __DIR__ . '/../templates/admin-promotion.html.php';

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
