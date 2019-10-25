<?php
session_start();
include "templates/scripts/dbconnect.php";
if (isset($_REQUEST['loginBtn'])) {
    if (isset($_POST['rememberCheckLogin'])) {
        setcookie('emailLogin', $_POST['emailLogin'], time() + 86400 * 30);
        setcookie('passwordLogin', $_POST['passwordLogin'], time() + 86400 * 30);
    }
}
include "templates/include/header.html.php";
include "templates/scripts/body.php";
include "templates/include/footer.html.php";
