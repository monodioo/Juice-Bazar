<?php

function query($pdo, $sql, $parameters = [])
{
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

function insertIntoTable($pdo, $table, $record)
{
    $sql = 'INSERT INTO `' . $table . '` (';

    foreach ($record as $key => $value) {
        $sql .= '`' . $key . '`,';
    }

    $sql = rtrim($sql, ',');

    $sql .= ') VALUES (';

    foreach ($record as $key => $value) {
        $sql .= ':' . $key . ',';
    }

    $sql = rtrim($sql, ',');

    $sql .= ')';


    query($pdo, $sql, $record);
}

function findMaxInTable($pdo, $table, $column)
{
    $sql = 'SELECT MAX(`' . $column . '`) FROM `' . $table . '`';
    $query = query($pdo, $sql);
    $result = $query->fetch();
    return $result[0];
}

//get all data from $table
function getTable($pdo, $table, $StatusCol, $status = false)
{
    if ($status == false) {
        $sql = 'SELECT * FROM `' . $table . '`';
    } else {
        $sql = 'SELECT * FROM `' . $table . '` WHERE `' . $StatusCol . '` = 1';
    }

    return query($pdo, $sql)->fetchAll();
}


function adminLogin($pdo, $adminName, $adminPass)
{
    // try {
    $sql = 'SELECT `User` FROM `admin` WHERE `User`=:adminName ';
    $parameters = [':adminName' => $adminName];
    $query = query($pdo, $sql, $parameters);
    $data = $query->fetch();

    //If no username is found
    if ($data === false) {
        return 'userError';
    } else {
        $sql2 = 'SELECT `User`,`Pass` FROM `admin` WHERE `User`=:adminName AND `Pass`=:adminPass';
        $parameters2 = [':adminName' => $adminName, ':adminPass' => $adminPass];
        $query2 = query($pdo, $sql2, $parameters2);

        $data2 = $query2->fetch();

        //check if password is correct
        $validPassword = $adminPass == $data2['Pass'] ? true : false;

        if ($validPassword) {
            return 'ok';
        } else {
            return 'passError';
        }
    }
}

function getProducts($pdo, $id = '')
{
    if ($id == '') {
        $sql = 'SELECT * FROM `product` p ORDER BY p.`Name`';
        $query = query($pdo, $sql);
        $results = $query->fetchAll();
    } else {
        $sql = $sql = 'SELECT * FROM `product` p WHERE p.`ProductId` = :ProductId';
        $parameters = [':ProductId' => $id];
        $query = query($pdo, $sql, $parameters);
        $results = $query->fetchAll();
    }

    $products = [];
    foreach ($results as $result) {
        $productdetail = findInventory($pdo, $result['ProductId']);
        $sold = countProductByOrderStatus($pdo, $result['ProductId'], "3"); //3 for products in concluded orders
        $shipping = countProductByOrderStatus($pdo, $result['ProductId'], "2"); // (2) for shipping orders
        $existed = countProductByOrderStatus($pdo, $result['ProductId']); // empty 3rd param to count all orders
        $products[] = [
            'ProductId' => $result['ProductId'],
            'TypeId' => $result['TypeId'],
            'Name' => $result['Name'],
            'Image' => $result['Image'],
            'Description' => $result['Description'],
            'Nutrition' => $result['Nutrition'],
            'Status' => $result['Status'],
            'EntryPrice1' => $productdetail[0]['EntryPrice'] ?? 0,
            'EntryPrice2' => $productdetail[1]['EntryPrice'] ?? 0,
            'Price1' => $productdetail[0]['Price'] ?? 0,
            'Price2' => $productdetail[1]['Price'] ?? 0,
            'Available1' => $productdetail[0]['Quantity'] ?? 0,
            'Available2' => $productdetail[1]['Quantity'] ?? 0,
            'Available' => ($productdetail[0]['Quantity'] ?? 0) + ($productdetail[1]['Quantity'] ?? 0),
            'Sold1' => $sold[0]['Quantity'] ?? 0,
            'Sold2' => $sold[1]['Quantity'] ?? 0,
            'Sold' => ($sold[0]['Quantity'] ?? 0) + ($sold[1]['Quantity'] ?? 0),
            'Shipping1' => ($shipping[0]['Quantity'] ?? 0),
            'Shipping2' => ($shipping[0]['Quantity'] ?? 0),
            'Shipping' => ($shipping[0]['Quantity'] ?? 0) + ($shipping[1]['Quantity'] ?? 0),
            'Existed' => ($existed[0]['Quantity'] ?? 0) + ($existed[1]['Quantity'] ?? 0)
        ];
    }
    return $products;
}

function findInventory($pdo, $ProductId)
{
    $sql = 'SELECT pd.`ProductDetailId`, pd.`Price`, pd.`EntryPrice`, pd.`Quantity` FROM `productdetail` pd JOIN `product` p ON pd.`ProductId` = p.`ProductId` WHERE pd.`ProductId` = :ProductId ORDER BY pd.`CapacityId`';
    $parameters = [':ProductId' => $ProductId];
    return query($pdo, $sql, $parameters)->fetchAll();
}

function countProductByOrderStatus($pdo, $ProductId, $OrderStatus = "")
{
    if ($OrderStatus == '') {
        $sql = 'SELECT SUM(od.`Quantity`) as Quantity FROM `productdetail` pd LEFT JOIN `orderdetail` od ON pd.`ProductDetailId` = od.`ProductDetailId` JOIN `orders` o ON o.`OrderId`= od.`OrderId` WHERE pd.`ProductId`= :ProductId GROUP BY pd.`ProductDetailId` ORDER BY pd.`ProductDetailId`';
        $parameters = [':ProductId' => $ProductId];
    } else {
        $sql = 'SELECT SUM(od.`Quantity`) as Quantity FROM `productdetail` pd LEFT JOIN `orderdetail` od ON pd.`ProductDetailId` = od.`ProductDetailId` JOIN `orders` o ON o.`OrderId`= od.`OrderId` WHERE o.`Status` IN (:OrderStatus) AND pd.`ProductId`= :ProductId GROUP BY pd.`ProductDetailId` ORDER BY pd.`ProductDetailId`';
        $parameters = [':OrderStatus' => $OrderStatus, ':ProductId' => $ProductId];
    }

    return query($pdo, $sql, $parameters)->fetchAll();
}

function saveProduct($pdo, $table, $primaryKey, $record)
{
    $recordElement = [
        'ProductId' => $record['ProductId'],
        'TypeId' => $record['TypeId'],
        'Name' => $record['Name'],
        'Image' => $record['Image'],
        'Description' => $record['Description'],
        'Nutrition' => $record['Nutrition'],
        'Status' => $record['Status'],
    ];
    $recordPrice1 =  [
        'ProductId' => $record['ProductId'],
        'CapacityId' => 1,
        'EntryPrice' => $record['EntryPrice1'],
        'Price' => $record['Price1'],
        'Quantity' => $record['New1'],
    ];
    $recordPrice2 =  [
        'ProductId' => $record['ProductId'],
        'CapacityId' => 2,
        'EntryPrice' => $record['EntryPrice2'],
        'Price' => $record['Price2'],
        'Quantity' => $record['New2']
    ];

    if ($recordElement['ProductId'] == '') {
        $recordElement['ProductId'] = null;
        insertProduct($pdo, $table, $recordElement, $recordPrice1, $recordPrice2);
    } else {

        updateProduct($pdo, $table, $primaryKey, $recordElement, $recordPrice1, $recordPrice2);
    }
}

function insertProduct($pdo, $table, $recordElement, $recordPrice1 = [], $recordPrice2 = [])
{

    //insert new Item into $Table
    insertIntoTable($pdo, $table, $recordElement);

    //find the newly inserted element

    $newId = findMaxInTable($pdo, 'product', 'ProductId');


    if (!empty($recordPrice1) && !empty($recordPrice2)) {
        $recordPrice1['ProductId'] = $newId;
        $recordPrice2['ProductId'] = $newId;
        //insert into Table productdetail for CapacityId = 1 (250ml)
        insertIntoTable($pdo, 'productdetail', $recordPrice1);

        //insert into Table productdetail for CapacityId = 2 (330ml)
        insertIntoTable($pdo, 'productdetail', $recordPrice2);
    }
}

function updateProduct($pdo, $table, $primaryKey, $recordElement, $recordPrice1 = [], $recordPrice2 = [])
{
    // update element in $table
    $sqlElement = ' UPDATE `' . $table . '` SET ';

    foreach ($recordElement as $key => $value) {
        $sqlElement .= '`' . $key . '` = :' . $key . ',';
    }

    $sqlElement = rtrim($sqlElement, ',');

    $sqlElement .= ' WHERE `' . $primaryKey . '` = :ProductId';

    query($pdo, $sqlElement, $recordElement);

    if (!empty($recordPrice1) && !empty($recordPrice2)) {
        if (empty($recordPrice1['Quantity'])) {
            $sqlPrice1 = 'UPDATE `productdetail` SET `Price` = :Price, `EntryPrice` = :EntryPrice WHERE `ProductId` = :ProductId AND `CapacityId` = :CapacityId';
            unset($recordPrice1['Quantity']);
        } else {
            $sqlPrice1 = 'UPDATE `productdetail` SET `Price` = :Price, `EntryPrice` = :EntryPrice, `Quantity` = `Quantity`+ :Quantity WHERE `ProductId` = :ProductId AND `CapacityId` = :CapacityId';
        }
        if (empty($recordPrice2['Quantity'])) {
            $sqlPrice2 = 'UPDATE `productdetail` SET `Price` = :Price, `EntryPrice` = :EntryPrice  WHERE `ProductId` = :ProductId AND `CapacityId` = :CapacityId';
            unset($recordPrice2['Quantity']);
        } else {
            $sqlPrice2 = 'UPDATE `productdetail` SET `Price` = :Price, `EntryPrice` = :EntryPrice , `Quantity` = `Quantity` + :Quantity WHERE `ProductId` = :ProductId AND `CapacityId` = :CapacityId';
        }

        query($pdo, $sqlPrice1, $recordPrice1);
        query($pdo, $sqlPrice2, $recordPrice2);
    }
}


function deleteProduct($pdo, $id)
{
    $sqlPrice = 'DELETE FROM `productdetail` WHERE `ProductId` = :primaryKey';
    $parameters = [':primaryKey' => $id];
    query($pdo, $sqlPrice, $parameters);

    $sql = 'DELETE FROM `product` WHERE `ProductId` = :primaryKey';
    query($pdo, $sql, $parameters);
}

function switchStatus($pdo, $table, $primaryKey, $id, $statusKey, $statusVal)
{
    $sql = 'UPDATE `' . $table . '` SET `' . $statusKey . '` = :statusVal WHERE `' . $primaryKey . '` = :primaryKey';
    $parameters = [':primaryKey' => $id, ':statusVal' => $statusVal];
    query($pdo, $sql, $parameters);
}


function getOrders($pdo, $id = '')
{
    if ($id == '') {
        $sql = 'SELECT * FROM `orders` ORDER BY `OrderId` DESC';
        $query = query($pdo, $sql);
        $results = $query->fetchAll();
    } else {
        $sql = 'SELECT * FROM `orders` WHERE `OrderId` = :OrderId';
        $parameters = [':OrderId' => $id];
        $query = query($pdo, $sql, $parameters);
        $results = $query->fetchAll();
    }

    $orders = [];
    foreach ($results as $result) {
        $promo = empty($result['PromoId']) ? ['PromoName' => '', 'PromoValue' => 0] : getOrderInfo($pdo, 'promotion', 'PromoId', $result['PromoId']);

        $member = getOrderInfo($pdo, 'member', 'MemberId', $result['MemberId']);
        $items = getOrderDetail($pdo, $result['OrderId']);
        $subTotalValue = 0;
        foreach ($items as $item) {
            $subTotalValue += ($item['SalePrice'] * $item['Quantity']);
        }

        $orders[] = [
            'OrderId' => $result['OrderId'],
            'MemberId' => $result['MemberId'],
            'MemberName' => $member['Name'],
            'PurchaseDate' => $result['PurchaseDate'],
            'DeliveryDate' => $result['DeliveryDate'] ?? "",
            'Items' => getOrderDetail($pdo, $result['OrderId']),
            'List' => getListProducts($pdo),
            'PromoId' => $result['PromoId'],
            'PromoName' => $promo['PromoName'],
            'PromoValue' => $promo['PromoValue'],
            'subTotalValue' => $subTotalValue,
            'Status' => $result['Status'],
            'Note' => $result['Note']
        ];
    }
    return $orders;
}

function getOrderDetail($pdo, $OrderId)
{
    $sql = 'SELECT pd.`ProductDetailId`, p.`ProductId`, p.`Name`, od.`SalePrice`, od.`Quantity`, pd.`CapacityId`, p.`TypeId`, t.`Type` FROM `orderdetail` od JOIN `productdetail` pd ON od.`ProductDetailId` = pd.`ProductDetailId` JOIN  `product` p ON pd.`ProductId` = p.`ProductId` JOIN `Type` t ON t.`TypeId` = p.`TypeId` WHERE `OrderID` = :OrderId';
    $parameters = [':OrderId' => $OrderId];
    $results = query($pdo, $sql, $parameters)->fetchAll();
    return $results;
}

function getOrderInfo($pdo, $table, $primaryKey, $keyValue)
{
    $sql = 'SELECT * FROM `' . $table . '` WHERE `' . $primaryKey . '` = :keyValue';
    $parameters = [':keyValue' => $keyValue];
    $results = query($pdo, $sql, $parameters)->fetch();
    return $results;
}

function getListProducts($pdo)
{
    $sql = 'SELECT pd.`ProductDetailId`, pd.`Price`, p.`Name`, pd.`CapacityId` FROM `productdetail` pd JOIN `product` p ON pd.`ProductId`= p.`ProductId` WHERE p.`Status`= 1 ORDER BY p.`Name`';
    return query($pdo, $sql)->fetchAll();
}

function changeStock($pdo, $OrderId, $return = false, $newStatus)
{
    $returneds = getOrderDetail($pdo, $OrderId);

    //if $return is true, then the function acts as returning shipment to stock(increase stock), else it will send shipment (decrease stock)
    foreach ($returneds as $returned) {
        if ($return) {
            $sql = 'UPDATE `productdetail` SET `Quantity`= `Quantity` + :Quantity WHERE `ProductId`= :ProductId AND `CapacityId` = :CapacityId';
        } else {
            $sql = 'UPDATE `productdetail` SET `Quantity`= `Quantity` - :Quantity WHERE `ProductId`= :ProductId AND `CapacityId` = :CapacityId';
        }
        $parameters = [':Quantity' => $returned['Quantity'], ':ProductId' => $returned['ProductId'], ':CapacityId' => $returned['CapacityId']];
        query($pdo, $sql, $parameters);
    }
    //Update delivery time if order's status is set to Successful
    if ($newStatus == 3) {
        $sql = 'UPDATE `orders` SET `DeliveryDate`= CURRENT_TIMESTAMP() WHERE `OrderId` = :OrderId';
        $parameters = [':OrderId' => $OrderId];
        query($pdo, $sql, $parameters);
    }
}


function getTypes($pdo)
{
    $results = getTable($pdo, 'type', 'TypeId');
    $type = [];
    foreach ($results as $result) {
        $checkIfUsed = query($pdo, 'SELECT COUNT(p.`TypeId`) AS Existed FROM `product` p JOIN `productdetail`pd ON p.`ProductId` = pd.`ProductId` JOIN `orderdetail` od ON pd.`ProductDetailId` = od.`ProductDetailId` JOIN `orders` o ON o.`OrderId` = od.`OrderId` WHERE p.`TypeId` = ' . $result['TypeId'] . '')->fetchAll();
        $type[] = [
            'TypeId' => $result['TypeId'],
            'Type' => $result['Type'],
            'TypeStatus' => $result['TypeStatus'],
            'Existed' => $checkIfUsed[0]['Existed'],
        ];
    };
    return $type;
}

function deleteType($pdo, $id)
{
    $sql = 'DELETE FROM `type` WHERE `TypeId` = :primaryKey';
    $parameters = [':primaryKey' => $id];
    query($pdo, $sql, $parameters);
}

function editType($pdo, $type)
{
    $sql = 'UPDATE `type` SET `Type` = :Type, `TypeStatus` =:TypeStatus WHERE `TypeId` = :TypeId';
    query($pdo, $sql, $type);
}

function addType($pdo, $type)
{
    $sql = 'INSERT INTO `type`(`Type`, `TypeStatus`) VALUES (:Type, :TypeStatus)';
    // $parameters = [':Type' => $type['Type'], ':TypeStatus' => $type['TypeStatus']];
    query($pdo, $sql, $type);
}

function deleteOrder($pdo, $id)
{
    $sql1 = 'DELETE FROM `orderdetail` WHERE `OrderId` = :OrderId';
    $parameters = [':OrderId' => $id];
    query($pdo, $sql1, $parameters);

    $sql2 = 'DELETE FROM `orders` WHERE `OrderId` = :OrderId';
    query($pdo, $sql2, $parameters);
}

//Save order information from orders-new.php
function saveOrder($pdo, $record)
{

    //Create new Order information
    $recordOrder = $record;
    unset($recordOrder['NewProduct']); //remove NewProduct

    if ($recordOrder['DeliveryDate'] == "") {
        unset($recordOrder['DeliveryDate']); //remove DeliveryDate if there is none
    }
    if ($recordOrder['PromoId'] == 0) {
        unset($recordOrder['PromoId']); //remove PromoId if there is none
    }

    insertIntoTable($pdo, 'orders', $recordOrder);


    $products = $record['NewProduct'];

    $newOrderId = findMaxInTable($pdo, 'orders', 'OrderId');

    foreach ($products as $product) {
        $product['OrderId'] = $newOrderId;
        insertIntoTable($pdo, 'orderdetail', $product);
    }

    //if new order's status is 2 or 3 => move product from stock to shipping
    if ($recordOrder['Status'] > 1) {

        if (isset($recordOrder['DeliveryDate'])) {
            changeStock($pdo, $newOrderId, false, 0); // 0 to not update delivery time
        } else {
            changeStock($pdo, $newOrderId, false, 3); // 3 to update delivery time
        }
    }
}

function getPromos($pdo)
{
    $results = getTable($pdo, 'promotion', 'PromoId');
    $promos = [];
    foreach ($results as $result) {
        $checkIfUsed = query($pdo, 'SELECT COUNT(o.`PromoId`) AS Existed FROM `orders` o WHERE o.`PromoId` = ' . $result['PromoId'] . '')->fetchAll();
        $promos[] = [
            'PromoId' => $result['PromoId'],
            'PromoName' => $result['PromoName'],
            'PromoValue' => $result['PromoValue'],
            'PromoStatus' => $result['PromoStatus'],
            'Existed' => $checkIfUsed[0]['Existed'],
        ];
    };
    return $promos;
}

function deleteSimple($pdo, $table, $idCol, $idVal)
{
    $sql = 'DELETE FROM `' . $table . '` WHERE `' . $idCol . '` = :primaryKey';
    $parameters = [':primaryKey' => $idVal];
    query($pdo, $sql, $parameters);
}

// function addType($pdo, $type)
// {
//     $sql = 'INSERT INTO `type`(`Type`, `TypeStatus`) VALUES (:Type, :TypeStatus)';
//     // $parameters = [':Type' => $type['Type'], ':TypeStatus' => $type['TypeStatus']];
//     query($pdo, $sql, $type);
// }


function findDuplicate($pdo, $table, $idCol, $idVal)
{
    $sql = 'SELECT * FROM `' . $table . '` WHERE `' . $idCol . '`=:idVal';
    $parameters = [':idVal' => $idVal];
    $result = query($pdo, $sql, $parameters);
    return $result->fetch();
}


function updateTableSimple($pdo, $table, $record, $idCol = "", $idValue = "")
{
    $sql = 'UPDATE `' . $table . '` SET ';

    foreach ($record as $key => $value) {
        $sql .= ' `' . $key . '` =:' . $key . ',';
    }

    $sql = rtrim($sql, ',');

    $sql .= ' WHERE `' . $idCol . '` = ' . $idValue . '';

    query($pdo, $sql, $record);
}


function getMembers($pdo)
{
    $sql = 'SELECT * FROM `member` WHERE `MemberId` > 0 ';
    $results = query($pdo, $sql)->fetchAll();

    $members = [];
    foreach ($results as $result) {

        $items = getMemberOrders($pdo, $result['MemberId']);
        $Spending = 0;
        foreach ($items as $item) {
            $Spending += ($item['Status'] == 3) ? ($item['Spending']) : 0;
        }

        $members[] = [
            'MemberId' => $result['MemberId'],
            'Email' => $result['Email'],
            'Name' => $result['Name'],
            'Pass' => $result['Pass'],
            'Birthday' => $result['Birthday'],
            'Gender' => $result['Gender'],
            'Status' => $result['Status'],
            'Phone' => $result['Phone'],
            'Address' => $result['Address'],
            'Items' => $items,
            'Spending' => $Spending
        ];
    }
    return $members;
}

function getMemberOrders($pdo, $id)
{
    $sql = 'SELECT o.`OrderId`, o.`PurchaseDate`, o.`Status`, SUM(od.`Quantity`* od.`SalePrice`) as `Spending` FROM `orders` o JOIN `orderdetail` od ON o.`OrderId` = od.`OrderId` WHERE o.`MemberId` = :id GROUP BY o.`OrderId` ';
    $parameters = [':id' => $id];
    $results = query($pdo, $sql, $parameters)->fetchAll();

    $dummy = [];
    $dummy[] = [
        'OrderId' => null,
        'PurchaseDate' => null,
        'Status' => null,
        'Spending' => null
    ];

    if ($results != null) {
        return $results;
    } else {
        return $dummy;
    }
}
