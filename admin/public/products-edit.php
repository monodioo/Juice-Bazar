<?php

session_start();

if (!empty($_SESSION['admin'])) {

    //If there is a POST request, meaning the edition is submitted >> Proceed to verify and save to DB.
    include_once __DIR__ . '/../include/DatabaseConnection.php';
    include_once __DIR__ . '/../include/DatabaseFunctions.php';

    try {
        if (isset($_POST['SubmitProduct'])) {

            // $title = 'XX';
            // $output = print_r($_POST);

            $folder = __DIR__ . "/../../assets/image/juice bottle/";

            $image = $_FILES['Image']['name'];

            $path = $folder . $image;

            $target_file = $folder . basename($_FILES["Image"]['name']);

            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            $allowed = array('jpeg', 'png', 'jpg');
            $filename = $_FILES['Image']['name'];

            $ext = pathinfo($filename, PATHINFO_EXTENSION);

            if (!in_array($ext, $allowed) && empty($_POST['ImageCheck'])) {
                $title = 'Error';
                $output = "Sorry, only JPG, JPEG, PNG files are allowed.";
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
                    'Price1' => $_POST['Price1'],
                    'Price2' => $_POST['Price2'],
                    'New1' => $_POST['New1'] + $_POST['Available1'],
                    'New2' => $_POST['New2'] + $_POST['Available2'],
                ];

                // $output = print_r($_POST);
                saveElement(
                    $pdo,
                    'product',
                    'ProductId',
                    $record
                );

                empty($_POST['ProductId']) ? header('location: admin-products.php') : header('location: products-edit.php?id=' . $_POST['ProductId'] . '');
            }

            // $output = print_r();
            // $output = $record;


        } else {

            if (isset($_GET['id'])) {

                $title = "Juice Bazar - Admin - Product Edit";
                $sectionTitle = "Edit Product";

                $products = getProducts($pdo, $_GET['id']);

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