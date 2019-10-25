<?php

session_start();

if (!empty($_SESSION['admin'])) {

    //If there is a POST request, meaning the edition is submitted >> Proceed to verify and save to DB.
    include_once __DIR__ . '/../include/DatabaseConnection.php';
    include_once __DIR__ . '/../include/DatabaseFunctions.php';

    if (isset($_SESSION['flashMessage'])) {
        echo "<script>alert('$_SESSION[flashMessage]')</script>";
        unset($_SESSION['flashMessage']);
    }

    try {
        if (isset($_POST['SubmitProductBtn'])) {

            $folder = __DIR__ . "/../../assets/image/juice bottle/";

            $image =  $_POST['ProductId'] . '-' . $_FILES['Image']['name'];

            $path = $folder . $image;

            $target_file = $folder . basename($_FILES["Image"]['name']);

            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            $allowed = array('jpeg', 'png', 'jpg');
            $filename = $_FILES['Image']['name'];

            $ext = pathinfo($filename, PATHINFO_EXTENSION);

            if (($_POST['EntryPrice1'] > $_POST['Price1']) || ($_POST['EntryPrice2'] > $_POST['Price2'])) {
                $_SESSION['flashMessage'] = 'Sorry, Entry Price should not be higher than SalePrice';
                header('location: products-edit.php' . empty($_POST['ProductId']) ? "" : '?id=' . $_POST['ProductId']);
            } else {

                if (!in_array($ext, $allowed) && empty($_POST['ImageCheck'])) {
                    $_SESSION['flashMessage'] = 'Sorry, only JPG, JPEG, PNG files are allowed';
                    header('location: products-edit.php' . empty($_POST['ProductId']) ? "" : '?id=' . $_POST['ProductId']);
                } else {
                    //if the new imageis not empty >> delete old image
                    if (!empty($_FILES['Image']['name'])) {
                        $oldImg = __DIR__ . "/../../" . $_POST['ImageCheck'];
                        unlink($oldImg);
                        move_uploaded_file($_FILES['Image']['tmp_name'], $path);
                    }

                    $record =  [
                        'ProductId' => $_POST['ProductId'],
                        'TypeId' => $_POST['TypeId'],
                        'Name' => $_POST['Name'],
                        'Image' => !empty($_FILES['Image']['name']) ? ('assets/image/juice bottle/' . $_POST['ProductId'] . '-' . $_FILES['Image']['name']) : ($_POST['ImageCheck']),
                        'Description' => $_POST['Description'],
                        'Nutrition' => $_POST['Nutrition'],
                        'Status' => $_POST['Status'],
                        'EntryPrice1' => $_POST['EntryPrice1'],
                        'EntryPrice2' => $_POST['EntryPrice2'],
                        'Price1' => $_POST['Price1'],
                        'Price2' => $_POST['Price2'],
                        'New1' => $_POST['New1'],
                        'New2' => $_POST['New2'],
                    ];

                    saveProduct(
                        $pdo,
                        'product',
                        'ProductId',
                        $record
                    );

                    if (empty($_POST['ProductId'])) {
                        $_SESSION['flashMessage'] = 'Product ' . $record['Name'] . ' added';
                    } else {
                        $_SESSION['flashMessage'] = 'Product ' . $record['Name'] . ' edited';
                    }
                    header('location: admin-products.php');
                }
            }
        } else {

            if (!empty($_GET['id'])) {

                $title = "Juice Bazar - Admin - Product Edit";
                $sectionTitle = "Edit Product";

                //if id is not found then go to products page
                if (!empty(getProducts($pdo, $_GET['id']))) {
                    $products = getProducts($pdo, $_GET['id']);
                } else {
                    header('location: admin-products.php');
                }
            } else {
                $title = 'Juice Bazar - Admin - Add New Product';
                $sectionTitle = "Add New Product";
                $products[] = [
                    'ProductId' => '',
                    'TypeId' => '',
                    'Name' => '',
                    'Image' => '',
                    'Description' => '',
                    'Nutrition' => '',
                    'Status' => '',
                    'Price1' => '',
                    'Price2' => '',
                    'Total1' => 0,
                    'Total2' => 0,
                    'Total' => 0,
                    'Sold1' => 0,
                    'Sold2' => 0,
                    'Sold' => 0,
                    'Shipping' => 1,
                ];
            }

            ob_start();

            include __DIR__ . '/../templates/products-edit.html.php';

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
