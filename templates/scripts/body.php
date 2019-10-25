<?php
if (isset($_REQUEST["section"])) {
    switch ($_REQUEST["section"]) {
        case 'shop':
            include "templates/include/shop.html.php";
            break;
        case 'aboutus':
            include "templates/include/aboutus.html.php";
            break;
        case 'cart':
            include "templates/include/cart.html.php";
            break;
        case 'login':
            include "templates/include/login.html.php";
            break;
        case 'signup':
            include "templates/include/signup.html.php";
            break;
        case 'profile':
            include "templates/include/profile.html.php";
            break;
        case 'checkout': {
                if (empty($_SESSION['cart'])) echo "<script>location='?section=home'</script>";
                else include "templates/include/checkout.html.php";
            }
            break;
        case 'checkoutfinal':
            include "templates/include/checkout-final.html.php";
            echo "<script>setTimeout(function(){location='?section=home'},5000)</script>";
            break;
        case 'search':
            include "templates/scripts/searchProduct.php";
            break;
        default:
            include "templates/include/home.html.php";
    }
} else include "templates/include/home.html.php";
