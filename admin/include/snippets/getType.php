<?php
include_once __DIR__ . '/../DatabaseConnection.php';

$id = ($_GET['id']);

$sql = 'SELECT t.`Type` FROM `productdetail` pd JOIN `product`p ON pd.`ProductId` = p.`ProductId` JOIN `Type`t ON p.`TypeId` = t.`TypeId` WHERE `ProductDetailId` = :id';
$query = $pdo->prepare($sql);
$parameters = [':id' => $id];
$query->execute($parameters);
$result = $query->fetch();

echo $result[0];
