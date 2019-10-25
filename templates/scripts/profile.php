<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cancel-order'])) {
        $OrderId = (int) $_POST['OrderId'];
        $sql = "UPDATE Orders SET Status = 4 WHERE OrderId = " . $OrderId;
        $rs = mysqli_query($con, $sql);
        echo "<script>location='?section=profile'</script>";
    }
}
