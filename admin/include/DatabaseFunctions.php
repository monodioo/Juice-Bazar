<?php

function query($pdo, $sql, $parameters = [])
{
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

function adminLogin($pdo, $adminName, $adminPass)
{
    try {

        // $hash_password = hash('sha256', $adminPass); //Password encryption 
        $sql = 'SELECT * FROM `admin` WHERE `user`=:adminName AND `pass`=:adminPass';
        $parameters = [':adminName' => $adminName, ':adminPass' => $adminPass];

        $query = query($pdo, $sql, $parameters);
        //Fetch row.
        $data = $query->fetch(PDO::FETCH_ASSOC);

        //If $row is FALSE.
        if ($data === false) {
            die('No admin name found! Please go back to sign in again.');
        } else {
            $validPassword = $adminPass == $data['Pass'] ? true : false;

            if ($validPassword) {

                //Provide the user with a login session.
                $_SESSION['admin'] = $data['User'];
                $_SESSION['logged_in'] = time();

                //Redirect to our protected page, which we called home.php
                header('location: admin-home.php');
                exit;
            } else {
                //$validPassword was FALSE. Passwords do not match.
                die('Incorrect admin / password combination! Please go back to sign in again.');
            }
        }
    } catch (PDOException $e) {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
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
    $sql = 'INSERT INTO `' . $table . '` (';

    foreach ($recordElement as $key => $value) {
        $sql .= '`' . $key . '`,';
    }

    $sql = rtrim($sql, ',');

    $sql .= ') VALUES (';

    foreach ($recordElement as $key => $value) {
        $sql .= ':' . $key . ',';
    }

    $sql = rtrim($sql, ',');

    $sql .= ')';

    query($pdo, $sql, $recordElement);

    //find the newly inserted element 
    $query = query($pdo, 'SELECT MAX(`ProductId`) FROM `product`');
    $query = $query->fetch();
    $newId = $query[0];


    if (!empty($recordPrice1) && !empty($recordPrice2)) {
        $recordPrice1['ProductId'] = $newId;
        $recordPrice2['ProductId'] = $newId;
        //insert into Table productdetail for CapacityId = 1 (250ml)
        $sqlPrice1 = 'INSERT INTO `productdetail` (';

        foreach ($recordPrice1 as $key => $value) {
            $sqlPrice1 .= '`' . $key . '`,';
        }

        $sqlPrice1 = rtrim($sqlPrice1, ',');

        $sqlPrice1 .= ') VALUES (';

        foreach ($recordPrice1 as $key => $value) {
            $sqlPrice1 .= ':' . $key . ',';
        }

        $sqlPrice1 = rtrim($sqlPrice1, ',');

        $sqlPrice1 .= ')';

        query($pdo, $sqlPrice1, $recordPrice1);

        //insert into Table productdetail for CapacityId = 2 (330ml)
        $sqlPrice2 = 'INSERT INTO `productdetail` (';

        foreach ($recordPrice2 as $key => $value) {
            $sqlPrice2 .= '`' . $key . '`,';
        }

        $sqlPrice2 = rtrim($sqlPrice2, ',');

        $sqlPrice2 .= ') VALUES (';

        foreach ($recordPrice2 as $key => $value) {
            $sqlPrice2 .= ':' . $key . ',';
        }

        $sqlPrice2 = rtrim($sqlPrice2, ',');

        $sqlPrice2 .= ')';

        query($pdo, $sqlPrice2, $recordPrice2);
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
        $sql = 'SELECT * FROM `orders`';
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
    $sql = 'SELECT * FROM `type`';
    $results = query($pdo, $sql)->fetchAll();
    $type = [];
    foreach ($results as $result) {
        $checkIfUsed = query($pdo, 'SELECT COUNT(p.`TypeId`) AS Existed FROM `product` p JOIN `orderdetail` od ON p.`ProductId` = od.`ProductId` JOIN `orders` o ON o.`OrderId` = od.`OrderId` WHERE p.`TypeId` = ' . $result['TypeId'] . '')->fetchAll();
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
    $parameters = [':Type' => $type['Type'], ':TypeStatus' => $type['TypeStatus']];
    query($pdo, $sql, $type);
}

function deleteOrder($pdo, $id)
{
    $sql1 = 'DELETE FROM `orderdetail` WHERE `OrderId` = :primaryKey';
    $parameters = [':primaryKey' => $id];
    query($pdo, $sql1, $parameters);

    $sql2 = 'DELETE FROM `orders` WHERE `OrderId` = :primaryKey';
    query($pdo, $sql2, $parameters);
}

function editOrder($pdo, $record)
{
    $sql = 'UPDATE `orders` SET `DeliveryDate` = :DeliveryDate, `Status`=:Status, `PromoId` =:PromoId, `Note` =:Note WHERE `OrderId` = :OrderId';
    query($pdo, $sql, $record);
}
