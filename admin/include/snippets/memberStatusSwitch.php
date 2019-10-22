<?php

session_start();

if (!empty($_SESSION['admin'])) {

    include_once __DIR__ . '/../DatabaseConnection.php';
    include_once __DIR__ . '/../DatabaseFunctions.php';

    try {
        if (isset($_POST['switchMemberBtn'])) {

            $newStatus = ($_POST['switchMemberStatus'] == 0) ? 1 : 0;
            switchStatus($pdo, 'member', 'MemberId', $_POST['switchMemberId'], 'Status', $newStatus);

            $_SESSION['flashMessage'] = $newStatus == 1 ? 'Member enabled' : 'Member disabled';
            header('location: ../../public/admin-members.php');
        } else {
            header('location: ../../public/admin-members.php');
        }
    } catch (PDOException $e) {
        $title = 'An error has occurred';

        $output = 'Database error: ' . $e->getMessage() . ' in ' .
            $e->getFile() . ':' . $e->getLine();
    }
} else {

    header('location: ../../public/index.php');
}
