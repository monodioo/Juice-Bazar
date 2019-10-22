<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" crossorigin="anonymous" />
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet" />
    <!--  font awesome -->
    <link href="../../assets/css/all.min.css" rel="stylesheet" />
    <!--  TablerSorter Pager CSS-->
    <link href="../../assets/css/jquery.tablesorter.pager.min.css" rel="stylesheet" />
    <link href="../../assets/css/theme.bootstrap_4.min.css" rel="stylesheet" />
    <!-- Summernote Editor -->
    <link href="../../assets/css/summernote.css" rel="stylesheet" />

    <!-- favicon -->
    <link href="../../assets/image/favicon.png" sizes="32x32" rel="shortcut icon" />
    <!-- Custom CSS -->
    <link href="../../assets/css/style.css" rel="stylesheet" />

    <title><?= $title ?></title>
</head>

<body>
    <div class="container-fluid">
        <div class="row pl-2 bg-white">

            <div class="col-12">
                <div class="row">
                    <a class="text-center py-4" href="index.php">
                        <img src='../../assets/image/admin_banner.png' alt="Banner" style="width: 20vw">
                    </a>
                    <nav class="navbar navbar-expand">
                        <div class="" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link admin-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Products
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item text-dark" href="admin-products.php">All Products</a>
                                        <a class="dropdown-item text-dark" href="products-edit.php">Add New Product</a>
                                        <a class="dropdown-item text-dark" href="admin-types.php">All Categories</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="admin-link nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Orders
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item text-dark" href="admin-orders.php">All Orders</a>
                                        <a class="dropdown-item text-dark" href="orders-new.php">Add New Order</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="admin-promotion.php" class="nav-link ">Promotion</a>
                                </li>
                                <li class="nav-item">
                                    <a href="admin-members.php" class="nav-link ">Members</a>
                                </li>
                                <li class="nav-item">
                                    <a href="admin-website.php" class="nav-link ">Website</a>
                                </li>
                                <li class="nav-item">
                                    <a href="admin-logout.php" class="nav-link ">Log Out</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row my-2 justify-content-center">
            <div class="col-auto"></div>
            <?= $output ?>
            <div class="col-auto"></div>
        </div>
    </div>

    <div class="toast-wrapper">
    </div>


    <script type="text/javascript" src="../../assets/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../../assets/js/popper.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>

    <!-- Font awesome  -->
    <script type="text/javascript" src="../../assets/js/all.min.js"></script>


    <!-- jQuery Validate -->
    <script type="text/javascript" src="../../assets/js/jquery.validate.min.js"></script>

    <!-- jQuery TableSorter -->
    <script type="text/javascript" src="../../assets/js/jquery.tablesorter.combined.min.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.tablesorter.pager.min.js"></script>
    <script type="text/javascript" src="../../assets/js/widget-cssStickyHeaders.min.js"></script>

    <!-- SummerNote Editor -->
    <script type="text/javascript" src="../../assets/js/summernote.min.js"></script>

    <!-- custom script -->
    <script src="../../assets/js/custom.js"></script>
    <script src="../../assets/js/admin.js"></script>
</body>

</html>