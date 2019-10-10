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
    $sql = 'SELECT p.`Name`, p.`Image`, p.`Description`, p.`Nutrition`, p.`Status` FROM `product` p JOIN `pricebycapacity` pc ON p.`ProductId` = pc.`ProductId` JOIN `orderdetail` od ON p.`ProductId` = od.`ProductId` JOIN `orders` o ON od.`OrderId` = o.`OrderId` WHERE p.`TypeId` IN (1,2,3) AND o.`Status` = 1 ';
    $query = query($pdo, $sql);
    return $query->fetchAll();
}
