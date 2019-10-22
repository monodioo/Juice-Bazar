<?php
session_start();

// if (!empty($_SESSION['admin'])) {
//     header('location: admin-home.php');
// }

include_once __DIR__ . '/../include/DatabaseConnection.php';
include_once __DIR__ . '/../include/DatabaseFunctions.php';

// $title = "Juice Bazar - Admin Login";

// if (isset($_POST['loginSubmit'])) {
$adminName = $_POST['adminName'];
$adminPass = $_POST['adminPass'];

// $adminLogin = adminLogin($pdo, $adminName, $adminPass);
// $output = print_r($adminLogin);


$sql = 'SELECT `user` FROM `admin` WHERE `user`=:adminName ';
$parameters = [':adminName' => $adminName];

$query = query($pdo, $sql, $parameters);
// //Fetch row.
// $data = $query->fetch();
// $data = ($data !== false);
// return print_r($data);

if ($data) {
    // $_SESSION['admin'] = $data['User'];
    // $_SESSION['logged_in'] = time();
    echo "success";
} else {
    echo "error";
}
