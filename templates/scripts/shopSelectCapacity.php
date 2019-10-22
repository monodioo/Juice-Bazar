<?php
include "dbconnect.php";
$sql = "SELECT * FROM ProductDetail WHERE  ProductDetailId =" . $_POST['productDetailId'];
$rs = mysqli_query($con, $sql);
$row = mysqli_fetch_array($rs);
$result = array(
    'productId' => $row['ProductId'],
    'productDetailId' => $row['ProductDetailId'],
    'price' =>  number_format($row['Price'], 0, '.', '.')
);
echo json_encode($result);
