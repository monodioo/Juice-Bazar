<div class="row my-4" aria-label="breadcrumb">
  <ol class="breadcrumb mb-0 pl-3 pl-lg-0 bg-transparent">
    <li class="breadcrumb-item"><a href="?section=home">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
  </ol>
</div>

<div class="row ">
  <div class="page-section card col-12 py-5 px-5">
    <div class="row">
      <div class="section-title col-12 pt-0" id='giohang'>Giỏ hàng</div>
    </div>

    <div class="row">
      <div class="col-0 col-md-2 border-bottom d-none d-md-block">
        <!-- Sản phẩm -->
      </div>
      <div class="col-12 col-md-10 border-bottom">
        <div class="row">
          <div class="col-12 col-md-4 col-lg-3 text-center font-weight-bold h5 ">Sản phẩm</div>
          <div class="col-md-4 col-lg-3 d-none d-md-block text-center font-weight-bold h5 ">Đơn giá</div>
          <div class="col-md-4 col-lg-3 d-none d-md-block text-center font-weight-bold h5 ">Số lượng</div>
          <div class="col-lg-3 d-none d-lg-block text-center font-weight-bold h5 ">Tổng</div>
        </div>
      </div>
    </div>
    <?php include "templates/scripts/cartShowList.php" ?>

    <!-- <div class="row">
            <table class="table table-responsive-md cart-table mx-3">
              <thead>
                <tr>
                  <th style="width:35%" class="text-left">Sản phẩm</th>
                  <th style="width:15%" class="text-center">Đơn giá</th>
                  <th style="width:25%" class="text-center">Số lượng</th>
                  <th style="width:25%" class="text-right">Tổng</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="d-flex flex-row">
                      <img src="../assets/image/juice/btl-00.png" alt="Bottle" class="cart-juice-thumbnail mr-3 img-fluid">
                      <div class="h-100 d-flex flex-column">
                        <div class="cart-juice-name" >Watermelon</div>
                        <div class="cart-juice-volume">330ml</div>
                      </div>
                    </div>
                  </td>
                  <td class="text-center align-middle">
                    <h5>40.000₫</h5>
                  </td>
                  <td >
                    <div class="juice-qty-pill mr-auto ml-auto" style="height: 40px; width: 120px">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <button class="js-btn-minus" type="button">
                              <i class="fas fa-minus-circle"></i>
                          </button>
                        </div>
                        <input type="text" class="form-control text-center juice-qty-input px-1" value="1" name="quantity" aria-label="Quantity" style="width: 60px; background-color: transparent">
                        <div class="input-group-append">
                          <button class="js-btn-plus" type="button">
                              <i class="fas fa-plus-circle"></i>
                          </button>
                        </div>
                      </div>
                    </div>                  
                  </td>
                  <td class="text-right">
                    <h5>40.000₫</h5>
                    <a href="#" class="cart-delete-btn ml-5">Xóa</a>
                  </td>
                </tr>
            
              </tbody>
            </table>
          </div> -->

    <div class="row">
      <div class="col-md-6">
        <div class="row mb-md-4">
          <!-- <div class="col-md-6 mb-3 mb-md-0">
                  <button class="btn btn-cart btn-block text-decoration-none font-weight-normal px-3">Cập nhật Giỏ hàng</button>
                </div>
                <div class="col-md-6 mb-3 mb-md-0">
                  <button class="btn btn-cart btn-block text-decoration-none font-weight-normal px-3">Tiếp tục mua hàng</button>
                </div> -->
          <div class="col-12 mb-3 mb-md-0"><a class="btn btn-cart btn-block text-decoration-none text-white font-weight-normal px-3" href="?section=shop&typeid=0">Tiếp tục mua hàng</a></div>
        </div>
        <div class="row">
          <div class="col-12">
            <form name="couponForm" method="post">
              <label for="c_code" class="text-black mb-3">Nhập mã khuyến mại của bạn</label>
              <div class="input-group">
                <input type="text" class="form-control" id="c_code" name="c_code" placeholder="Mã khuyến mại" aria-label="Mã khuyến mại" aria-describedby="couponBtn" value="<?php if (isset($_SESSION['promoname'])) echo $_SESSION['promoname'] ?>">
                <div class="input-group-append">
                  <button class="btn btn-outline-warning btn-sm" type="button" id="couponBtn" name="couponBtn">Áp dụng</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-12" id="stCoupon"></div>
      </div>
      <div class="col-md-6 mt-3 mt-md-0">
        <div class="row justify-content-end">
          <div class="col">
            <div class="row">
              <div class="col-md-12 text-right border-bottom mb-3 mb-md-5">
                <h3 class=" h4 text-uppercase">Tổng đơn hàng</h3>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <span class="">Tổng giá sản phẩm</span>
              </div>
              <div class="col-md-6 text-right">
                <strong class=""><span id="totalPrice"><?php if (isset($_SESSION['totalPrice'])) echo number_format($_SESSION['totalPrice'], 0, '.', '.');
                                                        else echo '0' ?></span><span> ₫</span></strong>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <span class="">Giảm giá</span>
              </div>
              <div class="col-md-6 text-right">
                <strong><span id="promovalue"><?php if (isset($_SESSION['promovalue'])) echo $_SESSION['promovalue'] * 100;
                                              else echo '0'; ?></span><span> %</span></strong>
              </div>
            </div>
            <div class="row mb-5">
              <div class="col-md-6">
                <span class="">Tổng tiền</span>
              </div>
              <div class="col-md-6 text-right">
                <strong class="">
                  <span id="lastPrice">
                    <?php
                    if (empty($_SESSION['totalPrice'])) echo '0';
                    else  if (empty($_SESSION['promovalue'])) echo number_format($_SESSION['totalPrice'], 0, '.', '.');
                    else echo number_format($_SESSION['totalPrice'] * (1 - $_SESSION['promovalue']), 0, '.', '.');
                    ?></span><span> ₫</span>
                </strong>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <a class="btn btn-cart btn-block text-decoration-none text-white font-weight-normal p-3" href="?section=checkout" <?php if (empty($_SESSION["cart"])) echo 'hidden';
                                                                                                                                  else echo ''; ?>>Thanh toán</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>