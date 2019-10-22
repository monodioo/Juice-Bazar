<?php
session_start();
include_once __DIR__ . '/../DatabaseConnection.php';
include_once __DIR__ . '/../DatabaseFunctions.php';

$listProducts = getListProducts($pdo);

$selectList = '';

foreach ($listProducts as $list) {

    $selectList .= '<option value=' . $list['ProductDetailId'] . '>' . $list['Name'] . ' ' . (($list['CapacityId'] == 1) ? "250ml" : "330ml") . '</option>';
}

// $countItem = $_SESSION['productCount'];
++$_SESSION['productCount'];

$newRow =
    '<tr class="product-item">
        <td class="align-middle">New Item ' . ($_SESSION['productCount']  + 1) . '</td>
        <td>
            <select name="newProduct[' . $_SESSION['productCount']  . '][ProductDetailId]" class="custom-select product-select">
                <option selected disabled>Select New Product</option>'
    . $selectList .
    '</select>
        </td>
        <td class="align-middle product-type"></td>
        <td class="align-middle">
            <span class="product-price"></span> ₫
            <input class="product-price-input" type="hidden" name="newProduct[' . $_SESSION['productCount']  . '][SalePrice]" value="">
        </td>
        <td>
            <input type="number" min=1 max=100 class="form-control product-quantity" name="newProduct[' . $_SESSION['productCount']  . '][Quantity]" value="1">
        </td>
        <td class="align-middle">
            <span class="product-totalPrice"></span> ₫
        </td>
        <td class="align-middle">
        <a class="product-delete" href="#!"><i class="far fa-trash-alt"></i></a>
        </td>
    </tr>';

print_r($newRow);
