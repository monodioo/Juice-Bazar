<?php
if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "logout") {
    unset($_SESSION['memberId']);
    unset($_SESSION['memberName']);
    unset($_SESSION['promoName']);
    unset($_SESSION['promoValue']);
    echo "<script>location='?section=home'</script>";
}
