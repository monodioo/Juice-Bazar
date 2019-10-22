<?php
session_start();
include "dbconnect.php";
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'change_quantity') {
        $indexCart = $_POST['productDetailId'];
        $oldSubPrice = $_SESSION['cart'][$indexCart]['quantity'] * $_SESSION['cart'][$indexCart]['price'];
        $_SESSION['cart'][$indexCart]['quantity'] = $_POST['quantity'];
        $newSubPrice = $_SESSION['cart'][$indexCart]['quantity'] * $_SESSION['cart'][$indexCart]['price'];
        $totalPrice = $_SESSION['totalPrice'];
        $totalPrice = $totalPrice + ($newSubPrice - $oldSubPrice);
        $_SESSION['totalPrice'] = $totalPrice;
        $promoValue = isset($_SESSION['promovalue']) ? $_SESSION['promovalue'] : 0;
        $lastPrice = floor($totalPrice * (1 - $promoValue) / 1000);

        $result = array(
            'productDetailId' => $indexCart,
            'subPrice' => number_format($newSubPrice, 0, '.', '.'),
            'totalPrice' => number_format($totalPrice, 0, '.', '.'),
            'lastPrice' => number_format($lastPrice * 1000, 0, '.', '.')
        );
        echo json_encode($result);
    }

    if ($_POST['action'] == 'delete_item') {
        $indexCart = $_POST['productDetailId'];
        $deletePrice = $_SESSION['cart'][$indexCart]['quantity'] * $_SESSION['cart'][$indexCart]['price'];
        unset($_SESSION['cart'][$indexCart]);
        $_SESSION['totalPrice'] -= $deletePrice;
        $totalPrice = $_SESSION['totalPrice'];
        $promoValue = isset($_SESSION['promovalue']) ? $_SESSION['promovalue'] : 0;
        $lastPrice = $totalPrice * (1 - $promoValue);
        $cartCount = count($_SESSION['cart']);

        $result = array(
            'productDetailId' => $indexCart,
            'totalPrice' => number_format($totalPrice, 0, '.', '.'),
            'lastPrice' => number_format($lastPrice, 0, '.', '.'),
            'cartCount' => $cartCount
        );
        echo json_encode($result);
    }

    if ($_POST['action'] == 'delete_all') {
        unset($_SESSION['cart']);
        unset($_SESSION['totalPrice']);
    }

    if ($_POST['action'] == 'add_coupon') {
        $promoValue = 0;
        $promoName = '';
        $stCoupon = '';
        if (empty($_SESSION["memberId"])) {
            $stCoupon = "Chỉ thành viên mới được sử dụng mã khuyến mại!";
            $_SESSION['promoname'] = $_POST["c_code"];
            $_SESSION['promovalue'] = 0;
        } else {
            $sqlCheckCouponCode = "SELECT * FROM Promotion WHERE PromoName = '" . $_POST["c_code"] . "'";
            $rsCoupon = mysqli_query($con, $sqlCheckCouponCode);
            if (mysqli_num_rows($rsCoupon) < 1) {
                $stCoupon = 'Mã khuyến mại không chính xác!';
                $_SESSION['promoname'] = $_POST["c_code"];
                $_SESSION['promovalue'] = 0;
            } else {
                $rowCoupon = mysqli_fetch_array($rsCoupon);
                if ($rowCoupon['PromoStatus'] == 0) {
                    $stCoupon = 'Mã khuyến mại đã hết hạn';
                    $_SESSION['promoname'] = $_POST["c_code"];
                    $_SESSION['promovalue'] = 0;
                } else {
                    $sqlCheckUsedCoupon = "SELECT * FROM Orders JOIN Promotion ON Orders.PromoId = Promotion.PromoId
                                            WHERE MemberId = " . $_SESSION["memberId"] . " AND PromoName = '" . $_POST["c_code"] . "'";
                    $rsCheckUsed = mysqli_query($con, $sqlCheckUsedCoupon);
                    if (mysqli_num_rows($rsCheckUsed)) {
                        $stCoupon = 'Bạn đã sử dụng mã này rồi';
                        $_SESSION['promoname'] = $_POST["c_code"];
                        $_SESSION['promovalue'] = 0;
                    } else {
                        $_SESSION['promoname'] = $rowCoupon['PromoName'];
                        $_SESSION['promovalue'] = $rowCoupon['PromoValue'];
                        $stCoupon = 'Nhập mã thành công';
                    }
                }
            }
        }
        $promoName = $_SESSION['promoname'];
        $promoValue = $_SESSION['promovalue'];
        $lastPrice = empty($_SESSION['promovalue']) ? $_SESSION['totalPrice'] : ($_SESSION['totalPrice'] * (1 - $_SESSION['promovalue']));

        $result = array(
            'stCoupon' => $stCoupon,
            'promoName' => $promoName,
            'promoValue' => $promoValue,
            'lastPrice' => number_format($lastPrice, 0, '.', '.')
        );
        echo json_encode($result);
    }
}
