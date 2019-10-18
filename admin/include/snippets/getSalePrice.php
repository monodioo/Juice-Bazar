<?php

include_once __DIR__ . '/../DatabaseConnection.php';

$id = ($_GET['id']);

$sql = 'SELECT `Price` FROM `productdetail` WHERE `ProductDetailId` = :id';
$query = $pdo->prepare($sql);
$parameters = [':id' => $id];
$query->execute($parameters);
$result = $query->fetch();

echo number_format($result[0]);
