<?php

session_start();

if (!empty($_SESSION['admin'])) {

    //If there is a POST request, meaning the edition is submitted >> Proceed to verify and save to DB.
    include_once __DIR__ . '/../include/DatabaseConnection.php';
    include_once __DIR__ . '/../include/DatabaseFunctions.php';

    try {
        if (isset($_POST['SubmitProductBtn'])) {

            $folder = __DIR__ . "/../../assets/image/juice bottle/";

            $image = $_FILES['Image']['name'];

            $path = $folder . $image;

            $target_file = $folder . basename($_FILES["Image"]['name']);

            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            $allowed = array('jpeg', 'png', 'jpg');
            $filename = $_FILES['Image']['name'];

            $ext = pathinfo($filename, PATHINFO_EXTENSION);

            //get previous location to go back in case of error
            $previous = "javascript:history.go(-1)";
            if (isset($_SERVER['HTTP_REFERER'])) {
                $previous = $_SERVER['HTTP_REFERER'];
            }

            if (($_POST['EntryPrice1'] > $_POST['Price1']) || ($_POST['EntryPrice2'] > $_POST['Price2'])) {
                $title = 'Error';
                $output = "Sorry, Entry Prices should not be higher than SalePrice. Please go &nbsp; <a href=" . $previous . ">back</a> &nbsp; to edit. ";
            } else {
                if (!in_array($ext, $allowed) && empty($_POST['ImageCheck'])) {
                    $title = 'Error';
                    $output = "Sorry, only JPG, JPEG, PNG files are allowed. Please go &nbsp; <a href=" . $previous . ">back</a> &nbsp; to edit. ";;
                } else {
                    move_uploaded_file($_FILES['Image']['tmp_name'], $path);

                    $record =  [
                        'ProductId' => $_POST['ProductId'],
                        'TypeId' => $_POST['TypeId'],
                        'Name' => $_POST['Name'],
                        'Image' => !empty($_FILES['Image']['name']) ? ('assets/image/juice bottle/' . $_FILES['Image']['name'] . '') : ($_POST['ImageCheck']),
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

                    saveElement(
                        $pdo,
                        'product',
                        'ProductId',
                        $record
                    );

                    empty($_POST['ProductId']) ? header('location: products-edit.php') : header('location: products-edit.php?id=' . $_POST['ProductId'] . '');
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
