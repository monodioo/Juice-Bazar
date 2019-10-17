<?php
//Them sp vao gio hang
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_REQUEST['quantity'] > 0) {
        $indexCart = 'p' . $_REQUEST['productid'] . 'c' . $_REQUEST['capacity'];
        $_SESSION['cart'][$indexCart]['productid'] = $_REQUEST['productid'];
        $_SESSION['cart'][$indexCart]['capacity'] = $_REQUEST['capacity'];
        if (isset($_SESSION['cart'][$indexCart]['quantity']))
            $_SESSION['cart'][$indexCart]['quantity'] += $_REQUEST['quantity'];
        else
            $_SESSION['cart'][$indexCart]['quantity'] = $_REQUEST['quantity'];

        //Cap nhat gia tien don hang ngay lap tuc.
        $sqlNewProduct = "SELECT * FROM Product
                                    JOIN Inventory ON Product.ProductId = Inventory.ProductId
                                    JOIN Capacity        ON Inventory.CapacityId = Capacity.CapacityId
                            WHERE Product.ProductId =" . $_REQUEST['productid'] . " AND Capacity = " . $_REQUEST['capacity'];
        $resultNewProduct = mysqli_query($con, $sqlNewProduct);
        $rowNewProduct = mysqli_fetch_array($resultNewProduct);

        if (isset($_SESSION['sumOrder']))
            $_SESSION['sumOrder'] += $rowNewProduct['Price'] * $_REQUEST['quantity'];
        else
            $_SESSION['sumOrder'] = $rowNewProduct['Price'] * $_REQUEST['quantity'];
    }

    // Quay lai mua hang.
    echo "<script>location='?section=shop&typeid=" . $_REQUEST["typeid"] . "'</script>";
}
