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

function getProducts($pdo)
{
    $sql = 'SELECT DISTINCT p.`ProductId`, p.`Name`, p.`Image`, p.`Description`, p.`Nutrition`, p.`Status`, p.`TypeId` FROM `product` p WHERE p.`TypeId` IN (1,2,3) ORDER BY p.`Name`';
    $query = query($pdo, $sql);
    $results = $query->fetchAll();
    $products = [];
    foreach ($results as $result) {
        $capacity = findCapacity($pdo, $result['ProductId']);
        $sold = findSold($pdo, $result['ProductId']);
        $pending = findPending($pdo, $result['ProductId']);
        $products[] = [
            'ProductId' => $result['ProductId'],
            'Name' => $result['Name'],
            'Image' => $result['Image'],
            'Description' => $result['Description'],
            'Nutrition' => $result['Nutrition'],
            'Status' => $result['Status'],
            'Price1' => $capacity[0]['Price'],
            'Price2' => $capacity[1]['Price'],
            'Total1' => $capacity[0]['Quantity'],
            'Total2' => $capacity[1]['Quantity'],
            'Total' => ($capacity[0]['Quantity'] + $capacity[1]['Quantity']),
            'Sold1' => empty($sold[0]['Quantity']) ? 0 : $sold[0]['Quantity'],
            'Sold2' => empty($sold[1]['Quantity']) ? 0 : $sold[1]['Quantity'],
            'Sold' => (empty($sold[0]['Quantity']) ? 0 : $sold[0]['Quantity']) + (empty($sold[1]['Quantity']) ? 0 : $sold[1]['Quantity']),
            'Pending' => (empty($pending[0]['Quantity']) ? 0 : $pending[0]['Quantity']) + (empty($pending[1]['Quantity']) ? 0 : $pending[1]['Quantity'])
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

function findSold($pdo, $ProductId)
{
    $sql = 'SELECT SUM(od.`Quantity`) as Quantity FROM `pricebycapacity` pc LEFT JOIN `orderdetail` od ON pc.`ProductId` = od.`ProductId` AND pc.`CapacityId`= od.`CapacityId` JOIN `orders` o ON o.`OrderId`= od.`OrderId` WHERE o.`Status`IN(2) AND pc.`ProductId`= :ProductId GROUP BY pc.`CapacityId` ORDER BY pc.`CapacityId`'; // STatus = 2 for concluded orders

    $parameters = [':ProductId' => $ProductId];
    return query($pdo, $sql, $parameters)->fetchAll();
}

function findPending($pdo, $ProductId)
{
    $sql = 'SELECT SUM(od.`Quantity`) as Quantity FROM `pricebycapacity` pc LEFT JOIN `orderdetail` od ON pc.`ProductId` = od.`ProductId` AND pc.`CapacityId`= od.`CapacityId` JOIN `orders` o ON o.`OrderId`= od.`OrderId` WHERE o.`Status`IN(1) AND pc.`ProductId`= :ProductId GROUP BY pc.`CapacityId` ORDER BY pc.`CapacityId`'; // STatus = 1for pending orders

    $parameters = [':ProductId' => $ProductId];
    return query($pdo, $sql, $parameters)->fetchAll();
}
