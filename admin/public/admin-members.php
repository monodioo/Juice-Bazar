<?php

session_start();

if (!empty($_SESSION['admin'])) {
    include_once __DIR__ . '/../include/DatabaseConnection.php';
    include_once __DIR__ . '/../include/DatabaseFunctions.php';

    if (isset($_SESSION['flashMessage'])) {
        echo "<script>alert('$_SESSION[flashMessage]')</script>";
        unset($_SESSION['flashMessage']);
    }

    try {
        $title = 'Juice Bazar - Admin - Members';
        $members = getMembers($pdo);

        ob_start();

        include __DIR__ . '/../templates/admin-members.html.php';

        $output = ob_get_clean();

        // $output = print_r(getMemberOrders($pdo, 3));
        // $output = print_r($members);
    } catch (PDOException $e) {
        $title = 'An error has occurred';

        $output = 'Database error: ' . $e->getMessage() . ' in ' .
            $e->getFile() . ':' . $e->getLine();
    }
} else {
    header('location: index.php');
}

include __DIR__ . '/../templates/layout.html.php';
