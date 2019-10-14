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
            //Could not find a user with that username!
            //PS: You might want to handle this error in a more user-friendly manner!
            die('No admin name found! Please go back to sign in again.');
        } else {
            //User account found. Check to see if the given password matches the
            //password hash that we stored in our users table.

            //Compare the passwords.
            $validPassword = $adminPass == $data['Pass'] ? true : false;

            //If $validPassword is TRUE, the login has been successful.
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
        $sql = 'SELECT * FROM `product` p WHERE p.`TypeId` IN (1,2,3) ORDER BY p.`Name`';
        $query = query($pdo, $sql);
        $results = $query->fetchAll();
    } else {
        $sql = $sql = 'SELECT * FROM `product` p WHERE p.`TypeId` IN (1,2,3) AND p.`ProductId` = :ProductId';
        $parameters = [':ProductId' => $id];
        $query = query($pdo, $sql, $parameters);
        $results = $query->fetchAll();
    }

    $products = [];
    foreach ($results as $result) {
        $capacity = findCapacity($pdo, $result['ProductId']);
        $sold = countProductByOrderStatus($pdo, $result['ProductId'], "3"); //3 for products in concluded orders
        $shipping = countProductByOrderStatus($pdo, $result['ProductId'], "2"); // (0,1) for pending and processing orders
        $products[] = [
            'ProductId' => $result['ProductId'],
            'TypeId' => $result['TypeId'],
            'Name' => $result['Name'],
            'Image' => $result['Image'],
            'Description' => $result['Description'],
            'Nutrition' => $result['Nutrition'],
            'Status' => $result['Status'],
            'Price1' => $capacity[0]['Price'],
            'Price2' => $capacity[1]['Price'],
            'Available1' => $capacity[0]['Quantity'],
            'Available2' => $capacity[1]['Quantity'],
            'Available' => ($capacity[0]['Quantity'] + $capacity[1]['Quantity']),
            'Sold1' => $sold[0]['Quantity'] ?? 0,
            'Sold2' => $sold[1]['Quantity'] ?? 0,
            'Sold' => ($sold[0]['Quantity'] ?? 0) + ($sold[1]['Quantity'] ?? 0),
            'Shipping1' => ($shipping[0]['Quantity'] ?? 0),
            'Shipping2' => ($shipping[0]['Quantity'] ?? 0),
            'Shipping' => ($shipping[0]['Quantity'] ?? 0) + ($shipping[1]['Quantity'] ?? 0)
        ];
    }
    return $products;
}

function findCapacity($pdo, $ProductId)
{
    $sql = 'SELECT pc.`CapacityId`, pc.`Price`, pc.`Quantity` FROM `pricebycapacity` pc JOIN `product` p ON pc.`ProductId` = p.`ProductId` WHERE pc.`ProductId` = :ProductId ORDER BY pc.`CapacityId`';
    $parameters = [':ProductId' => $ProductId];
    return query($pdo, $sql, $parameters)->fetchAll();
}

function countProductByOrderStatus($pdo, $ProductId, $OrderStatus)
{
    $sql = 'SELECT SUM(od.`Quantity`) as Quantity FROM `pricebycapacity` pc LEFT JOIN `orderdetail` od ON pc.`ProductId` = od.`ProductId` AND pc.`CapacityId`= od.`CapacityId` JOIN `orders` o ON o.`OrderId`= od.`OrderId` WHERE o.`Status` IN (:OrderStatus) AND pc.`ProductId`= :ProductId GROUP BY pc.`CapacityId` ORDER BY pc.`CapacityId`';

    $parameters = [':OrderStatus' => $OrderStatus, ':ProductId' => $ProductId];
    return query($pdo, $sql, $parameters)->fetchAll();
}

