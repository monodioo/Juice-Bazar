<?php include "templates/scripts/checkoutAddInfo.php" ?>

<div class="row my-4" aria-label="breadcrumb">
  <ol class="breadcrumb mb-0 pl-3 pl-lg-0 bg-transparent">
    <li class="breadcrumb-item"><a href="?section=home">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="?section=cart">Giỏ hàng</a></li>
    <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
  </ol>
</div>

<div class="row ">
  <form class="page-section card col-12 py-5 px-5" method="post">
    <div class="container">
      <div class="row mb-5">
        <div class="col">
          <div class="border border-warning p-4 rounded" role="alert" <?php if (isset($_SESSION['memberId'])) echo 'hidden'; ?>>
            Bạn đã có tài khoản? <a href="?section=login">Bấm vào đây</a> để đăng nhập
          </div>
          <div class="border border-warning p-4 rounded" role="alert" <?php if (empty($_SESSION['memberId'])) echo 'hidden'; ?>>
            Thông tin của <a href="?section=login"><?php if (isset($_SESSION['memberId'])) echo $rowCheckoutInfo['Name'] ?></a>
          </div>
        </div>
      </div>
      <div class="row row-eq-height">
        <div class="col-md-6 mb-5 mb-md-0">
          <h2 class="h3 mb-3 ">Thông tin Thanh toán</h2>
          <div class="p-3 p-lg-5 border">

            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_name" class="">Họ tên <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_name" name="c_name" placeholder="Họ tên" value="<?php if (isset($_SESSION['memberId'])) echo $rowCheckoutInfo['Name'] ?>">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_address" class="">Địa chỉ <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Số nhà, Tên đường" value="<?php if (isset($_SESSION['memberId'])) echo $rowCheckoutInfo['Address'] ?>">
              </div>
            </div>


            <div class="form-group row">
              <div class="col-md-6">
                <label for="c_email_address" class="">Email <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_email_address" name="c_email_address" placeholder="Email" value="<?php if (isset($_SESSION['memberId'])) echo $rowCheckoutInfo['Email'] ?>">
              </div>
              <div class="col-md-6">
                <label for="c_phone" class="">Điện thoại <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Số điện thoại" value="<?php if (isset($_SESSION['memberId'])) echo $rowCheckoutInfo['Phone'] ?>">
              </div>
            </div>


            <div class="form-group">
              <label for="c_order_notes" class="">Ghi chú</label>
              <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Bạn muốn nhắn gì cho chúng tôi?"></textarea>
            </div>

          </div>
        </div>
        <div class="col-md-6">

          <h2 class="h3 mb-3">Đơn hàng của bạn</h2>
          <div class="p-3 p-lg-5 border">
            <table class="table site-block-order-table mb-4">
              <thead>
                <th>Sản phẩm</th>
                <th class="text-right">Tổng</th>
              </thead>
              <tbody>

                <?php include "templates/scripts/checkoutShowList.php" ?>

                <tr>
                  <td class="font-weight-bold"><strong>Tổng giá sản phẩm</strong></td>
                  <td class="text-right"><?php if (empty($_SESSION['cart'])) echo '0';
                                          else echo number_format($_SESSION['totalPrice'], 0, '.', '.') ?></td>
                </tr>
                <tr>
                  <td class="font-weight-bold"><strong>Giảm giá</strong></td>
                  <td class="text-right"><? ?>₫</td>
                </tr>
                <tr>
                  <td class="font-weight-bold"><strong>Tổng tiền</strong></td>
                  <td class="font-weight-bold text-right"><strong>40.000₫</strong></td>
                </tr>
              </tbody>
            </table>

            <div class="mb-4">
              <div class="font-weight-bold mb-2">
                Hình thức thanh toán
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod_cash" value="cash" checked>
                <label class="form-check-label" for="paymentMethod_cash">
                  Thanh toán khi nhận hàng
                </label>
              </div>


              <div class="form-group">
                <button class="btn btn-warning btn-block text-decoration-none text-white font-weight-bold px-4" onclick="window.location='checkout-final.html.php'">Đặt hàng</button>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>