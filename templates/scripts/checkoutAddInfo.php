<?php
if (isset($_SESSION['memberId'])) {
    $sqlCheckoutInfo = "SELECT * FROM Member WHERE MemberId = " . $_SESSION['memberId'];
    $rsCheckoutInfo = mysqli_query($com, $sqlCheckoutInfo);
    $rowCheckoutInfo = mysqli_fetch_array($rsCheckoutInfo);
}
