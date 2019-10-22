<?php
if (isset($_SESSION['memberId'])) {
    $sqlCheckoutInfo = "SELECT * FROM Member WHERE MemberId = " . $_SESSION['memberId'];
    $rsCheckoutInfo = mysqli_query($con, $sqlCheckoutInfo);
    $rowCheckoutInfo = mysqli_fetch_array($rsCheckoutInfo);
}
