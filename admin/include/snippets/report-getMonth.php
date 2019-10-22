<?php

include_once __DIR__ . '/../DatabaseConnection.php';
include_once __DIR__ . '/../DatabaseFunctions.php';

$year = ($_GET['year']);
$month = ($_GET['month']);

$tbody = '';
$count = 0;

if ($month == 0) {
    $sql = 'SELECT MONTH(PurchaseDate) AS `Month`, Year(PurchaseDate) AS `Year`, COUNT(DISTINCT o.`OrderId`) AS `Orders`, SUM(SalePrice*Quantity) AS `Revenue` FROM `orders`o JOIN `orderdetail`od ON o.`OrderId` = od.`OrderId` WHERE YEAR(PurchaseDate)=:year GROUP BY Month(PurchaseDate)';
    $parameters = [':year' => $year];
    $results = query($pdo, $sql, $parameters)->fetchAll();
    foreach ($results as $result) {
        $tbody .= '<tr><th scope="row">' . ++$count . '</th><td>' . $result['Month'] . ' / ' . $result['Year'] . '</td><td>' . $result['Orders'] . '</td><td>' . number_format($result['Revenue']) . '<span>₫</span></td></tr>';
    }
} else {
    $sql = 'SELECT DAY(PurchaseDate) AS `Day`, COUNT(DISTINCT  o.`OrderId`) AS `Orders`, SUM(SalePrice*Quantity) AS `Revenue` FROM `orders`o JOIN `orderdetail`od ON o.`OrderId` = od.`OrderId` WHERE YEAR(PurchaseDate)=:year AND MONTH(PurchaseDate)=:month GROUP BY DAY(PurchaseDate)';
    $parameters = [':year' => $year, ':month' => $month];
    $results = query($pdo, $sql, $parameters)->fetchAll();
    foreach ($results as $result) {
        $tbody .= '<tr><th scope="row">' . ++$count . '</th><td>' . $result['Day'] . '</td><td>' . $result['Orders'] . '</td><td>' . number_format($result['Revenue']) . '<span>₫</span></td></tr>';
    }
}


print_r($tbody);

// 
