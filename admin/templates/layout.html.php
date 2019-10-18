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
        <div class="row px-0 pt-3 pb-0 bg-white">
            <div class="col-12">
                <a class="text-center js-logo-clone pl-2" href="index.php">
                    <img src='../../assets/image/admin_banner.png' alt="Banner" style="width: 20vw">
                </a>
            </div>

            <div class="col-12">
                <nav class="nav ">
                    <a class="nav-link dropdown-toggle pl-2" href="#" id="productDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
                    <div class="dropdown-menu" aria-labelledby="productDropdown">
                        <a class="dropdown-item text-dark" href="admin-products.php">All Products</a>
                        <a class="dropdown-item text-dark" href="products-edit.php">Add Product</a>
                        <a class="dropdown-item text-dark" href="admin-types.php">All Categories</a>
                    </div>
                    <a href="admin-orders.php" class="nav-link ">Orders</a>
                    <a href="admin-promos.php" class="nav-link ">Promotion</a>
                    <a href="admin-customers.php" class="nav-link ">Customers</a>
                    <a href="admin-customers.php" class="nav-link ">Website</a>
                    <a href="admin-logout.php" class="nav-link ">Log Out</a>
                </nav>
            </div>

        </div>

        <div class="row my-1 justify-content-center">
            <div class="col-auto"></div>
            <?= $output ?>
            <div class="col-auto"></div>
        </div>
    </div>

    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-show="true">
        <div class="toast-body p-3 px-5 bg-success">
            <span class="text-white">Successful login!</span>
        </div>
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