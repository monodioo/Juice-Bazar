<?php
session_start();
include "dbconnect.php";
$totalPrice = 0;
$countCart = 0;
//Add product to cart
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'add_cart') {
        $indexCart = $_POST['productDetailId'];
        if (empty($_SESSION['cart'])) {
            $_SESSION['cart'] = array($indexCart => array('name' => $_POST['name'], 'price' => $_POST['price'], 'quantity' => $_POST['quantity']));
        } else {
            if (empty($_SESSION['cart'][$indexCart])) {
                $_SESSION['cart'][$indexCart]['name'] = $_POST['name'];
                $_SESSION['cart'][$indexCart]['price'] = $_POST['price'];
                $_SESSION['cart'][$indexCart]['quantity'] = $_POST['quantity'];
            } else
                $_SESSION['cart'][$indexCart]['quantity'] += $_POST['quantity'];
        }
        //Update cart status

        if (empty($_SESSION['totalPrice']))
            $_SESSION['totalPrice'] = $_POST['quantity'] * $_POST['price'];

        else
            $_SESSION['totalPrice'] += $_POST['quantity'] * $_POST['price'];

        $totalPrice = number_format($_SESSION['totalPrice'], 0, '.', '.');
        $countCart = count($_SESSION['cart']);

        $result = array(
            'totalPrice' => $totalPrice,
            'cartCount' => $countCart
        );

        echo json_encode($result);
    }

    if ($_POST['action'] == 'select_capacity') {
        $sql = "SELECT * FROM ProductDetail WHERE  ProductDetailId =" . $_POST['productDetailId'];
        $rs = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($rs);
        $result = array(
            'productId' => $row['ProductId'],
            'productDetailId' => $row['ProductDetailId'],
            'priceShow' =>  number_format($row['Price'], 0, '.', '.'),
            'priceValue' => $row['Price']
        );
        echo json_encode($result);
    }
}
