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
                        'PromoValue' => $_POST['NewValue'] / 100,
                        'PromoStatus' => $_POST['NewStatus'],
                    ];
                    insertIntoTable($pdo, 'promotion', $promo);
                    $_SESSION['flashMessage'] = 'New promotion code created';
                    header('location: admin-promotion.php');
                }
            }

            if (isset($_POST['EditPromoBtn'])) {

                if ($_POST['Existed'] > 0) {
                    $promo = [
                        'PromoStatus' => $_POST['PromoStatus'],
                    ];
                    updateTableSimple($pdo, 'promotion', $promo, 'PromoId', $_POST['PromoId']);
                    $_SESSION['flashMessage'] = 'Promotion status changed';
                    header('location: admin-promotion.php');
                } else {
                    $trimmedName = trim($_POST['PromoName']);
                    $isSameName = $trimmedName == $_POST['OldName'] ? true : false;
                    $isDuplicated = findDuplicate($pdo, 'promotion', 'PromoName', $trimmedName);

                    if ($isDuplicated && !$isSameName) {
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
                        $_SESSION['flashMessage'] = 'Promotion info changed';
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
