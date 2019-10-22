<?php
include_once __DIR__ . '/../DatabaseConnection.php';

$id = ($_GET['id']);

$sql = 'SELECT `PromoValue` FROM `promotion` WHERE `PromoId` = :id';
$query = $pdo->prepare($sql);
$parameters = [':id' => $id];
$query->execute($parameters);
$result = $query->fetch();

echo $result[0];
