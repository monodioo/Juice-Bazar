<?php
if (empty($_SESSION["cart"])) echo "<div class='row my-3 border-bottom'><strong>ĐƠN HÀNG TRỐNG</strong></div>";
else {
    $listCart = $_SESSION["cart"];
    $sumOrder = 0;
    foreach ($listCart as $key => $value) {
        $sql = "SELECT * FROM Product JOIN 
                            Inventory ON Product.ProductId = Inventory.ProductId JOIN
                            Capacity ON Inventory.CapacityId = Capacity.CapacityId
                WHERE Product.ProductId =" . $value['productid'] . " AND Capacity = " . $value['capacity'];
        $rs = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($rs);
        $sumPrice = $row['Price'] * $value['quantity'];
        ?>

        <div class="row my-3 border-bottom">
            <div class="col-4 col-md-2">
                <a href="#!"><img src="<?php echo $row['Image'] ?>" alt="<?php echo $row['Name'] ?>" class="mr-2 img-fluid"></a>
            </div>
            <div class="col-8 col-md-10">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="h-100 d-flex flex-column">
                            <div class="cart-juice-name"><?php echo $row['Name'] ?></div>
                            <span class="cart-juice-volume"><?php echo $row['Capacity'] ?> ml</span>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-3 mt-3 mt-md-0 d-flex justify-content-between">
                        <span class="d-sm-block d-md-none">Đơn giá:&nbsp;</span>
                        <span class="h5 mx-md-auto mx-0"><?php echo $row['Price'] / 1000 ?>.000₫</span>
                    </div>
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="juice-qty-pill mx-auto" style="height: 40px; width: 120px">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="js-btn-minus" type="button">
                                        <i class="fas fa-minus-circle"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control text-center juice-qty-input px-1" value="<?php echo $value['quantity'] ?>" name="quantity" aria-label="Quantity" style="width: 60px; background-color: transparent">
                                <div class="input-group-append">
                                    <button class="js-btn-plus" type="button">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="row">
                            <div class="col-12 mt-2 mt-lg-0 d-flex justify-content-between">
                                <span class="d-sm-block d-lg-none">Tổng:&nbsp;</span>
                                <span class="h5 mx-lg-auto mx-0 font-weight-bold"><?php echo $sumPrice / 1000 ?>.000₫</span>
                            </div>
                            <div class="col-12 text-right">
                                <form method="post">
                                    <button type="submit" class="btn btn-link cart-delete-btn p-0 mt-2" name="cartDeleteBtn"><i class="far fa-trash-alt mb-2"></i></button>
                                    <input type="hidden" class="form-control" name="indexDelete" value="<?= $key ?>">
                                    <input type="hidden" class="form-control" name="priceDelete" value="<?= $sumPrice ?>">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php
        $sumOrder += $sumPrice;
    }
    $_SESSION['sumOrder'] = $sumOrder;
}
?>