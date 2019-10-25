<?php
$con = mysqli_connect("localhost", "id11347655_nuochoaqua", "20tongduytan", "id11347655_juicebazar");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Change character set to utf8
mysqli_set_charset($con, "utf8");

mysqli_close($con);
