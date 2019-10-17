<?php
$errCoupon = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_REQUEST["couponBtn"])) {
        $errCoupon = '';
        // if (isset($_SESSION["memberId"])) {
        $sqlCheckCouponCode = "SELECT * FROM Promotion WHERE PromoName = '" . $_REQUEST["c_code"] . "'";
        $rsCoupon = mysqli_query($con, $sqlCheckCouponCode);
        if (!mysqli_num_rows($rsCoupon)) {
            $errCoupon = 'Mã khuyến mại không chính xác!';
            unset($_SESSION['promovalue']);
        } else {
            $rowCoupon = mysqli_fetch_array($rsCoupon);
            if ($rowCoupon['PromoStatus'] == 0) {
                $errCoupon = 'Mã khuyến mại đã hết hạn';
                unset($_SESSION['promovalue']);
            } else {
                $sqlCheckUsedCoupon = "SELECT * FROM Orders JOIN Promotion ON Orders.PromoId = Promotion.PromoId
                                             WHERE MemberId = " . $_SESSION["memberId"] . " AND PromoName = '" . $_REQUEST["c_code"] . "'";
                $rsCheckUsed = mysqli_query($con, $sqlCheckUsedCoupon);
                if (mysqli_num_rows($rsCheckUsed)) {
                    $errCoupon = 'Bạn đã sử dụng mã này rồi';
                    unset($_SESSION['promovalue']);
                } else {
                    $_SESSION['promoname'] = $rowCoupon['PromoName'];
                    $_SESSION['promovalue'] = $rowCoupon['PromoValue'];
                    echo "<script>location='?section=cart#c_code'</script>";
                }
            }
        }
        // }
        // else $errCoupon = "Chỉ thành viên mới được sử dung mã khuyến mại!";
    }
}
