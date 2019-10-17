<?php
    if (isset($_SESSION['memberId'])) {
        $sqlCheckoutInfo = "SELECT * FROM Member WHERE MemberId = ".$_SESSION['memberId'];
        $rsCheckoutInfo = mysqli_query($sqlCheckoutInfo);
        $rowCheckoutInfo = mysqki_fetch_array($rsCheckoutInfo);
    }
