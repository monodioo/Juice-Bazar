<?php
if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "logout") {
    unset($_SESSION['memberId']);
    unset($_SESSION['memberName']);
    echo "<script>location='?section=" . $_REQUEST["section"] . "';</script>";
}
