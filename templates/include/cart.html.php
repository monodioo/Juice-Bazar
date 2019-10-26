<div class="row my-4" aria-label="breadcrumb">
  <ol class="breadcrumb mb-0 pl-3 pl-lg-0 bg-transparent">
    <li class="breadcrumb-item"><a href="?section=home">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
  </ol>
</div>

<div class="row">
  <div class="page-section card col-12 p-2 p-md-3 p-lg-5">
    <div class="row">
      <div class="section-title col-12 py-3 pt-lg-0 pb-lg-5" id='giohang'>Giỏ hàng</div>
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
          <!-- <div class="col-12 col-md-1 col-lg-2 mb-2 text-right">
            <button type="button" class="btn textBazar p-0" id="js-cart-deleteAll">Xóa hết</i></button>
          </div> -->
        </div>
      </div>
    </div>
    <div class='row mb-3  border-bottom '>
      <div class='py-3 font-weight-bold text-uppercase' id="cart-empty" style="display:<?= empty($_SESSION['cart']) ? '' : 'none' ?>">Đơn hàng trống</div>
    </div>
    <?php include "templates/scripts/cartShowList.php" ?>

    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <div class="col-12 mb-3 text-left">
            <a class="btn btn-cart text-decoration-none text-white px-4" href="?section=shop&typeid=0">Tiếp tục mua hàng</a>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <form name="couponForm" method="post">
              <label for="c_code" class="text-black mb-3">Nhập mã khuyến mại của bạn</label>
              <div class="input-group">
                <input type="text" style="text-transform: uppercase;" class="form-control" id="c_code" name="c_code" placeholder="Mã khuyến mại" aria-label="Mã khuyến mại" aria-describedby="couponBtn" value="<?= (isset($_SESSION['promoname'])) ? $_SESSION['promoname'] : '' ?>">
                <!-- <div class="input-group-append" <?= (empty($_SESSION['promoname'])) ? 'hidden' : '' ?>>
                  <button class="btn btn-outline-secondary btn-sm px-2" type="button" id="cancelCouponBtn" name="cancelCouponBtn">Hủy</button>
                </div> -->
                <div class="input-group-append">
                  <button class="btn btn-outline-warning btn-sm" type="button" id="couponBtn" name="couponBtn">Áp dụng</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-12 font-italic mt-1" id="stCoupon" style="font-size: 12px"></div>
        </div>
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
                <span id="totalPrice" class="font-weight-bold">
                  <?= (isset($_SESSION['totalPrice'])) ? number_format($_SESSION['totalPrice'], 0, '.', '.') : '0' ?>
                  &nbsp;₫
                </span>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <span class="">Giảm giá</span>
                <span id="promovalue" class="font-weight-bold text-success">
                  (
                  <?= (empty($_SESSION['promovalue'])) ? '0' : $_SESSION['promovalue'] * 100 ?>
                  %)
                </span>
              </div>
              <div class="col-md-6 text-right">
                <span>-
                  <?= (empty($_SESSION['promovalue'])) ? '0' : number_format($_SESSION['totalPrice'] * ($_SESSION['promovalue']), 0, '.', '.') ?>
                  &nbsp;₫
                  <span>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <span class="">Tổng tiền</span>
              </div>
              <div class="col-md-6 text-right">
                <span id="lastPrice" class="font-weight-bold">
                  <?php
                  if (empty($_SESSION['totalPrice'])) echo '0';
                  else if (empty($_SESSION['promovalue'])) echo number_format($_SESSION['totalPrice'], 0, '.', '.');
                  else echo number_format($_SESSION['totalPrice'] * (1 - $_SESSION['promovalue']), 0, '.', '.');
                  ?>
                  &nbsp;₫</span>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <a class="btn btn-cart btn-block text-decoration-none text-white text-uppercase px-4 py-3" href="?section=checkout" <?= (empty($_SESSION["cart"])) ? 'hidden' : ''; ?> style="font-size: 1.2rem">Thanh toán</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>