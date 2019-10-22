<?php
session_start();
$totalPrice = 0;
$countCart = 0;
//Add product to cart
if (isset($_POST['productDetailId'])) {
    $indexCart = $_POST['productDetailId'];
    if (empty($_SESSION['cart'])) {
        $_SESSION['cart'] = array($indexCart => array('price' => $_POST['price'], 'quantity' => $_POST['quantity']));
    } else {
        if (empty($_SESSION['cart'][$indexCart])) {
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
}
$result = array(
    'totalPrice' => $totalPrice,
    'cartCount' => $countCart
);

echo json_encode($result);
