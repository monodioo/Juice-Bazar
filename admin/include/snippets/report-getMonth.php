<?php

include_once __DIR__ . '/../DatabaseConnection.php';
include_once __DIR__ . '/../DatabaseFunctions.php';

$year = ($_GET['year']);
$month = ($_GET['month']);

$tbody = '';
$revenue = 0;

if ($month == 0) {
    for ($i = 1; $i <= 12; $i++) {
        $sql = 'SELECT MONTH(DeliveryDate) AS `Month`, Year(DeliveryDate) AS `Year`, COUNT(DISTINCT o.`OrderId`) AS `Orders`, SUM(SalePrice*Quantity) AS `Revenue` FROM `orders`o JOIN `orderdetail`od ON o.`OrderId` = od.`OrderId` WHERE YEAR(DeliveryDate)=:year AND Month(DeliveryDate) =:month GROUP BY Month(DeliveryDate)';
        $parameters = [':year' => $year, ':month' => $i];
        $results = query($pdo, $sql, $parameters)->fetch();
        $revenue += $results['Revenue'];
        $tbody .= '<tr><td>' . $i . ' / ' . $year . '</td><td>' . ($results['Orders'] ?? 0) . '</td><td class="text-right pr-5">' . number_format($results['Revenue']) . '<span> ₫</span></td></tr>';
    }
} else {
    switch ($month) {
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            $day = 31;
            break;
        case 4:
        case 6:
        case 9:
        case 11:
            $day = 30;
            break;
        case 2:
            $day = 29;
    }

    for ($i = 1; $i <= $day; $i++) {
        $sql = 'SELECT DAY(DeliveryDate) AS `Day`, COUNT(DISTINCT  o.`OrderId`) AS `Orders`, SUM(SalePrice*Quantity) AS `Revenue` FROM `orders`o JOIN `orderdetail`od ON o.`OrderId` = od.`OrderId` WHERE YEAR(DeliveryDate)=:year AND MONTH(DeliveryDate)=:month AND DAY(DeliveryDate) =:day GROUP BY DAY(DeliveryDate)';

        $parameters = [':year' => $year, ':month' => $month, ':day' => $i];
        $results = query($pdo, $sql, $parameters)->fetch();
        $revenue += $results['Revenue'];
        $tbody .= '<tr><td>' . $i . ' / ' . $month . ' / ' . $year . '</td><td>' . $results['Orders'] . '</td><td class="text-right pr-5">' . number_format($results['Revenue']) . '<span> ₫</span></td></tr>';
    }
}

$tbody .= '<input type="hidden" class="hidden-revenue" value="' . number_format($revenue) . ' ₫">';

print_r($tbody);

// 