// function findPending($pdo, $ProductId)
// {
//     $sql = 'SELECT SUM(od.`Quantity`) as Quantity FROM `pricebycapacity` pc LEFT JOIN `orderdetail` od ON pc.`ProductId` = od.`ProductId` AND pc.`CapacityId`= od.`CapacityId` JOIN `orders` o ON o.`OrderId`= od.`OrderId` WHERE o.`Status`= 1 AND pc.`ProductId`= :ProductId GROUP BY pc.`CapacityId` ORDER BY pc.`CapacityId`'; // Status = 1for pending orders

//     $parameters = [':ProductId' => $ProductId];
//     return query($pdo, $sql, $parameters)->fetchAll();
// }

// function findByID($pdo, $sql, $id)
// {
//     $parameters = [':ProductId' => $id];
//     $query = query($pdo, $sql, $parameters);
//     $results = $query->fetch();
//     return $results[0];
// }

// function findProductById($pdo, $id)
// {


function saveElement($pdo, $table, $primaryKey, $record)
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
        'Price' => $record['Price1'],
        'Quantity' => $record['New1'],
    ];
    $recordPrice2 =  [
        'ProductId' => $record['ProductId'],
        'CapacityId' => 2,
        'Price' => $record['Price2'],
        'Quantity' => $record['New2']
    ];


    if ($recordElement['ProductId'] == '') {
        $recordElement['ProductId'] = null;
        insertElement($pdo, $table, $recordElement, $recordPrice1, $recordPrice2);
    } else {

        updateElement($pdo, $table, $primaryKey, $recordElement, $recordPrice1, $recordPrice2);
    }
}

function insertElement($pdo, $table, $recordElement, $recordPrice1 = [], $recordPrice2 = [])
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
        //insert into Table Pricebycapacity for CapacityId = 1 (250ml)
        $sqlPrice1 = 'INSERT INTO `pricebycapacity` (';

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

        //insert into Table Pricebycapacity for CapacityId = 2 (330ml)
        $sqlPrice2 = 'INSERT INTO `pricebycapacity` (';

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

function updateElement($pdo, $table, $primaryKey, $recordElement, $recordPrice1 = [], $recordPrice2 = [])
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
            $sqlPrice1 = 'UPDATE `pricebycapacity` SET `Price` = :Price  WHERE `ProductId` = :ProductId AND `CapacityId` = :CapacityId';
            unset($recordPrice1['Quantity']);
        } else {
            $sqlPrice1 = 'UPDATE `pricebycapacity` SET `Price` = :Price , `Quantity` = :Quantity WHERE `ProductId` = :ProductId AND `CapacityId` = :CapacityId';
        }
        if (empty($recordPrice2['Quantity'])) {
            $sqlPrice2 = 'UPDATE `pricebycapacity` SET `Price` = :Price  WHERE `ProductId` = :ProductId AND `CapacityId` = :CapacityId';
            unset($recordPrice2['Quantity']);
        } else {
            $sqlPrice2 = 'UPDATE `pricebycapacity` SET `Price` = :Price , `Quantity` = :Quantity WHERE `ProductId` = :ProductId AND `CapacityId` = :CapacityId';
        }

        query($pdo, $sqlPrice1, $recordPrice1);
        query($pdo, $sqlPrice2, $recordPrice2);
    }
}


function deleteElement($pdo, $id)
{
    $sqlPrice = 'DELETE FROM `pricebycapacity` WHERE `ProductId` = :primaryKey';
    $parameters = [':primaryKey' => $id];
    query($pdo, $sqlPrice, $parameters);

    $sql = 'DELETE FROM `product` WHERE `ProductId` = :primaryKey';
    query($pdo, $sql, $parameters);
}

function switchProductStatus($pdo, $table, $primaryKey, $id, $statusKey, $statusVal)
{
    $sql = 'UPDATE `' . $table . '` SET `' . $statusKey . '` = :statusVal WHERE `' . $primaryKey . '` = :primaryKey';
    $parameters = [':primaryKey' => $id, ':statusVal' => $statusVal];
    query($pdo, $sql, $parameters);
}
