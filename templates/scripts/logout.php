<?php
if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "logout") {
    session_destroy();
    echo "<script>location='index.php?section=home'</script>";
}
