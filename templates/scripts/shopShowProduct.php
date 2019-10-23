<?php
if ($_REQUEST["typeid"] == '0') {
    $sqlShowProduct = "SELECT * FROM Product JOIN Productdetail ON Product.ProductId = Productdetail.ProductId
                            WHERE CapacityId = 1 AND Status = 1
                            ORDER BY Name";
} else {
    $typeid = $_REQUEST['typeid'];
    $sqlShowProduct = "SELECT * FROM Product  JOIN Productdetail ON Product.ProductId = Productdetail.ProductId
                            WHERE CapacityId = 1 AND TypeId = $typeid AND Status = 1
                            ORDER BY Name";
}

$tableProduct = mysqli_query($con, $sqlShowProduct);
while ($row = mysqli_fetch_array($tableProduct)) {
    ?>

    <!-- MODAL -->
    <div class="modal fade" id="<?php echo 'a' . $row['ProductId']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
            <div class="modal-content juice-modal ">
                <div class="modal-body">
                    <div class="container p-4">
                        <div class="row">
                            <div class="col-4">
                                <img src="<?php echo $row['Image'] ?>" alt="<?php echo $row['Name']; ?>" class="w-100" />
                            </div>
                            <div class="col-8">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-times close-icon" aria-hidden="true"></i>
                                </button>
                                <div class="juice-modal-title"><?php echo $row['Name']; ?></div>
                                <div class="juice-modal-price mb-3">
                                    <span id="<?= 'priceCapacity' . $row['ProductId'] ?>"><?= number_format($row['Price'], 0, '.', '.') ?></span> <span> ₫</span>
                                </div>
                                <div class="juice-modal-description">
                                    <div data-toggle="collapse" href="#collapseNutrition" role="button" aria-expanded="false" aria-controls="collapseNutrition" class="font-weight-bold">
                                        Giá trị dinh dưỡng<i class="fas fa-chevron-down ml-2"></i>
                                    </div>
                                    <div class="collapse show" id="collapseNutrition">
                                        <?php echo $row['Nutrition'] ?>
                                    </div>
                                    <div data-toggle="collapse" href="#collapseProperties" role="button" aria-expanded="false" aria-controls="collapseProperties" class="font-weight-bold">
                                        Thành phần<i class="fas fa-chevron-down ml-2"></i>
                                    </div>
                                    <div class="collapse" id="collapseProperties">
                                        <?php echo $row['Description'] ?>
                                    </div>
                                    <div class="mt-2">
                                        <strong>Giao hàng miễn phí</strong> tới 4 quận: Hoàn Kiếm, Hai
                                        Bà Trưng, Ba Đình, Đống Đa.
                                    </div>
                                </div>
                                <form class="juice-modal-options mt-3 pl-3 py-0" name="formModal" method="post">
                                    <div class="row">
                                        <input type="hidden" name="typeid" value="<?php echo $row['TypeId'] ?>">
                                        <div class="btn-group btn-group-toggle col-12 col-lg-auto px-0 mr-2" data-toggle="buttons">
                                            <div class="btn juice-volume-btn juice-volume-btn-active" id="<?= $row['ProductDetailId'] ?>" value="<?= $row['ProductId'] ?>">
                                                <div class="py-0">250ml</div>
                                            </div>
                                            <div class="btn juice-volume-btn" id="<?= $row['ProductDetailId'] + 1 ?>" value="<?= $row['ProductId'] ?>">
                                                <div class="py-0">330ml</div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center justify-content-center px-3 py-0 mt-4 mt-lg-0 col-12 col-lg-auto juice-qty-pill">
                                            <div class="flex-shrink-0 mr-0 mr-md-2">Số lượng: </div>
                                            <div class="input-group" style="width: 80px;">
                                                <div class="input-group-prepend">
                                                    <button class="js-btn-minus" type="button">
                                                        <i class="fas fa-minus-circle"></i>
                                                    </button>
                                                </div>
                                                <input type="text" class="form-control text-center juice-qty-input px-1" value="1" id="<?= 'quantity' . $row['ProductId'] ?>" aria-label="Quantity">
                                                <div class="input-group-append">
                                                    <button class="js-btn-plus" type="button">
                                                        <i class="fas fa-plus-circle"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <button type="button" class="btn juice-modal-cart py-0 px-3 mt-3 d-flex align-items-center js-juice-modal-cart addCartBtn" id="<?= $row['ProductId'] ?>" data-dismiss="modal">
                                            <input type="hidden" id="<?= 'addThisId' . $row['ProductId'] ?>" value="<?= $row['ProductDetailId'] ?>">
                                            <input type="hidden" id="<?= 'addThisPrice' . $row['ProductId'] ?>" value="<?= $row['Price'] ?>">
                                            <input type="hidden" id="<?= 'addThisName' . $row['ProductId'] ?>" value="<?= $row['Name'] ?>">
                                            <div class="font-weight-bold mr-2 py-1">Thêm vào giỏ</div>
                                            <svg class="cart-icon mr-2" width="30" height="24" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M26.04 15.6718L29.5424 5.18898C29.7181 4.68503 29.5851 4.38209 29.4433 4.18206C29.0802 3.67035 28.3335 3.66549 28.1888 3.66549L8.39518 3.66161L7.86696 1.15548C7.72423 0.564146 7.30282 0 6.4532 0H0.890398C0.31363 0 0 0.269936 0 0.808836V2.25561C0 2.77704 0.312659 2.91297 0.910789 2.91297H5.60747L9.20207 18.1741C8.63113 18.779 8.32041 19.6606 8.32041 20.4831C8.32041 22.293 9.76136 23.9612 11.6024 23.9612C13.3404 23.9612 14.6435 22.3328 14.8552 21.3618H21.856C22.0677 22.3328 23.1232 24 25.1079 24C26.9168 24 28.3879 22.4328 28.3879 20.6258C28.3879 18.8285 27.2955 17.2351 25.1263 17.2351C24.2243 17.2351 23.1542 17.7206 22.6571 18.4488H14.0551C13.4307 17.4778 12.5782 17.1768 11.716 17.1429L11.5965 16.5069H24.6845C25.671 16.5069 25.8652 16.1476 26.04 15.6718ZM25.1321 19.3528C25.8128 19.3528 26.3653 19.9053 26.3653 20.586C26.3653 21.2667 25.8128 21.8192 25.1321 21.8192C24.4515 21.8192 23.898 21.2676 23.898 20.586C23.899 19.9053 24.4515 19.3528 25.1321 19.3528ZM12.8219 20.586C12.8219 21.2744 12.2626 21.8347 11.5761 21.8347C10.8877 21.8327 10.3274 21.2744 10.3274 20.586C10.3274 19.8976 10.8877 19.3373 11.5761 19.3373C12.2626 19.3373 12.8219 19.8976 12.8219 20.586Z" fill="white"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF MODAL -->

    <div class="col-6 col-md-4 col-lg-2">
        <div class="card juice-card px-0 px-xl-2 py-3 mt-4" data-toggle="modal" data-target="<?= '#a' . $row['ProductId']; ?>">
            <img src="<?= $row['Image'] ?>" class="card-img-top" alt="<?= $row['Name']; ?>" />
            <div class="card-body px-2 pb-0">
                <h6 class="card-title d-flex align-items-center justify-content-center">
                    <div class="text-center"><?= $row['Name'] ?></div>
                </h6>
                <p class="juice-card-price py-1 text-center font-weight-bold mb-0">
                    <?php echo number_format($row['Price'], 0, '.', '.') ?>₫
                </p>
                <div hidden><?php echo $row['Description'] ?></div>
            </div>
        </div>
    </div>

<?php   }
?>