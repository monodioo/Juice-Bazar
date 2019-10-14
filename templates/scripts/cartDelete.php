<?php
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        if (isset($_REQUEST['cartDeleteBtn'])) {
            unset($_SESSION['cart'][$_REQUEST['indexDelete']]);
            $_SESSION['sumOrder'] -= $_REQUEST['priceDelete'];
            echo "<script>location='?section=cart'</script>";
        }
    }
?>