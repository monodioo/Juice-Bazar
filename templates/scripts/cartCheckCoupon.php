<?php
$errCoupon = '';
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if (isset($_REQUEST["couponBtn"])) {
        $errCoupon = '';
        // if (isset($_SESSION["memberId"])) {
            $sqlCheckCouponCode = "SELECT * FROM Promotion WHERE PromoName = '".$_REQUEST["c_code"]."'";
            $rsCoupon = mysqli_query($con,$sqlCheckCouponCode);
            if (!$rsCoupon) {
                $errCoupon = 'Mã khuyến mại không chính xác!';
            }
            else {
                $rowCoupon = mysqli_fetch_array($rsCoupon);
                if ($rowCoupon['PromoStatus']==0) {
                    $errCoupon = 'Mã khuyến mại đã hết hạn';
                }
                else {
                    $sqlCheckUsedCoupon = "SELECT * FROM Orders JOIN Promotion ON Orders.PromoId = Promotion.PromoId
                                             WHERE MemberId = ".$_SESSION["memberId"]." AND PromoName = '".$_REQUEST["c_code"]."'";
                    if (mysqli_query($con,$sqlCheckUsedCoupon)) {
                        $errCoupon = 'Bạn đã sử dụng mã này rồi';
                    }
                    else {
                        $_SESSION['discount'] = $rowCoupon['PromoValue'];
                        echo "<script>location='?section=cart'</script>";
                    }
                }
            }
        // }
        // else $errCoupon = "Chỉ thành viên mới được sử dung mã khuyến mại!";
    }
}
?>