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


            <div class="form-group row mb-5">
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
              <label for="c_create_account" class="" data-toggle="collapse" href="#create_an_account" role="button" aria-expanded="false" aria-controls="create_an_account"><input type="checkbox" value="1" id="c_create_account"> Tạo tài khoản mới?</label>
              <div class="collapse" id="create_an_account">
                <div class="py-2">
                  <p class="mb-3">Bạn có thể tạo tài khoản mới sau khi nhập thông tin dưới đây. Nếu bạn đã có tài khoản xin đăng nhập phía trên.</p>
                  <div class="form-group">
                    <label for="c_account_password" class="">Mật khẩu cho tài khoản mới</label>
                    <input type="email" class="form-control" id="c_account_password" name="c_account_password" placeholder="">
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="c_ship_different_address" class="" data-toggle="collapse" href="#ship_different_address" role="button" aria-expanded="false" aria-controls="ship_different_address"><input type="checkbox" value="1" id="c_ship_different_address"> Bạn muốn nhận sản phẩm tại địa chỉ khác?</label>
              <div class="collapse" id="ship_different_address">
                <div class="py-2">

                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="c_diff_name" class="">Họ và Tên<span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_diff_name" name="c_name" placeholder="Họ và Tên">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="c_diff_address" class="">Địa chỉ <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_diff_address" name="c_address" placeholder="Số nhà, Tên đường">
                    </div>
                  </div>

                  <!-- <div class="form-group">
                          <input type="text" class="form-control" placeholder="Địa chỉ phụ">
                        </div> -->
                  <!--       
                        <div class="form-group row">
                          <div class="col-md-6">
                            <label for="c_diff_ward" class="">Xã / Phường <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="c_diff_ward" name="c_diff_ward">
                          </div>
                          <div class="col-md-6">
                            <label for="c_diff_district" class="">Quận<span class="text-danger">*</span></label>
                          <select id="c_diff_district" class="form-control">
                            <option value="0">Chọn Quận</option>    
                            <option value="1">Ba Đình</option>    
                            <option value="2">Bắc Từ Liêm</option>    
                            <option value="3">Cầu Giấy</option>    
                            <option value="4">Đống Đa</option>    
                            <option value="5">Hà Đông</option>    
                            <option value="6">Hai Bà Trưng</option>    
                            <option value="7">Hoàn Kiếm</option>    
                            <option value="8">Hoàng Mai</option>     
                            <option value="9">Long Biên</option>    
                            <option value="10">Nam Từ Liêm</option>    
                            <option value="11">Thanh Xuân</option>    
                            <option value="12">Tây Hồ</option>
                          </select>
                          </div>
                        </div> -->

                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="c_diff_email_address" class="">Email <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" placeholder="Email" id="c_diff_email_address" name="c_diff_email_address">
                    </div>
                    <div class="col-md-6">
                      <label for="c_diff_phone" class="">Điện thoại <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_diff_phone" name="c_diff_phone" placeholder="Số điện thoại">
                    </div>
                  </div>
                </div>
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
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod_baokim" value="baokim">
                <label class="form-check-label" for="paymentMethod_baokim">
                  Thanh toán qua cổng Bảo Kim
                </label>
              </div>
            </div>


            <div class="form-group">
              <button class="btn btn-warning btn-block text-decoration-none text-white font-weight-bold px-4" onclick="window.location='checkout-final.html.php'">Đặt hàng</button>
            </div>


          </div>
        </div>
      </div>
    </div>
  </form>
</div>